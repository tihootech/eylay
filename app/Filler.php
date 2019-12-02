<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Filler extends Model
{
    public static function make($quiz)
    {
    	$filler = new self;
		$filler->quiz_id = $quiz->id;
		$filler->user_id = auth()->id();
		$filler->uid = rs();
		$filler->save();
		return $filler;
    }

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function calculate_result()
    {
        $quiz = $this->quiz;
        $corrects = 0;
        $wrongs = 0;
        $count = $quiz->multiple_choices_count();
        foreach ($quiz->questions as $question) {
            $answer_instance = $question->filler_answer($this->id, false);
            if ($answer_instance) {
                if ($answer_instance->correct === 1) {
                    $corrects++;
                }elseif($answer_instance->correct === 0){
                    $wrongs++;
                }
            }
        }
        $percentage = round(($corrects/$count) * 100);
        $this->percentage = $percentage;
        $this->corrects = $corrects;
        $this->wrongs = $wrongs;
        $this->save();
    }

    public function finsih_and_close()
    {
        $now = Carbon::now();
        $this->finished_at = $now;
        $this->time = $now->diffInSeconds($this->created_at);
        $this->save();
    }
}
