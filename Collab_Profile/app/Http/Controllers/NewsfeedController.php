<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsfeedController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
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
        $posts = \App\NewsFeed::whereIn("user_id", $related_users)->orderBy("created_at", "DESC")->get();
        return View("newsfeed.index", compact("posts"));
    }

    public function post(){
        $status = new \App\Newsfeed;
        $user = Auth()->user();
        $status->user_id = Auth()->user()->id;
        $status->status = request('status');
        $status->image = request('image');

        // $data = request();

        // if(request()->hasFile('image')){
        //     //dd("ok");
        //     request()->validate([
        //         'image' => 'required|file|max:10000'
        //     ]);
        // }

        // if(request()->has('image')){
        //     $status->save([
        //         'image' => request()->image->store('status_image', 'public'),
        //     ]);
        // }

        if(request()->has('image')){
            $status->image = request('image')->store('status_image', 'public');
        }
        if(request()->has('status')){
            $status->status = request('status');
        }

        

        // $status->status = request('status');
        // $status->image = request('image')->store('status_image', 'public');

        if(request()->has('image') || $status->status != ""){
            $status->save();
            session()->flash('success', 'Status added');
            return redirect()->route('newsfeed.index');
        }else{
            session()->flash('failed', 'Can not add empty post');
            return redirect()->route('newsfeed.index');
        }
        

        

        
    }
}
