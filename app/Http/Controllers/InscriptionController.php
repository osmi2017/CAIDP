<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Qualiteresponsable;
use App\Organisme;
use App\Responsable;
use App\Contact;
use App\Privilege;
use App\Tools\Globals;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Organisme\DemandeController;

use App\Http\Controllers\ResponsableController;
use App\Http\Controllers\UserController;


class InscriptionController extends Controller
{
	public function __construct(){
        // dd("test");
		// return $this->middleware('guest')->except('saveInscription');
	}

    public function organisme(){
        $Privilege = Privilege::orderBy('ordre', 'asc')->get();
    	// $Qualiteresponsable = Qualiteresponsable::whereDefault(0)->get();
        $Qualiteresponsable = Qualiteresponsable::distinct('qualite')->get('qualite');

    	// dd($Qualiteresponsable);
    	return view('organismeInscription', compact('Qualiteresponsable', 'Privilege'));
    }
    public function saveInscription(Request $request){
      
        if(!isset($request->qualite)){
            $request->qualite= "autre";
        }
        // dd($request->all());
        // return $request;
    	$Validator = \Validator::make($request->all(), [
    		'email' => 'required|array|min:1',
    		'emailUser' => 'sometimes|string',
    		'password' => 'sometimes|min:4',
    		'emailrespo' => 'required|array|min:1',
    		'siege' => 'required',
    		'organisme' => 'required',
    		// 'contact' => 'required|int|min:8',
    		'nom' => 'required',
    		'prenom' => 'required',
    		'qualite' => 'required',
            'autreQualite' => 'sometimes',
    		// 'contactRespo' => 'required|min:8|int',
    		'logo' => 'image|mimes:jpeg,png,jpg|max:2048',
    	]);
    	// Save Contact and Mail respo ======================================================
        $i=0;
        foreach ($request->contact as $value) {
            $contact = str_replace(" ", "", $value);
            $contact = str_replace("_", "", $contact);
            if(strlen($contact)!=10){
                $data['error'] = true;
                $data['section'] = 1;
                $data['nbre'] = $i;
                $data['champ'] = 'contact[]';
                $data['message'] = "Veuilllez saisir un contact valide s'il vous plaît !";
                return json_encode($data);
            }
            $i++;
        }

        $i=0;
        foreach ($request->contactRespo as $value) {
            // return $value;
            $contact = str_replace(" ", "", $value);
            $contact = str_replace("_", "", $contact);
            if(strlen($contact)!=10){
                $data['error'] = true;
                $data['section'] = 1;
                $data['nbre'] = $i;
                $data['champ'] = 'contactRespo[]';
                $data['message'] = "Veuilllez saisir un contact valide s'il vous plaît !";
                return json_encode($data);
            }
            $i++;
        }
        
        // dd(strlen($contact)!==8 );
        if($request->qualite=="autre" && empty($request->autreQualite)){
            $data['error'] = true;
            $data['section'] = 2;
            $data['champ'] = 'qualite';
            $data['message'] = "Veuilllez sélectionner votre qualité s'il vous plaît !";
            return json_encode($data);
        }
        // dd($request->qualite);
        if($Validator->fails()){
            return $Validator->errors()->all();
        }
        $UserController = new UserController;
        $userExist = $UserController->verifNewuserPseudo($request->emailUser);
        if(!isset($request->responsable_id)):
            if($userExist){
                $data['error'] = true;
                $data['section'] = 2;
                $data['champ'] = 'emailUser';
                $data['message'] = "l'adresse email du responsable existe déjà dans la base de donnée, veuillez choisir un autre s'il vous plaît.";
                return json_encode($data);
            }
        endif;


    	foreach ($request->emailrespo as $key => $value) {
    		$Validator = \Validator::make($request->all(), [
    			'emailUser' => 'email|unique:users',
    		]);

            if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                $data['error'] = true;
                $data['message'] = "Veuillez vérifier les adresses emails du responsable";
                return json_encode($data);
            }
    	}

        $i = 0;
        foreach ($request->email as $key => $value) {
            $Validator = \Validator::make($request->all(), [
                'email.0' => 'email',
            ]);

            if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                $data['error'] = true;
                $data['section'] = 2;
                $data['nbre'] = $i;
                $data['message'] = "Veuillez vérifier l'ardesse email.";
                return json_encode($data);
            }
            $i++;
        }


		foreach ($request->email as $key => $value) {
    		$Validator = \Validator::make($request->all(), [
    			'email.*' => 'email',
    		]);
    	}

    	

    	if($Validator->fails()){
    		return $Validator->errors()->all();
    	}
    	

    	if($_FILES['logo']['name']!=""){
    		$DemandeController = new DemandeController;
    		$logo = $DemandeController->uploadFiles($_FILES['logo'], '/images/');
    	// var_dump($_FILES['logo']['name']);die;
    	}else{
            $organismeLogo = isset($request->organisme_id) && !is_null($request->organisme_id) ? Organisme::find($request->id) : null;
            if($organismeLogo){
                $logo = $organismeLogo->logo;
            }else{
    		  $logo = null;
            }
    	}

    	if($request->autreQualite){
            $qualite = Qualiteresponsable::whereQualite($request->autreQualite)->first();
            if($qualite){
                $qualite = $qualite->id;
            }else{
                $qualite = new Qualiteresponsable;
                $qualite->qualite = $request->autreQualite;
                if($qualite->save()){
                    $qual = Qualiteresponsable::orderBy('id', 'DESC')->first();
                    $qualite = $qual->id;
                }  
            }
    		
    	}else{
    		$qualite = $request->qualite;
    	}

    	$data = array();
		$email = $request->email;
		unset($email[0]);
		if(count($request->email)>1){
			$data['email'] = $email;
		}else{
			$data['email'] = null;
		}

		$contact = $request->contact;
		unset($contact[0]);
		if(count($request->contact)>1){
			$data['contact'] = $contact;
		}else{
			$data['contact'] = null;
		}
		$data = json_encode($data);

        if(isset($request->organisme_id) && !is_null($request->organisme_id)){
            $organisme = Organisme::find($request->organisme_id);
        }else{
            $organismeName = Organisme::whereOrganisme($request->organisme)->first();
            if($organismeName){
                $Organismerespo = Responsable::whereOrganismeId($organismeName->id)->first();
                if($Organismerespo->ri==1){
                    $responsable = "le responsable de l'information, ".$Organismerespo->nom." ".$Organismerespo->prenom." au numéro suivant ".$Organismerespo->contact." ou via l'adresse email : ".$Organismerespo->email." ou veuillez contacter la CAIDP.";
                }elseif($Organismerespo->rh==1){
                    $responsable = "le responsable hiérachique, ".$Organismerespo->nom." ".$Organismerespo->prenom." au numéro suivant ".$Organismerespo->contact." ou via l'adresse email : ".$Organismerespo->email." ou veuillez contacter la CAIDP.";
                }else{
                    $responsable = $Organismerespo->nom." ".$Organismerespo->prenom." au numéro suivant ".$Organismerespo->contact." ou via l'adresse email : ".$Organismerespo->email." ou veuillez contacter la CAIDP.";
                }
                $data = array();
                $data['error'] = true;
                $data['message'] = "Cet organisme existe déjà dans la base de données, veuillez contacter ".$responsable;
                return $data;
            }
            $organisme = new Organisme;
        }

    	$organisme->organisme = $request->organisme;
    	$organisme->siege = $request->siege;
    	$organisme->contact = $request->contact[0];
    	$organisme->email = $request->email[0];
    	$organisme->autrecontact = $data;
    	$organisme->logo = $logo;
        $organisme->savebycaidp =isset($request->savebycaidp) ? $request->savebycaidp : null;
        $organisme->savebyorganisme =isset($request->savebyorganisme) ? $request->savebyorganisme : null;
    	// dd($organisme);
    	if($organisme->save()){
    		$this->ValidationDecision($this->lastOrganisme()->id);
    		// ==================================
    		$data = array();
			$email = $request->emailrespo;
			unset($email[0]);
			if(count($request->emailrespo)>1){
				$data['email'] = $email;
			}else{
				$data['email'] = null;
			}

			$contact = $request->contactRespo;
			// unset($contact[0]);
			if(count($request->contactRespo)>1){
				$data['contact'] = $contact;
			}else{
				$data['contact'] = null;
			}
			$data = json_encode($data);
			// var_dump($request->emailrespo);
			// die();
    		// ==================================

            // ======================== RECUPERATION DES PRIVILEGES =========================================
            $privilegeTable['createUser'] = true;
            $privilegeTable['createDemande'] = true;
            $privilegeTable['createFile'] = true;
            $privilegeTable['createDecison'] = true;
            $privilegeTable['valideDecison'] = true;
            $privilegeTable['sendDecison'] = true;

            $privilege = json_encode($privilegeTable);
            // ======================== RECUPERATION DES PRIVILEGES =========================================

    		$responsable = new Responsable;
            $responsable->responsable_id = isset($request->responsable_id) && !is_null($request->responsable_id) ? $request->responsable_id :  null;
    		$responsable->nom = $request->nom;
    		$responsable->prenom = $request->prenom;
    		$responsable->email = $request->emailUser ? $request->emailUser  : $request->emailrespo[0];
    		$responsable->contact = $request->contactRespo[0];
    		$responsable->autrecontact = $data;
    		$responsable->qualite_id = $qualite;
            $responsable->ri = isset($request->ri) ? true : null ;
            $responsable->rh = isset($request->rh) ? true : null ;

            $organisme_id = $this->lastOrganisme()->id;
    		$responsable->organisme_id = $organisme_id;

    		$ResponsableController = new ResponsableController;
    		if($ResponsableController->responsableSave($responsable, $request->password, $privilege, $this->lastOrganisme()->organisme)){
    			$data = array();
    			$data['error'] = false;
    			$data['message'] = "Votre inscription a été effectuée avec succès.Vous pouvez maintenant vous connecter. Nous vous avons également envoyé un mail à l'adresse ".$request->emailUser;
                $data['organisme_id'] = $organisme_id;
    			return json_encode($data);
    		}else{
    			$data['error'] = true;
    			$data['message'] = "Une erreur est survenue, veuillez recommencer svp";
    			return json_encode($data);
    		}


    	}
    }

    public function lastOrganisme(){
    	return Organisme::orderBy('id', 'DESC')->first();
    }

    public function genererMotDePasse(){
        $genererMotDePasse = new Globals;
        return $genererMotDePasse->genererMotDePasse(6);
    }

    public function emailChecker(Request $request){
        // return $email;
        $emailChecker = new Globals;
        if($emailChecker->emailChecker($request->email)===true){
            return 1;
        }else{
            return 0;
        }
    }

    public function findQualiterespo(Request $request){
        if($request->ajax()){
            $Qualiteresponsable = Qualiteresponsable::distinct('qualite')->get('qualite');
            ob_start();
            ?>
            <div class='form-group autoFiledQualite'>
                <input required placeholder='Veuillez préciser votre qualité' type='text' class='form-control' name='autreQualite' list="qualiteList">
                <datalist id="qualiteList">
                    <?php foreach ($Qualiteresponsable as  $value): ?>
                        <option><?php echo $value->qualite ?></option>
                    <?php endforeach ?>
                </datalist>
            </div>
            <?php
            $return = ob_get_clean();
            return $return;
        }
    }


    public function ValidationDecision($organisme_id){
        $Validation = new \App\Validation;
        $Validation->typeValide = "imprim";
        $Validation->organisme_id = $organisme_id;
        $Validation->save();
    }
    


}
