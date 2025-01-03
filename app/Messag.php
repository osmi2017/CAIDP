<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Messag extends Model
{
    
    protected $fillable = ['id','user_id', 'contentieu_id', 'message'];

    
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    
    public function contentieu()
    {
        return $this->belongsTo('App\Contentieu');
    }
}


