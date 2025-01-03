<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Organisme extends Model
{
	use Notifiable;

    protected $guarded = ['id'];

    public function demande(){
    	return $this->hasMany('App\Demande');
    }

    public function responsable(){
    	return $this->hasMany('App\Responsable');
    }

    public function information(){
    	return $this->hasMany('App\Information');
    }
    public function rapport(){
        return $this->hasMany('App\Rapport');
    }
    public function motifrapport(){
        return $this->hasMany('App\Motifrapport');
    }

    public function bilan(){
        return $this->hasMany('App\Rapport');
    }

    public function validation(){
        return $this->hasOne('App\Validation');
    }

    

    

    
}
