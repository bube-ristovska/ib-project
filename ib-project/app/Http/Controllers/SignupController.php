<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SignupController extends Controller
{
    public function index()
    {
        return view('signup');
    }

    public function store(){
        $attributes = request()->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|required_with:password_confirmation|same:password_confirmation',
        ]);
        $attributes['password'] = bcrypt($attributes['password']);
        $user = User::create($attributes);
        auth()->login($user);
        return redirect('/home');
    }
}
