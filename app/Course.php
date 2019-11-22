<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $guarded = ['id'];

    public function public_link()
    {
        return route('show_course', str_replace(' ', '-', $this->title));
    }

    public function persian_type($dash_seperated=false)
    {
        $result = __(strtoupper($this->type));
        return $dash_seperated ? str_replace(' ', '-', $result) : $result;
    }
}
