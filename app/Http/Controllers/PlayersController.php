<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Contests;
use App\Models\Events;
use App\Models\Players;
use App\Models\Requests;


class PlayersController extends Controller
{
    // Show all players WEB
    public function index() {

        $players = Players::all()->sortByDesc("username");;
        return($players);

    }

    // Create Player
    public function create(Request $request) {

        // Validate data
        if (empty($request->username)) $error = "You must provide a username.";
        if (empty($request->password)) $error = "You must provide a password.";
        if (empty($request->email)) $error = "You must provide an email.";
        if (empty($request->dob)) $error = "You must provide a date of birth.";
        if (empty($request->avatar)) $error = "You must provide an avatar.";
        if (empty($request->skill)) $error = "You must provide a skill level.";


        // Error handling
        if (!@$error) {

            // Insert DB
            $data = array(
                'username' => $request->username,
                'password' => $request->password,
                'email' => $request->email,
                'dob' => Carbon::parse($request->dob),
                'avatar' => $request->avatar, 
                'skill' => $request->skill
            );
            return(Players::create($data));
        }

        else return(@$error);
    }


    // Update Player
    public function update(Request $request, $pid) {

        $player = Players::find($pid);

        // Username
        if (!empty($request->username)) $username = $request->username;
        else $username = $player->username;

        // Email
        if (!empty($request->email)) $email = $request->email;
        else $email = $player->email;        

        // Password
        if (!empty($request->password)) $password = $request->password;
        else $password = $player->password;

        // DOB
        if (!empty($request->dob)) $dob = $request->dob;
        else $dob = $player->dob;

        // Avatar
        if (!empty($request->avatar) || $request->avatar == 0) $avatar = $request->avatar;
        else $avatar = $player->avatar;        

        // Skill
        if (!empty($request->skill) || $request->skill ==0) $skill = $request->skill;
        else $skill = $player->skill;       

        // Update DB
        $player->username = $username;
        $player->password = $password;
        $player->email = $email;
        $player->dob = Carbon::parse($dob);
        $player->avatar = $avatar;
        $player->skill = $skill;
        $player->save();

        return($player);

    }


    // Delete Player
    public function delete(Request $request, $pid) {

        $player = Players::find($pid);
        if ($player) {
            $player->delete($pid);
            return('Player '.$player->username.' deleted');
        }
        else return ('Cannot find a player to delete with id #'.$pid);
    }
}
