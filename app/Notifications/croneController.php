<?php

namespace App\Notifications;

use App\Demande;
use App\Tools\DateRewrite;
use App\Http\Controllers\Organisme\DemandeController;
use Notification;
use App\User;
use App\Notifications\AlertNotification;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;


class croneController extends Controller
{
	/**
	*@return differenteDate, demande_id
	*
	*if diffrenteDate <= 0 expire
	*/ 

    public function allDemande(){
    	$Demandes = Demande::whereEtat(0)->whereLiquide(null)->get();
    	$DemandeController = new DemandeController;
    	$DateRewrite = new DateRewrite;
    	foreach ($Demandes as $value) {
    		$checkDedelaisDemande = $DemandeController->checkDedelaisDemande($value->requerant_id, $value->dateDemande, $value->id);
    		$checkDedelaisDemande = json_decode($checkDedelaisDemande, true);
    		$dateDebut = explode(" ", $checkDedelaisDemande['dateDebut'])[0];
    		$dateFin = $checkDedelaisDemande['dateFin'];
    		$today = date("Y-m-d");
    		$differenteDate =  $DateRewrite->differenteDate($today, $dateFin);
    		$this->checkValidity($value->id, $differenteDate);
    		echo "<pre>";
    		dump($differenteDate." ================ ".$value->libelle);
    		echo "</pre>";
    	}
    }

    /**
    *
    *
    */

    public function checkValidity($demande_id, $nbreJour){
    	if($nbreJour==30){
    		// mettre etat a 1, liquide a 1, motifliquide a 
    		$Demande = Demande::find($demande_id);
    		$Demande->etat = 1;
    		$Demande->liquide = 1;
    		$Demande->motifliquide = 2;
    		$Demande->favorable = 2;
    		if($Demande->save()){
    			// Send Notification to CAIDP, Requerant, Organisme
    			$this->sendAlert($demande_id);
    		}

    	}
    }

    public function sendAlert($demande_id){
    	$Demande = Demande::whereId($demande_id)->with('organisme')->with('requerant')->first();
    	$organisme_id = $Demande->organisme_id;
    	$Requerant = User::whererequerantId($Demande->requerant_id)->first();
    	$CAIDP = User::where('caidp', 1)->with('caidpData')->where('responsable_id', null)->where('requerant_id', null)->get();
        $Organisme = User::wherehas('responsable', function(Builder $query)use($organisme_id){
            $query->where('organisme_id', $organisme_id);
        })->get();
    	// dd($Organisme);
        // dd($Requerant);
        $Requerant->notify(new AlertNotification($Demande, 1));
        Notification::send($CAIDP, new AlertNotification($Demande, "", "", 1));
        Notification::send($Organisme, new AlertNotification($Demande, "", 1));
    }
}
