<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\NewMessage;

class InitiateMessage extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function sendMessage(Request $request){
        $user_id = Auth()->user()->id;
        //echo($user_id);
        

        $text = request('text');
        $send_to = request("to");

        $message = \App\Message::create([
            'from' => auth()->id(),
            'to' => $send_to,
            'text' => $text
        ]);

        broadcast(new NewMessage($message));

        return redirect()->route('profile.index', ['id' => Auth()->user()->id]);
    }
}
