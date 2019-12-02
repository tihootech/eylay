<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'type',
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

    public function fillers()
    {
        return $this->hasMany(Filler::class)->latest();
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

}
