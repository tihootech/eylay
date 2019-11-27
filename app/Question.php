<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
	protected $guarded = ['id'];
    public static $types = ['number', 'string', 'text', 'message', 'multiple_choices'];

	public function quiz()
	{
		return $this->belongsTo(Quiz::class);
	}

	public function choices()
	{
		return $this->hasMany(QuestionChoice::class)->orderBy('position');
	}

	public function get_choices()
	{
		return $this->randomize ? $this->hasMany(QuestionChoice::class)->inRandomOrder() : $this->hasMany(QuestionChoice::class)->orderBy('position');
	}

	public function step()
	{
		return $this->position - 1;
	}

	public function next()
	{
		return Question::where('position', $this->position + 1)->where('quiz_id', $this->quiz_id)->first();
	}

	public function prev()
	{
		return Question::where('position', $this->position - 1)->where('quiz_id', $this->quiz_id)->first();
	}

	public function correct_choices()
	{
		return QuestionChoice::whereCorrect(1)->where('question_id', $this->id)->get()->pluck('content')->toArray();
	}

	public function filler_answer($filler_id=null, $raw=true)
	{
		if (!$filler_id) {
			$filler_id = session('filling')['filler_id'];
		}
		$answer = Answer::where('question_id', $this->id)->where('filler_id', $filler_id)->first();
		return $raw ? ($answer->body ?? null) : $answer;
	}

	public function register_answer($raw_answer)
	{
		$filler_id = session('filling')['filler_id'];
		Answer::where('question_id', $this->id)->where('filler_id', $filler_id)->delete();
		return Answer::make($this, $raw_answer);
	}
}
