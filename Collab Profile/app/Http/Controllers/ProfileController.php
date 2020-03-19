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
        //dd($research);

        $user = new \App\User();
        return View('profile.index', compact('user', 'research'));
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

        //dd(request()->a);
    }

    public function updateInfo(\App\User $user)
    {
        //dd(request("name"));
        //$name = request('name');
        $data = request()->validate([
            'name' => 'required',
            'designation' => 'required',
            'country' => 'required',  
            'institution_name' => 'required'
        ]);

        if(request()->hasFile('profile_image')){
            //dd("ok");
            request()->validate([
                'profile_image' => 'file|image|max:5000'
            ]);
        }

        if(request()->hasFile('cover_image')){
            //dd("ok");
            request()->validate([
                'cover_image' => 'file|image|max:5000'
            ]);
        }

        if(request()->has('profile_image')){
            //dd('111');
            $user->update([
                'profile_image' => request()->profile_image->store('uploads', 'public'),
            ]);
        }

        if(request()->has('cover_image')){
            //dd('111');
            $user->update([
                'cover_image' => request()->cover_image->store('uploads', 'public'),
            ]);
        }
        //dd($data);


        $user->update($data);

        //return redirect('/profile/{{$name}}');
        return redirect()->route('profile.index', ['user' => $user->name]);
    }

    public function updateAbout(\App\User $user)
    {
        //dd($user->name);
        $data = request()->validate([
            'about' => 'required',
        ]);


        $user->update($data);

        return redirect()->route('profile.index', ['user' => $user->name]);
        
    }

    public function addResearch()
    {
        return View('profile.addResearch');
    }

    public function postResearch()
    {

        $research = new \App\Research;
        $user = Auth()->user();

        $research->title = request('title');
        $research->description = request('description');
        $research->document = request('document')->store('uploaded document', 'public');
        $research->user_id = Auth()->user()->id;
        

        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
        ]);


        if(request()->hasFile('document')){
            //dd("ok");
            request()->validate([
                'document' => 'file|max:10000'
            ]);
        }

        if(request()->has('document')){
            //dd('111');
            $research->save([
                'document' => request()->document->store('uploaded document', 'public'),
            ]);
        }

        
        //dd($data);
        $research->save($data);


        return redirect()->route('profile.index', ['user' => $user->name]);


    }

    public function readResearch($user, $id)
    {
        $research = \App\Research::where('id', $id)->get();
        return View('profile.readResearch', compact('research'));
    }

    public function downloadPDF($id)
    {
        $research = \App\Research::find($id);
        dd($research->document);
        //return response()->download(storage_path($research->document, "sdfs"));
    }
}
