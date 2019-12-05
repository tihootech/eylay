<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\User;

class AccController extends Controller
{
	public function __construct()
	{
		// all users can edit and update their own credentials
		$this->middleware('auth');
		$this->middleware('master')->except(['edit', 'update']);
	}

	public function list(Request $request)
	{
		$users = User::where('type', '!=', 'master');
		if ($type = $request->type) {
			$users = $users->where('type', $type);
		}
		if ($phrase = $request->search) {
			$users = $users->where('name', 'like', "%$phrase%")->orWhere('email', 'like', "%$phrase%");
		}
		$users = $users->paginate(20);
		return view('dashboard.acc.list', compact('users'));
	}

	public function show(User $user)
	{
		return view('dashboard.acc.show', compact('user'));
	}

    public function edit()
    {
    	$user = auth()->user();
		return view('dashboard.acc.edit', compact('user'));
    }

	public function update(Request $request)
	{
		$user = auth()->user();

		$request->validate([
			"name" => "required",
			"current_password" => "required",
			"new_password" => "nullable|confirmed|string|min:4",
		]);

		$change = false;
		if (\Hash::check($request->current_password, $user->password)) {
			if ($user->name != $request->name) {
				$user->name = $request->name;
				$change =true;
			}
			if ($request->new_password) {
				$user->password = bcrypt($request->new_password);
				$change =true;
			}
			if ($change) {
				$user->save();
				return redirect('login')->with(\Auth::logout())->withMessage(__('UPDATE_ACC_MESSAGE'));
			}else {
				return back()->withError(__('NO_CHANGES_MADE'));
			}
		}else {
			return back()->withError(__('WRONG_CURRENT_PASSWORD'));
		}
	}

	public function master_update(User $user, Request $request)
	{
		$user->type = $request->type;
		if ($request->new_password) {
			$user->password = bcrypt($request->new_password);
		}
		$user->save();
		return back()->withMessage(__('CHANGES_MADE_SUCCESSFULLY'));
	}

	public function destroy(User $user)
	{
		if ($user->type == 'master') {
			return back()->withError(__('CANT_DELETE_MASTER'));
		}else {
			$user->delete();
			return back()->withMessage(__('CHANGES_MADE_SUCCESSFULLY'));
		}
	}

}
