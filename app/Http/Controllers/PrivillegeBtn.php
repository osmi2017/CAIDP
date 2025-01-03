<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;

class PrivillegeBtn extends Model
{
	private function userID(){
		$id = \Auth::user()->id;
	}

    public function displayBtn(){

    }

    
}
