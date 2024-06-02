<?php
use Illuminate\Support\Facades\Route;

//Import Controllers
use App\Http\Controllers\ActivityController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Activities
Route::resource('activities', ActivityController::class);

//Nav routes
Route::get('/activities', [ActivityController::class, 'index'])->name('activities.index');