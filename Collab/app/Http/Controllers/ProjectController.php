<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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
            'title' => 'required | max:255',
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
        session()->flash('success', 'Project Added Successfully');
        return redirect()->route('profile.index', ['id' => Auth()->user()->id]);
    }

    public function readProject($user_id, $id)
    {
        $project = \App\Project::where('id', $id)->get();
        return View('profile.readProject', compact('project'));
    }

    public function editProject($user_id,$id)
    {
        $project = \App\Project::where('id', $id)->get();
        return View('profile.editProject', compact('project'));

    }

    public function updateProject($id)
    {
        $project = \App\Project::where('id', $id)->get();
        $user = Auth()->user();
        $project[0]->user_id = Auth()->user()->id;
        $project[0]->title = request('title');
        $project[0]->excerpt = request('excerpt');
        $project[0]->description = request('description');

        $data = request()->validate([
            'title' => 'required | max:255',
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
        // dd($project[0]->thumbnail_image);
        $project[0]->update();
        session()->flash('success', 'Project Updated Successfully');
        return redirect()->route('profile.index', ['user' => Auth()->user()->id]);
    }

    public function deleteProject($user_id, $id)
    {
        $project = \App\Project::find($id);
        $project->delete();
        session()->flash('success', 'Project Deleted Successfully');
        return redirect()->route('profile.index', ['id' => Auth()->user()->id]);
    }
}
