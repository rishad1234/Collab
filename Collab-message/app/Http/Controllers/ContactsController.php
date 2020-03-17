<?php

namespace App\Http\Controllers;

use App\Events\NewMessage;
use App\User;
use App\Message;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function get(){
        $contacts = User::where('id', '!=', auth()->id())->get();
        return response()->json($contacts);
    }
    public function getMessages($id){
        //Message::where('from', $id)->where('to', auth()->id())->update(['read' => true]);

        //$messages = Message::where('user_from', $id)->orWhere('user_to', $id)->get();
        // get all messages between the authenticated user and the selected user
        $messages = Message::where(function($q) use ($id) {
            $q->where('user_from', auth()->id());
            $q->where('user_to', $id);
        })->orWhere(function($q) use ($id) {
            $q->where('user_from', $id);
            $q->where('user_to', auth()->id());
        })
        ->get();

        return response()->json($messages);
    }

    public function send(Request $request){
        $message = Message::create([
            'user_from' => auth()->id(),
            'user_to' => $request->contact_id,
            'message' => $request->text
        ]);
        
        broadcast(new NewMessage($message));

        return response()->json($message);
    }

}
