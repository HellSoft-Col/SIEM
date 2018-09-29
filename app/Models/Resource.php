<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    //
    protected $table = 'resource';
    function classroom_type(){
        return $this->belongsTo(Classroom_type::class);
    }

    function reservations(){
        return $this->hasMany(Reservation::class);
    }

    function characteristics(){
        return $this->belongsToMany(Characteristic::class)
                    ->withPivot(['quantity']);
    }
}
