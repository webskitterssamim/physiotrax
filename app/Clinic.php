<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    function state(){
        return $this->belongsTo('App\State');
    }
}
