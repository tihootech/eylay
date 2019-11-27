<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $guarded = ['id'];

    public static function make($question, $body)
    {
        $answer = new self;
		$answer->question_id = $question->id;
		$answer->filler_id = session('filling')['filler_id'];
		$answer->body = $body;
		if ($question->type == 'multiple_choices') {
			if (in_array($body, $question->correct_choices())) {
				$answer->correct = 1;
			}else {
                $answer->correct = 0;
            }
		}
		$answer->save();
		return $answer;
    }
}
