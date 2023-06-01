<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(Request $request)
    {
        $messages = Message::orderBy('id','desc')->get();
        return view('messages.index', compact('messages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'from' => 'required',
            'to' => 'required',
            'message' => 'required'
        ]);

        Message::create([
            'from' => $request->input('from'),
            'to' => $request->input('to'), 
            'message' => $request->input('message'), 
        ]);
        
        return redirect()->route('messages');
    }

}
