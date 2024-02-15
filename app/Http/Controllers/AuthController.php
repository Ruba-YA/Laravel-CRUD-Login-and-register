<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function destroy()
    {
        auth()->logout();
        return redirect('/');
    }

    public function create()
    {
        return view('auth.login');
    }

    public function store()
    {
      $attribute =   request()->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

        if(auth()->attempt($attribute))
        {
            return redirect('/')->with('success' , 'You are Logged in ');
        }
    }
}
