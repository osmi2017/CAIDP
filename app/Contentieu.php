<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contentieu extends Model
{
    protected $guarded = ['id'];

    public function saisine(){
    	return $this->belongsTo('App\Saisine');
    }

    public function doccontentieu(){
    	return $this->hasMany('App\Doccontentieu');
    }

    public function message()
    {
        return $this->hasMany(Message::class);
    }

}
