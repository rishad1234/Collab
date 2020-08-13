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






// Profile Controller Routes
Route::get('/profile/{user}', 'ProfileController@index')->name('profile.index');
Route::get('/profile/{user}/edit', 'ProfileController@edit')->name('profile.edit');
Route::patch('/profile/edit/{user}', 'ProfileController@updateInfo');
Route::get('/profile/{user}/edit/about', 'ProfileController@editAbout')->name('profile.edit.about');
Route::patch('/profile/edit/about/{user}', 'ProfileController@updateAbout');



// Research Controller Routes
Route::get('/profile/{user}/add/research', 'ResearchController@addResearch');
Route::post('/profile/{user}', 'ResearchController@postResearch');
Route::get('/profile/{user}/research/{id}', 'ResearchController@readResearch');
route::get('/profile/{user_name}/delete/research/{id}', 'ResearchController@deleteResearch');
Route::get('profile/research/download/{id}', 'ProfileController@downloadPDF')->name('downloadFile');



// Project Controller Routes
Route::get('/profile/{user}/add/project', 'ProjectController@addProject');
Route::post('/profile/{user}/add/project', 'ProjectController@postProject');
Route::get('/profile/{user}/project/{id}', 'ProjectController@readProject');
Route::get('/profile/{user}/edit/project/{id}', 'ProjectController@editProject');
Route::patch('/profile/edit/project/{id}', 'ProjectController@updateProject');
Route::get('/profile/{user_name}/delete/project/{id}', 'ProjectController@deleteProject');


//Interest Controller Routes
//Route::get("/api/interest", "InterestController@index");
Route::post("/api/interest/post", "InterestController@post");
Route::get("interest", "InterestController@index");


// Newsfeed
Route::get("newsfeed", "NewsfeedController@index");
Route::post("/{user}/post", "NewsfeedController@post")->name('save_status');
// Route::get("/{user}/post", "InterestController@index")->name('save_status');



