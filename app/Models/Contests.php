<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contests extends Model
{
    use HasFactory;
    protected $fillable = ['eventID','code','type','entry','prizepool','payouts','description'];        

}
