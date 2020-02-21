<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfessorSignUpController extends Controller
{
    public function index()
    {
        return view('signup.professor');
    }

    public function store(Request $request)
    {
        return dd($request['name']);
    }
}
