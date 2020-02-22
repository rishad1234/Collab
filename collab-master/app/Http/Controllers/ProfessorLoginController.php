<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class ProfessorLoginController extends Controller
{
    public function index()
    {
        return view('login.professor');
    }

    public function login(Request $request)
    {
        $data = request()->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
            ]);
        $professor = User::where('email', $data['email'])->first();
        
        if (Hash::check($data['password'], $professor->password)) 
        {
            dd('logged in');
        }else
        {
            dd('not logged in');
        }
    }
}
