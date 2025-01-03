<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docsaisine extends Model
{
    protected $guarded = ['id'];

    public function saisine(){
    	return $this->belongsTo('App\Saisine');
    }
}
