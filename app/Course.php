<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $guarded = ['id'];

    public function public_link()
    {
        return route('show_course', urlfriendly($this->title));
    }

    public function persian_type($dash_seperated=false)
    {
        $result = __(strtoupper($this->type));
        return $dash_seperated ? urlfriendly($result) : $result;
    }
}
