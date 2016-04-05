<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQuestionsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('questions', function (Blueprint $table) {
			$table->increments('id');
			//Have to maintain separate Category table to describe each category
			$table->char('category', 5);
			//Hoping in Longer Run, LONGTEXT would be performance efficient
			$table->longtext('question_content');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		//
		Schema::drop('questions');
	}
}
