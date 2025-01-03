<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EtatDemande extends Controller
{
	private $Demande;
    public function __construct($Demande){
    	$this->Demande = $Demande;
    	$this->Decision = $Demande->decison;
    }

    public function checkState(){
    	if($this->Demande->etat==0 && $this->Demande->etat==0){
    		$this->returnResponse(null);
    	}elseif($this->etat==1 && $this->Demande->liquide){

    	}
    }

    public function checkValidate(){

    }

    public function returnResponse($etat, $texte=null){
    	switch ($etat) {
    		case null:
    			$data['span'] = "label label-warning";
    			$data['texte'] = $texte ? $texte : "En cours";
    			return $data;
    			break;
    		case 1:
    			$data['span'] = "label label-danger";
    			$data['texte'] = $texte ? $texte : "Non satisfait";
    			return $data;
    			break;
    		case 2:
    			$data['span'] = "label label-primary";
    			$data['texte'] = $texte ? $texte : "Partiellement satisfait";
    			return $data;
    			break;
    		case 3:
    			$data['span'] = "label label-success";
    			$data['texte'] = $texte ? $texte : "Totalement satisfait";
    			return $data;
    			break;
    		
    		
    		default:
    			# code...
    			break;
    	}
    }
}
