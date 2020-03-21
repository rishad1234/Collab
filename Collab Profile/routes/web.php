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

Route::get('/profile/{user}', 'ProfileController@index')->name('profile.index');



Route::get('/profile/{user}/edit', 'ProfileController@edit')->name('profile.edit');
Route::patch('/profile/edit/{user}', 'ProfileController@updateInfo');
//Route::post('/profile', 'ProfileController@saveEdit');


Route::get('/profile/{user}/edit/about', 'ProfileController@editAbout')->name('profile.edit.about');
Route::patch('/profile/edit/about/{user}', 'ProfileController@updateAbout');

Route::get('/profile/{user}/add/research', 'ProfileController@addResearch');
Route::post('/profile/{user}', 'ProfileController@postResearch');

Route::get('/profile/{user}/research/{id}', 'ProfileController@readResearch');
Route::get('profile/research/download/{id}', 'ProfileController@downloadPDF')->name('downloadFile');
route::get('/profile/{user_name}/delete/research/{id}', 'ProfileController@deleteResearch');

Route::get('/profile/{user}/add/project', 'ProfileController@addProject');
Route::post('/profile/{user}/add/project', 'ProfileController@postProject');
Route::get('/profile/{user}/project/{id}', 'ProfileController@readProject');

Route::get('/profile/{user}/edit/project/{id}', 'ProfileController@editProject');
Route::patch('/profile/edit/project/{id}', 'ProfileController@updateProject');
Route::get('/profile/{user_name}/delete/project/{id}', 'ProfileController@deleteProject');


