<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Typesecteur extends Model
{
    protected $guarded = ['id'];

    public function requerant(){
    	return $this->hasMany('App\Requerant');
    }

}
