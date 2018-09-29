<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    //
    function user(){
        return $this->belongsTo(User::class);
    }

    function files(){
        return $this->hasMany(File::class);
    }
}
