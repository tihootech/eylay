<?php

namespace App\Http\Controllers;

use App\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('join');
        $this->middleware('master')->except('join');
    }

    public function join(Request $request)
	{
		$data = $request->validate([
			'email' => 'required|email',
		]);
		if ($found = Newsletter::whereEmail($request->email)->first()) {
			return view('ajaxes.newsletter_duplicate', compact('found'));
		}else {
			Newsletter::create($data);
			return view('ajaxes.newsletter_ok');
		}
	}

    public function index()
    {
        $newsletters = Newsletter::latest()->get();
        return view('dashboard.newsletter.index', compact('newsletters'));
    }

    public function destroy(Newsletter $newsletter)
    {
        $newsletter->delete();
        return back()->withMessage(__('CHANGES_MADE_SUCCESSFULLY'));
    }
}
