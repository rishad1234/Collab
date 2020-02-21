<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentLoginController extends Controller
{
    public function index()
    {
        return view('login.student');
    }
}
