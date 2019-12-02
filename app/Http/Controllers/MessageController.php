<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('master')->except('store');
    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'body' => 'required',
        ]);

        if ($request->ajax()) {

            $data['user_id'] = auth()->id();
            Message::create($data);
            return view('ajaxes.message', ['body'=>$request->body]);

        }elseif(master()) {

            dd('master');

        }else {
            abort(404);
        }

    }

    public function show(Message $message)
    {

    }

    public function edit(Message $message)
    {
        //
    }

    public function update(Request $request, Message $message)
    {
        //
    }

    public function destroy(Message $message)
    {
        //
    }
}
