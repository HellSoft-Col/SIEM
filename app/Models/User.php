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

    function file(){
        return $this->belongsTo(File::class , 'file_id');
    }
}
