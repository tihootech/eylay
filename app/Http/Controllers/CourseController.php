<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('master');
    }

    public function index()
    {
        $courses = Course::all();
        return view('dashboard.course.index');
    }

    public function create()
    {
        $course = new Course;
        return view('dashboard.course.form', compact('course'));
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Course $course)
    {
        //
    }

    public function edit(Course $course)
    {
        //
    }

    public function update(Request $request, Course $course)
    {
        //
    }

    public function destroy(Course $course)
    {
        //
    }
}
