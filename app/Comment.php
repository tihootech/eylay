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

    public function replies()
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

    public function public_link()
    {
        if ($this->owner) {
            if ($this->owner_type != Comment::class) {
                return $this->owner->public_link() . '#comment-' . $this->id;
            }else {
                return $this->owner->public_link();
            }
        }else {
            return '#';
        }
    }

    public function posted_by($type)
    {
        if ($type == 'guest') {
            return $this->author_type == 'guest';
        }else {
            return $this->author_type == class_name($type);
        }
    }
}
