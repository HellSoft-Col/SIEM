<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Characteristic extends Model
{
    protected $table = 'characteristic';
    protected $fillable = [
        'name', 'description', 'type'
    ];
    function resources(){
        return $this->belongsToMany(Resource::class)
                    ->using(CharacteristicResource::class)
                    ->as('CharacteristicResource')
                    ->withPivot(['quantity']);
    }
}
