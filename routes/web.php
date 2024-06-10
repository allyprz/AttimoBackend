<?php
use Illuminate\Support\Facades\Route;

//Import Controllers
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\GroupController;

//Main route to activities/index
Route::get('/', [ActivityController::class, 'index']);

Route::get('/major/{id}', [MajorController::class, 'show'])->name('major.show');
Route::get('/major/{id}/edit', [MajorController::class, 'edit'])->name('major.edit');

//Controller resources
Route::resource('activities', ActivityController::class); 
Route::resource('users', UserController::class);
Route::resource('majors', MajorController::class);
Route::resource('courses', CourseController::class);
Route::resource('groups', GroupController::class);