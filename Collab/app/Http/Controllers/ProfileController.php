<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        $research = \App\Research::where('user_id', $id)->get();
        $project = \App\Project::where('user_id', $id)->get();
        $interest = \App\Interest::where('user_id', $id)->get();
        $user = \App\User::where("id", $id)->get()[0];
        return View('profile.index', compact('user', 'research', 'project', 'interest'));
    }

    public function editAbout()
    {
        return View('profile.editAbout');
    }
    
    public function edit($id)
    {
        $user = \app\User::where("id", $id)->get()[0];
        return View('/profile/edit', compact("user"));
    }

    public function updateInfo(\App\User $user)
    {
        $data = request()->validate([
            'name' => 'required | max:255',
            'designation' => 'required | max:255',
            'country' => 'required | max:255',  
            'institution_name' => 'required | max:255'
        ]);

        if(request()->hasFile('profile_image')){
            request()->validate([
                'profile_image' => 'file|image|max:5000'
            ]);
        }

        if(request()->hasFile('cover_image')){
            request()->validate([
                'cover_image' => 'file|image|max:5000'
            ]);
        }

        if(request()->has('profile_image')){
            $user->update([
                'profile_image' => request()->profile_image->store('uploads', 'public'),
            ]);
        }

        if(request()->has('cover_image')){
            $user->update([
                'cover_image' => request()->cover_image->store('uploads', 'public'),
            ]);
        }


        $user->update($data);

        session()->flash('success', 'Profile Updated Successfully');

        return redirect()->route('profile.index', ['id' => Auth()->user()->id]);
    }

    public function updateAbout(\App\User $user)
    {
        $data = request()->validate([
            'about' => 'required',
        ]);


        $user->update($data);
        return redirect()->route('profile.index', ['id' => Auth()->user()->id]);
        
    }
}