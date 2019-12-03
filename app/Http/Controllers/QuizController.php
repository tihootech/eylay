<?php

namespace App\Http\Controllers;

use App\Quiz;
use App\Question;
use App\Filler;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class QuizController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('master');
    }

    public function index()
    {
        $quizzes = Quiz::latest()->get();
        return view('dashboard.quiz.index', compact('quizzes'));
    }

    public function show(Quiz $quiz)
    {
        $question_types = Question::$types;
        return view('dashboard.quiz.show', compact('quiz', 'question_types'));
    }

    public function create()
    {
        $quiz = new Quiz;
        return view('dashboard.quiz.form', compact('quiz'));
    }

    public function store(Request $request)
    {
        $data = self::validation(new Quiz);
        $data['uid'] = rs(16);
        Quiz::create($data);
        return redirect()->route('quiz.index')->withMessage(__('CHANGES_MADE_SUCCESSFULLY'));
    }

    public function edit(Quiz $quiz)
    {
        return view('dashboard.quiz.form', compact('quiz'));
    }

    public function update(Request $request, Quiz $quiz)
    {
        $data = self::validation($quiz);
        $quiz->update($data);
        return redirect()->route('quiz.index')->withMessage(__('CHANGES_MADE_SUCCESSFULLY'));
    }

    public function update_positions(Request $request)
    {
        if (is_array($request->positions)) {
            foreach ($request->positions as $question_id => $position) {
                $question = Question::find($question_id);
                $question->position = $position;
                $question->save();
            }
            return back()->withMessage(__('CHANGES_MADE_SUCCESSFULLY'));
        }else {
            return back()->withError('Positions Not an Array');
        }
    }

    public function destroy(Quiz $quiz)
    {
        delete_file([$quiz->image, $quiz->bg]);
        $quiz->delete();
        return redirect()->route('quiz.index')->withMessage(__('CHANGES_MADE_SUCCESSFULLY'));
    }

    public function destroy_filler(Filler $filler)
    {
        \DB::table('answers')->where('filler_id', $filler->id)->delete();
        $filler->delete();
        return back()->withMessage(__('CHANGES_MADE_SUCCESSFULLY'));
    }

    public static function sort_questions($quiz)
    {
        foreach ($quiz->questions as $i => $question) {
            $question->position = $i+1;
            $question->save();
        }
    }

    public static function validation($quiz)
    {
        $data = request()->validate([
            'title' => 'required|unique:quizzes,title,'.$quiz->id,
            'type' => 'nullable',
            'access' => 'nullable',
            'info' => 'required',
            'image' => 'nullable',
            'bg' => 'nullable',
            'button' => 'nullable',
            'max_time' => 'nullable',
            'active' => 'nullable',
            'public' => 'nullable',
        ]);

        if ( isset($data['image']) && $data['image'] ) {
            $data['image'] = upload($data['image'], $quiz->image);
        }
        if ( isset($data['bg']) && $data['bg'] ) {
            $data['bg'] = upload($data['bg'], $quiz->bg);
        }

        return $data;
    }
}
