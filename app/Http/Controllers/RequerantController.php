<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Requerant;
use App\User;
use App\Mandant;
use App\Typesecteur;
use App\Secteur;
use App\Qualite;
use App\Http\Controllers\UserController;
use Notification;


class RequerantController extends Controller
{


    public function saveRequerant($donnees){
        //dd($donnees->input());
        if($donnees->requerantId){         
           $Requerant = Requerant::find($donnees->requerantId);
        }else{
    	   $Requerant = new Requerant;
        }
        // dd($donnees->qualite);

        // ========= Save Type Secteur ==============
        // $typesecteurs_id  = $this->saveTypesecteur($donnees->type_secteur);
        // ========= Save Type Secteur ==============

        // ========= Save  Secteur ==============
        $secteur_id  = $this->saveSecteur($donnees->secteur);
        // ========= Save  Secteur ==============

        // ========= Save  Secteur ==============
        if(isset($donnees->titre) && $donnees->titre!=null){
            $donnees->qualite = $donnees->titre;
        }
        if($donnees->qualite!=null){
            $qualite_id  = $this->saveQualite($donnees->qualite);
        }else{
            $qualite_id = 3;
        }
        
        // ========= Save  Secteur ==============

        // dd($qualite_id);

        


    	try {
            $Requerant->nom = $donnees->nom;
            $Requerant->prenom = $donnees->prenom;
            $Requerant->email = $donnees->email;
            $Requerant->contact = str_replace(" ", "", $donnees->contact);
            $Requerant->contact2 = $donnees->contact2;
            $Requerant->qualite_id = $qualite_id;
            $Requerant->ville = $donnees->ville;
            $Requerant->titre = isset($donnees->titre) ? $donnees->titre : null;
            $Requerant->civilite = $donnees->civilite;
            $Requerant->secteur_id = $secteur_id;
            $Requerant->denomination = isset($donnees->denomination) ? $donnees->denomination : null;
            $Requerant->typesecteurs_id = $donnees->typesecteurs_id;
            $Requerant->adressePostale = $donnees->adressePostale;
            $Requerant->type_id = $donnees->type_id;
            $Requerant->autosave = isset($donnees->autosave) ? $donnees->autosave : null;
            $Requerant->savebycaidp = isset($donnees->savebycaidp) ? $donnees->savebycaidp : null;
            //$Requerant->savebyorganisme = isset($donnees->savebyorganisme) ? $donnees->savebyorganisme : null;
        
            if ($Requerant->save()) {
                $createUser = new UserController;
                $User = User::whereRequerantId($donnees->requerantId ? $donnees->requerantId : $this->DernierRequerant()->id)->first();
        
                if ($User) {
                    $createUser->user_id = $User->id;
                }
                
                $createUser->nom = $donnees->nom . " " . $donnees->prenom;
                $createUser->email = $donnees->email;
                $createUser->pseudo = $donnees->email ? $donnees->email : str_replace(" ", "", $donnees->contact);
                $createUser->requerant_id = $donnees->requerantId ? $donnees->requerantId : $this->DernierRequerant()->id;
                $createUser->responsable_id = null;
                $createUser->caidp = null;
        
                $password = $donnees->password ? $donnees->password : null;
                return $createUser->createUser($createUser, $password);
            } else {
                return false;
            }
        } catch (\Exception $e) {
            // Log the error for debugging
            dd($e);
            \Log::error('Error saving Requerant: ' . $e->getMessage());
        
            // Return a response with the error message
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while processing your request. Please try again later.',
                'error' => $e->getMessage() // You can remove this in production for security
            ], 500);
        }
        
    }

    // function saveTypesecteur($type_secteur){
    //     $Typesecteur = Typesecteur::where('type_secteur',$type_secteur)->first(); 
    //     if($Typesecteur){
    //         return $Typesecteur->id;
    //     }else{
    //         $Typesecteur = new Typesecteur;
    //         $Typesecteur->type_secteur = $type_secteur;
    //         $Typesecteur->save();
    //         return Typesecteur::orderBy('id', 'DESC')->limit(1)->first()->id;
    //     }
    // }

    function saveSecteur($secteur){
        if($secteur==null){
            return $secteur;
        }
        $Secteur = Secteur::where('secteur',$secteur)->first(); 
        if($Secteur){
            return $Secteur->id;
        }else{
            $Secteur = new Secteur;
            $Secteur->secteur = $secteur;
            $Secteur->save();
            return Secteur::orderBy('id', 'DESC')->limit(1)->first()->id;
        }
    }

    function saveQualite($qualite){
        $Qualite = Qualite::where('qualite',$qualite)->first(); 
        if($Qualite){
            return $Qualite->id;
        }else{
            $Qualite = new Qualite;
            $Qualite->qualite = $qualite;
            $Qualite->duree = 30;
            $Qualite->save();
            return Qualite::orderBy('id', 'DESC')->limit(1)->first()->id;
        }
    }

    

    

    public function findRequerant($id){
        return Requerant::find($id);
    }

    public function DernierRequerant(){
    	return Requerant::orderBy('id','desc')->first();
    }

    public function checkRequerant($email){
        if($email==null){
            return false;
        }
    	$Requerant = Requerant::whereEmail($email)->first();
        if(is_null($Requerant)){
            return false;
        }else if(count(json_decode($Requerant, true))>0){
    		return true;
    	}else{
    		return false;
    	}
    }

    public function checkRequerantByContact($contact){
        if($contact==null){
            return false;
        }
        $Requerant = Requerant::whereEmail($contact)->first();
        if(is_null($Requerant)){
            return false;
        }else if(count(json_decode($Requerant, true))>0){
            return true;
        }else{
            return false;
        }
    }
    

    public function sendEmail($donnees){

    }

    public function saveMandant($data){
        $Mandant = new Mandant;
        $Mandant->nom = $data->nom;
        $Mandant->prenom = $data->prenom;
        $Mandant->sexe = $data->sexe;
        $Mandant->profession = $data->profession;
        $Mandant->ville = $data->ville;
        $Mandant->pieceMandant = $data->pieceMandant;
        $Mandant->denommination = $data->denommination;
        $Mandant->type_mandant = $data->type_mandant;
        if($Mandant->save()){
            return true;
        }else{
            return false;
        }
    }

    public function lastMandat(){
        return Mandant::orderBy('id', 'desc')->first()->id;
    }


}
