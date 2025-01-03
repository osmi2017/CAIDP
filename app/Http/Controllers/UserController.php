<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tools\Globals;
use App\User;
use App\Responsable;
use App\Organisme;
use App\Validation;
use App\Notifications\NewAccount;

class UserController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }

    public function index(){
        return view('users.index');
    }

    public function createUser($donnees, $password=null, $organisme=null){
        // if($donnees->email==null){
        //     return true;
        // }
  
        if(!isset($donnees->privilege)){
            $donnees->privilege = null;

        }
        if(isset($donnees->user_id)){
    	   $User = User::whereId($donnees->user_id)->first();
        }else{
           $User = new User;
        }
        $Privileges = new Globals;
        // $Privileges->Privileges();
        // dd(json_decode($donnees->privilege, true));

    	$Globals = new Globals;
    	$User->name = $donnees->nom;
        $User->pseudo = $donnees->pseudo;
        $User->privilegesOrga = isset($donnees->privilege) ? $donnees->privilege : null;
    	$password = $password ? $password : $Globals->genererMotDePasse();
        $User->password = bcrypt($password);
        if (filter_var($donnees->email, FILTER_VALIDATE_EMAIL)) {
            $User->email = $donnees->email;
        }else{
            $User->email = null;
        }
    	
    	$User->requerant_id = isset($donnees->requerant_id) ? $donnees->requerant_id : null;
    	$User->responsable_id = isset($donnees->responsable_id) ? $donnees->responsable_id : null;
    	$User->caidp = isset($donnees->caidp) ? $donnees->caidp : null;
        $User->caidp_id = isset($donnees->caidp_id) ? $donnees->caidp_id : null;
        if($User->save()){
            $user = User::orderBy("id", "DESC")->limit(1)->first();
            // dd($user);
            //if(!isset($donnees->user_id) && !is_null($user->email)){
               //$User->notify(new NewAccount($password, $donnees->privilege, $organisme));
            //}
            return true;
        }
    }

    public function checkUser($email){
    	$Requerant = User::whereEmail($email)->get();
        $RequerantPseudo = User::wherePseudo($email)->get();
        dd(count(json_decode($Requerant, true)));
    	if(count(json_decode($Requerant, true))+count(json_decode($Requerant, true))>0){
    		return true;
    	}else{
    		return false;
    	}
    }

    public function confimerInscriptionEmail($donnees){

    }

    public function verifNewuserPseudo($pseudo){
        $userExist = User::wherePseudo($pseudo)->first();
        if($userExist){
            return true;
        }else{
            return false;
        }
    }
    public function verifNewuser($pseudo, $password){
        $userExist = User::wherePseudo($pseudo)->get();
        $data =  array();
        if(!is_null($userExist)){
            foreach ($userExist as $value) {
                $hashed = \Hash::check($password, $value->password);
                array_push($data, $hashed);
                if($hashed===true){
                    return true;
                }
            }
            return false;
        }else{
            return false;
        }
    }

    


    public function userData(){
        $responsable = Responsable::with('qualiteresponsable')->whereId(Auth()->user()->responsable_id)->first();
        //dd($responsable);
        $organisme = Organisme::whereId($responsable->organisme_id)->first();
        return compact('responsable', 'organisme');
    }

    public function userPrivilege($privilege){
        $User = \Auth::user();
        $userPrivilege = json_decode($User->privilege);
        dd($User);
    }

    public function ValidationDecision(){
        return Validation::where('organisme_id', $this->userData()['organisme']->id)->first();

    }

    public function UserNotifications(){
        $userNotif = \Auth::user(); 
        // dd($userNotif);
        return $userNotif->unreadNotifications;
    }
}
