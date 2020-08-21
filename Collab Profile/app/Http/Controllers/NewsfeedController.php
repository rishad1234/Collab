<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsfeedController extends Controller
{
    public function index(){
        $posts = \App\Newsfeed::where('user_id', Auth()->user()->id)->get();
        return View("newsfeed.index", compact("posts"));
    }

    public function post(){
        $status = new \App\Newsfeed;
        $user = Auth()->user();
        $status->user_id = Auth()->user()->id;
        $status->status = request('status');
        $status->image = request('image');

        // $data = request();

        if(request()->hasFile('image')){
            //dd("ok");
            request()->validate([
                'image' => 'required|file|max:10000'
            ]);
        }

        if(request()->has('image')){
            $status->save([
                'image' => request()->image->store('status_image', 'public'),
            ]);
        }

        $status->status = request('status');
        $status->image = request('image')->store('status_image', 'public');

        $status->save();

        session()->flash('success', 'Research Added Successfully');

        return redirect()->route('newsfeed.index');

        
    }
}
