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
    
    public function checkRole($role){
        // dd($role);
        if(!Auth::check()){
            if($role == 1){
                $data = [
                    'account_type' => 'Professor'
                ];
                //dd("professor");
                return view('auth.register', ["data"=>$data]);
        
            }else if($role == 2){
                $data = [
                    'account_type' => 'Student'
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
