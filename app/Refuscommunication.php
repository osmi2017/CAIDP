<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Refuscommunication extends Model
{
    protected $guarded = ['id'];

    public function demande(){
    	return $this->belognsTo('App\Demande');
    }
}
