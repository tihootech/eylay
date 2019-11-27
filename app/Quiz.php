<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $guarded = ['id'];

    public function questions()
    {
        return $this->hasMany(Question::class)->orderBy('position');
    }

    public function fillers()
    {
        return $this->hasMany(Filler::class)->latest();
    }

    public function completes()
    {
        return $this->hasMany(Filler::class)->whereNotNull('finished_at')->latest();
    }

    public function find_question($position)
    {
        return Question::where('quiz_id', $this->id)->wherePosition($position)->first();
    }

    public function multiple_choices_count()
    {
        return Question::where('quiz_id', $this->id)->whereType('multiple_choices')->count();
    }

    public function ave($col)
    {
        return round(Filler::where('quiz_id', $this->id)->whereNotNull('finished_at')->average($col));
    }

    public function highest($col)
    {
        return Filler::where('quiz_id', $this->id)->max($col);
    }

    public function lowest($col)
    {
        return Filler::where('quiz_id', $this->id)->min($col);
    }

    public function progress_percentage()
	{
		$count = $this->questions->count();
		$answered = $this->answered_count();
		return round(($answered * 100) / $count);
	}

    public function answered_count($filler_id=null)
	{
		if (!$filler_id) {
			$filler_id = session('filling')['filler_id'];
		}
        $ids = $this->questions->pluck('id')->toArray();
		return Answer::whereIn('question_id', $ids)->where('filler_id', $filler_id)->count();
	}
}
