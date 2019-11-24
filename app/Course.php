<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $guarded = ['id'];

    public function signups()
    {
        return $this->hasMany(Signup::class)->latest();
    }
}
