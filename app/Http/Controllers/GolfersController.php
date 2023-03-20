<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Events;
use App\Models\Golfers;

class GolfersController extends Controller
{
    // Show all events
    public function index() {

        $golfers = Golfers::all()->sortByDesc("name");;
        return($golfers);

    }

    // Create Event
    public function create(Request $request) {

        // Parse request variables
        $avatar = "golfer-placeholder.png";

        // Validate data
        if (empty($request->name)) $error = "You must provide a golfer name.";
        // if (empty($request->avatar)) $error = "You must provide a golfer avatar.";
        if (empty($request->origin)) $error = "You must provide the golfer's nationality/origin.";
        if (empty($request->sponsor)) $request->sponsor = "CryptoFantasyGOLF";
        if (empty($request->tier)) $error = "You must provide the golfer's tier.";
        if (empty($request->rank)) $error = "You must provide the golfer's rank.";


        // Error handling
        if (!@$error) {

            // Insert DB
            $data = array(
                'name' => $request->name,
                'origin' => $request->origin,
                'avatar' => $avatar,
                'sponsor' => $request->sponsor,
                'tier' => $request->tier,
                'rank' => $request->rank, 
            );

            // Success
            if (Golfers::create($data)) return $data;
            else return('Something went wrong, creation failed.');
        }

        else return(@$error);
    }


    // Update Event
    public function update(Request $request, $gid) {

        $golfer = Golfers::find($gid);

        // Title
        if (!empty($request->name)) $name = $request->name;
        else $name = $golfer->name;

        // Start
        if (!empty($request->origin)) $origin = $request->origin;
        else $origin = $golfer->origin;

        // End
        if (!empty($request->avatar)) $avatar = $request->avatar;
        else $avatar = $golfer->avatar;        

        // Image
        if (!empty($request->sponsor)) $sponsor = $request->sponsor;
        else $sponsor = $golfer->sponsor;              

        // Tier
        if (!empty($request->tier)) $tier = $request->tier;
        else $tier = $golfer->tier;    

        // Rank
        if (!empty($request->rank)) $rank = $request->rank;
        else $rank = $golfer->rank;            

        // Update DB
        $golfer->name = $name;
        $golfer->origin = $origin;
        $golfer->avatar = $avatar;
        $golfer->sponsor = $sponsor;
        $golfer->tier = $tier;
        $golfer->rank = $rank;
        $golfer->save();

        return($golfer);

    }


    // Delete Event
    public function delete(Request $request, $gid) {

        $golfer = Golfers::find($gid);
        $golfer->delete($gid);        
        return('Golfer '.$golfer->name.' deleted');
    }

}
