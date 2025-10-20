<?php

namespace App\Http\Controllers\Site\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class LoginController
{
    public function show ()
    {
        return view('auth.login');
    }



    public function authenticate(Request $request): RedirectResponse
    {
        /**
         * how convert to loginRequest
         */
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials , $request->boolean('remember'))) {
            $request->session()->regenerate(); //to avoid session fixtion
 
            return redirect()->intended('/home');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
}
