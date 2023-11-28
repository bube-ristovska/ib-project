<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\TwoFactorCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        //2fa
        $user = User::where('email', $attributes['email'])->first();
        if(auth()->attempt($attributes)){
            session()->regenerate(); //da ne mozhe da ima session attack so session fixation
            $user->generateTwoFactorCode();
            $user->notify(new TwoFactorCode());
            return redirect('/twofactor');
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
