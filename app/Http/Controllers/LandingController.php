<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;

class LandingController extends Controller
{
    public function index()
    {
        $workshops = Course::whereType('workshop')->latest()->limit(2)->get();
        $online_courses = Course::whereType('online')->latest()->limit(4)->get();
    	return view('landing.index', compact('workshops', 'online_courses'));
    }
}
