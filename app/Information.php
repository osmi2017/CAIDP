<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    protected $guarded = ['id'];
    protected $table = 'informations';

    public function demande(){
    	return $this->belongsTo('App\Demande');
    }

    public function source(){
    	return $this->belongsTo('App\Source');
    }

    public function document(){
    	return $this->hasMany('App\Document');
    }

    public function organisme(){
        return $this->belongsTo('App\Organisme');
    }

    

    

    
}
