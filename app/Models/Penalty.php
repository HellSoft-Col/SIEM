<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Penalty extends Model
{
    //
    function reservation(){
        return $this->belongsTo(Reservation::class);
    }

    function user(){
        return $this->hasManyThrough(User::app,Reservation::class);
    }
}
