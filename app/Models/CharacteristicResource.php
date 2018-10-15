<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CharacteristicResource extends Pivot
{
    //
    protected $table = 'characteristic_resource';


    function characteristic(){
        return $this->belongsTo(Characteristic::class);
    }

    function resource(){
        return $this->belongsTo(Resource::class);
    }
    public function hasCharacteristic($characteristic){
        if ($this->characteristic() == $characteristic){
            return true ;
        }
        return false ;
    }

}
