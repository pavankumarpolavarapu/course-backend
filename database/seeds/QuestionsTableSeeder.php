<?php

use App\Question;
use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder {
	public function run() {
		$faker = Faker\Factory::create();
		foreach (range(1, 30) as $index) {
			Question::create([
				'category' => $faker->numberBetween($min = 10000, $max = 99999),
				'question_content' => $faker->paragraph($nbSentences = 3),
			]);
		}
	}
}
