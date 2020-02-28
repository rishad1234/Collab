<?php
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if(Auth::check()){
        return view('home');
    }
    return view('welcome');
})->name('signup');

Route::get('/login/home', function(){
    if(Auth::check()){
        return view('home');
    }
    return view('login');
})->name('login_home');

Route::post('/signup', function(Request $request){
    if(!Auth::check()){
        if($request->signup_check == 'professor'){
            $data = [
                'account_type' => 'professor'
            ];
            return view('auth.register', ["data"=>$data]);
    
        }else if($request->signup_check == 'student'){
            $data = [
                'account_type' => 'student'
            ];
            return view('auth.register', ["data"=>$data]);
        }else{
            abort(404);
        }
    }else{
        return view('welcome');
    }
})->name('signup_valid');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
