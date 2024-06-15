<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisteredActivityController;
use App\Http\Controllers\RegisteredGroupController;
use App\Http\Controllers\RegisteredCategoryController;
use App\Http\Controllers\RegisteredUserController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Get all activities
Route::get('/activities/all', [RegisteredActivityController::class, 'index']);

//Get an activity by id
Route::get('/activity/{id}', [RegisteredActivityController::class, 'show']);

//Get all activities by group
Route::get('/activities/group/{id}', [RegisteredActivityController::class, 'showByGroup']);

//Get all activities by user
Route::get('/activities/user/{id}', [RegisteredActivityController::class, 'showByUser']);


//Get all groups
Route::get('/groups/all', [RegisteredGroupController::class, 'index']);

//Get a group by id
Route::get('/group/{id}', [RegisteredGroupController::class, 'show']);

//Get all categories
Route::get('/categories/all', [RegisteredCategoryController::class, 'index']);

//Register a new user
Route::post('/user/add', [RegisteredUserController::class, 'store']);

//Get all groups by a user
Route::get('/groups/user/{id}', [RegisteredGroupController::class, 'showByUser']);