<?php namespace infofun;

use Illuminate\Database\Eloquent\Model;

class Question_types extends Model {

	protected $table = 'question_type';

	protected $fillable = ['cd_question_type','tp_question_type','ds_question_type'];

	public $timestamps = false;

	protected $primarykey = 'cd_question_type';
}
