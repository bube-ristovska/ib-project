<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        if(auth()->user()->role()=='teacher'){
            return view('teacher');
        } else {
            return abort(403, 'Permission denied.');
        }

    }
}
