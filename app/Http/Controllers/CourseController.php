<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CourseController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('master');
    }

    public function index()
    {
        $courses = Course::latest()->get();
        return view('dashboard.course.index', compact('courses'));
    }

    public function show(Course $course)
    {
        return view('dashboard.course.show', compact('course'));
    }

    public function create()
    {
        $course = new Course;
        return view('dashboard.course.form', compact('course'));
    }

    public function store(Request $request)
    {
        $data = self::validation(new Course);
        Course::create($data);
        return redirect()->route('course.index')->withMessage(__('CHANGES_MADE_SUCCESSFULLY'));
    }

    public function edit(Course $course)
    {
        return view('dashboard.course.form', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $data = self::validation($course);
        $course->update($data);
        return redirect()->route('course.index')->withMessage(__('CHANGES_MADE_SUCCESSFULLY'));
    }

    public function destroy(Course $course)
    {
        delete_file([$course->image, $course->bg]);
        $course->delete();
        return redirect()->route('course.index')->withMessage(__('CHANGES_MADE_SUCCESSFULLY'));
    }

    public static function validation($course)
    {
        $data = request()->validate([
            'title' => 'required|unique:courses,title,'.$course->id,
            'supertitle' => 'required',
            'subtitle' => 'required',
            'info' => 'required',
            'image' => Rule::requiredIf(!$course->id),
            'bg' => 'nullable',
            'status' => 'nullable',
            'step' => 'nullable',
        ]);

        if ( isset($data['image']) && $data['image'] ) {
            $data['image'] = upload($data['image'], $course->image);
        }
        if ( isset($data['bg']) && $data['bg'] ) {
            $data['bg'] = upload($data['bg'], $course->bg);
        }

        return $data;
    }
}
