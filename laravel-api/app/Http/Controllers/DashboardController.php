<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class DashboardController extends Controller
{
    public function index ()
    {
        // return View::make('dashboard'); // facade
        return view ('dashboard.index' ); // service contenaire .
    }
}
