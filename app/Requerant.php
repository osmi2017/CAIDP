<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Requerant extends Model
{
    use Notifiable;
    
    protected $guarded = ['id'];

    public function qualite(){
    	return $this->belongsTo('App\Qualite');
    }

    public function type(){
    	return $this->belongsTo('App\Type');
    }

    public function user(){
    	return $this->hasOne('App\User');
    }

    public function demande(){
        return $this->hasMany('App\Demande');
    }

    public function secteur(){
        return $this->belongsTo('App\Secteur');
    }

    public function typesecteur(){
        return $this->belongsTo('App\Typesecteur');
    }

    

    
}
