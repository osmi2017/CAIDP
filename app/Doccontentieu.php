<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doccontentieu extends Model
{
    protected $guarded = ['id'];

    public function contentieu(){
    	return $this->belongsTo('App\Contentieu');
    }
}
