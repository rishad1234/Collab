<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResearchController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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
            'title' => 'required | max:255',
            'description' => 'required',
            'document' => 'required|file|max:10000'
        ]);


        if(request()->hasFile('document')){
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

        session()->flash('success', 'Research Added Successfully');

        return redirect()->route('profile.index', ['id' => Auth()->user()->id]);
    }

    public function readResearch($user_id, $id)
    {
        $research = \App\Research::where('id', $id)->get();
        return View('profile.readResearch', compact('research'));
    }

    public function deleteResearch($user_id,$id)
    {
        $research = \App\Research::find($id);
        $research->delete();
        session()->flash('success', 'Research Deleted Successfully');
        return redirect()->route('profile.index', ['id' => Auth()->user()->id]);
    }
}
