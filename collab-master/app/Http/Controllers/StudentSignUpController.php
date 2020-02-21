<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentSignUpController extends Controller
{
    public function index()
    {
        return view('signup.student');
    }
}
