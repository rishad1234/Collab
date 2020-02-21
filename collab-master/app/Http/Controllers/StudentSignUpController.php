<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class StudentSignUpController extends Controller
{
    public function index()
    {
        return view('signup.student');
    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'institution_name' => 'required|max:255',
            ]);

        $data['user_role'] = 2;
        $student = new User;

        $student->name = $data['name'];
        $student->email = $data['email'];
        $student->password = Hash::make($data['password']);
        $student->institution_name = $data['institution_name'];
        $student->user_role = $data['user_role'];

        $student->save();
        return dd($student);
    }
}
