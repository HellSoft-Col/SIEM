<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    //
    protected $table = 'resource';


    function reservations(){
        return $this->hasMany(Reservation::class);
    }

    function characteristics(){
        return $this->belongsToMany(Characteristic::class)
            ->using(CharacteristicResource::class)
            ->as('CharacteristicResource')
            ->withPivot(['quantity']);
    }

    function classroom_type(){
        return $this->belongsTo(Classroom_type::class);
    }

    function hasCharacteristic($characteristicName){
        $characteristics = $this->characteristics;
        $r = false;
        foreach($characteristics as $characteristic){
            if($characteristic->name==$characteristicName){
                $r=true;
                break;
            }
        }
        return $r;
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

    function reservationsIn($month){
        $r = [];
        $start = date("YYYY-mm-dd hh:mm:ss", mktime(0, 0, 0, $month,1 ,date("YYYY")));
        $end = date("YYYY-mm-dd hh:mm:ss", mktime(0, 0, 0, $month,0,date("YYYY")));
        foreach ($this->reservations as $reservation){
            if($reservation->start_time >= $start && $reservation->end_time <= $end){
                array_push($r, $reservation);
            }
        }
        return $r;
    }
}
