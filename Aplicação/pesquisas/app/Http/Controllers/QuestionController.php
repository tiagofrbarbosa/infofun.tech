<?php namespace infofun\Http\Controllers;

use infofun\Http\Requests;
use infofun\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use infofun\Question;
use infofun\Question_types;

class QuestionController extends Controller {

	public function __construct(){
		$this->middleware('auth');
	}

	public function index(){

		$id = \Auth::user()->id;
		$user_asks = DB::select('SELECT r.cd_research_question,
										r.ds_research_question,
										r.cd_question_type,
										q.ds_question_type 
								 FROM research_question r,
								 	  question_type q
								 WHERE r.cd_question_type = q.cd_question_type
								 AND r.cd_user = ?', [$id]);

		return view('research_question_index')->with('p',$user_asks);
	}


	public function nova(){

		$question_types = Question_types::all();

		return view('research_question_new')->with('qtypes',$question_types);

	}


	public function create(Request $request){

		Question::create($request->all());

		return redirect()->action('QuestionController@index');
	}


	public function edit($id){

		$user = \Auth::user()->id;

		$edit = new Question;

		$edit = DB::select('SELECT r.cd_research_question,
								   r.ds_research_question,
								   r.cd_question_type,
								   q.ds_question_type 
								 FROM research_question r,
								 	  question_type q
								 WHERE r.cd_question_type = q.cd_question_type
								 AND r.cd_user = ? AND r.cd_research_question = ?',[$user, $id]);

						


		return view('research_question_edit')->with('question',$edit);
	}
}
