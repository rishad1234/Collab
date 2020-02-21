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
})->name('welcome');

Route::get('/login', function () {
    return view('login');
})->name('login');

// Auth::routes();
Route::get('/professor-login', 'ProfessorLoginController@index')->name('professor_login');
Route::get('/student-login', 'StudentLoginController@index')->name('student_login');

Route::get('/home', 'HomeController@index')->name('home');
