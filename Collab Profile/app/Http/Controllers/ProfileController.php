<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $research = \App\Research::where('user_id', Auth()->user()->id)->get();
        $project = \App\Project::where('user_id', Auth()->user()->id)->get();
        $interest = \App\Interest::where('user_id', Auth()->user()->id)->get();
        $user = new \App\User();
        return View('profile.index', compact('user', 'research', 'project', 'interest'));
    }

    public function editAbout()
    {
        return View('profile.editAbout');
    }
    
    public function edit()
    {
        return View('/profile/edit');
    }

    public function saveEdit(Request $request)
    {

        $user = new \App\User();
        $user->about = request('about');
        $user->save();
    }

    public function updateInfo(\App\User $user)
    {
        $data = request()->validate([
            'name' => 'required',
            'designation' => 'required',
            'country' => 'required',  
            'institution_name' => 'required'
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

        return redirect()->route('profile.index', ['user' => $user->name]);
    }

    public function updateAbout(\App\User $user)
    {
        $data = request()->validate([
            'about' => 'required',
        ]);


        $user->update($data);
        return redirect()->route('profile.index', ['user' => $user->name]);
        
    }
}