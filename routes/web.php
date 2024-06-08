<?php
use Illuminate\Support\Facades\Route;

//Import Controllers
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\CourseController;

//Main route to activities/index
Route::get('/', [ActivityController::class, 'index']);

//Controller resources
Route::resource('activities', ActivityController::class); 
Route::resource('users', UserController::class);
Route::resource('majors', MajorController::class);
Route::resource('courses', CourseController::class);