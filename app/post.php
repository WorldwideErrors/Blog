<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    //
    public function reactions(){
        return $this->hasMany( 'App\Reaction');
    }


}
