<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Characteristic extends Model
{
    //
    function resources(){
        return $this->belongsToMany(Resource::class)
                    ->withPivot(['quantity']);
    }
}
