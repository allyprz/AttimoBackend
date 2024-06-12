<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisteredActivityController;
use App\Http\Controllers\RegisteredGroupController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Get all activities
Route::get('/activities/all', [RegisteredActivityController::class, 'index']);

//Get a activity by id
Route::get('/activity/{id}', [RegisteredActivityController::class, 'show']);

//Get all groups
Route::get('/groups/all', [RegisteredGroupController::class, 'index']);

//Get a group by id
Route::get('/group/{id}', [RegisteredGroupController::class, 'show']);

//Get all activities by group
Route::get('/activities/group/{id}', [RegisteredActivityController::class, 'showByGroup']);