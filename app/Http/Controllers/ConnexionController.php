<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Demande;
use Auth;
use Session;
use App\Requerant;
use App\Type;
use App\Ville;
use App\Qualite;
use App\Typesecteur;
use App\Secteur;
use App\Http\Controllers\Organisme\DemandeController;

class ConnexionController extends Controller
{

	private $url;
	public function intendedURL(){
		return Session::get('url.intended') ? Session::get('url.intended') : redirect()->intended('requerant/accueil')->getTargetUrl() ;
	}

	public function Connexion(Request $request){
		return $this->Login($request);
	}

    public function Login($request){
    	// dd($request);
    	if($request->ajax()){
    		$validator = \Validator::make($request->all(), [
            'pseudo'=>'required',
            'password'=>'required|min:4'
	        ]);
	        if($validator->fails()){
	            return $validator->errors();
	        }
    		$pseudo = $request->pseudo;
	        if(filter_var($pseudo, FILTER_VALIDATE_EMAIL)) {
				$User = User::whereEmail($pseudo)->first();
				if($User){
					$credential['email'] = $pseudo;
					$credential['password'] = $request->password;
                    $remember = isset($request->remember) ? $request->remember : false;
					return $this->Connecter($credential, $remember);
				}
				else{
					return $this->errorMessage(0);
				}
			}else{
				$number = str_replace(" ", "", $pseudo);
				// dd($number);
				$Requerant = Requerant::whereContact($number)->first();
				if($Requerant){
					$User = User::where('requerant_id', $Requerant->id)->get();
					if($User && $User->count()!=1){
						return $this->errorMessage(0);
					}
					$credential['pseudo'] = $User[0]->pseudo;
					$credential['password'] = $request->password;
                    $remember = isset($request->remember) ? $request->remember : false;
					return $this->Connecter($credential, $remember);
				}else{
					$Demande = Demande::where('numDemande', $pseudo)->first();
					if($Demande){
						$User = User::where('requerant_id', $Demande->requerant_id)->first();
						$credential['pseudo'] = $User->pseudo;
						$credential['password'] = $request->password;
                        $remember = isset($request->remember) ? $request->remember : false;
						return $this->Connecter($credential, $remember);
					}else{
			        	return $this->errorMessage();
					}
				}
				
			}
    	}
    }


    public function Inscription(Request $request){
    	$DemandeController = new DemandeController;
        // Vérifier si le numéro ou l'email n'existe pas déja dans la base de données
        $request->contact = str_replace(" ", "", $request->contact);
        $array['contact'] = str_replace(" ", "", $request->contact);
        $array['email'] = $request->email;

        $validator = \Validator::make($array, [
            'email' => 'email|nullable|unique:requerants',
            'contact' => 'required|unique:requerants',
        ]);
        if($validator->fails()){
            return $validator->errors()->all();
        }
        // dd($validator->errors());
    	$Inscription = $DemandeController->InscriptionRequerant($request);
    	if(is_string($Inscription)){
    		$Inscription = json_decode($Inscription, true);
    	}else{
    		return $Inscription;
    	}
    	if(isset($Inscription['error']) && $Inscription['error']==false){
    		$request->request->add(['pseudo' => $request->contact]);
    		// dd($request->input()['pseudo']);
    		return $this->Login($request);
    	}else{
    		return $Inscription;
    	}
    }

    public function errorMessage(){
    	$data['error'] = true;
    	$data['message'] = "Connexion échouée, mot de passe ou login erroné";
    	return json_encode($data);
    }

    public function Connecter($credential, $remember=false){
    	if (Auth::attempt($credential, $remember)) {
    		$data['error'] = false;
            $data['message'] =  $this->intendedURL();
            return json_encode($data);
        }else{
        	return $this->errorMessage();
        }
    }

    public function deconnexion(){
    	Auth::logout();
    	return redirect()->route('login');
    }

    public function loginForm(){
    	$Type = Type::all();
    	$Villes = Ville::all();
    	$Qualite = Qualite::all();
    	$Typesecteurs = Typesecteur::all();
    	$Secteurs = Secteur::all();

    	return compact('Type', 'Villes', 'Typesecteurs', 'Secteurs', 'Qualite');
    }
}
