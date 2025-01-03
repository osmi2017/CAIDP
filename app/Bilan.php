<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bilan extends Model
{
    protected $guarded = ['id'];

    public function organisme(){
    	return $this->belongsTo('App\Organisme');
    }
}
