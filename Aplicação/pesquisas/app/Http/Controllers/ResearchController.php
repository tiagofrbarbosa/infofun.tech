<?php namespace infofun\Http\Controllers;

use infofun\Http\Requests;
use infofun\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use infofun\Research;
use infofun\Visibility;
use infofun\Research_types;


class ResearchController extends Controller {


	public function __construct(){
			$this->middleware('auth');
	}


	public function index(){
		
		$id = \Auth::user()->id;
		$user_survey = Research::where('cd_user',$id)->get();
		return view('home')->with('s',$user_survey);
	}


	public function nova(){

		$visibility = Visibility::all();
		$types = Research_types::all();

		return view('researchnew')->with(array('visibility' => $visibility, 'types' =>$types));
	}


	public function create(Request $request)
	{
		Research::create($request->all());

		return redirect()->action('ResearchController@nova')->withInput($request->only('ds_research'));
	}


	public function edit($id){

		$user = \Auth::user()->id;

		$edit = Research::whereRaw('cd_research = ? and cd_user = ?',[$id, $user])->get()->first();

		return view('researchedit')->with('s',$edit);
	}


	public function update(Request $request, $id){

		$user = \Auth::user()->id;
		$ds_research = $request->input('ds_research');
		$cd_research_status = $request->input('cd_research_status');

		DB::update('UPDATE research SET ds_research = ?, cd_research_status = ? WHERE cd_research = ? AND cd_user = ?', [$ds_research,$cd_research_status,$id,$user]);

		return redirect()->action('ResearchController@index');

	}


	public function remove($id){
		$user = \Auth::user()->id;
		DB::delete('DELETE FROM research WHERE cd_research = ? AND cd_user = ?',[$id,$user]);
		return redirect()->action('ResearchController@index');
	}
}
