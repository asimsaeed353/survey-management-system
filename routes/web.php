<?php

use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\SurveyResponseController;
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


    Route::get('/survey/create', [SurveyController::class, 'create']);
    Route::post('/survey/create', [SurveyController::class, 'store']);

    // Define Model Bound routes at the bottom of the page
    Route::get('/surveys', [SurveyController::class, 'index']);
//    Route::get('/survey/edit', [SurveyController::class, 'edit']);
    Route::get('/survey/{id}', [SurveyController::class, 'show']);
    Route::delete('/survey/{id}', [SurveyController::class, 'destroy']);

    // Routes for survey response
    Route::get('/survey/published/{survey}-{slug}', [SurveyResponseController::class, 'show']);
    Route::post('/survey/published/{survey}-{slug}', [SurveyResponseController::class, 'store']);

    Route::post('/logout', [SessionController::class, 'destroy']);
});
