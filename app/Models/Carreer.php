<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carreer extends Model
{
    //
    protected $table = 'carreer';

    function users(){
        return $this->hasMany(User::Class);
    }
}
