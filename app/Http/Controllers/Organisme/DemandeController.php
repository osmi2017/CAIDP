<?php

namespace App\Http\Controllers\Organisme;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Str;
use App\Type;
use Auth;
use App\Qualite;
use App\Decision;
use App\Decisionspredefinie;
use App\Document;
use App\Demande;
use App\User;
use App\Information;
use App\Requerant;
use App\Refuscommunication;
use App\Ville;
use App\Mandant;
use App\Source;
use App\Country;
use App\Tools\DateRewrite;
use App\Tools\Globals;
use PDF;
use App\Http\Controllers\RequerantController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MainDemandeController;
use App\Http\Controllers\DecisionController;
use App\Http\Controllers\InformationController;
use App\Typesecteur;
use App\Secteur;

class DemandeController extends Controller
{

    public $Demande_Path;
    public $Mandant_Path ;
    public $Document_Path ;
    public $Decision_Path ;

    public function __construct(){
        $Globals = new Globals;
        $this->Demande_Path = $Globals::Demande_Path();
        $this->Mandant_Path = $Globals::Mandant_Path();
        $this->Document_Path = $Globals::Document_Path();
        $this->Decision_Path = $Globals::Decision_Path();
        $this->middleware('auth');
    	$this->middleware('Responsable')->except('ajaxSave', 'emailReq', 'checkOrga', 'respoInfo', 'ajaxSaveDemande', 'findAuthrespo');
    }

    public function index()
    {
        $userOrganismeId = User::whereId(Auth::user()->id)->with('responsable')->first();
        $Demande = Demande::Envoyees()->where("organisme_id",$userOrganismeId->responsable->organisme_id)->with('requerant')->get();
        
        return view('demande', compact('Demande'));
    }

    public function findRespoOrga(){
        $responsable_id = \Auth::user()->responsable_id;
        $findRespoOrga = \App\Responsable::with('organisme')->whereId($responsable_id)->first();
        return $findRespoOrga;
    }

    public function DemandeForm(Request $request, $id=null){

        $organisme_id = $this->findRespoOrga()->organisme->id;

    	$Type = Type::all();
        $Requerant = Requerant::where("email", "!=", null)->get();
    	$QualiteReq = Qualite::all();
        $QualiteOrg = Qualite::all();
        $Typesecteurs = Typesecteur::all();
        $Secteurs = Secteur::all();
        // dd($QualiteOrg);
        $Decisionspredefinie = Decisionspredefinie::first();
        $Ville = Ville::all();   
        $Ville = Ville::all(); 
        $Source = Source::all();  
        $Direction = Demande::distinct('direction')->get('direction');
        $Service = Demande::distinct('service')->get('service');
        $motifProrogationData = Demande::distinct('motifProrogation')->where('motifProrogation', '!=', null)->get('motifProrogation');
        
        if(!is_null($id)){
            $Demande = Demande::with('requerant')->with('information')->where('organisme_id', $organisme_id)->whereId($id)->first();
            if(!is_null($Demande)){
                $TypeDemande = Type::find($Demande->requerant->type_id)->first();
                $QualiteDemande = Qualite::find($Demande->requerant->qualite_id)->first();
                $Decision = Decision::where('demande_id', $id)->first();
                if(!is_null($Demande->information)){
                    $Documents = Document::where('information_id', $Demande->information->id)->get();
                    // dd($Documents);
                    $SourceInfor = Source::find($Demande->information->source_id);
                }else{
                    $Documents = null;
                    $SourceInfor = null;
                }
            }else{
                // return abort(404);
                $Demande = null; 
                $TypeDemande = null; 
                $QualiteDemande = null; 
                $Documents = null; 
                $Decision = null; 
                $SourceInfor = null; 
            }            
        }else{
            $Demande = null; 
            $TypeDemande = null; 
            $QualiteDemande = null; 
            $Documents = null; 
            $Decision = null; 
            $SourceInfor = null; 
        }
        $Countries = Country::get('local_name');
        // dd($Countries[0]->local_name);
        //dd($Secteurs);
        return view('institutions.informaticiens.ajoutDemande', compact('Type','motifProrogationData', 'QualiteReq', 'QualiteOrg', 'Decisionspredefinie', 'Requerant', 'Demande', 'TypeDemande', 'QualiteDemande', 'Documents', 'Ville', 'Source', 'Direction', 'Service', 'Decision', 'SourceInfor', 'Countries', 'Typesecteurs','Secteurs'));
    }

    public function checkOrga(Request $request){
        // dd($request);
        if(!is_null($request->organisme)){
            $organisme = \App\Organisme::where('organisme', $request->organisme)->first();
            if($organisme){

                if($request->reqIdQual){
                    $organisme['datalist'] = $this->datalistSaisine($request->reqIdQual, $organisme->id);
                }

                $Responsable = \App\Responsable::whereOrganismeId($organisme->id)->with('qualiteresponsable')->whereRi(1)->first();
                //dd($organisme->id);
                if(!$Responsable){
                    $ResponsableInfo = \App\Responsable::whereOrganismeId($organisme->id)->get();
                }else{
                    $ResponsableInfo = null;
                }
                

                $organisme['question'] = false;
                $organisme = json_decode($organisme, true);
                // dd($ResponsableInfo);
                if( !is_null($ResponsableInfo) && count(json_decode($ResponsableInfo, true))>0){
                // dd(count(json_decode($ResponsableInfo, true)));
                    ob_start();
                    ?>
                    <style type="text/css">
                        ul.well li{
                            display: block;
                            text-align: left;
                            border-bottom: dashed 1px #000;
                        }
                        [type="radio"]:not(:checked), [type="radio"]:checked {
                            position: relative !important;
                            left: 25px;
                            opacity: 1;
                            /*opacity: 1;*/
                            margin-top: 7px;
                        }
                        [type="radio"] + label::before, [type="radio"] + label::after {
                            content: '';
                            display: none;
                            position: absolute;
                            left: 0;
                            top: 0;
                            margin: 4px;
                            width: 16px;
                            height: 16px;
                            z-index: 0;
                            transition: .28s ease;
                        }
                    </style>
                    <ul class="well">
                        <?php foreach ($ResponsableInfo as $key => $value): 
                        ?>
                            <li ><input type="radio" name="ri"  class="clickRespo" value="<?php echo $value->id ;?>" id="id<?php echo $value->id ?>"> <label for="id<?php echo $value->id ?>" ><?php echo $value->nom." ".$value->prenom ?></label></li>
                        <?php endforeach ?>
                    </ul>
                    <?php
                $li = ob_get_clean();
                $content = ['content' =>$li];
                $organisme['content'] = $li;
                $organisme['question'] = true;
                }
                if(!is_null($organisme['logo'])){
                    $organisme['logo'] = asset('images/'.$organisme['logo']);
                }
                if($Responsable){
                    $organisme['respo'] = true;
                    $organisme['respoNom'] = $Responsable->nom;
                    $organisme['respoPrenom'] = $Responsable->prenom;
                    $organisme['respoContact'] = $Responsable->contact;
                    $organisme['respoEmail'] = $Responsable->email;
                    $organisme['reqIdQual'] = $request->reqIdQual;
                    $organisme['respoQualite'] = $Responsable->qualiteresponsable ? $Responsable->qualiteresponsable->qualite : null;
                    $organisme['respoID'] = $Responsable->id;
                }
                // dd($organisme);
                return json_encode($organisme);
            }
            // dd(json_encode($organisme));

        }
    }
    public function respoInfo(Request $request){
        // dd($request->id);
        if(!is_null($request->id)){
            $ResponsableInfo = \App\Responsable::whereId($request->id)->with('qualiteresponsable')->first();
            $qualite = $ResponsableInfo->qualiteresponsable->qualite;
            if($ResponsableInfo){
                $ResponsableInfo = json_decode($ResponsableInfo, true);
                $ResponsableInfo['qualite'] = $qualite;
                return json_encode($ResponsableInfo);
            }
        }
    }
    public function emailReq(Request $request){
        // dd($request->email);
        if(isset($request->email) or isset($request->contact) ){
            if(!is_null($request->email)){
                $Requerant =  Requerant::whereEmail($request->email)->with('qualite')->with('secteur')->first(); 
            }elseif(!is_null($request->contact)){
                $request->contact = str_replace(" ", "", $request->contact);
                $Requerant =  Requerant::whereContact($request->contact)->with('qualite')->with('secteur')->first(); 
            }else{
                return false;
            }
            // dd($Requerant);
            if(!is_null($Requerant)){
                $data['nom'] = $Requerant->nom;    
                $data['prenom'] = $Requerant->prenom;    
                $data['type'] = $Requerant->type_id;    
                $data['email'] = $Requerant->email;    
                $data['qualite'] = $Requerant->qualite_id;    
                $data['contact'] = $Requerant->contact;   
                $data['contact2'] = $Requerant->contact2;   
                $data['adressePostale'] = $Requerant->adressePostale;   
                $data['ville'] = $Requerant->ville;   
                $data['titre'] = $Requerant->titre;   
                $data['id'] = $Requerant->id; 
                $data['savebycaidp'] = $Requerant->savebycaidp; 
                $data['savebyorganisme'] = $Requerant->savebyorganisme; 
                $data['qualiteLib'] = $Requerant->qualite->qualite; 
                $data['secteur'] = $Requerant->secteur ? $Requerant->secteur->secteur : null; 
                // if($Requerant->type_id===4){
                //     $Mandant = Mandant::where('requerant_id', $Requerant->id)->first();
                //     $data['nomMandant'] = $Mandant->nom." ".$Mandant->prenom;
                //     $data['sexeMandant'] = $Mandant->sexe;
                //     $data['professionMandant'] = $Mandant->profession;
                //     $data['villeMandant'] = $Mandant->ville;
                // }  
                return json_encode($data);
            } 
        }
    }
    
    public function explodeName($name){
    	$name = explode(" ", $name);
    	$nomprenom['nom'] = $name[0];
    	unset($name[0]);
    	$nomprenom['prenom'] = implode(" ", $name);
    	return $nomprenom;
    }

    public function findAuthrespo(){
    	$user_id = Auth::id();
        // dd(\Auth::check());
    	$findAuthrespo = User::whereId($user_id)->with('responsable')->first();
    	return $findAuthrespo;
    }

    public function checkDedelaisDemande($ReqID, $dateSoumission, $demande_id){
        // if($request->reqId==""){
        //     $data['error'] = false;
        //     $data['dateDebut'] = "";
        //     return json_encode($data);
        // }

        $RequerantController = new RequerantController;
        $Requerant = $RequerantController->findRequerant($ReqID);

        $MainDemandeController =  new MainDemandeController;
        $findDemande = $MainDemandeController->findDemande($demande_id);


        $Qualite = Qualite::find($Requerant->qualite_id);

        $delaisrequis = $findDemande->dateProrogation ? ($Qualite->duree+30) : $Qualite->duree;
        // dd($delaisrequis);
        $newDate = $MainDemandeController->newDate($dateSoumission, $delaisrequis);
        $data['error'] = false;
        $data['dateDebut'] = $dateSoumission;
        $data['dateFin'] = $newDate;
        return json_encode($data);
        
    }

    public function checkDedelaisProrogation(Request $request){
        $Validator = \Validator::make($request->all(), [
            'motifProrogation'=>'required'
        ]);
        if($Validator->fails()){
            return $Validator->errors()->all();
        }

        // Find demande Data to get requerant ID
        $MainDemandeController = new MainDemandeController;
        $findDemande = $MainDemandeController->findDemande($request->demande_id);
        $dateDemande = explode(" ", $findDemande->dateDemande)[0];
        $checkDedelaisDemande = $this->checkDedelaisDemande($findDemande->requerant_id, $dateDemande, $request->demande_id); 
        $checkDedelaisDemande = json_decode($checkDedelaisDemande, true);
        // dd($checkDedelaisDemande);
        $request->dateProrogation = $checkDedelaisDemande['dateFin'];
        // return $request;
        return $MainDemandeController->Prorogation($request);
        // if($Prorogation){
        //     $data['error'] = false;
        //     $data['message'] = "La Prorogation a été enregistrée avec succès !";
        //     return json_encode($data);
        // }else{
        //     $data['error'] = true;
        //     $data['message'] = "Une erreur est survenue !";
        //     return json_encode($data);
        // }
    }

    public function ajaxSave(Request $request){
        return $this->InscriptionRequerant($request);
    }

    public function InscriptionRequerant($request){
        // dd("Ory");
        // return $request->nomMandataire;
        // dd($request->input());
        $request->contact = str_replace(" ", "", $request->contact);
        $validator = \Validator::make($request->all(), [
            'nom' => 'sometimes|',
            'denomination' => 'sometimes',
            'qualite_id' => 'sometimes|',
            // 'type_secteur' => 'required|',
            // 'secteur' => 'required|',
            'email' => 'email|nullable|',
            'password' => 'nullable|min:4',
            'contact' => 'required|',
        ]);
        // dd($request->contact);
        // die();
        $request->typesecteurs_id = $request->type_secteur;
        $request->secteur_id = $request->secteur;

        if(!isset($request->type_id)){
            $request->type_id = 1;
        }
        // dd($_FILES);
        if($request->type_id==4){
            $validator = \Validator::make($request->all(), [
                'nomMandataire' => 'required|',
                'prenomMandataire' => 'required|',
                'pieceMandant' => 'required|mimes:jpg,jpeg,png,pdf|max:10000',
                // 'sexeMandataire' => 'required',
                // 'professionMandant' => 'required|',
                // 'domicileMandant' => 'required',
                'emailMandant' => 'email|nullable'
            ]);
        }
        // dd($request->type_id);
       if($validator->fails()){
            return $validator->errors()->all();
       }else{
        // SAVE REQUERANT ===================
            $request->name = $request->nom;
            $RequerantController = new RequerantController;
            $UserController = new UserController;

            $request->pseudo = $request->email ? $request->email : $request->contact;

             // Check if requerant already exist
            if(isset($request->requerant_id) && !is_null($request->requerant_id)){
                $request->requerantId = $request->requerant_id;
                $saveRequerant = $RequerantController->saveRequerant($request);
            }
            elseif(!$RequerantController->checkRequerant($request->email)===true){
                 if(!$RequerantController->checkRequerantByContact($request->contact)===true){
                    $saveRequerant = $RequerantController->saveRequerant($request);
                }
            
            }else{
                $requerant = Requerant::whereEmail($request->email)->first();
                $request->requerantId = $requerant->id;
                $saveRequerant = $RequerantController->saveRequerant($request);
                // $saveRequerant = true;
            }
             // echo $saveRequerant;
                
            if($saveRequerant===true){
                 // Check if the user alreay exist
                // if(!$UserController->checkUser($request->email)===true){
                //     $UserController->createUser($request);
                // }

                $data['error'] = false;
                $data['message'] = "Demandeur enregistré avec succès !";
                $RequerantController = new RequerantController;
                $RequerantController = $RequerantController->DernierRequerant();
                $data['reqId'] = $request->requerantId  ? $request->requerantId  : $RequerantController->id;

                // ================ Save Mandant ===============================
                if($request->mandant=="oui"){

                    $Mandant = array();
                    $Mandant['nom']= $request->nomMandataire;
                    $Mandant['prenom'] = $request->prenomMandataire;
                    $Mandant['sexe'] = isset($request->sexeMandataire) ? $request->sexeMandataire : null;
                    $Mandant['profession'] = isset($request->professionMandant) ? $request->professionMandant : null;
                    $Mandant['ville'] = isset($request->domicileMandant) ? $request->domicileMandant : null;
                    $Mandant['type_mandant'] = isset($request->type_mandant) ? $request->type_mandant : null;
                    $Mandant['denommination'] = isset($request->denommination) ? $request->denommination : null;
                    $Mandant['pieceMandant'] =  $this->uploadFiles($_FILES['pieceMandant'], $this->Mandant_Path);
                    \Session::put($Mandant);
                    
                }
                // ================ Save Mandant ===============================
            
            
            }else{
                
                $data['error'] = true;
                $data['message'] = "Une erreur s'est glissée, veuillez recommencer s'il vous plaît !";
            }
            return json_encode($data);
       }
    }

    public function ajaxSaveDemande(Request $request){
        $validator = \Validator::make($request->all(), [
            'libelle'=>'required',
            'dateDemande'=>'sometimes|required|date'
        ]);
        
        //dd($request->allFiles());
        if($validator->fails()){
            return $validator->errors()->all();
        }
        // if(trim($_POST['description'])=="" && $_FILES['scane']['name']==""){
        //     $data['error'] = true;
        //     $data['message'] = "Veuillez ajouter une description ou un télécharger un document scané !";
        //     return json_encode($data);
        // }
        // // return $_POST['scane']['name'];
        // if(!$_FILES['scane']['name']==""){
        //     $nom =  $this->uploadFiles($_FILES['scane'], $this->Demande_Path);
        // }else{
        //     $nom = null;
        // }
        // if($validator->fails()){
        //     return $validator->errors()->all();
        // }

        // ========================== SAVE MANDANT ======================================
        // dd(\Session::get('nom'));
        $allFiles = $request->allFiles(); // Get all uploaded files
            $allDocumentNames = $request->input('document_names'); // Get all document names
            //  dd($allFiles );
            $DemandeController = new MainDemandeController;
            $lastDemandeID = $DemandeController->lastDemande()->id;
            $demandeID = $lastDemandeID + 1; // Increment the last ID by 1

            if ($allFiles && $allDocumentNames) {
                foreach ($allFiles as $fieldName => $documents) {
                    // Ensure that $documents is an array (it could be an array of files or a single file)
                    if (is_array($documents)) {
                        foreach ($documents as $index => $file) {
                            $originalName = $file->getClientOriginalName(); // Original file name
                            $originalExtension = $file->getClientOriginalExtension();
                            $customName = $allDocumentNames[$index] ?? $originalName; // Custom name or original name
                            $finalName = $demandeID .'_'.$customName.'.'.$originalExtension ;
                            //dd($allDocumentNames );
                            // Store the file with the custom name
                            $filePath = $file->storeAs('admincaidp/demandes', $finalName,'public');
                        }
                    } else {
                        // Handle case where a single file is uploaded, not an array of files
                        $originalName = $documents->getClientOriginalName(); 
                        $originalExtension = $documents->getClientOriginalExtension();
                        $customName = $allDocumentNames[0] ?? $originalName; 
                        $finalName = $$demandeID .'_'.$customName;
                        //dd($finalName);
                        // Store the file with the custom name
                        $filePath = $documents->storeAs('admincaidp/demandes', $finalName,'public');
                    }
                }
            }

                if(\Session::get('nom')){
                    $Mandant = new Mandant;
                    $Mandant->nom = \Session::get('nom');
                    $Mandant->prenom = \Session::get('prenom');
                    $Mandant->sexe = \Session::get('sexe');
                    $Mandant->profession = \Session::get('profession');
                    $Mandant->ville = \Session::get('ville');
                    $Mandant->pieceMandant =  \Session::get('pieceMandant');
                    $Mandant->denommination = \Session::get('denommination');
                    $Mandant->type_mandant = \Session::get('type_mandant');
                    $RequerantController = new RequerantController;
                    $saveMandant = $RequerantController->saveMandant($Mandant);
                    if($saveMandant){
                        \Session::forget('nom', 'prenom', 'sexe', 'pieceMandant', 'type_mandant', 'denommination', 'ville', 'profession');
                        $MandantID = $RequerantController->lastMandat();
                    }else{
                        $MandantID = null;
                    }
                }else{
                    $MandantID = null;
                }
                // dd($MandantID);
                // dd($saveMandant);
                // dd($saveMandant);
        // ========================== SAVE MANDANT ======================================
        // return $MandantID;die();
                // dd($this->findAuthrespo());
        $organisme_id = $this->findAuthrespo()->responsable ? $this->findAuthrespo()->responsable->organisme_id: $_POST['orga_id'];

        

        $data['libelle'] = $_POST['libelle'];
        $data['dateDemande'] = $_POST['dateDemande'];
        $data['description'] = $_POST['description'];
        // $data['scane'] = $nom;
        $data['requerant_id'] = $_POST['reqId'];
        $data['organisme_id'] = $organisme_id;
        $data['direction'] = $_POST['direction'];
        $data['service'] = $_POST['service'];
        $data['brouillon'] = 0;
        $data['mandant_id'] = $MandantID;
        $data['savebycaidp'] = isset($_POST['savebycaidp']) ? 1 : null ;
        $data['savebyorganisme'] = isset($_POST['savebyorganisme']) ? 1 : null ;
        $data['autosave'] = isset($_POST['autosave']) ? 1 : null ;

        if($_POST['dem_idHide']){
            $data['dem_idHide'] = $_POST['dem_idHide'];
        }

        $object = new \stdClass();
        foreach ($data as $key => $value)
        {
            $object->$key = $value;
        }
        // dd($_POST);
        $request->organisme_id = $organisme_id;
        
        $SoumettreDemande = $DemandeController->SoumettreDemande($object);
        if($SoumettreDemande==true){
            $data['demId'] = $_POST['dem_idHide'] ? $_POST['dem_idHide'] : $DemandeController->lastDemande()->id;
            $data['error'] = false;
            $data['message'] = "La demande a tété enregistré avec succès !";
            return json_encode($data);
        }else{          
            $data['error'] = true;
            $data['message'] = "Une erreur est survenue lors de l'enregistrement, veuillez recommencer svip !";
            return json_encode($data);
        }


            
    }

    public function datalistSaisine($requerant_id, $organisme_id){
        $Demande = Demande::whereOrganismeId($organisme_id)->whereRequerantId($requerant_id)->get();
        if($Demande->count()>0){
            ob_start();
            
            foreach ($Demande as $key => $value): 
            ?>
                 <option><?php echo $value->libelle; ?></option>

            <?php endforeach ;

            $Demande = ob_get_clean();
        }else{
            $Demande = null;
        }
        // dd($Demande);
        return $Demande;
    }

    public function ajaxSaveDocs(Request $request){
        if(is_null($_POST['demande_idHidden'])){
            $data['error'] = true;
            $data['message'] = "Une erreur est survenue lors de l'enregistrement, veuillez recoommencer !";
            return json_encode($data);
        }
        if(!isset($_POST['transmission'])){
            $data['error'] = true;
            $data['message'] = "Veuillez sélectionner un mode de transmission !";
            return json_encode($data);
        }
        $validator = \Validator::make($request->all(), [
            'libelleInfo'=>'required',
            'information'=>'',
            // 'source'=>'required',
            'dateCommunication'=>'required|date',
            'documents.*'=>'mimes:pdf,jpeg,jpg,png|max:10000'
        ]);
        if($validator->fails()){
            return $validator->errors()->all();
        }

        $InformationController = new InformationController;
        $MainDemandeController = new MainDemandeController;

        //var_dump($_FILES['documents']['name'][0]);
        if($_POST['information']=="" && $_FILES['documents']['name'][0]==""){

            if(isset($_POST['information_id']) && $_POST['information_id']!=""){
                $findInform = $InformationController->findInformation($_POST['information_id']);
                $findDocuments = $InformationController->findDocuments($_POST['information_id']);
                // dd($findInform);
                $_POST['information'] = $findInform->information;

            }
            // else{
            //     $data['error'] = true;
            //     $data['message'] = "Veuillez ajouter une information ou un télécharger un documents !";
            //     return json_encode($data);
            // }            
        }
        
        // dd($_POST);
        //  Retrieve Informations
        $data['libelleInfo'] = $_POST['libelleInfo'];
        $data['information'] = $_POST['information'];
        $data['dateCommunication'] = $_POST['dateCommunication'];
        $data['public'] = $_POST['public'];
        $data['demande_id'] = $_POST['demande_idHidden'];
        
        // Save source before Informations
        $source_id =  null;
        if(!is_null($_POST['source'])){
            $Source = Source::where('source', $_POST['source'])->first();
            if($Source){
                $source_id = $Source->id;
            }else{
                $Source = new Source;
                $Source->source = $_POST['source'];
                if($Source->save()){
                    $source_id = Source::orderBy('id', 'desc')->first()->id;
                }
            }
        }

        $object = new \stdClass();
        $data['source_id'] = $source_id;
        foreach ($data as $key => $value)
        {
            $object->$key = $value;
        }
  

        $MainDemandeController = new MainDemandeController;

        if(isset($_POST['information_id']) && $_POST['information_id']!=null){            
            $EnregistrerInformation = $InformationController->EnregistrerInformation($object, $_POST['information_id']);
            $Inform_id = $_POST['information_id'] ;
        }else{
            $EnregistrerInformation = $InformationController->EnregistrerInformation($object);
            $Inform_id = $InformationController->lastInform()->id;
        }

        if($EnregistrerInformation===true && $_FILES['documents']['name'][0]!=""){
        $MainDemandeController->favorable($request->satisfation, $request->demande_idHidden, $request->transmission);
            // Save Documents
            $AjouterDocumentDemande = $MainDemandeController->AjaxPostDocSave($_FILES['documents'], $Inform_id, $this->Document_Path,  $request->nomFichier);   
            if($AjouterDocumentDemande==true){
                $data['error'] = false;
                $data['message'] = "Le document a été enregistré avec succès !";
                $data['Inform_id'] = $Inform_id;
                return json_encode($data);
            }else{
                $data['error'] = true;
                $data['message'] = "Une erreur est survenue lors de l'enregistrement, veuillez recommencer svp. !";
                return json_encode($data);
            }
        }elseif($EnregistrerInformation===true){

            $MainDemandeController->favorable($request->satisfation, $request->demande_idHidden, $request->transmission);
                $data['error'] = false;
                $data['message'] = "L'information a été enregistrée avec succès !";
                $data['Inform_id'] = $Inform_id;
                return json_encode($data);  
        }else {
                $data['error'] = true;
                $data['message'] = "Une erreur est survenue lors de l'enregistrement, veuillez recommencer svp. !";
                return json_encode($data);
        }
            
    }

    public function ajaxSaveDecision(Request $request){
        // return ($request);

        // Save Décison
        $Validator = \Validator::make($request->all(), [
            'decison' => 'nullable',
            'notificationFile' => 'sometimes|required|mimes:pdf,png,jpg|max:10000',
        ]);

        if($Validator->fails()){
            return $Validator->errors()->all();
        }

        $Valide = \Validator::make($request->all(), [
            'demande_idHidden' => 'required|int',
        ]);

        $request->demande_id = $request->demande_idHidden;

        if($Valide->fails()){
            $data['error'] = true;
            $data['message'] = "Une information est manquante !";
            return json_encode($data);
        }
        if($request->isDecision!="on"){
            $request->isDecision = false;
            $notificationFile = null;
        }else{
            $request->decison = $request->decison;
            $request->isDecision = true;
            if(isset($_FILES['notificationFile']) && !empty($_FILES['notificationFile']['name']!="")){
                $notificationFile = $this->uploadFiles($_FILES['notificationFile'], $this->Decision_Path );
            }
        }
                // dd($notificationFile);
        // dd($request->isDecision);
        // dd($request->isDecision);
        

        $DecisionController = new DecisionController;
        $MainDemandeController = new MainDemandeController;
        $Decision = new Decision;
        $Decision->decison = $request->decison;        
        $Decision->etat = 1;
        $Decision->isDecision = $request->isDecision;
        $Decision->notificationFile = isset($notificationFile) ? $notificationFile : null;
        $Decision->demande_id = $request->demande_id;
        $Decision->date_envoie = now();
        if(isset($request->decison_id) && $request->decison_id!=""){
            $Decision->decison_id = $request->decison_id;
        }else{
            $Decision->decison_id = null;
        }

        // ==========================================================================
        // Valider et envoyer
            $DecisionFound = Decision::where('demande_id', $request->demande_id)->first();
            // dd($DecisionFound);
            if($DecisionFound && $DecisionFound->dateValidation!=null){
                $Decision->dateValidation = $DecisionFound->dateValidation;
                $Decision->valide_par_rh = $DecisionFound->valide_par_rh;
            }else{
                    $Decision->dateValidation = now();
                    $Decision->valide_par_rh = $this->findAuthrespo()->name;
                
            }
        // ==========================================================================
        

            $Decision->envoye = 1;
            $Decision->date_envoie = now();         
            $Decision->etat = 1;
            $Decision->valide_par_rh = $this->findAuthrespo()->name;
            $Decision->dateValidation = now();            

         ($DecisionFound && $DecisionFound->propose_par_ri!=null)  ? $Decision->propose_par_ri = $DecisionFound->propose_par_ri : $Decision->propose_par_ri = $this->findAuthrespo()->name;

        // DECISION FAVORABLE
        // dd($request->decison_id);
        $EnregistrerDecision = $DecisionController->EnregistrerDecision($Decision);

        if($EnregistrerDecision==true){
            if($request->decison_id!=""){
                $decison_id = $DecisionController->lastDescision()->id;
            }else{
                $decison_id = $DecisionController->findDescision($Decision->demande_id)->id;
            }
            // $MainDemandeController->favorable($request->satisfation, $request->demande_id);
            $data['error'] = false;
            $data['decison_id'] = $decison_id;
            $data['message'] = "Décison ajoutée avec succès !";
            return json_encode($data);
        }
                
    }

    public function loadSignature(){
        
    }

    

    function uploadFiles($files, $path){
        $name = explode(".", $files['name'])[0];
        $ext  = explode(".", $files['name'])[1];
        $nom = Str::Slug($name);
        $nom = $nom."_".date("ymdis");
        $path = public_path().$path;
        (!is_dir($path)) ? mkdir($path) : $path;
        // dd(move_uploaded_file($files['tmp_name'],$path.$nom.".".$ext));
        move_uploaded_file($files['tmp_name'],$path.$nom.".".$ext);
        return $nom.".".$ext;
    }

    function uploadFilesDoc($files, $path){
        $name = explode(".", $files['name'])[0];
        $ext  = explode(".", $files['name'])[1];
        $nom = Str::Slug($name);
        $nom = $nom."_".date("ymdis");
        $path = public_path().$path;
        (!is_dir($path)) ? mkdir($path) : $path;
        move_uploaded_file($files['tmp_name'],$path.$nom.".".$ext);
        return $nom.".".$ext;
    }

    public function imprimer(Request $request){
         \Session::forget('imprimer');
        \Session::put('imprimer', $request->imprimer);
        return "OK";
    }

    public function impression(){
        // dd(\session('imprimer'));
        if(\session('imprimer')){
            // $pdf = PDF::loadHTML(\Session('imprimer'))->save('myfile.pdf');
            $name = "Notification-".date('Ymdhis');
            return PDF::loadView('pdf.print')->download($name.'.pdf');
            // return view('pdf.print');

        }
    }


    public function prevDecision(Request $request){
        \Session::forget('text');
        \Session::put('text', $request->text);
        return "OK";
    }



    

    

    
    

    
}
