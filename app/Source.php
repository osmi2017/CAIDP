<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    protected $guarded = ['id'];

    public function information(){
    	return $this->hasMany('App\Information');
    }
}
