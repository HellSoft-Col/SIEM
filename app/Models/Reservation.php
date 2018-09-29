<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    //
    function user(){
        return $this->belongsTo(User::class);
    }

    function resource(){
        return $this->belongsTo(Resource::class);
    }

    function penalty(){
        return $this->hasOne(Penalty::class);
    }
}

