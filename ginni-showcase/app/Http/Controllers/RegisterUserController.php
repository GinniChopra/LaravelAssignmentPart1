<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\RegisterUserController;
use App\Models\User;

class RegisterUserController extends Controller
{
    // public function create() {
    //     return view('register_user.create');
    // }

    public function create() {
        return view('admin.users.create')
        ->with('user', null);
    }


    public function store(Request $request) {

        
        $attributes = request()->validate([
            'name' => 'required',
            'email' => ['required','email','unique:users,email'],
            'password' => ['required','min:8','confirmed'],
        ]);

        User::create($attributes);

         // set a flash message
         session()->flash("success","User Created Successfully");

         // redirect to admin board
         return redirect("/admin/projects");
    }


    public function edit(User $user) {
        return view('admin.users.create')
        ->with('user', $user);
    }


    public function update(User $user, Request $request)
    {

        $attributes = request()->validate([

            'name' => 'required',
            'email' => ['required','email','unique:users,email,'.$user->id],
            'password' => ['required','min:8','confirmed'],
        ]);

        $user->update($attributes);

         // set a flash message
         session()->flash("success","User Updated Successfully");

         // redirect to admin board
         return redirect("/admin/projects");
    }


     
    public function destroy(User $user) {
        $user->delete();

        // Set a flash message
        session()->flash('success','User Deleted Successfully');

        // Redirect to the Admin Dashboard
        return redirect("/admin/projects");
    }
}
