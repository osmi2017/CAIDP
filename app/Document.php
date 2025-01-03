<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $guarded = ['id'];

    public function demande(){
    	return $this->belongsTo('App\Demande');
    }

    public function information(){
    	return $this->belongsTo('App\Informations');
    }
}
