<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InterestController extends Controller
{
    protected $except = [];

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index(){
        return View("interest.index");
    }

    public function post(Request $request){

        $req = $request->json()->all();
        if(isset($req["data"]) && isset($req["user_id"])){
            $interests = $req["data"];
            $user = $req["user_id"];
            foreach($interests as $intrst){
                $interest = new \App\Interest;
                $interest->user_id = $user;
                $interest->interest = $intrst;  
                $interest->save();      
            }
        }
        return redirect()->route('profile.index', ['user' => $user->name]);
    }
}
