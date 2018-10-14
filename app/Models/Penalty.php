<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penalty extends Model
{
    //
    protected $table = 'penalty';
    function reservation(){
        return $this->belongsTo(Reservation::class);
    }

    function user(){
        return $this->hasManyThrough(User::app,Reservation::class);
    }
}
