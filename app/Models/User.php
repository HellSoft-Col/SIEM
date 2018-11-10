<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    protected $table = 'users';
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','carreer_id','username'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    function reservations(){
        return $this->hasMany(Reservation::class);
    }

    function events(){
        return $this->hasMany(Event::class);
    }

    function publications(){
        return $this->hasMany(Publication::class);
    }

    function penalties(){
        return $this->hasManyThrough(Penalty::class,Reservation::class);
    }

    function carreer(){
        return $this->belongsTo(Carreer::class);
    }

    function hasPenalties()
    {
        if ($this->penalties()->where('active', '1')->count() > 0) {
            return true;
        }
        return false;
    }

    function hasReservations($type){
        $classroom = 0;
        $instrument = 0;
        foreach ($this->reservations as $reservation){
            if($reservation->resource->type =='CLASSROOM'){
                $classroom = $classroom+1;
            }
            if($reservation->resource->type =='INSTRUMENT'){
                $instrument = $instrument+1;
            }
        }
        if($type === 'CLASSROOM' && $classroom===1){
            return true;
        }
        else if ($type === 'INSTRUMENT' && $instrument ===1){
            return true;
        }
        return false;
    }

    function file(){
        return $this->belongsTo(File::class , 'file_id');
    }

}
