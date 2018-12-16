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

    static function ActiveReservationsResource($resource_type)
    {
        $reservations = Reservation::where('state', 'ACTIVE')->get();
        $results = [];
        foreach ($reservations as $reservation) {
            if ($reservation->resource->type == $resource_type) {
                $results[] = $reservation;
            }
        }
        return $results;
    }

    static function RunningReservations()
    {
        return Reservation::where('state', 'RUNNING')->get();
    }

    static function RunningReservationsResource($resource_type)
    {
        $reservations = Reservation::where('state', 'RUNNING')->get();
        $results = [];
        foreach ($reservations as $reservation) {
            if ($reservation->resource->type == $resource_type) {
                $results[] = $reservation;
            }
        }
        return $results;
    }
}

