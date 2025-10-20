<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Site\Auth\LoginController;
use App\Http\Controllers\Site\Auth\LogoutController;
use App\Http\Controllers\Site\Auth\RegisterController;


// $router = app()->make('router');
// $router->get();


// Route::get('/', function () {
//     return view('welcome');
// });

// Route::match(['post' , 'put'] , 'dashboard' , [DashboardController::class , 'index']);
Route::get( 'dashboard/' , [DashboardController::class , 'index']);


// Route::get('/register', function () {
//     return view('auth.register');
// })->name('register.show');


Route::view('/home' ,'home')->name('home');


// Route::get('/login', [LoginController::class , 'show'])->name('login.show');

// Route::post('/login', [LoginController::class , 'authenticate'])->name('login.authenticate');

// Route::get('/register', [RegisterController::class , 'show'])->name('register.show');
// Route::post('/register', [RegisterController::class , 'store'])->name('register.store');

// Route::post('/logout', LogoutController::class )->name('logout');

// Route::fallback(function(){
//     return response()->json([
//         'message' => 'not found.'] , 404);
// });


// jwt 



