<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Models\User;

class MessageController extends Controller
{
    public function index(Request $request)
    {
        $messages = Message::orderBy('id')->get();
        return view('messages.index', compact('messages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'from' => 'required',
            'to' => 'required',
            'message' => 'required'
        ]);

        $user = User::where('email', '!=' ,$request->input('from'))->first();

        Message::create([
            'from' => $request->input('from'),
            'to' => $user->email, 
            'message' => $request->input('message'), 
        ]);
        
        return redirect()->route('messages');
    }

}
