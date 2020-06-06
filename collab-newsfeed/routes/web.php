<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::resource('posts', 'PostController');
Route::get("posts/index", "PostController@index");
Route::get("posts/create", "PostController@create");
Route::post("posts/store", "PostController@store");
Route::get("posts/{id}", "PostController@show")->name("postShow");