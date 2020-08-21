<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsfeedController extends Controller
{
    public function index(){
        $posts = \App\Newsfeed::orderBy('created_at', 'DESC')->get();
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

        if(request()->has('image') || request()->has('status')){
            $status->save();
            session()->flash('success', 'Status added');
            return redirect()->route('newsfeed.index');
            
        }else{
            session()->flash('failed', 'Can not add empty post');
            return redirect()->route('newsfeed.index');
        }
        

        

        
    }
}
