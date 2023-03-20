<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Contests;
use App\Models\Events;
use App\Models\Requests;

class EventsController extends Controller
{

    // Show all events
    public function contests(Request $request) {

        $event = Events::find($request->slug)->sortByDesc("start");
        $eventid = $event->id;

        $contests = Contests::select()->where('eventID', '=', $eventid);
        return view('contests', ['contests' => $contests]);

    }    

    // Show all events
    public function index() {

        $events = Events::all()->sortByDesc("start");;
        return view('events', ['events' => $events]);

    }

    // Show all events
    public function indexJSON() {

        $events = Events::all()->sortByDesc("start");;
        return($events);

    }

    // Create Event
    public function create(Request $request) {

        // Validate data
        if (empty($request->title)) $error = "You must provide an event title.";
        if (empty($request->start)) $error = "You must provide an event start date.";
        if (empty($request->end)) $error = "You must provide an event end date.";
        if (empty($request->image)) $request->image = "placeholder.png";
        if (empty($request->type)) $request->type = "tour";
        if (empty($request->org)) $request->org = "PGA";


        // Error handling
        if (!@$error) {

            // Insert DB
            $data = array(
                'title' => $request->title,
                'image' => $request->image,
                'start' => Carbon::parse($request->start), 
                'end' => Carbon::parse($request->end), 
                'type' => $request->type, 
                'org' => $request->org, 
            );
            return(Events::create($data));
        }

        else return(@$error);
    }


    // Update Event
    public function update(Request $request, $eid) {

        $event = Events::find($eid);

        // Title
        if (!empty($request->title)) $title = $request->title;
        else $title = $event->title;

        // Start
        if (!empty($request->start)) $start = $request->start;
        else $start = $event->start;

        // End
        if (!empty($request->end)) $end = $request->end;
        else $end = $event->end;        

        // Image
        if (!empty($request->image)) $image = $request->image;
        else $image = $event->image;     
        
        // Type
        if (!empty($request->type)) $type = $request->type;
        else $type = $event->type;             

        // Org
        if (!empty($request->org)) $org = $request->org;
        else $org = $event->org;    

        // Update DB
        $event->title = $title;
        $event->start = Carbon::parse($start);
        $event->end = Carbon::parse($end);
        $event->image = $image;
        $event->type = $type;
        $event->org = $org;
        $event->save();

        return($event);

    }


    // Delete Event
    public function delete(Request $request, $eid) {

        $event = Events::find($eid);
        $event->delete($eid);        
        return('User deleted with id #'.$eid);
    }

}