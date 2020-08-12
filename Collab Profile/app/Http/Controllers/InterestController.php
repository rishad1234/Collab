<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InterestController extends Controller
{
    protected $except = [];

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return View("interest.index");
    }

    public function post(Request $request){

        $req = $request->json()->all();
        // var_dump($req);
        if(isset($req["data"])){
            $interests = $req["data"];
            $user = Auth::user();
            foreach($interests as $interest){
                $interest = new \App\Interest;
                $interest->user_id = $user->id;
                $interest->interest = $interest;  
                $interest->save();      
            }
        }else{
            return redirect()->route("home");
        }
        // return View("interest.index");
        return redirect()->route('profile.index', ['user' => $user->name]);
    }
}
