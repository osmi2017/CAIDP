<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    protected $guarded = ['id'];

    public function decison(){
    	return $this->hasOne('App\Decision');
    }

    public function document(){
    	return $this->hasMany('App\Document');
    }

    public function information(){
    	return $this->hasOne('App\Information');
    }

    public function saisine(){
    	return $this->hasOne('App\Saisine');
    }

    public function requerant(){
    	return $this->belongsTo('App\Requerant');
    }

    public function organisme(){
    	return $this->belongsTo('App\Organisme');
    }

    public function refuscommunication(){
        return $this->hasOne('App\Refuscommunication');
    }

    public function mandant(){
        return $this->belongsTo('App\Mandant');
    }
    


// ====================== SCOPES =============================
    public function scopeEnvoyees($query){
        return $query->whereBrouillon(0);
    }

    public function scopeAnnee($query){
        return $query->whereBetween('dateDemande', [date("Y").'-01-01-',  date("Y").'-12-31']);
    }

    

    

    
}
