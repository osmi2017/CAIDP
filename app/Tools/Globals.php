<?php

namespace App\Tools;


Use Str;
use Route;

class Globals 
{
    public static function Demande_Path(){
        return "/demandes/";
    }

    public static function Decision_Path(){
        return "/admin/decisions/";
    }
    public static function Saisine_Path(){
        return "    ";
    }

    public static function CAIDP_Decision_Path(){
        return "/admin/caidp_decision/";
    }


    public static function Mandant_Path(){
        return "/mandats/";
    }

    public static function Document_Path(){
        return "/documents/";
    }

    public function numeroSaisine(){
        $Saisine = \App\Saisine::orderBy('id', 'DESC')->first();
        $id = $Saisine ? $Saisine->id  + 1 : 1;
        return "Aff n°".date("d/m/Y")."-".$id;
    }

    public function genererMotDePasse($longeur=8){
    	$pass = "1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    	return substr(str_shuffle($pass), 0, $longeur);
    }

    public function emailChecker($email){
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }else{
            return true;
        }
    }

    public function EtatDemande($etat, $texte=null){
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

    // public function decison 

    public function Visibilite($etat){
        switch ($etat) {
            case 0:
                $data['span'] = "label label-danger";
                $data['texte'] = "Privé";
                return $data;
                break;
            case 1:
                $data['span'] = "label label-success";
                $data['texte'] = "Public";
                return $data;
                break;
        }
    }

    public function Etat($etat){
        switch ($etat) {
            case 1:
                $data['span'] = "label label-success";
                $data['texte'] = "Actif";
                $data['action'] = "Désactiver";
                $data['btn'] = "btn btn-warning btn-rounded";
                $data['icon'] = "fa fa-times";
                return $data;
                break;
            case 0:
                $data['span'] = "label label-warning";
                $data['texte'] = "Désactif";
                $data['action'] = "Activer";
                $data['btn'] = "btn btn-warning";
                $data['icon'] = "fa fa-check";
                return $data;
                break;
        }
    }

    public function State($etat, $facilitation=null, $contentieu=null){
        // dd($contentieu);
        if($etat==null){
            if(!$facilitation && !$contentieu){
                echo "<label class='label label-danger New'>Nouveau</label>";
            }else{
                echo "<label class='label label-warning'>En cours</label>";
            }
        }
        elseif($etat==2){
            echo "<label class='label label-success New'>Clôturable</label>";
        }else{
            echo "<label class='label label-info'>Clôturé</label>";
        }
    } 

    public function StateReq($etat, $facilitation=null, $contentieu=null){
        // dd($contentieu);
        if($etat==null){
            if(!$facilitation && !$contentieu){
                echo "<label class='label label-danger '>Nouveau</label>";
            }else{
                echo "<label class='label label-warning'>En cours</label>";
            }
        }elseif($etat==2){
            echo "<label class='label label-success New'>Clôturable</label>";
        }else{
            echo "<label class='label label-info'>Clôturé</label>";
        }
    } 

     

    public function genererDecisonPDF($libelle, $date, $id){
        $Date = Str::Slug($date).$id;
        $fileName = Str::Snake($libelle)."_".$Date;
        return $fileName;
    }

    public function activeMenu($lien){

    }

    public function savedBy($autosave, $savebyorganisme, $savebycaidp){
        if($autosave!=null){
            return "Le réquérant";
        }elseif($savebyorganisme!=null){
            return "Notre organisme";
        }elseif($savebycaidp!=null){
            return "La CAIDP";
        }
    }

    public function findNotification($notification){
        return substr(explode("App\Notifications", $notification)[1], 1);
    }

    public function NotificationDetails($notification){
        switch ($this->findNotification($notification)) {
            case 'AccuseReception':
                return 'Accusé de reception de demande d\'information';
                break;
            case 'AccuseReceptionSaisne':
                return 'Accusé de reception de saisine';
                break;
            
            case 'NewAccount':
                return 'Création de compte';
                break;
            case 'NotifierProrogation':
                return 'Prorogation de délai';
                break;
             case 'SendDecisionNotification':
                return 'Réponse à une demande';
                break;
             
            default:
                # code...
                break;
        }
    }

    public function Privileges($variable){
        $Privileges = \App\Privilege::whereVariable($variable)->first();
        if($Privileges){
            return $Privileges->privilege;
        }
    }

    public function auteurSaisine($auteurSaisine, $Usager, $organisme, $caidp="La CAIDP"){
        switch ($auteurSaisine) {
            case 1:
                return $Usager;
                break;
            case 2:
                return $organisme;
                break;
            case 3:
                return $caidp;
                break;
            
            default:
                # code...
                break;
        }
    }

    public function CheckAutosaisine($autosave, $savebycaidp, $savebyorganisme){
        if($autosave){
            return "L'usager";
        }
        if($savebycaidp){
            return "La CAIDP";
        }
        if($savebyorganisme){
            return "L'organisme";
        }
    }

    public function checkReqOrga($requerant){
        if(!is_null($requerant->denomination)){
            return $requerant->denomination;
        }else{
            return $requerant->nom." ".$requerant->prenom;
        }
    }

    public function checkNameOrga($denomination, $nom, $prenom){
        if(!is_null($denomination)){
             return $denomination;
        }else{
             return $nom." ".$prenom;

        }
    }

    public function menuActif($route, $active="active"){
        if(strpos(Route::currentRouteName(), $route) === 0){
            return $active;
        }
    }
            
}
