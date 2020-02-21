<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfessorLoginController extends Controller
{
    public function index()
    {
        return view('login.professor');
    }

    public function store(Request $request)
    {
        dd($request['email']);
    }
}
