<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionChoice extends Model
{
	protected $guarded = ['id'];

	public function percentage()
	{
		$question_id = $this->question_id;
		$total_count = Answer::where('question_id', $question_id)->count();
		$count = Answer::where('question_id', $question_id)->where('body', $this->content)->count();
		return round(($count/$total_count)*100);
	}
}
