<?php

use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing-page');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/surveys', function () {
    return view('surveys');
});

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/survey', function () {
    return view('survey');
});

Route::get('/login', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'store']);


Route::get('/signup', [RegisteredUserController::class, 'create']);
Route::post('/signup', [RegisteredUserController::class, 'store']);



