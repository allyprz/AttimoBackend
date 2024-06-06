<?php
use Illuminate\Support\Facades\Route;

//Import Controllers
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\UserController;

//Main route to activities/index
Route::get('/', [ActivityController::class, 'index']);

//Activities
Route::resource('activities', ActivityController::class); 
Route::resource('users', UserController::class);
