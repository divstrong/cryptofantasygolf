<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\ContestsController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\GolfersController;
use App\Http\Controllers\PicksController;
use App\Http\Controllers\PlayersController;
use App\Http\Controllers\PowerUpsController;
use App\Models\Contests;
use App\Models\Events;
use App\Models\Golfers;
use App\Models\Requests;

// Contests
Route::get('/contests', [ContestsController::class, 'indexJSON']);
Route::post('/contests', [ContestsController::class, 'create']);
Route::put('/contests/{cid}', [ContestsController::class, 'update']);
Route::delete('/contests/{cid}', [ContestsController::class, 'delete']);

// Entries
Route::get('/entries', [ContestsController::class, 'entries']);
Route::get('/entries/contest/{cid}', [ContestsController::class, 'entriesContest']);
Route::get('/entry/{eid}', [ContestsController::class, 'entry']);
Route::post('/entry', [ContestsController::class, 'createEntry']);
Route::delete('/entry/{eid}', [ContestsController::class, 'deleteEntry']);


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


// Picks
Route::get('/picks', [PicksController::class, 'index']);
Route::post('/picks', [PicksController::class, 'create']);
Route::put('/picks/{pid}', [PicksController::class, 'update']);
Route::delete('/picks/{pid}', [PicksController::class, 'delete']);


// Players
Route::get('/players', [PlayersController::class, 'index']);
Route::post('/players', [PlayersController::class, 'create']);
Route::put('/players/{pid}', [PlayersController::class, 'update']);
Route::delete('/players/{pid}', [PlayersController::class, 'delete']);

// Powerups
Route::get('/powerups', [PowerUpsController::class, 'index']);
Route::post('/powerups', [PowerUpsController::class, 'create']);
Route::put('/powerups/{pid}', [PowerUpsController::class, 'update']);
Route::delete('/powerups/{pid}', [PowerUpsController::class, 'delete']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
