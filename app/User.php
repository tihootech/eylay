<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function verified()
    {
        return $this->email_verified_at ? true : false;
    }

    public function class_type()
    {
        $class = str_replace('_', '', ucwords($this->type, '_'));;
        return "App\\$class";
    }

    public function class_id()
    {
        $class = $this->class_type();
        $found = $class::where('user_id', auth()->id())->first();
        return $found ? $found->id : 0;
    }
}
