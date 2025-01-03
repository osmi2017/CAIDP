<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facilitation extends Model
{
    protected $guarded = ['id'];

    public function saisine(){
    	return $this->belongsTo('App\Saisine');
    }

    public function docfacilitation(){
    	return $this->hasMany('App\Docfacilitation');
    }

    
}
