<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class ProfessorSignUpController extends Controller
{
    public function index()
    {
        return view('signup.professor');
    }

    public function store(Request $request)
    {

        $data = request()->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'institution_name' => 'required|max:255',
            'designation' => 'required|max:30'
            ]);

        $data['user_role'] = 1;
        $professor = new User;

        $professor->name = $data['name'];
        $professor->email = $data['email'];
        $professor->password = Hash::make($data['password']);
        $professor->institution_name = $data['institution_name'];
        $professor->designation = $data['designation'];
        $professor->user_role = $data['user_role'];

        $professor->save();
        return dd($professor);
    }
}
