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

    public function public_link()
    {
        return route('show_blog', urlfriendly($this->title));
    }

    public function author_name()
    {
        return $this->author->user->name ?? 'Database Error';
    }
}
