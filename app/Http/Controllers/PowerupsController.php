<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Powerups;


class PowerupsController extends Controller
{
    // Show all powerups
    public function index() {

        $powerups = Powerups::all()->sortByDesc("powerup");;
        return($powerups);

    }

    // Create Powerup
    public function create(Request $request) {

        // Validate data
        if (empty($request->powerup)) $error = "You must provide a username.";
        if (empty($request->bonus)) $error = "You must provide a password.";
        if (empty($request->icon)) $error = "You must provide an email.";
        if (empty($request->per)) $error = "You must provide a date of birth.";
        if (empty($request->description)) $error = "You must provide an avatar.";


        // Error handling
        if (!@$error) {

            // Insert DB
            $data = array(
                'powerup' => $request->powerup,
                'bonus' => $request->bonus,
                'icon' => $request->icon,
                'per' => $request->per,
                'description' => $request->description, 
            );
            return(Powerups::create($data));
        }

        else return(@$error);
    }


    // Update Powerup
    public function update(Request $request, $pid) {

        $p = Powerups::find($pid);

        // Powerup
        if (!empty($request->powerup)) $powerup = $request->powerup;
        else $powerup = $p->powerup;

        // Bonus
        if (!empty($request->bonus)) $bonus = intval($request->bonus);
        else $bonus = intval($p->bonus);        

        // Icon
        if (!empty($request->icon)) $icon = $request->icon;
        else $icon = $p->icon;

        // Per
        if (!empty($request->per)) $per = $request->per;
        else $per = $p->per;

        // Description
        if (!empty($request->description)) $description = $request->description;
        else $description = $p->description;        
   

        // Update DB
        $p->powerup = $powerup;
        $p->bonus = $bonus;
        $p->icon = $icon;
        $p->per = $per;
        $p->description = $description;
        $p->save();

        return($p);

    }


    // Delete Player
    public function delete(Request $request, $pid) {

        $powerup = Powerups::find($pid);
        if ($powerup) {
            $powerup->delete($pid);
            return('Player '.$powerup->powerup.' deleted');
        }
        else return ('Cannot find a powerup to delete with id #'.$pid);
    }

}
