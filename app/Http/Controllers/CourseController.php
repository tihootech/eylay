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
        return view('dashboard.course.index', compact('courses'));
    }

    public function create()
    {
        $course = new Course;
        return view('dashboard.course.form', compact('course'));
    }

    public function store(Request $request)
    {
        $data = self::validation();
        Course::create($data);
        return redirect()->route('course.index')->withMessage(__('CHANGES_MADE_SUCCESSFULLY'));
    }

    public function edit(Course $course)
    {
        return view('dashboard.course.form', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $data = self::validation($course->id);
        $course->update($data);
        return redirect()->route('course.index')->withMessage(__('CHANGES_MADE_SUCCESSFULLY'));
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('course.index')->withMessage(__('CHANGES_MADE_SUCCESSFULLY'));
    }

    public static function validation($id=0)
    {
        $data = request()->validate([
            'type' => 'nullable',
            'supertitle' => 'required',
            'title' => 'required|unique:courses,title,'.$id,
            'subtitle' => 'required',
            'image' => $id ? 'nullable' : 'required',
            'bg' => $id ? 'nullable' : 'required',
            'info' => 'required',
        ]);

        if ( isset($data['image']) && $data['image'] ) {
            $data['image'] = upload($data['image']);
        }
        if ( isset($data['bg']) && $data['bg'] ) {
            $data['bg'] = upload($data['bg']);
        }

        return $data;
    }
}
