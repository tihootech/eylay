<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Like;

class LikeController extends Controller
{
    public function like(Request $request)
    {
		if ($user = auth()->user()) {
			$request->validate([
				'oid' => 'required',
				'otype'=> Rule::in(['comment', 'blog', 'course']),
			]);
			$like = liked($request->otype, $request->oid);
			if ($like) {
				$like->delete();
			}else {
				Like::make($request->otype, $request->oid, $user);
			}
			return ['success' => true];
		}else {
			abort(403);
		}
    }
}
