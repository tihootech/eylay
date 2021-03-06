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

	public function see($uid)
	{
		$quiz = Quiz::where('uid', $uid)->firstOrFail();
		return view('dashboard.quiz.see', compact('quiz'));
	}

	public function quizzes_to_join(Request $request)
	{
		$user = auth()->user();
		$quizzes = Quiz::query();
		if ($request->search) {
			$quizzes = $quizzes->where('title', 'like', "%$request->search%");
		}
		$quizzes = $quizzes->whereActive(true)->where(function ($query) use ($user) {
			$query->whereNull('access')->orWhere('access', $user->type);
		})->latest()->paginate(12);
        return view('dashboard.quiz.quizzes_to_join', compact('quizzes'));
	}

	public function personal_list()
	{
		$list = Filler::where('user_id', auth()->id())->latest()->paginate(20);
		return view('dashboard.quiz.personal_list', compact('list'));
	}

    public function statics($quiz_uid, $filler_uid=null)
    {
		if (!master() && !$filler_uid) {
			abort(404);
		}
    	$quiz = Quiz::whereUid($quiz_uid)->firstOrFail();
		$filler = Filler::whereUid($filler_uid)->first();
		if (!master() && $filler && $filler->user_id != auth()->id()) {
			abort(403);
		}
		return view('dashboard.quiz.analyze.statics', compact('quiz', 'filler'));
    }

	public function general_analyze(Quiz $quiz)
	{
		return view('dashboard.quiz.analyze.general', compact('quiz'));
	}
}
