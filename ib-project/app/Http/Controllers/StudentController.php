<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        if(auth()->user()->role()=='student'){
            return view('student');
        } else {
            return abort(403, 'Permission denied.');
        }
    }
}
