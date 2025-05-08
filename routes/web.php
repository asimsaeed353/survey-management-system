<?php

use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SurveyController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing-page');
});

Route::get('/login', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'store'])->middleware('throttle');


Route::post('/signup', [RegisteredUserController::class, 'store']);
Route::get('/signup', [RegisteredUserController::class, 'create']);



Route::middleware('auth')->group(function(){
    Route::get('/dashboard', function () {
        return view('dashboard');
    });

    Route::get('/profile', [RegisteredUserController::class, 'show']);
    Route::get('/edit-profile', [RegisteredUserController::class, 'edit']);
    Route::patch('/update-profile/{id}', [RegisteredUserController::class, 'update']);

    Route::get('/surveys', [SurveyController::class, 'index']);
    Route::get('/survey', [SurveyController::class, 'show']);

    Route::post('/logout', [SessionController::class, 'destroy']);
});
