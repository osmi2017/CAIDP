<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Decisioncaipdp extends Model
{
     protected $guard =  ['id'];

     public function saisine(){
     	return $this->belongsTo('App\Saisine');
     }

     public function decisioncaipdpsfile(){
     	return $this->hasMany('App\Decisioncaipdpsfile');
     }
}
