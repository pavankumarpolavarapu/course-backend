<?php

namespace App\Http\Controllers;

use App\Question;
//Question Model
use Response;

class QuestionsController extends Controller {
	public function index() {
		$questions = Question::all();
		return Response::json([
			'data' => $this->transformCollection($questions),
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
			'data' => $this->transform($question),
		], 200);
	}

	private function transformCollection($questions) {
		return array_map([$this, 'transform'], $questions->toArray());
	}

	private function transform($question) {
		foreach ($question->answers as $index => $answer) {
			$choice[] = array('index' => $index,
				'choice' => $answer['answer_content']);
		}
		return [
			'question_id' => $question['id'],
			'question' => $question['question_content'],
			'answers' => $choice,
		];
	}
}
