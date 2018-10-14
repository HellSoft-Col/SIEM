<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    //
    protected $table = 'file';
    function event(){
        return $this->belongsTo(Event::class);
    }

    function publication(){
        return $this->belongsTo(Publication::class);
    }

    function resource(){
        return $this->belongsTo(Resource::class);
    }
}
