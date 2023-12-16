<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RolesController extends Controller
{
    public function index()
    {
        if(auth()->user()->role()=='admin'){
            return view('role', [
                'users' => User::all()
            ]);
        } else {
            return abort(403, 'Permission denied.');
        }

    }
    public function edit(User $user)
    {
        return view('edit', ['user' =>$user]);
    }
    public function update(User $user)
    {
        $attributes = request()->validate([
            'name' => 'required',
            'role_id'=> ['required']
        ]);
     //   dd(request()->input('role_id'));
        $user->update($attributes);
       // $user->role_id = request()->input('role_id');
        $user->role_id = request()->input('role_id');
        $user->save();

        return view('role', [
            'users' => User::all()
        ]);
    }
    public function destroy(User $user)
    {
       $user->delete();
        return redirect('/');
    }
}
