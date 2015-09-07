<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Adminuser extends Model {

	  protected $fillable = array('name', 'email', 'password','phone');
	  
	  public function setPasswordAttribute($password){   
        $this->attributes['password'] = bcrypt($password);
      }

}
