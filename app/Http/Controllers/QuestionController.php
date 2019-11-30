<?php

namespace App\Http\Controllers;

use App\Quiz;
use App\Question;
use App\QuestionChoice;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class QuestionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('master');
    }

    public function create(Request $request)
    {
        $request->validate([
            'type' => [ 'required', Rule::in(Question::$types) ],
            'quiz' => 'required|exists:quizzes,id',
        ]);
        $choices = [new QuestionChoice];
        $question = new Question;
        $quiz = Quiz::find($request->quiz);
        $type = $request->type;
        return view('dashboard.quiz.question.form', compact('question', 'type', 'quiz', 'choices'));
    }

    public function store(Request $request)
    {
        // validate and prepare data
        $data = self::validation();

        // determine question position
        $max_position = Question::where('quiz_id', $request->quiz_id)->max('position');
        $data['position'] = $max_position + 1;

        // create question in database and redirection
        $question = Question::create($data);
        self::manage_choices($question);
        return redirect()->route('quiz.show', $request->quiz_id)->withMessage(__('CHANGES_MADE_SUCCESSFULLY'));
    }

    public function edit(Question $question)
    {
        $quiz = $question->quiz;
        $type = $question->type;
        $choices = $question->choices->count() ? $question->choices : [new QuestionChoice];
        return view('dashboard.quiz.question.form', compact('question', 'type', 'quiz', 'choices'));
    }

    public function update(Question $question)
    {
        $data = self::validation();
        $question->update($data);
        self::manage_choices($question);
        return redirect()->route('quiz.show', $question->quiz_id)->withMessage(__('CHANGES_MADE_SUCCESSFULLY'));
    }

    public function destroy(Question $question)
    {
        $quiz = $question->quiz;
        $question->delete();
        QuizController::sort_questions($quiz);
        return redirect()->route('quiz.show', $question->quiz_id)->withMessage(__('CHANGES_MADE_SUCCESSFULLY'));
    }

    public static function manage_choices($question) {
        if (request('choices') && count(request('choices'))) {
            QuestionChoice::where('question_id', $question->id)->delete();
            $choices = prepare_multiple(request('choices'));
            foreach ($choices as $choice_data) {
                $choice_data['question_id'] = $question->id;
                QuestionChoice::create($choice_data);
            }
        }
    }

    public static function validation()
    {
        return request()->validate([
            'quiz_id' => 'required|exists:quizzes,id',
            'type' => [ 'required', Rule::in(Question::$types) ],
            'body' => 'required',
            'title' => 'required',
            'button' => 'nullable',
            'min' => 'nullable|integer',
            'max' => 'nullable|integer',
            'info' => 'nullable',
            'reason' => 'nullable',
            'required' => 'nullable|boolean',
            'randomize' => 'nullable|boolean',
            'multiple' => 'nullable|boolean',
        ]);
    }
}
