<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picks extends Model
{
    use HasFactory;
    protected $fillable = ['contestID','golferID','playerID','powerupID'];        

}
