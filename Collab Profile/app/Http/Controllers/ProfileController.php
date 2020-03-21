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
        $user = new \App\User();
        return View('profile.index', compact('user', 'research', 'project'));
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

    public function addResearch()
    {
        return View('profile.addResearch');
    }

    public function postResearch()
    {

        $research = new \App\Research;
        $user = Auth()->user();
        $research->user_id = Auth()->user()->id;
        $research->title = request('title');
        $research->description = request('description');

        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'document' => 'required|file|max:10000'
        ]);


        if(request()->hasFile('document')){
            //dd("ok");
            request()->validate([
                'document' => 'required|file|max:10000'
            ]);
        }

        if(request()->has('document')){
            $research->save([
                'document' => request()->document->store('documents', 'public'),
            ]);
        }
        $research->user_id = Auth()->user()->id;
        $research->title = request('title');
        $research->description = request('description');
        $research->document = request('document')->store('uploaded document', 'public');

        $research->save($data);
        return redirect()->route('profile.index', ['user' => $user->name]);
    }

    public function readResearch($user, $id)
    {
        $research = \App\Research::where('id', $id)->get();
        return View('profile.readResearch', compact('research'));
    }

    public function deleteResearch($user_name,$id)
    {
        $research = \App\Research::find($id);
        $research->delete();
        return redirect()->route('profile.index', ['user' => $user_name]);
    }

    public function addProject()
    {
        return View('profile.addProject');
    }

    public function postProject()
    {
        $project = new \App\Project;
        $user = Auth()->user();
        $project->user_id = Auth()->user()->id;
        $project->title = request('title');
        $project->excerpt = request('excerpt');
        $project->description = request('description');

        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'excerpt' => 'required',
            'thumbnail_image' => 'file|image|max:10000'
        ]);

        if(request()->hasFile('thumbnail_image')){
            //dd("ok");
            request()->validate([
                'thumbnail_image' => 'file|image|max:10000'
            ]);
        }

        if(request()->has('thumbnail_image')){
            $project->save([
                'thumbnail_image' => request()->thumbnail_image->store('project_thumbnail_images', 'public'),
            ]);
        }

        if(request()->has('thumbnail_image')){
            $project->thumbnail_image = request('thumbnail_image')->store('project_thumbnail_images', 'public');
        }


        

        $project->save($data);
        return redirect()->route('profile.index', ['user' => $user->name]);
    }

    public function readProject($user, $id)
    {
        $project = \App\Project::where('id', $id)->get();
        return View('profile.readProject', compact('project'));
    }

    public function editProject($user,$id)
    {
        $project = \App\Project::where('id', $id)->get();
        // dd($project);
        return View('profile.editProject', compact('project'));

    }

    public function updateProject($id)
    {


        //dd($project[0]);

        $project = \App\Project::where('id', $id)->get();
        $user = Auth()->user();
        $project[0]->user_id = Auth()->user()->id;
        $project[0]->title = request('title');
        $project[0]->excerpt = request('excerpt');
        $project[0]->description = request('description');

        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'excerpt' => 'required',
            'thumbnail_image' => 'file|image|max:10000'
        ]);

        if(request()->hasFile('thumbnail_image')){
            //dd("ok");
            request()->validate([
                'thumbnail_image' => 'file|image|max:10000'
            ]);
        }

        if(request()->has('thumbnail_image')){
            $project[0]->update([
                'thumbnail_image' => request()->thumbnail_image->store('project_thumbnail_images', 'public'),
            ]);
        }

        if(request()->has('thumbnail_image')){
            $project[0]->thumbnail_image = request('thumbnail_image')->store('project_thumbnail_images', 'public');
        }

        $project[0]->update($data);
        return redirect()->route('profile.index', ['user' => $user->name]);
    }

    public function deleteProject($user_name,$id)
    {
        $project = \App\Project::find($id);
        $project->delete();
        return redirect()->route('profile.index', ['user' => $user_name]);
    }
    
}