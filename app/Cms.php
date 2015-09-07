<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Cms extends Model {

	protected $fillable = array('page_title',  'page_slug', 'page_content');

}
