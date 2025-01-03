<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Demande;
use App\Document;
use App\Responsable;
use App\User;
use App\Organisme;
use App\Requerant;
use App\Refuscommunication;
use App\Notifications\NotifierProrogation;
use App\Notifications\OrganismeProrogation;
use App\Notifications\OrganismeRefus;
use App\Notifications\NotifierRefus;
use App\Tools\DateRewrite;
use Str;
use Illuminate\Notifications\Notifiable;
use Notification;


class MainDemandeController extends Controller
{
    public function __construct(){

    }

    public function SoumettreDemande($donnees){
        if(isset($donnees->dem_idHide) && !is_null($donnees->dem_idHide)){
           $Demande = Demande::find($donnees->dem_idHide);
        }else{
    	    $Demande = new Demande;
            $Demande->numDemande = $this->genererNumDemande();
        }
    	$Demande->libelle = $donnees->libelle;
    	$Demande->description = $donnees->description;
    	$Demande->requerant_id = $donnees->requerant_id;
        $Demande->autoEnregsitrement = isset($donnees->autoEnregsitrement) ? $donnees->autoEnregsitrement : null;
    	$Demande->organisme_id = $donnees->organisme_id;
        $Demande->direction = $donnees->direction;
        $Demande->service = $donnees->service;
        $Demande->mandant_id = $donnees->mandant_id;
        $Demande->brouillon = $donnees->brouillon;
    	$Demande->dateDemande = $donnees->dateDemande;
        $Demande->autosave = isset($donnees->autosave) ? 1 : null;
        $Demande->savebycaidp = isset($donnees->savebycaidp)  ? 1 : null;
        $Demande->savebyorganisme = isset($donnees->savebyorganisme) ? 1 : null;

    	return $Demande->save();
    }

    public function genererNumDemande(){
        return "D-".date("Y").substr(str_shuffle("0123456789"), 0,4);
    }

    public function ModifierDemande($donnees, $id){
    	$Demande = Demande::find($id);
    	$Demande->libelle = $donnees->libelle;
    	$Demande->description = $donnees->description;
    	$Demande->requerant_id = $donnees->requerant_id;
    	$Demande->organisme_id = $donnees->organisme_id;

    	return $Demande->save();
    }

    public function SupprimerDemande(){
    	$Demande = Demande::find($id);
    	if($Demande->brouillon==0){
    		return $Demande->delete();
    	}
    }

    public function AjouterDocumentDemande($donnees, $lastInform_id){
        foreach($donnees as $value){
         // ========================
            $documentName = $value->getClientOriginalName();
            $value->move('documents', $documentName);
        // ========================
            $Document = new Document;
            $Document->document = $documentName;
            $Document->information_id = $lastInform_id;

            $Document->save();
        }   
    }

    public function AjaxPostDocSave($donnees, $lastInform_id, $path,  $nomFichier=null){


        $path = public_path().$path;
        $nbre = 0;
        for($i=0; $i<count($donnees['name']); $i++){
            $explode = explode(".", $donnees['name'][$i]);
            if(count($explode)!=2){
                return false;
            }

            $name = explode(".", $donnees['name'][$i])[0];
            $ext  = explode(".", $donnees['name'][$i])[1];
            $nom = Str::Slug($name);
            $nom = $nom."_".date("ymdis").".".$ext;

            $Document = new Document;
            $Document->document = $nom; 
            if(!is_null($nomFichier)){
                $Document->nomFichier = $nomFichier[$i]; 
            }
            $Document->information_id = $lastInform_id;

            $Document->save();

            (!is_dir($path)) ? mkdir($path) : $path;
            if(move_uploaded_file($donnees['tmp_name'][$i],$path.$nom)){
                $nbre++;
            }
        }
        if($nbre==count($donnees['name'])){
            return true;
        }else{
            return false;
        }
    }



    public function lastDemande(){
        $Demande = Demande::orderBy("id", "Desc")->with('organisme')->limit(1)->first();
        return $Demande;
    }

    public function findDemande($demande_id){
        $Demande = Demande::find($demande_id);
        return $Demande;
    }

    

    public function findrequerant($demande_id){
        $findDemande = $this->findDemande($demande_id);
        if($findDemande){
            $requerant_id = $findDemande->requerant_id;
            $findrequerant = Requerant::find($requerant_id);
            if($findrequerant && $findrequerant->email==null){
                return false;
            }
            return true;
        }else{
            return false;
        }
    }

    public function findDirectionService($type, $direction){
        return Demande::where($type, $direction)->first();

    }

    public function Prorogation($donnees){
        $Demande = Demande::find($donnees->demande_id);
        // dd($donnees->demande_id);
        $Demande->dateProrogation = $donnees->dateProrogation;
        $Demande->motifProrogation = $donnees->motifProrogation;
        $Demande->etat = 1;  
        $calculeProrogationSendMail = $this->calculeProrogationSendMail($donnees->dateProrogation); 
        $findrequerant = $this->findrequerant($donnees->demande_id);
        if($Demande->save()){  
        $this->notifierProrogation($donnees->demande_id);
            if($calculeProrogationSendMail==false){
                $data['messageProro'] = "Le délai maximal est toujours en cours.";
                $data['Proro'] = true;
                $data['error'] = false;
                return json_encode($data);
            }else{
                $data['messageProro'] = "Le délai maximal requis est dépassé.";                
                $data['Proro'] = false;
                $data['error'] = false;
                $data['message'] = "Une erreur est survenue, veuiller recommencer !";
                return json_encode($data);
            }
            $data['error'] = false;
            $data['message'] = "La Prorogation a été enregistrée avec succès !";
            return json_encode($data);
        }else{
            $data['error'] = true;
            $data['message'] = "Une erreur est survenue, veuiller recommencer !";
            return json_encode($data);
        }

    }

    public function calculeProrogationSendMail($dateProrogation){
        $jour = $this->calculeDemandeDelais($dateProrogation);
        if($jour>0){
            // Si Jour true alors delais expiré
            return true;
        }else{
            return false;
        }
    }

    public function refusCommunication($donnees){
        $refuscommunication = new Refuscommunication;
        $refuscommunication->motif = $donnees['motif'];
        $refuscommunication->demande_id = $donnees['demande_id'];
        if($refuscommunication->save()){
            $this->favorable(1, $donnees['demande_id']);
            $this->notifierRefus($donnees['demande_id']);
            return true;
        }else{
            return false;
        }
    }

    public function favorable($favorable, $demande_id, $transmission){
        $Demande = Demande::whereId($demande_id)->first();
        // dd($Demande);
        $Demande->favorable = $favorable;
        $Demande->etat = 1;
        $Demande->transmission = json_encode($transmission);
        $Demande->save();
    }

    public function notifierProrogation($demande_id){
        // Find Demande
        $DateRewrite = new DateRewrite;
        $Demande = Demande::find($demande_id);
        // Find User requerant
        $requerant = Requerant::find($Demande->requerant_id);
        $data['requerant'] = $requerant->civilite." ".$requerant->nom." ".$requerant->prenom;
        // dd($requerant);
        // $data['etat'] = "info";
        $data['message'] = "Votre demande d'accès à l'information numéro : ".$Demande->numDemande.", portant le libellé : ".$Demande->libelle." a été prorogée à la date du ".$DateRewrite->dateFrancais($Demande->dateProrogation)." avec pour motif : ".$Demande->motifProrogation;
        $data['motifProrogation'] = $Demande->motifProrogation;
        // Send Notif to requerant
        $User = \App\User::where('requerant_id', $Demande->requerant_id)->first();
        $User->notify(new NotifierProrogation($data));
        // ============================================================================================

        // ============================================================================================
        // Notifier Organisme
         $data['message'] = "La demande d'accès à l'information numéro : ".$Demande->numDemande.", portant le libellé : ".$Demande->libelle." a été prorogée à la du ".$DateRewrite->dateFrancais($Demande->dateProrogation)." avec pour motif : ".$Demande->motifProrogation;

         // TO ORGAHISME
        $Organisme = Organisme::find($Demande->organisme_id);
        // dd($data);
        $Organisme->notify(new OrganismeProrogation($data));

        $UserOrga = \Auth::user();
        $UserOrga->notify(new OrganismeProrogation($data));


        // =========== SEND NOTIF TO MANDANT ==========================
        if($Demande->mandant_id){
            $Mandant = \App\Mandant::find($Demande->mandant_id);
            // dd($Mandant);
            $Mandant->notify(new NotifierProrogation($data));
        }

        // USER OF ORGA
        // $orgaUser = Responsable::where('organisme_id', $Demande->organisme_id)->get();
        // Notification::send($users, new OrganismeProrogation($data));

    }

    public function notifierRefus($demande_id){
        // Find Demande
        $DateRewrite = new DateRewrite;
        $Demande = Demande::find($demande_id);
        $Refuscommunication = Refuscommunication::where('demande_id', $demande_id)->first();
        // dd($Demande);
        // Find User requerant
        $requerant = User::where("requerant_id", $Demande->requerant_id)->first();
        $data['etat'] = "danger";
        $data['message'] = "Demande refusée";
        $data['motif'] = $Refuscommunication->motif;
        // Send Notif to requerant
        // dd($Demande);
        $requerant->notify(new NotifierRefus($data, $Demande));
        // ============================================================================================
        // Find responsable de l'information
        $responsableOrga = Responsable::where('organisme_id', $Demande->organisme_id)->with('user')->get();
        $data['etat'] = "danger";
        $data['message'] = "Demande refusée";
        $data['motif'] = $Refuscommunication->motif;
        // $responsableInfo = User::with('responsable_id')->where('responsables.organisme_id', $Demande->organisme_id);
        foreach ($responsableOrga as  $value) {
            $value->user->notify(new NotifierRefus($data, $Demande));
        }

        // ============================================================================================
        // Notifier Organisme
        // dd($data);
        $Organisme = Organisme::find($Demande->organisme_id);
        $Organisme->notify(new OrganismeRefus($data));
        // dd($Organisme);
        
    }

    public function calculeDemandeDelais($dateSoumission){
        $dateDiff = new DateRewrite;
        $Jours = $dateDiff->differenteDate($dateSoumission, date("Y-m-d"));
        return $Jours;
    }

    public function newDate($date, $jour){
        $newDate = new DateRewrite;
        return $newDate->newDate($date, $jour);
    }

    

    // public function calculeDemandeDelaisProro($date, $nombreJour){

    // }



}
