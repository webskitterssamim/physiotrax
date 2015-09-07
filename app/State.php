<?php

namespace App;
use App\Provider;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    function provider() {
        return $this->hasMany('App\Provider');
    }
    function clinician(){
        return $this->hasMany('App\Clinician');
    }
}
