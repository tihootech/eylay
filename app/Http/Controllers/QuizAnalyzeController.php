<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quiz;
use App\Filler;

class QuizAnalyzeController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('master')->only('general_analyze');
    }

	public function quizzes_to_join()
	{
		$quizzes = Quiz::whereActive(true)->latest()->paginate(6);
        return view('dashboard.quiz.quizzes_to_join', compact('quizzes'));
	}

	public function personal_list()
	{
		$list = Filler::where('user_id', auth()->id())->latest()->paginate(20);
		return view('dashboard.quiz.personal_list', compact('list'));
	}

    public function analyze($quiz_uid, $filler_uid)
    {
    	$quiz = Quiz::whereUid($quiz_uid)->firstOrFail();
		$filler = Filler::whereUid($filler_uid)->firstOrFail();
		if (!master() && $filler->user_id != auth()->id()) {
			abort(403);
		}
		return view('dashboard.quiz.analyze.personal', compact('quiz', 'filler'));
    }

	public function general_analyze(Quiz $quiz)
	{
		dd($quiz);
	}
}
