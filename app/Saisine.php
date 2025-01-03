<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Saisine extends Model
{
    protected $guarded = ['id'];

    public function demande(){
    	return $this->belongsTo('App\Demande');
    }

    public function docsaisine(){
    	return $this->hasMany('App\Docsaisine');
    }

    public function facilitation(){
    	return $this->hasMany('App\Facilitation');
    }

    public function contentieu(){
        return $this->hasMany('App\Contentieu');
    }

    public function decisioncaipdp(){
        return $this->hasOne('App\Decisioncaipdp');
    }


    

    
}
