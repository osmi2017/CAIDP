<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','pseudo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function responsable(){
        return $this->belongsTo('App\Responsable');
    }

    public function requerant(){
        return $this->belongsTo('App\Requerant');
    }

    public function caidpData(){
        return $this->belongsTo('App\Caidp', 'caidp', 'id');
    }

    public function message()
    {
        return $this->hasMany(Message::class);
    }

    

    
}
