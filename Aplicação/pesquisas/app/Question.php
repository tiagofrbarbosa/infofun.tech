<?php namespace infofun;

use Illuminate\Database\Eloquent\Model;

class Question extends Model {

	protected $table = 'research_question';

	protected $fillable = ['ds_research_question','cd_question_type','cd_user'];

	public $timestamps = false;

	protected $primarykey = 'cd_research_question';

}
