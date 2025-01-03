<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caidp extends Model
{
    protected $guarded = ['id'];

    public function user(){
    	return $this->hasMany('App\User');
    }
}
