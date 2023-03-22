<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Contests;
use App\Models\Entries;
use App\Models\Events;
use App\Models\Golfers;
use App\Models\Players;
use App\Models\Requests;

class ContestsController extends Controller
{


    public function createEntry (Request $request) {

        // Validate data
        if (empty($request->playerID)) $error = "You must provide an event ID.";
        if (empty($request->contestID)) $error = "You must provide a contest ID";

        // Error handling
        if (!@$error) {

            // Insert DB
            $data = array(
                'playerID' => $request->playerID,
                'contestID' => $request->contestID,
                'entry' => $request->entry, 
                'status' => $request->status
            );
            return(Entries::create($data));
        }

        else return(@$error);
        
    }


    // Show All Entries
    public function entries (Request $request) {
        $entries = Entries::all()->sortByDesc('created_at');
        return($entries);      
    }

    // Show All Contest Entries
    public function entriesContest (Request $request, $cid) {

        $entries = Entries::select()->where('contestID',$cid);
        return $entries ;      
    }    

    // Find Entry
    public function entry (Request $request, $eid) {
        $entry = Entries::find($eid);;
        return $entry;      
    }    


    // Delete Entry
    public function deleteEntry(Request $request, $eid) {

        $entry = Entries::find($eid);
        if ($entry) {
            $entry->delete($eid);
            return('Entry deleted with id #'.$eid);
        }
        else return ('Cannot find an entry to delete with id #'.$eid);
    }

    // Show contests
    public function picks(Request $request, $slug) {

        $golfers = Golfers::all();
        return view('picks', ['golfers' => $golfers]);
    }    

    // Show contests
    public function contests(Request $request, $cid) {
        return view('contests');
    }

    // Show Lobby
    public function lobby(Request $request, $cid) {

        $contest = Contests::find($cid);
        return view('lobby', ['contest' => $contest]);
    }

    // Show all contests WEB
    public function index() {

        $contests = Contests::all()->sortByDesc("eventID");
        $entries = $contests->count();
        return view('contests', ['contests' => $contests, 'entries' => $entries]);

    }

    // Show all contests JSON
    public function indexJSON() {

        $contests = Contests::all()->sortByDesc("eventID");;
        return($contests);

    }

    // Create Contest
    public function create(Request $request) {

        // Validate data
        if (empty($request->eventID)) $error = "You must provide an event ID.";
        if (empty($request->code)) $error = "You must provide a contest code.";
        if (empty($request->type)) $error = "You must provide a contest type.";
        if (empty($request->entry) && $request->entry !=0) $error = "You must provide a contest entry value.";
        if (empty($request->prizepool) && $request->prizepool !=0) $error = "You must provide a contest prize pool value.";
        if (empty($request->payouts)  && $request->payouts !=0) $error = "You must provide a contest payouts value.";
        if (empty($request->description)) $error = "You must provide a contest description.";


        // Error handling
        if (!@$error) {

            // Insert DB
            $data = array(
                'eventID' => $request->eventID,
                'code' => $request->code,
                'type' => $request->type,
                'entry' => $request->entry, 
                'prizepool' => $request->prizepool, 
                'payouts' => $request->payouts, 
                'description' => $request->description 
            );
            return(Contests::create($data));
        }

        else return(@$error);
    }


    // Update Contest
    public function update(Request $request, $cid) {

        $contest = Contests::find($cid);

        // Event ID
        if (!empty($request->eventID)) $eventID = $request->eventID;
        else $eventID = $contest->eventID;

        // Code
        if (!empty($request->code)) $code = $request->code;
        else $code = $contest->code;


        // Type
        if (!empty($request->type)) $type = $request->type;
        else $type = $contest->type;

        // Entry
        if (!empty($request->entry) || $request->prizepool == 0) $entry = $request->entry;
        else $entry = $contest->entry;        

        // Prize Pool
        if (!empty($request->prizepool) || $request->prizepool ==0) $prizepool = $request->prizepool;
        else $prizepool = $contest->prizepool;     
        
        // Payouts
        if (!empty($request->payouts) || $request->prizepool ==0) $payouts = $request->payouts;
        else $payouts = $contest->payouts;             

        // Description
        if (!empty($request->description)) $description = $request->description;
        else $description = $contest->description;    

        // Update DB
        $contest->eventID = $eventID;
        $contest->code = $code;
        $contest->type = $type;
        $contest->entry = $entry;
        $contest->prizepool = $prizepool;
        $contest->payouts = $payouts;
        $contest->description = $description;
        $contest->save();

        return($contest);

    }


    // Delete Contest
    public function delete(Request $request, $cid) {

        $contest = Contests::find($cid);
        if ($contest) {
            $contest->delete($cid);
            return('Contest deleted with id #'.$cid);
        }
        else return ('Cannot find a contest to delete with id #'.$cid);
    }

}