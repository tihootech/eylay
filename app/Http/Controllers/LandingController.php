<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Blog;
use App\User;
use App\Category;

class LandingController extends Controller
{
    public function index()
    {
        $workshops = Course::whereType('workshop')->latest()->limit(2)->get();
        $online_courses = Course::whereType('online')->latest()->limit(4)->get();
        $blog = Blog::latest()->first();
        $latest_blogs = Blog::latest()->skip(1)->limit(3)->get();
    	return view('landing.index', compact('workshops', 'online_courses', 'blog', 'latest_blogs'));
    }

    public function blogs($text=null)
    {
        // init vars
        $current_cat = null;
        $author = null;
        $cats = Category::whereType(Blog::class)->get();
        $count = Blog::count();

        // prepare query
        $blogs = Blog::query();
        if ($text) {
            $text = raw($text);
            $route = rn();
            if ($route == 'blogs_by_author') {
                $author = $text;
                $user = User::whereName($author)->firstOrFail();
                $blogs = $blogs->where('author_id', $user->class_id());
            }elseif ($route == 'blogs_by_cat') {
                $current_cat = $text;
                $category = Category::whereName($current_cat)->firstOrFail();
                $blogs = $blogs->where('category_id', $category->id);
            }
        }
        $blogs = $blogs->latest()->get();
        return view('landing.blogs', compact('blogs', 'cats', 'count', 'current_cat', 'author'));
    }
}
