<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContestsController;
use App\Http\Controllers\GolfersController;
use App\Http\Controllers\EventsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('lander');
});

// Auth
Route::get('/login', [AuthController::class, 'index']);


// Contests
Route::get('/contests', [ContestsController::class, 'index']);
Route::get('/contests/{slug}', [ContestsController::class, 'lobby']);
// Route::get('/contests/{slug}/{cid}', [ContestsController::class, 'contests']);
Route::get('/contests/{slug}/picks', [ContestsController::class, 'picks']);


// Events
Route::get('/events', [EventsController::class, 'index']);
Route::get('/events/{slug}', [EventsController::class, 'contests']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
