<?php
use App\Answer;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class AnswersTableSeeder extends Seeder {
	public function run() {
		$faker = Faker::create();
		foreach (range(1, 50) as $index) {
			Answer::create([
				'answer_content' => $faker->paragraph($nbSentences = 3),
				'question_id' => $faker->numberBetween($min = 1, $max = 30),
			]);
		}
	}
}
