<?php namespace infofun;

use Illuminate\Database\Eloquent\Model;

class research extends Model {

	//

	protected $table = 'research';

	protected $fillable = ['ds_research',
						   'cd_user',
						   'cd_research_status',
						   'cd_research_visibility',
						   'nr_of_questions',
						   'nr_answers_to_collect',
						   'dt_end_date',
						   'cd_research_type'];

	public $timestamps = false;

	protected $primarykey = 'cd_research';

}
