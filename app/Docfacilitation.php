<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docfacilitation extends Model
{
    protected $guarded = ['id'];

    public function facilitation(){
    	return $this->belongsTo('App\Facilitation');
    }
}
