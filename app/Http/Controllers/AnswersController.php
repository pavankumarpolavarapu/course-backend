<?php

namespace App\Http\Controllers;
use App\Answer;
use Response;

class AnswersController extends Controller {
	public function index() {
		$answers = Answer::all();
		return Response::json([
			'data' => $this->transformCollection($answers),
		], 200);
	}

	public function show($id) {
		$answer = Answer::find($id);
		if (!$answer) {
			return Response::json([
				'error' => [
					'message' => 'answer does not exist',
				],
			], 404);
		}

		return Response::json([
			'data' => $this->transform($answer),
		], 200);
	}

	private function transformCollection($answers) {
		return array_map([$this, 'transform'], $answers->toArray());
	}

	private function transform($answer) {
		return [
			'answer_id' => $answer['id'],
			'answer' => $answer['answer_content'],
		];
	}
}
