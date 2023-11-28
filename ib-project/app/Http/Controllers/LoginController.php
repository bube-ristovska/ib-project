<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function store(){
        $attributes = request()->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(auth()->attempt($attributes)){
            session()->regenerate(); //da ne mozhe da ima session attack so session fixation
            return redirect('/home');
        }

        return back()
            ->withInput()
            ->withErrors(['credentials'=> 'No matching credentials, please try again']);
    }

    public function destroy(){
        auth()->logout();
        return redirect('/login');
    }
}
