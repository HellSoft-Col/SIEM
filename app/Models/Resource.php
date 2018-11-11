<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    //
    protected $table = 'resource';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'type','state','classroom_type_id'
    ];

    function reservations(){
        return $this->hasMany(Reservation::class);
    }

    function characteristics(){
        return $this->belongsToMany(Characteristic::class)
            ->using(CharacteristicResource::class)
            ->as('CharacteristicResource')
            ->withPivot(['quantity']);
    }

    function resource_type()
    {
        return $this->belongsTo(ResourceType::class);
    }

    function hasCharacteristic($characteristicName)
    {
        $characteristics = $this->characteristics;
        $r = false;
        foreach ($characteristics as $characteristic) {
            if ($characteristic->name == $characteristicName) {
                $r = true;
                break;
            }
        }
        return $r;
    }

    function files(){
        return $this->hasMany(File::class);
    }

    function isAvailableBetween($start_time, $end_time, $user)
    {
        $r = true;
        $aux_reservations = $this->reservations()->where('state', 'ACTIVE')->get();
        foreach ($aux_reservations as $reservation) {
            if($reservation->user->id !== $user->id){
                if (!(($start_time <= $reservation->start_time && $end_time <= $reservation->start_time) ||
                    ($start_time >= $reservation->end_time && $end_time >= $reservation->end_time))) {
                    $r = false;
                }
            }
        }
        return $r;
    }

    function reservationsIn($month)
    {
        $r = [];
        $start = date("YYYY-mm-dd hh:mm:ss", mktime(0, 0, 0, $month, 1, date("YYYY")));

        foreach ($this->reservations as $reservation) {
            if ($reservation->start_time >= $start) {
                array_push($r, $reservation);
            }
        }
        return $r;
    }
}
