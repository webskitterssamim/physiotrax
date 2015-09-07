<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clinician extends Model
{
     public function setPasswordAttribute($password){   
        $this->attributes['password'] = bcrypt($password);
      }
     public function provider(){
            return $this->belongsTo('App\Provider');
     }
      public function state(){
            return $this->belongsTo('App\State');
     }
}
