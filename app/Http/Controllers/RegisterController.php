<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view ('auth.create');
    }

    public function store()
    {
       $attribute=  request()->validate([
            'name'=>'required|max:255',
            'email'=>'required|email',
            'password'=>'required'
        ]);
        $attribute['password'] = bcrypt($attribute['password']);
       $user =  User::create($attribute);
        auth()->login($user);
        return redirect('/')->with('success','Your Account has been created');

        
    }
}
