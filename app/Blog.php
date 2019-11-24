<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->morphTo();
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'owner')->withCount('likes')->whereConfirmed(1)->orderBy('likes_count', 'desc')->latest();
    }

    public function likes()
    {
        return $this->morphMany(Like::class, 'owner');
    }

    public function public_link()
    {
        return route('show_blog', urf($this->title));
    }

    public function category_name()
    {
        return $this->category->name ?? 'Database Error';
    }

    public function author_name()
    {
        return $this->author->user->name ?? 'Database Error';
    }

    public function tags_list()
    {
        return explode(",", $this->tags);
    }

    public function tags_textarea()
    {
        return str_replace(",", "\r\n", $this->tags);
    }
}
