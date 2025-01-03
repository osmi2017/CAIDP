<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Qualiteresponsable extends Model
{
    protected $guarded = ['id'];
    protected $table = 'qualiteresponsable';

    public function responsable(){
    	return $this->hasMany('App\Responsable');
    }

   
}
