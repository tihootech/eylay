<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Blog;

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

    public function blogs($author=null)
    {
        dd($author);
    }
}
