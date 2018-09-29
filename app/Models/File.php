<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    //
    function event(){
        return $this->belongsTo(Event::class);
    }

    function publication(){
        return $this->belongsTo(Publication::class);
    }
}
