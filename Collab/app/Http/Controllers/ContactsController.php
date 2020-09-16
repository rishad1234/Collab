<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Message;
use App\Events\NewMessage;
use Illuminate\Support\Facades\DB;

class ContactsController extends Controller
{
    public function get()
    {
        // get all users except the authenticated one
        // $contacts = User::where('id', '!=', auth()->id())->get();
        // dd($contacts);


        ///////////////////////////////////////////

        $user_id = Auth()->user()->id;
        $interests = DB::table("interests")->where("user_id", $user_id)->get("interest");
        $related_users = array();
        
        foreach($interests as $interest){
            $users = DB::table("interests")->where("interest", $interest->interest)->get("user_id");
            foreach($users as $user){
                array_push($related_users, $user->user_id);
            }
        }
        $releted_users = array_unique($related_users);

        $contacts = User::whereIn("id", $related_users)
            ->where('id', '!=', auth()->id())
            ->get();

        ////////////////////////////////////////////////////

        // get a collection of items where sender_id is the user who sent us a message
        // and messages_count is the number of unread messages we have from him
        $unreadIds = Message::select(\DB::raw('`from` as sender_id, count(`from`) as messages_count'))
            ->where('to', auth()->id())
            ->where('read', false)
            ->groupBy('from')
            ->get();

        // add an unread key to each contact with the count of unread messages
        $contacts = $contacts->map(function($contact) use ($unreadIds) {
            $contactUnread = $unreadIds->where('sender_id', $contact->id)->first();

            $contact->unread = $contactUnread ? $contactUnread->messages_count : 0;


            return $contact;
            // return view('/message');
        });

        // dd($contacts);
        return response()->json($contacts);
    }

    public function getMessagesFor($id)
    {
        // mark all messages with the selected contact as read
        Message::where('from', $id)->where('to', auth()->id())->update(['read' => true]);

        // get all messages between the authenticated user and the selected user
        $messages = Message::where(function($q) use ($id) {
            $q->where('from', auth()->id());
            $q->where('to', $id);
        })->orWhere(function($q) use ($id) {
            $q->where('from', $id);
            $q->where('to', auth()->id());
        })
        ->get();

        return response()->json($messages);
    }

    public function send(Request $request)
    {
        $message = Message::create([
            'from' => auth()->id(),
            'to' => $request->contact_id,
            'text' => $request->text
        ]);

        broadcast(new NewMessage($message));

        return response()->json($message);
    }
}
