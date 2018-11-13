<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penalty extends Model
{
    //
    protected $table = 'penalty';
    protected $fillable = [
        'active', 'reservation_id', 'date_time', 'carreer_id', 'penalty_end', 'reason'
    ];

    function reservation(){
        return $this->belongsTo(Reservation::class);
    }

    function user(){
        return $this->hasManyThrough(User::app,Reservation::class);
    }
}
