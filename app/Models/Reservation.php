<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    //
    protected $table = 'reservation';
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

