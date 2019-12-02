<?php

namespace App\Http\Controllers;

use App\Quiz;
use App\Question;
use App\Filler;
use Illuminate\Http\Request;

class QuizFillingController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth')->except('preview');
    }

	public function preview($title)
	{
		$quiz = Quiz::whereTitle(raw($title))->firstOrFail();
		return view('landing.quiz.preview', compact('quiz'));
	}

	public function fill($uid, Request $request)
	{
		$quiz = Quiz::whereUid($uid)->firstOrFail();

		if ($request->refresh) {
			session(['filling' => null]);
			return redirect()->route('quiz.fill', $quiz->uid);
		}

		if ($request->quit) {
			session(['filling' => null]);
			return redirect()->route('quiz.preview', $quiz->title);
		}

		if ($quiz->active && $quiz->questions->count()) {
			$no_header = true;
			$filling = session('filling');
			if ($filling && $filling['quiz_id'] == $quiz->id) {
				$found = Filler::where('user_id', auth()->id())->where('quiz_id', $quiz->id)->whereNotNull('finished_at')->first();
				if ($found) {
					return redirect()->route('quiz.preview', $quiz->title)->withError(__('YOU_HAVE_ALREADY_ANSWERED_THIS_QUIZ'));
				}
				if ( $process_finished = $filling['process_finished'] ) {
					$filler = Filler::find($filling['filler_id']);
					return view('landing.quiz.fill', compact('quiz', 'no_header', 'filler', 'process_finished'));
				}
				$question = Question::find($filling['question_id']);
				if (!$question) {
					session(['filling'=>null]);
					$question = $quiz->questions->first();
				}
			}else {
				$found = Filler::where('user_id', auth()->id())->where('quiz_id', $quiz->id)->first();
				if ($found) {
					if ($found->finished_at) {
						return redirect()->route('quiz.preview', $quiz->title)->withError(__('YOU_HAVE_ALREADY_ANSWERED_THIS_QUIZ'));
					}else {
						$found->delete();
					}
				}
				$filler = Filler::make($quiz);
				$question = $quiz->questions->first();
				session([
					'filling' => [
						'quiz_id' => $quiz->id,
						'question_id' => $question->id,
						'filler_id' => $filler->id,
						'process_finished' => false,
					]
				]);
			}
			return view('landing.quiz.fill', compact('quiz', 'no_header', 'question'));
		}else {
			abort(403);
		}
	}

	public function submit_answer($direction, Question $question, $position=null, Request $request)
	{
		$quiz = $question->quiz;
		if ($quiz->active) {

			if ($request->direction == 'next') { // next question


				if ($question->required && !$request->answer) {

					// check if required
					$error_message = __('VALIDATION_REQUIRED');
					return view('landing.quiz.quiz_body', compact('question', 'error_message'));

				}else {

					// validation
					$error_messages = [];
					if ($request->answer) {
						if ($question->type == 'number') {

							if (!is_numeric($request->answer)) {
								$error_messages []= __('VALIDATION_NUMERIC');
							}elseif ($question->min && $request->answer < $question->min) {
								$error_messages []= __('VALIDATION_NUMERIC_MIN', ['n' => $question->min]);
							}elseif ($question->max && $request->answer > $question->max) {
								$error_messages []= __('VALIDATION_NUMERIC_MAX', ['n' => $question->max]);
							}

						}elseif ($question->type == 'string' || $question->type == 'text') {

							$length = mb_strlen($request->answer);
							if ($question->min && $length < $question->min) {
								$error_messages []= __('VALIDATION_TEXT_MIN', ['n' => $question->min]);
							}elseif ($question->max && $length > $question->max) {
								$error_messages []= __('VALIDATION_TEXT_MAX', ['n' => $question->max]);
							}

						}
					}

					// show errors if any
					if (count($error_messages)) {
						$old_answer = $request->answer;
						return view('landing.quiz.quiz_body', compact('question', 'error_messages', 'old_answer'));
					}

					// submit answer if not already submitted or if the answer is changed
					if ($request->answer != $question->filler_answer()) {
						$question->register_answer($request->answer);
					}

					// find next question and load it
					$next_question = $question->next();
					if ($next_question) {
						$question = $next_question;
						update_filling_session($question);
						return view('landing.quiz.quiz_body', compact('question'));
					}else {
						return self::finish_process($quiz);
					}

				}

			}elseif($request->direction == 'prev') { // prev question

				// find prev question and load it
				$prev_question = $question->prev();
				if ($prev_question) {
					$question = $prev_question;
					update_filling_session($question);
					return view('landing.quiz.quiz_body', compact('question'));
				}else {
					$error_message = __('NO_PREV_QUESTION');
					return view('landing.quiz.quiz_body', compact('question', 'error_message'));
				}

			}elseif ($request->direction == 'jump') { // jump to a question question

				// find targeted question and load it
				$target_question = $quiz->find_question($position);
				if ($position && $target_question) {
					$question = $target_question;
					update_filling_session($question);
					return view('landing.quiz.quiz_body', compact('question'));
				}else {
					$error_message = __('QUESTION_NOT_FOUND');
					return view('landing.quiz.quiz_body', compact('question', 'error_message'));
				}

			}else {
				$error_message = __('DIRECTION_ERROR');
				return view('landing.quiz.quiz_body', compact('question', 'error_message'));
			}

		}else {
			abort(403);
		}
	}

	public static function finish_process($quiz)
	{
		// check if any required question is left empty
		$empty_questions = [];
		foreach ($quiz->questions as $q) {
			if ($q->required && !$q->filler_answer()) {
				$empty_questions []= $q->position;
			}
		}

		if (count($empty_questions)) {

			// if a single required question or some required questions are empty return back with an error
			$error_message = __(
				count($empty_questions) == 1 ? 'EMPTY_QUESTION_ERROR' : 'EMPTY_QUESTIONS_ERROR',
				['list' => implode(__('AND'), $empty_questions)]
			);
			$question = Question::where('quiz_id', $quiz->id)->wherePosition($empty_questions[0])->first();
			return view('landing.quiz.quiz_body', compact('question', 'error_message'));

		}else {

			// finish the filling process
			$filling = session('filling');
			$filler = Filler::find($filling['filler_id']);
			$filler->calculate_result(); // calculate points and corrects
			$filler->finsih_and_close(); // set finished_at and calculate answering time
			$filling['process_finished'] = $process_finished = true;
			session(compact('filling'));
			return view('landing.quiz.quiz_body', compact('quiz', 'filler', 'process_finished'));

		}
	}
}
