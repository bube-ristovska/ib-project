<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function index()
    {
        return view('role', [
            'users' => User::all()
        ]);
    }
    public function edit(User $user)
    {
        // TODO: smeni gi ovde stvarite i odnesi do view za editing
        echo $user->name;
        return view('edit', ['user' =>$user]);
    }
    public function destroy(User $user)
    {
       $user->delete();
        return redirect('/');
    }
}
