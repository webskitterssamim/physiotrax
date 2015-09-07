<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Excercise extends Model
{
     protected $fillable = ['name','creator','sets','reps','weight','frequency','hold_time','rest_time','surface','youtube_url','description','status'];
}
