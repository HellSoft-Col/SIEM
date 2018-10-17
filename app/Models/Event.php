<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
    protected $table = 'event';

    function files(){
        return $this->hasMany(File::class);
    }

    function user(){
        return $this->belongsTo(User::class);
    }

}
