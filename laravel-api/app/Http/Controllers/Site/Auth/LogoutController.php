<?php

namespace App\Http\Controllers\Site\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        session()->flush();

        // auth()->logout();
        Auth::logout();

        return redirect('/home');
    }
}
