<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Provider extends Model
{
     public function setPasswordAttribute($password){   
        $this->attributes['password'] = bcrypt($password);
      }
     function state() {
        return $this->belongsTo('App\State');
    }
    function clinician(){
      return $this->hasMany('App\Clinician');
    }

}
