<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Decision extends Model
{
    protected $guarded = ['id'];

    public function demande(){
    	return $this->belongsTo('App\Demande');
    }
}
