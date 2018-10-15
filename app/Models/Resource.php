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
                    ->using(CharacteristicResource::class)
                    ->as('CharacteristicResource')
                    ->withPivot(['quantity']);
    }

    function files(){
        return $this->hasMany(File::class);
    }

    function isAvailableBetween($start_time, $end_time){
         if($this->reservations()
            ->where('start_time', '>=',$start_time)->where('start_time', '<=', $end_time)
            ->where('end_time', '>=',$start_time)->where('end_time', '<=', $end_time)
                 ->where('state','ACTIVE')->count()>0){
             return false;
         }
         return true;
    }
}
