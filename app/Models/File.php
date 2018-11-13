<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    //
    protected $table = 'file';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'path', 'description', 'type', 'resource_id',
    ];

    function event(){
        return $this->belongsTo(Event::class);
    }

    function publication(){
        return $this->belongsTo(Publication::class);
    }

    function resource(){
        return $this->belongsTo(Resource::class);
    }

    function users(){
        return $this->hasMany(User::class);
    }
}
