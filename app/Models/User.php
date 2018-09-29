<?php

namespace App;

use App\Models\Event;
use App\Models\Penalty;
use App\Models\Publication;
use App\Models\Reservation;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
}
