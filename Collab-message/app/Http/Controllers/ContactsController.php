<?php

namespace App\Http\Controllers;

use App\User;
use App\Message;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function get(){
        $contacts = User::all();
        return response()->json($contacts);
    }
    public function getMessages($id){
        $messages = Message::where('user_from', $id)->orWhere('user_to', $id)->get();
        return response()->json($messages);
    }

    public function send(Request $request){
        $message = Message::create([
            'user_from' => auth()->id(),
            'user_to' => $request->contact_id,
            'message' => $request->text
        ]);

        return response()->json($message);
    }

}