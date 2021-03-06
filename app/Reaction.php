<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{
    public function post(){
        return $this->belongsTo('App\Post');
    }

    public function author(){
        return $this->belongsTo('App\User', 'user_id');
    }
}
