<?php
use Illuminate\Support\Facades\Route;

//Import Controllers
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\GroupController;

//Main route to activities/index
Route::get('/', [UserController::class, 'login'])->name('admin.login');

Route::get('/major/{id}', [MajorController::class, 'show'])->name('major.show');
Route::get('/major/{id}/edit', [MajorController::class, 'edit'])->name('major.edit');

Route::get('/activities/search/activity', [ActivityController::class, 'search'])->name('activities.search');
Route::get('/majors/search/major', [MajorController::class, 'search'])->name('majors.search');
Route::get('courses/search/course', [CourseController::class, 'search'])->name('courses.search');
Route::get('groups/search/group', [GroupController::class, 'search'])->name('groups.search');
Route::get('users/search/user', [UserController::class, 'search'])->name('users.search');

//Controller resources
Route::resource('activities', ActivityController::class); 
Route::resource('users', UserController::class);
Route::resource('majors', MajorController::class);
Route::resource('courses', CourseController::class);
Route::resource('groups', GroupController::class);

//Login routes
Route::post('/check', [UserController::class, 'check'])->name('admin.check');
Route::get('/logout', [UserController::class, 'logout'])->name('admin.logout');
Route::get('/login', [UserController::class, 'login'])->name('admin.login');