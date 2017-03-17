<?php namespace infofun;

use Illuminate\Database\Eloquent\Model;

class Research_types extends Model {

	protected $table = 'research_type';

	protected $fillable = ['cd_research_type','ds_research_type'];

	public $timestamps = false;

	protected $primarykey = 'cd_research_type';
}
