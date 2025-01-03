<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Responsable extends Model
{
    use Notifiable;

    protected $guarded = ['id'];

    public function organisme(){
    	return $this->belongsTo('App\Organisme');
    }

    public function contact(){
    	return $this->hasMany('App\Contact');
    }
    
    public function user(){
    	return $this->hasOne('App\User');
    }

    public function qualiteresponsable(){
        return $this->belongsTo('App\Qualiteresponsable');
    }

    public function ville(){
        return $this->belongsTo('App\Ville');
    }
   

    
    
    

    
}
