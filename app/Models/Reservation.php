<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = 'reservation';

    protected $fillable = [
        'state', 'start_time', 'end_time', 'user_id', 'resource_id', 'moulted'
    ];

    function user(){
        return $this->belongsTo(User::class);
    }

    function resource(){
        return $this->belongsTo(Resource::class);
    }

    function penalty(){
        return $this->hasOne(Penalty::class);
    }

    static function ActiveReservations()
    {
        return Reservation::where('state', 'ACTIVE')->get();
    }

    static function RunningReservations()
    {
        return Reservation::where('state', 'RUNNING')->get();
    }
}

