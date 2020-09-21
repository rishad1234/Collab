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

Route::get('/', "MiscController@signupPage")->name('signup');

Route::get('/login/home', "MiscController@loginPage")->name('login_home');
Route::get('/registerpage/{role}', "MiscController@checkRole")->name('signup_valid');

Auth::routes();

Route::get('/message', 'HomeController@index')->name('home');






// Profile Controller Routes
Route::get('/profile/{id}', 'ProfileController@index')->name('profile.index');
Route::get('/profile/{id}/edit', 'ProfileController@edit')->name('profile.edit');
Route::patch('/profile/edit/{user}', 'ProfileController@updateInfo');
Route::get('/profile/{id}/edit/about', 'ProfileController@editAbout')->name('profile.edit.about');
Route::patch('/profile/edit/about/{user}', 'ProfileController@updateAbout');



// Research Controller Routes
Route::get('/profile/{id}/add/research', 'ResearchController@addResearch');
Route::post('/profile/{id}', 'ResearchController@postResearch');
Route::get('/profile/{user_id}/research/{id}', 'ResearchController@readResearch');
route::get('/profile/{user_id}/delete/research/{id}', 'ResearchController@deleteResearch');
Route::get('profile/research/download/{id}', 'ProfileController@downloadPDF')->name('downloadFile');



// Project Controller Routes
Route::get('/profile/{user_id}/add/project', 'ProjectController@addProject');
Route::post('/profile/{user_id}/add/project', 'ProjectController@postProject');
Route::get('/profile/{user_id}/project/{id}', 'ProjectController@readProject');
Route::get('/profile/{user_id}/edit/project/{id}', 'ProjectController@editProject');
Route::patch('/profile/edit/project/{id}', 'ProjectController@updateProject');
Route::get('/profile/{user_id}/delete/project/{id}', 'ProjectController@deleteProject');


//Interest Controller Routes
//Route::get("/api/interest", "InterestController@index");
Route::post("/api/interest/post", "InterestController@post");
Route::get("/api/interest/get/{id}", "InterestController@get");
Route::get("interest", "InterestController@index");


// Newsfeed
Route::get("newsfeed", "NewsfeedController@index")->name('newsfeed.index');
Route::post("/{user}/post", "NewsfeedController@post")->name('save_status');
// Route::get("/{user}/post", "InterestController@index")->name('save_status');
Route::post("saveEdit/{postID}", "NewsfeedController@saveEdit")->name('newsfeed.saveEdit');
Route::get("edit/{user}", "NewsfeedController@edit")->name('newsfeed.edit');
Route::get("posts/{user}", "NewsfeedController@getPosts")->name('newsfeed.getPosts');
Route::get("delete/posts/{postID}", "NewsfeedController@deletePosts")->name('newsfeed.deletePosts');




/// chat
Route::get('/contacts', 'ContactsController@get');
Route::post('/conversation/start', 'InitiateMessage@sendMessage')->name('initiate.send');
Route::get('/conversation/{id}', 'ContactsController@getMessagesFor');
Route::post('/conversation/send', 'ContactsController@send');
