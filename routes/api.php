<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\ContestsController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\GolfersController;
use App\Models\Contests;
use App\Models\Events;
use App\Models\Golfers;
use App\Models\Requests;

// Contests
Route::get('/contests', [ContestsController::class, 'indexJSON']);
Route::post('/contests', [ContestsController::class, 'create']);
Route::put('/contests/{cid}', [ContestsController::class, 'update']);
Route::delete('/contests/{cid}', [ContestsController::class, 'delete']);


// Events
Route::get('/events', [EventsController::class, 'indexJSON']);
Route::post('/events', [EventsController::class, 'create']);
Route::put('/events/{eid}', [EventsController::class, 'update']);
Route::delete('/events/{eid}', [EventsController::class, 'delete']);

// Golfers
Route::get('/golfers', [GolfersController::class, 'index']);
Route::post('/golfers', [GolfersController::class, 'create']);
Route::put('/golfers/{gid}', [GolfersController::class, 'update']);
Route::delete('/golfers/{gid}', [GolfersController::class, 'delete']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
