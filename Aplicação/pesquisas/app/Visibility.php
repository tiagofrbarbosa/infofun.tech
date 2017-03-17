<?php namespace infofun;

use Illuminate\Database\Eloquent\Model;

class Visibility extends Model {

	protected $table = 'research_visibility';

	protected $fillable = ['cd_research_visibility','ds_research_visibility'];

	public $timestamps = false;

	protected $primarykey = 'cd_research_visibility';
}
