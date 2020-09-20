<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class MiscController extends Controller
{
    public function signupPage(){
        if(Auth::check()){
            return redirect()->route("newsfeed.index");
        }
        return view('welcome');
    }

    public function loginPage(){
        if(Auth::check()){
            return redirect()->route("newsfeed.index");
        }
        return view('login');
    }
    public function checkRole(Request $request){
        if(!Auth::check()){
            if($request->signup_check == 'professor'){
                $data = [
                    'account_type' => 'professor'
                ];
                //dd("professor");
                return view('auth.register', ["data"=>$data]);
        
            }else if($request->signup_check == 'student'){
                $data = [
                    'account_type' => 'student'
                ];
                //dd("student");
                return view('auth.register', ["data"=>$data]);
            }else{
                abort(404);
            }
        }else{
            return view('welcome');
        }
    }
}
