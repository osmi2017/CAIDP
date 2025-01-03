<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Responsable;
use App\Qualiteresponsable;
use App\Organisme;
use App\Privilege;
use App\Validation;
use Illuminate\Support\Facades\Storage;

class ResponsableController extends Controller
{
    public function __construct(){
        return $this->middleware('auth');
    }
    public function responsableSave($data, $password=null, $privilege, $organisme){
        if(!is_null($data->responsable_id)){
           $responsable = Responsable::find($data->responsable_id);
        }else{
    	   $responsable = new Responsable;
        }

    	// dd($Organisme);
    	$responsable->nom = $data->nom;
    	$responsable->prenom = $data->prenom;
    	$responsable->contact = $data->contact;
    	$responsable->email = $data->email;
        $responsable->autrecontact = $data->autrecontact;
    	$responsable->qualiteresponsable_id = $data->qualite_id;
    	$responsable->organisme_id = $data->organisme_id;
        $responsable->ri = $data->ri;
        $responsable->rh = $data->rh;
        // die;
    	if($responsable->save()){
    		$createUser = new UserController;
            $createUser->responsable_id = $data->responsable_id ? $data->responsable_id : $this->DernierRespo()->id;
    		$createUser->nom = $data->nom." ".$data->prenom;
    		$createUser->email = $data->email;
            $createUser->pseudo = $data->email;
            $createUser->privilege = $privilege;
    		$createUser->requerant_id = null;
    		
    		$createUser->caidp = null;
            if($data->responsable_id){
                $createUser->user_id = \App\User::where('responsable_id', $data->responsable_id)->first()->id;
            }
            // dd($data->responsable_id);
    		return $createUser->createUser($createUser, $password, $organisme);
    	}else{
    		return false;
    	}
    }

    // public function create(){

    // } 
    public function index(){
        $organisme_id = $this->userData()['organisme']->id;
        $Responsables = Responsable::where('organisme_id', $organisme_id)->with('user')->with('qualiteresponsable')->with('user')->get();
        return view('users.index', compact('Responsables'));
    }

    public function nouveau($id=null){
        if(!is_null($id)){
            $Responsable = Responsable::with('qualiteresponsable')->whereId($id)->first();
            if($Responsable->organisme_id!==$this->userData()['organisme']->id){
                $Responsable = null;
            }
        }else{
            $Responsable = null;
        }


        
        $Privilege = Privilege::orderBy('variable', 'asc')->get();
        $Qualiteresponsable = Qualiteresponsable::distinct('qualite')->get('qualite');
        //dd($Responsable);
        return view('users.nouveau', compact('Qualiteresponsable', 'Privilege', 'Responsable'));
    }

    public function DernierRespo(){
    	return Responsable::orderBy('id','desc')->first();
    }

    public function store(Request $request){
        // return $request;
        $Validator = \Validator::make($request->all(), [
            'emailrespo' => 'required|array|min:1',
            'nom' => 'required',
            'prenom' => 'required',
            'qualite' => 'required',
            'autreQualite' => 'sometimes',
            'password' => 'sometimes',
            'privilege' => 'required',
        ]);
        // Save Contact and Mail respo ======================================================
        $i=0;
        if($Validator->fails()){
            return redirect()->back()->with('error', $Validator->errors()->first());
        }

        // dd($request->password);
        if(!$request->responsable_id){
            foreach ($request->emailrespo as $key => $value) {
                $Validator = \Validator::make($request->all(), [
                    'email' => 'email|unique:users',
                ]);

                if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $data['error'] = true;
                    $data['message'] = "Veuillez vérifier les adresses emails du responsable";
                     return redirect()->back()->with('error', "Veuillez vérifier les adresses emails");
                }
            }               
        }

        if($Validator->fails()){
             return redirect()->back()->with('error', $Validator->errors()->first());
        }

        if($request->autreQualite){
            $qualite = new Qualiteresponsable;
            $qualite->qualite = $request->autreQualite;
            if($qualite->save()){
                $qual = Qualiteresponsable::orderBy('id', 'DESC')->first();
                $qualite = $qual->id;
            }
        }else{
            $qualite = $request->qualite;
        }

        // dd($organisme);
            
            // ==================================
            $data = array();
            $email = $request->emailrespo;
            unset($email[0]);
            if(count($request->emailrespo)>1){
                $data['email'] = $email;
            }else{
                $data['email'] = null;
            }

            $emailPrincipal = $request->contactRespo[0];

            // unset($contact[0]);
            if(count($request->contactRespo)>1){
                $contactRespo = $request->contactRespo;
                unset($contactRespo[0]);

                $contact = $contactRespo;
                $data['contact'] = $contact;
            }else{
                $data['contact'] = null;
            }
            $data = json_encode($data);
            // var_dump($request->emailrespo);
            // die();
            // ==================================

            // ======================== RECUPERATION DES PRIVILEGES =========================================
            if(!is_null($request->privilege)){
            $privilegeTable['createDemande'] = in_array("createDemande", $request->privilege) ? true : false;
            $privilegeTable['createFile'] = in_array("createFile", $request->privilege) ? true : false;
            $privilegeTable['createDecison'] = in_array("createDecison", $request->privilege) ? true : false;
            $privilegeTable['valideDecison'] = in_array("valideDecison", $request->privilege) ? true : false;
            $privilegeTable['sendDecison'] = in_array("sendDecison", $request->privilege) ? true : false;
            $privilegeTable['createUser'] = in_array("createUser", $request->privilege) ? true : false;
            }else{
                $privilegeTable = null;
            }
            // dd($privilegeTable);

            $privilege = json_encode($privilegeTable);
            // ======================== RECUPERATION DES PRIVILEGES =========================================
            // dd($request->contactRespo);

            isset($request->ri) ? $this->checkResponsabilite($request->ri) : "";
            isset($request->rh) ? $this->checkResponsabilite($request->rh) : "";

            $responsable = new Responsable;
            $responsable->nom = $request->nom;
            $responsable->prenom = $request->prenom;
            $responsable->email = $request->email;
            $responsable->contact = $emailPrincipal;
            $responsable->autrecontact = $data;
            $responsable->qualite_id = $qualite;
            $responsable->ri = isset($request->ri) ? true : null ;
            $responsable->rh = isset($request->rh) ? true : null ;
            if ($request->responsable_id) {
                $responsable->responsable_id = $request->responsable_id;
            }

            
            $responsable->organisme_id = $this->userData()['organisme']->id;


            if($this->responsableSave($responsable, $request->password, $privilege, "")){
                if(!$request->responsable_id){
                    $message = "L'utilisateur a été créé avec succès !";
                }else{
                    $message = "La modification a été créé avec succès !";    
                }

                return redirect()->route('Responsable.index')->with('success', $message);
            }else{

                $data['message'] = "Une erreur est survenue, veuillez recommencer svp";
                return redirect()->back()->with("error", "Une erreur est survenue, veuillez recommencer svp");
            }   
    }

    public function checkResponsabilite($respo){
        $userData = $this->userData();
        if($respo=="ri"){
        // dd($respo);
            $Responsable = Responsable::where('organisme_id', $userData['organisme']->id)->where('ri', 1)->first();
            if($Responsable){
                $Responsable->ri = null;
                $Responsable->save();
            }
        }else{
            $Responsable = Responsable::where('organisme_id', $userData['organisme']->id)->where('rh', 1)->first();
            if($Responsable){
                $Responsable->rh = null;
                $Responsable->save();
            }
        }
    }

    public function userData(){
        $UserController = new UserController;
        return $UserController->userData();
    }

    public function delete($id){
        $Responsable = Responsable::find($id);
        if($Responsable){
            $User = \App\User::where('responsable_id', $Responsable->id)->first();
            if($User->delete()){
               if($Responsable->delete()){
                    return redirect()->route('Responsable.index')->with('success', 'suppression effectuée avec succès'); 
                }else{
                    return redirect()->back()->with('error', 'La suppression à échoué ');
                } 
            }else{
                return redirect()->back()->with('error', 'La suppression à échoué ');
            }
        }else{
            return redirect()->back()->with('error', 'Utilisateur inconnu');
        }



        if($Responsable->delete())
        {
            return redirect()->route('utilisateurs.index')->with('success', 'suppression effectuée avec succès'); 
        }else
        {
                redirect()->back()->with('error', 'La suppression à échoué ');
        }
    }

    public function organisme(){
        $organisme_id = $this->userData()['organisme']->id;
        $Organisme = Organisme::find($organisme_id);
        $Responsable = Responsable::with('qualiteresponsable')->whereId($this->userData()['responsable']->id)->first();
        // dd($Organisme);
        return view('users.organisme', compact('Organisme','Responsable'));
    }

    public function organismeSave(Request $request){
        // return $request;
        // dd($request);
        $Validator = \Validator::make($request->all(), [
            'email' => 'required|array|min:1',
            'contact' => 'required',
            'siege' => 'required',
            'organisme' => 'required',
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
                return redirect()->back()->with('error', 'Adresse email incorrecte');
            }
            $i++;
        }


        foreach ($request->email as $key => $value) {
            $Validator = \Validator::make($request->all(), [
                'email.*' => 'email',
            ]);
        }

        

        if($Validator->fails()){
            return redirect()->back()->with('error', $Validator->errors()->first());
        }
        

        if($_FILES['logo']['name']!=""){
            $DemandeController = new \App\Http\Controllers\Organisme\DemandeController;
            $logo = $DemandeController->uploadFiles($_FILES['logo'], '/images/');
        }else{
            $logo = null;
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

        $organisme = Organisme::find($this->userData()['organisme']->id);
        $organisme->organisme = $request->organisme;
        $organisme->siege = $request->siege;
        $organisme->contact = $request->contact[0];
        $organisme->email = $request->email[0];
        $organisme->autrecontact = $data;
        $logo ? $organisme->logo = $logo : "";
        // dd($organisme);
        if($organisme->save()){
            return redirect()->back()->with("success", "La modification a été effectuée avec succès");
        }else{
            return redirect()->back()->with("error", "La modification à échouée");;
        }
    }

    public function typeValidForm(){
        $User = $this->userData();
        $Validation = Validation::where('organisme_id', $User['organisme']->id)->first();
        $Responsable = Responsable::with('qualiteresponsable')->whereId($User['responsable']->id)->first();
        return view('users.type_validation', compact('Responsable', 'Validation'));
    }

    public function saveValidation(Request $request){
        $request->validate([
            'scane' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'validation' => 'required',
        ]);


        $Validation = Validation::where('organisme_id',$this->userData()['organisme']->id)->first();
        if(!$Validation){
            $Validation = new Validation;
        }
        
        if( isset($_FILES['scane']) && $_FILES['scane']['name']!=""){
            $DemandeController = new \App\Http\Controllers\Organisme\DemandeController;
            $scane = $DemandeController->uploadFiles($_FILES['scane'], '/signatures/');
            $Validation->scane = $scane;
        }

        

        $Validation->typeValide = $request->validation;
        
        $Validation->organisme_id = $this->userData()['organisme']->id;
        if($Validation->save()){
            return redirect()->back()->with('success', 'Le type de validation a été enregistré avec succès.');
        }else{
            return redirect()->back()->with('error', 'Une erreur s\'est produite, veuillez recommencer s\'il vous plaît.');
        }
    }

    
}
