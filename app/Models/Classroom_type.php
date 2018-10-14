<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classroom_type extends Model
{
    protected $table = 'classroom_type';
    function resources(){
        return $this->hasMany(Resource::class);
    }
}
