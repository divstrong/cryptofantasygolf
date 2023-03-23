<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Contests;
use App\Models\Golfers;
use App\Models\Events;
use App\Models\Players;
use App\Models\Picks;
use App\Models\Requests;

class PicksController extends Controller
{

    // Get All Picks JSON
    public function picks(Request $request) {
        $picks = Picks::all();
        return ($picks);
    }    

    // Show Picks
    public function index(Request $request, $slug) {

        $golfers = Golfers::all();
        return view('picks', ['golfers' => $golfers]);
    }    
}
