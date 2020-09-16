<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

    public function get($id){
        
        $user = Auth()->user()->id;
        if($user == $id){
            $interests = DB::table("interests")->where("user_id", $id)->get("interest");
            $data = array($interests);
            return json_encode($data);
        }
        $error = array("error" => "404");
        return json_encode($error);
    }
}
