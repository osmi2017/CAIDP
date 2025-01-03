<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Information;
use App\Document;
use App\Http\Controllers\UserController;

class InformationController extends Controller
{
    public function __construct(){
    	return $this->middleware('auth');
    }

    public function Ajouter(){

    }

    public function checkOrganismeId(){
        $UserController = new UserController;
        return $UserController->userData();
    }

    public function EnregistrerInformation($donnees, $information_id=null){
        if($information_id==null){
    	   $Information = new Information;
        }else{
           $Information = Information::find($information_id);            
        }
    	$Information->libelle = $donnees->libelleInfo;
        $Information->information = $donnees->information;
        $Information->demande_id = $donnees->demande_id;
        $Information->public = $donnees->public;
        $Information->organisme_id = $this->checkOrganismeId()['organisme']->id;
        $Information->dateCommunication = $donnees->dateCommunication;
        $Information->source_id = $donnees->source_id;
        // dd($Information);
        if($Information->save()){
        	return true;
        }else{
        	return false;
        }

    }

    public function lastInform(){
        return Information::orderBy('id', 'DESC')->limit(1)->first();
    }

    public function findDocuments($information_id){
        return Document::where('information_id', $information_id)->get();
    }

    public function findInformation($information_id){
        return Information::find($information_id);
    }

    

    public function InformationDemande($demande_id){
        $information = Information::where('demande_id', $demande_id)->first();
        $b = null;
        if($information){
            $b = Document::where('information_id', $information->id)->get();
        }
        return $b;
    }
}
