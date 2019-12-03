<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();
        $messages_list = [];
        if (master()) {
            $user_ids = Message::groupBy('user_id')->pluck('user_id')->toArray();
            foreach ($user_ids as $user_id) {
                $messages_list []= Message::where('user_id', $user_id)->get();
            }
            Message::query()->update(['read'=>1]);
        }
        return view('home', compact('user', 'messages_list'));
    }
}
