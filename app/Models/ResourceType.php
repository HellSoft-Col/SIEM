<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResourceType extends Model
{
    protected $table = 'resource_type';

    function resources(){
        return $this->hasMany(Resource::class);
    }

}
