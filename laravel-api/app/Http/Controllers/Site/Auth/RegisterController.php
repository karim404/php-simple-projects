<?php

namespace App\Http\Controllers\Site\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Site\Auth\RegisterRequest;

class RegisterController
{
    

    public function show() 
    {
        return view('auth.register');
    }


    public function store(RegisterRequest $request) 
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);
        /**
         * user here is authenticated .
         */
        Auth::login($user); // =>facade class
        // auth()->login($user); //=>helper function() in laravel .
        return redirect('/home');
        
        // dd($request->all());
    }
}
