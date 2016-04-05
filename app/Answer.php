<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model {
	//Ability to Insert Mass Entries into Questions Table
	protected $fillable = ['answer_content', 'question_id'];
	public function question() {
		return $this->belongsTo('App\Question');
	}
}
