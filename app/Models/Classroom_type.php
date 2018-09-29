<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classroom_type extends Model
{
    //
    function resources(){
        return $this->hasMany(Resource::class);
    }
}
