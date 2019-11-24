<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Signup;

class SignupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('signup');
        $this->middleware('master')->except('signup');
    }

    public function signup(Request $request)
    {
		// validate data
		$data = $request->validate([
			'course_id' => 'required|integer|exists:courses,id',
			'name' => 'required|string|max:150',
			'phone' => 'required|string|digits:11',
		]);

		// find course
		$course = Course::find($request->course_id);

		// check if already signed up
		$found = Signup::where('course_id', $request->course_id)->where('step', $course->step)->where('phone', $request->phone)->first();

		if ($found) {
			return view('ajaxes.already_signed_up', compact('found'));
		}elseif($course->status != 'closed') {
			$data['step'] = $course->step;
			if (auth()->user()) {
				$data['user_id'] = auth()->id();
			}
			Signup::create($data);
			return view('ajaxes.signup_ok');
		}else {
            abort(403);
        }
    }

    public function destroy(Signup $signup)
    {
        $signup->delete();
        return back()->withMessage(__('CHANGES_MADE_SUCCESSFULLY'));
    }
}
