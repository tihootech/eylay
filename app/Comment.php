<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = ['id'];

    public function author()
    {
        return $this->morphTo();
    }

    public function owner()
    {
        return $this->morphTo();
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'owner')->whereConfirmed(1)->latest();
    }

    public function likes()
    {
        return $this->morphMany(Like::class, 'owner');
    }

    public function author_name()
    {
        return $this->author_type == 'guest' ? __('GUEST') : $this->author->user->name ?? 'Database Error';
    }

    public function posted_by_master()
    {
        return $this->author_type == Master::class;
    }
}
