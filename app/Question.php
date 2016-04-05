<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model {
	//Ability to Insert Mass Entries into Questions Table
	protected $fillable = ['category', 'question_content'];
	public function answers() {
		return $this->hasMany('App\Answer');
	}
}
