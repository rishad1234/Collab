<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResearchController extends Controller
{
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
}
