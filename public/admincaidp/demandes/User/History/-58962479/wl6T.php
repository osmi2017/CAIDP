<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Saisine;
use Illuminate\Database\Eloquent\Builder;
use App\Requerant;
use App\Qualite;
use App\Typesecteur;
use App\Secteur;
use App\Type;
use App\Qualiteresponsable;
use App\Organisme;
use App\Saisinepredefinie;
use App\Facilitation;
use App\Contentieu;
use App\Responsable;
use App\Decisioncaipdp;
use App\Decisionpredefiniescaidp;
use App\Param;
use App\User;
use App\Messag;
use App\Http\Controllers\Organisme\DemandeController;
use App\Demande;
use App\Notifications\AlertOganismeSaisine;

use Str;
use PDF;

class adminController extends Controller
{
	/**
	*
	*
	*
	*/ 

    public function __construct(){
        $this->middleware('Administrateur');
    }

    public function index(){
    	
        $SaisinesCloturees = Saisine::whereEtat(1)->count(); 
        $SaisinesEnCours = Saisine::whereEtat(null)->count();
        $Ampliations = \App\Demande::count();

    	$Saisines = \DB::SELECT("SELECT *, saisines.etat as etat_saisine, saisines.id as id_saisine, saisines.created_at AS saisineDate FROM saisines, demandes, requerants, organismes WHERE organismes.id = demandes.organisme_id AND saisines.demande_id = demandes.id AND demandes.requerant_id = requerants.id ORDER BY saisines.id DESC ");
    	// dd($Saisines[0]->etat_saisine);
    	return view('admin.home', compact('Saisines', 'SaisinesCloturees', 'SaisinesEnCours','Ampliations'));
    }

    public function checkFacilitation($saisine_id){
        return Facilitation::whereSaisineId($saisine_id)->first();
    }

    public function checkContentieu($saisine_id){
        return Contentieu::whereSaisineId($saisine_id)->first();
    }

    public function displayDecision($id){
        $Saisine = Saisine::whereId($id)->with('demande')->with('decisioncaipdp')->with('docsaisine')->with('contentieu')->with('docsaisine')->with('facilitation')->first();
        return view('admin.include.decision', compact('Saisine'))->render();
    }

    public function displayPreloadData($id){
        $Saisine = Saisine::whereId($id)->with('demande')->with('decisioncaipdp')->with('docsaisine')->with('contentieu')->with('docsaisine')->with('facilitation')->first();
        return view('admin.include.preloadIframe', compact('Saisine'))->render();
    }

    public function displayFacilitationList($saisine_id){
        $Saisine = Saisine::find($saisine_id);
        return view('admin.include.facilitationList', compact('Saisine'))->render();
    }

    public function displayContentieuList($saisine_id){
        $Saisine = Saisine::find($saisine_id);
        $contentieuId = $Saisine->contentieu[0]->id;
        $messages = Messag::with('contentieu')->where('contentieu_id', $contentieuId)->get();
       
        return view('admin.include.contentieuList', compact('Saisine','messages'))->render();
    }

    


    

    public function newSaisine(Requerant $request, $id=null){

        // ========== PREDEFINIE ======================
        $Saisine = null;
        $RespoInfo = null;
        $Decisioncaipdp = null;
        $contentieuId = null;
        $messages = null;
        // ========== PREDEFINIE ======================
        if(!is_null($id)){
            $Saisine = Saisine::whereId($id)->with('demande')->with('decisioncaipdp')->with('docsaisine')->with('contentieu')->with('docsaisine')->with('facilitation')->first();
            if($Saisine){
                $Decisioncaipdp = Decisioncaipdp::whereSaisineId($Saisine->id)->first();
                $RespoInfo = \App\Responsable::where('organisme_id', $Saisine->demande->organisme->id)->whereRi(1)->first();
                if(!$RespoInfo){
                $RespoInfo = \App\Responsable::where('organisme_id', $Saisine->demande->organisme->id)->first();

                }
            }
           
            if(sizeof($Saisine->contentieu)!=0){
            $contentieuId = $Saisine->contentieu[0]->id;
            $messages = Messag::all();
            }
            // dd($Saisine->contentieu);
        }

    	$Type = Type::all();
        // $Requerant = Requerant::where("email", "!=", null)->get();
        $Saisinepredefinies = Saisinepredefinie::all();
        // dd($Saisinepredefinies);
    	$QualiteReq = Qualite::all();
        $QualiteOrg = Qualite::all();
        $Typesecteurs = Typesecteur::all();
        $Secteurs = Secteur::all();
        $Organisme = Organisme::all();
        $Decisionpredefiniescaidp = Decisionpredefiniescaidp::first();
        $Param = Param::first();
        $actionFacilitation = Facilitation::distinct('actionFacilitation')->get('actionFacilitation');
        $actionContentieu = Contentieu::distinct('actionContentieu')->get('actionContentieu');
        // dd($Decisionpredefiniescaidp);
        
        $Qualiteresponsable = Qualiteresponsable::distinct('qualite')->get('qualite');
        
        $demande_doc[] =[];
        if($Saisine){
        $demandeId = $Saisine->demande->id;
        $directory = public_path('admincaidp/demandes');
        dd($directory);
        $files = glob($directory . '/' . $demandeId . '*');
        
        
        foreach ($files as $file) {
            $demande_doc[] = basename($file);
        }
    }
    	return view('admin.newSaisine', compact('Type', 'Saisinepredefinies', 'QualiteOrg', 'QualiteReq', 'Secteurs', 'Typesecteurs', 'Qualiteresponsable', 'Organisme', 'Decisionpredefiniescaidp', 'Param', 'Saisine', 'RespoInfo', 'actionFacilitation', 'actionContentieu', 'Decisioncaipdp','messages','demande_doc'));
    }

    public function saveDemandeur(Request $request){
        return $DemandeController->InscriptionRequerant($request);
    }

    public function saveSaisine(Request $request){
        // dd($_FILES);
        $validator = \Validator::make($request->all(), [
            'description' => 'required',
            'motif' => 'required',
            'demande_id' => 'required',
            'description' => 'nullable',
            'dateSaisine' => 'required|date',
            'auteurSaisine' => 'required|',
            
        ]);

        if($validator->fails()){
            return $validator->errors()->all();
        }
        $allFiles = $request->allFiles(); // Get all uploaded files
        $allDocumentNames = $request->input('document_names1');
        
        $Saisinepredefinie = Saisinepredefinie::where('typeSaisine', $request->motif);
        $motif = $request->motif;

        if(isset($request->saisine_id)){
            $Saisine = Saisine::find($request->saisine_id);
        }else{
            $Saisine = new Saisine;
        }
        // dd($request->input());
        if($request->savebycaidp){
            $Saisine->description = $request->description;
            $Saisine->motif = $motif;
            $Saisine->demande_id = $request->demande_id ;
            $Saisine->dateSaisine = $request->dateSaisine;
            $Globals =  new \App\Tools\Globals;
            $Saisine->numSaisine = $Globals->numeroSaisine();
            $Saisine->auteurSaisine = $request->auteurSaisine;
        }
        $Saisine->resume = trim($request->resume) ? trim($request->resume) : null;
        $Saisine->savebycaidp = isset($request->savebycaidp) ? 1 : null;
        if($Saisine->save()){
            $saisine_id = $request->saisine_id ? $request->saisine_id : $this->lastSaisine()->id;
            $this->checkDemandeLiquide($request->demande_id, $request->motif);
            $demande = Demande::find($request->demande_id);          
            $authenticatedUser = Auth::user();
            $requerant = User::find($demande->requerant_id);
            $organisme = $demande->organisme_id;
                if ($requerant && $organisme) {
                                        
                    $user_organisme = User::whereHas('responsable', function ($query) use ($organisme) {
                        $query->where('organisme_id', $organismeId);
                    })->get();
                    $requerant->notify(new AlertOganismeSaisine($demande, $Saisine,$authenticatedUser));
                    $user_organisme->notify(new AlertOganismeSaisine($demande, $Saisine,$authenticatedUser));
                }
            if(!empty($_FILES['documents'])){
                $this->saveDocsaisine($_FILES, $saisine_id);
            }
            $data['error'] = false;
            $data['saisine_id'] = $saisine_id;
            $data['message'] = "La saisine a été enregistrée avec succès !";
            // dd($data);
            $saisineID = $saisine_id;
            if ($allFiles && $allDocumentNames) {
                
                foreach ($allFiles as $fieldName => $documents) {
                    // Ensure that $documents is an array (it could be an array of files or a single file)
                    if (is_array($documents)) {
                        foreach ($documents as $index => $file) {
                            $originalName = $file->getClientOriginalName(); // Original file name
                            $originalExtension = $file->getClientOriginalExtension();
                            $customName = $allDocumentNames[$index] ?? $originalName; // Custom name or original name
                            $finalName = $saisineID .'_'.$customName.'.'.$originalExtension ;
                            //dd($allDocumentNames );
                            // Store the file with the custom name
                            //dd($originalName);
                            if ($file->isValid()) {
                                // Proceed with storing the file
                                $filePath = $file->storeAs('admincaidp/doc_saisines', $finalName, 'public');
                            }
                        }
                    } else {
                        // Handle case where a single file is uploaded, not an array of files
                        $originalName = $documents->getClientOriginalName(); 
                        $originalExtension = $documents->getClientOriginalExtension();
                        $customName = $allDocumentNames[0] ?? $originalName; 
                        $finalName = $saisineID .'_'.$customName;
                        //dd($finalName);
                        // Store the file with the custom name
                        $filePath = $documents->storeAs('admincaidp/doc_saisines', $finalName,'public');
                    }
                }
            }
            return json_encode($data);


        }
    }

    public function lastSaisine(){
        return Saisine::orderBy('id', 'DESC')->first();
    }

    public function saveFacilitation(Request $request){
        $validator = \Validator::make($request->all(), [
            'dateFacilitation' => 'required|date',
            'saisine_id' => 'required',
            'docFacilitation.0' => 'mimes:pdf,jpeg,jpg,png',
        ]);

        if($validator->fails()){
            return $validator->errors()->all();
        }

        if(isset($request->facilitation_id)){
            $Facilitation = Facilitation::find($request->facilitation_id);
        }else{
            $Facilitation = new Facilitation;
        }
        $Facilitation->dateFacilitation = $request->dateFacilitation;
        $Facilitation->actionFacilitation = $request->actionFacilitation;
        $Facilitation->suite = $request->suite;
        $Facilitation->saisine_id = $request->saisine_id;

        if($Facilitation->save()){
            $lastFacilitation = $this->lastFacilitation();
            $this->saveDocFacilitation($_FILES, $lastFacilitation->id);
            $allFacilitationSaisine = $this->allFacilitationSaisine($request->saisine_id);
            $data['error'] = false;
            $data['message'] = "La facilitation a été ajoutée avec succès";
            
            $data['content'] = $this->displayFacilitationList($request->saisine_id);
            return json_encode($data);
        }
    }

    public function lastFacilitation(){
         return Facilitation::orderBy('id', 'DESC')->first();
    }

    public function saveDecision(Request $request){
        $validator = \Validator::make($request->all(), [
            'decisionFile*0' => 'mimes:pdf, png, jpeg,',
            'decision' => 'required',
            'saisine_id' => 'required',
            'typeDecision' => 'required'
        ]);

        if($validator->fails()){
            return $validator->errors()->all();
        }

        $DemandeController = new DemandeController;
        $Globals =  new \App\Tools\Globals;
        $CAIDP_Decision_Path =  $Globals::CAIDP_Decision_Path();
        // $decisionFile = $DemandeController->uploadFiles($_FILES['decisionFile'], $CAIDP_Decision_Path);

        if($request->decision_id && !is_null($request->decision_id)){
            $Decisioncaipdp = Decisioncaipdp::find($request->decision_id);
        }else{
            $Decisioncaipdp = new Decisioncaipdp;
        }
        
        // dd($request->saved);    

        $Decisioncaipdp->typeDecision = $request->typeDecision;
        $Decisioncaipdp->decision = $request->decision;
        $Decisioncaipdp->decisionFile = null;
        $Decisioncaipdp->saisine_id = $request->saisine_id;
        $etat = $request->saved == 1 ? 2 : 1;
        $Decisioncaipdp->dateEnvoie = $request->saved == 1 ? null : now();
        $Decisioncaipdp->etat = $etat;
        if($Decisioncaipdp->save()){
            $this->closeSaisine($request->saisine_id, $etat);
            $decision_id = $request->decision_id ? $request->decision_id : $this->lasDecision()->id;
            if(isset($_FILES) && !empty($_FILES)){
                $this->saveDecisioncaipdpsfile($_FILES, $decision_id, $request->nomFichier);
            }
            $data['error'] = false;
            if($request->saved==1){
            $data['content'] = $this->displayDecision($request->saisine_id);
                $data['message'] = "La décision a été enregistrée avec succès.";
            }else{
            $data['content'] = false;
                $data['message'] = "La décision a été enregistrée avec succès. Cette saisine est désormais clôturée";
            }
            $data['decision_id'] = $decision_id;
            return json_encode($data);
        }else{
            $data['error'] = true;
            $data['message'] = "Une erreur est apparue lors de l'enregistrement.";
            return json_encode($data);
        }
        
    }

    public function lasDecision(){
        return Decisioncaipdp::orderBy('id', 'DESC')->limit(1)->first();
    }
    public function closeSaisine($saisine_id, $etat){
        $Saisine = Saisine::find($saisine_id);
        $Saisine->etat = $etat;
        $Saisine->save();
    }

    public function saveContentieu(Request $request){
        $validator = \Validator::make($request->all(), [
            'dateContentieux' => 'required|date',
            // 'argument' => 'required',
            'saisine_id' => 'required'
        ]);

        if($validator->fails()){
            return $validator->errors()->all();
        }

        if(isset($request->contentieu_id)){
            $Contentieu = Contentieu::find($facilitation_id);
        }else{
            $Contentieu = new Contentieu;
        }
        $Contentieu->dateContentieux = $request->dateContentieux;
        $Contentieu->argument = $request->argument;
        $Contentieu->actionContentieu = $request->actionContentieu;
        $Contentieu->saisine_id = $request->saisine_id;

        if($Contentieu->save()){
            $lastContentieu = $this->lastContentieu();
            $contentieu_id = $request->contentieu_id ? $request->contentieu_id : $lastContentieu->id;
            $allContentieuxSaisine = $this->allContentieuxSaisine($request->saisine_id);
            $this->saveDocContentieu($_FILES, $contentieu_id);
            $data['error'] = false;
            $data['message'] = "L'argument en réplique a été ajouté avec succès";
            
            $data['content'] = $this->displayContentieuList($request->saisine_id);
            return json_encode($data);
        }
    }

    public function allContentieuxSaisine($id){
        return Contentieu::whereSaisineId($id)->orderBy('dateContentieux', 'ASC')->get();
    }
    public function allFacilitationSaisine($id){
        return Facilitation::whereSaisineId($id)->with('docfacilitation')->orderBy('dateFacilitation', 'ASC')->get();
    }
    

    public function lastContentieu(){
         return Contentieu::orderBy('id', 'DESC')->first();
    }

    public function checkDemandeLiquide($demande_id, $motif){
        $Demande = \App\Demande::find($demande_id);
        if($Demande->savebycaidp == 1){
            $Motif = $this->checkMotif($motif);
            $Demande->favorable = $Motif['favorable'];
            $Demande->liquide = $Motif['liquide'];
            $Demande->motifliquide = $Motif['motifliquide'];
            $Demande->etat = 1;
            $Demande->dateliquide = now();
        }
    }

    public function checkMotif($motif){
        $Saisinepredefinies = \App\Saisinepredefinie::where('typeSaisine',$motif)->first();
        if($Saisinepredefinies){
            switch ($Saisinepredefinies->codeSaisine) {
                case 'non_com':
                    $data['favorable'] = 1;
                    $data['liquide'] = 1;
                    $data['motifliquide'] = 2;
                    return $data;
                    break;
                case 'refus':
                    $data['favorable'] = 1;
                    $data['liquide'] = 1;
                    $data['motifliquide'] = 1;
                    return $data;
                    break;
                case 'doc_no_conform':
                    $data['favorable'] = 3;
                    $data['liquide'] = 1;
                    $data['motifliquide'] = 1;
                    return $data;
                    break;
                case 'com_part':
                    $data['favorable'] = 2;
                    $data['liquide'] = 1;
                    $data['motifliquide'] = 1;
                    return $data;
                    break;
                case 'demande_avis':
                    $data['favorable'] = null;
                    $data['liquide'] = null;
                    $data['motifliquide'] = null;
                    return $data;
                    break;
                                
                default:
                    $data['favorable'] = 1;
                    $data['liquide'] = 1;
                    $data['motifliquide'] = 3;
                    return $data;
                    break;
            }
        }else{
            return 1;
        }
    }

    public function saveImageFile(Request $request){
        if($request->type=="facilitation"){
            $saveImageFile = \App\Docfacilitation::find($request->id);
        }elseif($request->type=="saisine"){
            $saveImageFile = \App\Docsaisine::find($request->id);
        }elseif($request->type=="contentieu"){
            $saveImageFile = \App\Doccontentieu::find($request->id);
        }elseif($request->type=="decision"){
            $saveImageFile = \App\Decisioncaipdpsfile::find($request->id);
        }
        
        $saveImageFile->nomFichier = $request->nomFichier;
        $saveImageFile->save();
    }

    public function previsualiser(Request $request){
        return PDF::loadHTML($request->text)->stream($name.'.pdf');
    }

    public function saveDocsaisine($donnees, $saisine_id, $path="docsaisines/"){

        $path = public_path()."/".$path;
        $nbre = 0;
        for($i=0; $i<count($donnees['documents']['name']); $i++){
            // echo $i;
            $explode = explode(".", $donnees['documents']['name'][$i]);
            if(count($explode)!=2){
                return false;
            }

            $name = explode(".", $donnees['documents']['name'][$i])[0];
            $ext  = explode(".", $donnees['documents']['name'][$i])[1];
            $nom = Str::Slug($name);
            $nom = $nom."_".date("ymdis").".".$ext;

            $Docsaisine = new \App\Docsaisine;
            $Docsaisine->document = $nom;
            $Docsaisine->saisine_id = $saisine_id;
            $Docsaisine->save();
        // dd($path.$nom);

            // dd(move_uploaded_file($donnees['documents']['tmp_name'][$i],$path.$nom));
            (!is_dir($path)) ? mkdir($path) : $path;
            if(move_uploaded_file($donnees['documents']['tmp_name'][$i],$path.$nom)){
                $nbre++;
            }
        }

        if($nbre==count($donnees['documents']['name'])){
            return true;
        }else{
            return false;
        }
    }


    public function saveDocFacilitation($donnees, $facilitation_id, $path="docfacilitation/"){

        $path = public_path()."/".$path;
        $nbre = 0;
        for($i=0; $i<count($donnees['docFacilitation']['name']); $i++){
            // echo $i;
            $explode = explode(".", $donnees['docFacilitation']['name'][$i]);
            if(count($explode)!=2){
                return false;
            }

            $name = explode(".", $donnees['docFacilitation']['name'][$i])[0];
            $ext  = explode(".", $donnees['docFacilitation']['name'][$i])[1];
            $nom = Str::Slug($name);
            $nom = $nom."_".date("ymdis").".".$ext;

            $saveDocFacilitation = new \App\Docfacilitation;
            $saveDocFacilitation->document = $nom;
            $saveDocFacilitation->facilitation_id = $facilitation_id;
            $saveDocFacilitation->save();
            (!is_dir($path)) ? mkdir($path) : $path;
            if(move_uploaded_file($donnees['docFacilitation']['tmp_name'][$i],$path.$nom)){
                $nbre++;
            }
        }

        if($nbre==count($donnees['docFacilitation']['name'])){
            return true;
        }else{
            return false;
        }
    }

    public function saveDocContentieu($donnees, $contentieu_id, $path="docContentieu/"){

        $path = public_path()."/".$path;
        $nbre = 0;
        for($i=0; $i<count($donnees['docContentieu']['name']); $i++){
            // echo $i;
            $explode = explode(".", $donnees['docContentieu']['name'][$i]);
            if(count($explode)!=2){
                return false;
            }

            $name = explode(".", $donnees['docContentieu']['name'][$i])[0];
            $ext  = explode(".", $donnees['docContentieu']['name'][$i])[1];
            $nom = Str::Slug($name);
            $nom = $nom."_".date("ymdis").".".$ext;

            $Doccontentieu = new \App\Doccontentieu;
            $Doccontentieu->document = $nom;
            $Doccontentieu->contentieu_id = $contentieu_id;
            $Doccontentieu->save();
            (!is_dir($path)) ? mkdir($path) : $path;
            if(move_uploaded_file($donnees['docContentieu']['tmp_name'][$i],$path.$nom)){
                $nbre++;
            }
        }
        if($nbre==count($donnees['docContentieu']['name'])){
            return true;
        }else{
            return false;
        }
    }

    public function saveDecisioncaipdpsfile($donnees, $decisioncaipdp_id, $nomFichier, $path="decisionFile/"){

        $path = public_path()."/".$path;
        $nbre = 0;
        for($i=0; $i<count($donnees['decisionFile']['name']); $i++){
            // echo $i;
            $explode = explode(".", $donnees['decisionFile']['name'][$i]);
            if(count($explode)!=2){
                return false;
            }

            $name = explode(".", $donnees['decisionFile']['name'][$i])[0];
            $ext  = explode(".", $donnees['decisionFile']['name'][$i])[1];
            $nom = Str::Slug($name);
            $nom = $nom."_".date("ymdis").".".$ext;

            $Decisioncaipdpsfile = new \App\Decisioncaipdpsfile;
            $Decisioncaipdpsfile->file = $nom;
            $Decisioncaipdpsfile->nomFichier = $nomFichier[$i];
            $Decisioncaipdpsfile->decisioncaipdp_id = $decisioncaipdp_id;
            $Decisioncaipdpsfile->save();
            (!is_dir($path)) ? mkdir($path) : $path;
            if(move_uploaded_file($donnees['decisionFile']['tmp_name'][$i],$path.$nom)){
                $nbre++;
            }
        }
        if($nbre==count($donnees['decisionFile']['name'])){
            return true;
        }else{
            return false;
        }
    }

    public function archived(Request $request){
        $Decisioncaipdpsfile = \App\Decisioncaipdpsfile::find($request->id);
        $Decisioncaipdpsfile->archived = 1;
        if($Decisioncaipdpsfile->save()){
            $data['error'] = false;
            $data['message'] = "Le document a été archivé";
        }else{
            $data['error'] = true;
            $data['message'] = "Le document n'a pas pu être archivé, une erreur est survenue";
        }
        return json_encode($data);
    }

    public function trashFile(Request $request){
        $Decisioncaipdpsfile = \App\Decisioncaipdpsfile::find($request->id);

        if($Decisioncaipdpsfile->delete()){
            $data['content'] = $this->displayDecision($request->saisine_id) ;
            $data['content2'] = $this->displayPreloadData($request->saisine_id);
            $data['error'] = false;
            $data['message'] = "Le document a été supprimé avec succès.";
        }else{
            $data['error'] = true;
            $data['message'] = "Le document n'a pas pu être supprimé, une erreur est survenue";
        }
        return json_encode($data);
    }

    

    public function supContentieu(Request $request){
        $id = $request->id;
        $Facilitation = Contentieu::find($id);
        if($Facilitation){
            if($Facilitation->delete()){
                return json_encode(['error'=>false]);
            }
        }
        return json_encode(['error'=>true]);
    }

    public function finaliseSaisine(Request $request){
        if($request->decision_id){
            $Decisioncaipdp = Decisioncaipdp::find($request->decision_id);
            $Decisioncaipdp->etat = 1;
            $Decisioncaipdp->dateEnvoie = now();
            if($Decisioncaipdp->save()){
                $this->closeSaisine($Decisioncaipdp->saisine_id, 1);
            }
            $data['error'] = false;
            $data['message'] = "La décision a été enregistrée avec succès. Cette saisine est désormais clôturée";
            return json_encode($data);
            // Send Notification
        }
    }

    public function checkUser(){
        // $checkUser = User::whereId(\Auth::user()->id)->with('caidpData')->first();
        // dd($checkUser);
        $checkUser = \App\Caidp::whereId(\Auth::user()->caidp_id)->first();
        //dd($checkUser);
       return $checkUser;
    }

    public function supprimerFacilitation(Request $request){
        if($request->facilitation_id){
            $facilitation = Facilitation::find($request->facilitation_id);
            if($facilitation->delete()){
                $data['error'] = false;
                $data['message'] = "Action supprimée avec succès !";
            }else{
                $data['error'] = false;
                $data['message'] = "Action supprimée avec succès !";
            }
            return json_encode($data);
        }
    }

    public function supprimerContentieu(Request $request){
        if($request->contentieu_id){
            $Contentieu = Contentieu::find($request->contentieu_id);
            if($Contentieu->delete()){
                $data['error'] = false;
                $data['message'] = "Action supprimée avec succès !";
            }else{
                $data['error'] = false;
                $data['message'] = "Action supprimée avec succès !";
            }
            return json_encode($data);
        }
    }

    

    


    

    // public function emailChecker()
}
