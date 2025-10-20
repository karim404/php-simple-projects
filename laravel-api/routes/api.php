<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\Api\CategoryController;



Route::get('/users', function () {
    return [
        'id' => 1,
        'name' => 'Karim',
        'email' => 'karim@example.com',
    ];
});


Route::apiResource('/categories' , CategoryController::class);


Route::get('/', function () {
    return response()->json(['message' => 'Hello world!']);
});


//JWT-AUTH

Route::post('/register', [AuthController::class, 'register']); // خلي بالك لو بتبعت من postman تضيف "password_confirmation
Route::post('/login', [AuthController::class, 'login']);

/**
 * Route::middleware('guest')->group(function () {
    *Route::post('/register', [AuthController::class, 'register']);
    *Route::post('/login', [AuthController::class, 'login']);
*});
*الـ guest بيمنع أي مستخدم مسجل دخول من الوصول للـ routes دي.

*وبيسيبها مفتوحة لأي مستخدم جديد مش عامل login.

 */




//لازم يكون ال request شايل ال token اصلا 
Route::middleware('jwt')->group(function () {
    Route::get('/user', [AuthController::class, 'getUser']);
    Route::put('/user', [AuthController::class, 'updateUser']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::get('/test', function () {
    return response()->json(['message' => 'Hello world!']);
})->middleware('auth:api');