<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Motifrapport extends Model
{
    protected $guarded = ['id'];

    public function organisme(){
    	return $this->belongsTo('App\Organisme');
    }
}
