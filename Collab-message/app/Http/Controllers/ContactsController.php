<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function get(){
        $contacts = User::all();
        return response()->json($contacts);
    }
    public function getMessages($id){
        $messages = Message::where('from', $id)->orWhere('to', $id)->get();
        return response()->json($messages);
    }
}
