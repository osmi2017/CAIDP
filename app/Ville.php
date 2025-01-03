<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    protected $guard = ['id'];

    public function mandant(){
    	return $this->hasOne('App\Mandant');
    }

    public function responsable(){
    	return $this->hasOne('App\Responsable');
    }    
}
