<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Mandant extends Model
{
	use Notifiable;
	protected $guarded = ['id'];
	
    public function ville(){
        return $this->belongsTo('App\Ville');
    }

    public function demande(){
    	return $this->hasMany('App\Demande');
    }
}
