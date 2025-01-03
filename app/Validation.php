<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Validation extends Model
{
    protected $guard = ['id'];

    public function organisme(){
    	return $this->belongsTo('App\Organisme');
    }
}
