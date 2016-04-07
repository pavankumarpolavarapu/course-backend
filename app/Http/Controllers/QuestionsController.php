<?php

namespace App\Http\Controllers;

use App\Question;
//Question Model
use Response;

class QuestionsController extends Controller {
	public function index() {
		$questions = Question::all();
		return Response::json([
			'question' => $this->transformCollection($questions),
		], 200);
	}

	public function show($id) {
		$question = Question::find($id);
		if (!$question) {
			return Response::json([
				'error' => [
					'message' => 'Question does not exist',
				],
			], 404);
		}

		return Response::json([
			'question' => $this->transformQuestion($question),
			'answers' => $this->transformAnswers($question->answers->toArray()),
		], 200);
	}

	private function transformCollection($questions) {
		return array_map([$this, 'transformQuestion'], $questions->toArray());
	}

	private function transformQuestion($question) {
		return [
			'question_id' => $question['id'],
			'question' => $question['question_content'],
		];
	}

	private function transformAnswers($answers) {
		$answersArray = array();
		foreach ($answers as $key => $value) {
			$answersArray[] = [
				'answer_id' => $value['id'],
				'answer_choice' => $value['answer_content'],
			];
		}
		return $answersArray;
	}
}
