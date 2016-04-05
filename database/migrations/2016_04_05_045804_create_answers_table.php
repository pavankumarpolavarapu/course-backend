<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAnswersTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('answers', function (Blueprint $table) {
			$table->increments('id');
			//Hoping in Longer Run, LONGTEXT would be performance efficient
			$table->longtext('answer_content');
			$table->integer('question_id')->unsigned();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('answers');
	}
}
