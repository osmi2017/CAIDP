<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Decisioncaipdpsfile extends Model
{
    protected $guard =  ['id'];

    public function decisioncaipdps(){
     	return $this->belongsTo('App\Decisioncaipdpsfile');
    }
}
