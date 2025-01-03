<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\Demande;
use App\Direction;
use App\Organisme;
use App\Requerant;
use App\User;
use App\Information;
use App\Document;
use App\Http\Controllers\MainDemandeController;
use Illuminate\Database\Eloquent\Builder;
use App\Notifications\AccuseReception;
use App\Notifications\AccuseReceptionSaisne;
use App\Notifications\SendSaisine;
use App\Notifications\AlertOganismeSaisine;
use App\Saisinepredefinie;
use App\Tools\DateRewrite;
use App\Saisine;
use App\Responsable;
use App\Caidp;
use Illuminate\Notifications\Notifiable;
use Notification;
use PDF;
use App\Tools\Globals;
use App\Http\Controllers\Organisme\DemandeController;


class UsagerController extends Controller
{
    public function __construct(){
        $this->middleware('Requerant')->except('telechargerNotification');
    }

    public function index(){
        $requerant_id = \Auth::user()->requerant_id;
        // dd($requerant_id);
        $Demande = Demande::Envoyees()->where("requerant_id",$requerant_id)->with('organisme')->with('decison')->get();
        $DemandeTS = Demande::Envoyees()->where("requerant_id", $requerant_id)->where("favorable", 3)->whereLiquide(1)->whereMotifliquide(1)->wherehas('decison', function (Builder $query){ $query->where("envoye", 1);})->orderBy('id', 'DESC')->get();
        $DemandePS = Demande::Envoyees()->where("requerant_id", $requerant_id)->where("favorable", 2)->whereLiquide(1)->wherehas('decison', function (Builder $query){ $query->where("envoye", 1);})->get();
        $DemandeNS = Demande::Envoyees()->where("requerant_id", $requerant_id)->where("favorable", 1)->whereLiquide(1)->get();
        $DemandeEC = Demande::Envoyees()->where("requerant_id", $requerant_id)->whereLiquide(null)->get();


    	return view('requerant.index', compact('DemandeEC', 'DemandeNS', 'DemandePS', 'DemandeTS','Demande'));
    }
    public function faireDemande(){
    	$Direction = Demande::distinct('direction')->get('direction');
        $Service = Demande::distinct('service')->get('service');
        $Organismes = Organisme::all();
    	return view('requerant.faireDemande', compact('Service', 'Direction', 'Organismes'));
    }

    public function saveDemande(Request $request){
    	$request->validate([
    		'organisme' => 'required',
    		'libelle' => 'required',
    	]);

    	// $Demande = 
    	$requerant_id = $this->findOrganisme($request->organisme);
    	if($requerant_id==null){
    		$data['error'] = true;
    		$data['message'] = "veuillez selectionner un organisme public";
    		return redirect()->back()->with('error', 'veuillez selectionner un organisme !');
    	}
    	// dd($this->findUser()->id);
    	$Demande = new \stdClass;
    	$Demande->libelle = $request->libelle;
    	$Demande->requerant_id = $this->findUser()->requerant->id;
    	$Demande->description = $request->description;
        $Demande->direction = $request->direction;
        $Demande->service = $request->service;
        $Demande->mandant_id = null;
        $Demande->brouillon = 0;
        $Demande->organisme_id = $requerant_id;
    	$Demande->dateDemande = now();
        $Demande->autoEnregsitrement = 1;
        $Demande->autosave = 1;
        // dd($reque);
    	$MainDemandeController = new MainDemandeController;
    	if($MainDemandeController->SoumettreDemande($Demande)){

            $this->sendNotification($MainDemandeController->lastDemande(), $requerant_id);

            $request->session()->forget(['libelle', 'organisme']);
    		return redirect()->route('requerant.index')->with('success', 'Votre demande à été envoyer avec succès !');
    	}else{
    		return redirect()->back()->with('error', 'Une erreur s\'est produite, veuillez recommercer s\'il vous plâit ');
    	}
    }

    /**
    *
    *Notification envoyé Au requérant en cas de nouvelle demande
    *
    */ 
    public function sendNotification($lastDemande, $organisme_id){

        $DateRewrite = new \App\Tools\DateRewrite;
        $DemandeController = new \App\Http\Controllers\Organisme\DemandeController;
        $delaisRequis = json_decode($DemandeController->checkDedelaisDemande($lastDemande->requerant_id, $lastDemande->dateDemande, $lastDemande->id), true)['dateFin'] ;
        // ENvoyer un accusé de reception

        $User = $this->findUser();
        $User2 = $User;
        $User->notify(new AccuseReception($lastDemande, $delaisRequis, "Vous avez reçu un nouvel accusé de réception.", "Accusé de reception"));

        // Find Organisme User
        $Responsable = Responsable::whereOrganismeId($organisme_id)->get();
        Notification::send($Responsable, new AccuseReception($lastDemande, $delaisRequis, "Vous avez reçu un nouvelle demande", "Nouvelle demande", $User2));
        // dd($Responsable);
    }

    public function findOrganisme($organisme){
    	$Organisme = Organisme::where('organisme', $organisme)->first();
    	if($Organisme){
    		return $Organisme->id;
    	}else{
    		return false;
    	}
    }

    public function findUser(){
    	$id  = \Auth::id();
    	$Requerant = user::with('requerant')->where('id', $id)->first();
    	// dd($Requerant->requerant->id);
    	return $Requerant;
    	// dd($id);
    }

    public function seeDemande($id){
        $Demande = Demande::find($id);
        $Information = Information::where('demande_id', $Demande->id)->with('document')->first();
        // dd($Information);
        $Decision = \App\Decision::whereDemandeId($id)->first();
        if($Information){
            $Documents = Document::where('information_id', $Information->id)->get();
        }else{
            $Documents = null;
        }
        //dd($Demande);
        return view('requerant.detailsDemande', compact('Demande', 'Information', 'Documents', 'Decision'));
    }

    public function notificationReq(Request $request, $id=null, $markLu=null, $display=null){
        $id = $request->id;
        $markLu = $request->markLu;
        $display = $request->display;
        $notif = $request->notif;
        $User = $this->findUser();
        if($id==null && $markLu==null && $display==null){
            $Notifications = $User->notifications()->paginate(5);
            return view('requerant.notificationReq', compact('Notifications'));
        }elseif($markLu==true && $id!=null && $display=="no"){
           
            return $this->marquerLu($id);
        }elseif($id!=null && $markLu==true && $display == "yes"){
            $Notifications = $User->notifications()->paginate(5);
            return $this->detailNotification($id, $notif);
        }
        else{
        }
        
    }

    public function detailNotification($id){
        $User = $this->findUser();
        $Globals = new Globals;
        $Notification = $User->notifications()->whereId($id)->first();
        $notif = $Globals->findNotification($Notification->type);
        $this->marquerLu($id);
        return view('requerant.notifitemplate.'.$notif, compact('Notification'))->render();

    }

    public function telechargerNotification(Request $request, $id){
        $User = $this->findUser();
        $Notification = $User->notifications()->whereId($id)->firstOrFail();
        // dd($Notification);
        $Globals = new Globals;
        $notif = $Globals->findNotification($Notification->type);

        $pdf = PDF::loadView('requerant.notifitemplate.'.$notif, compact('Notification'))->download($id.".pdf"); 
        return $pdf; 
    }

    public function marquerLu($id){
        // dd($request);
        $User = $this->findUser();
        $Notification = $User->notifications()->whereId($id)->first()->markAsRead();
    }

    public function formSaisine($id=null){
        $Demandes = Demande::where('requerant_id', $this->findUser()->requerant_id)->get();
        $Saisinepredefinies = Saisinepredefinie::all();
        if(!is_null($id)){
            $Demandes = Demande::where('requerant_id', $this->findUser()->requerant_id)->whereId($id)->get();
            $Saisinepredefinies = Saisinepredefinie::where('codeSaisine','non_com')->get();
        }
        // dd($Demandes);
        return view('requerant.formSaisine', compact('Demandes', 'Saisinepredefinies'));
    }

    public function checkSaisine(Request $request){
        $motif = $request->motif ;
        $Saisinepredefinie = Saisinepredefinie::find($motif);
        $description = $Saisinepredefinie->textSaisine;
        $User = $this->findUser();
        $name = $User->name;
        $contact = $User->requerant->contact;
        $DateRewrite = new DateRewrite;
        $date = $DateRewrite->dateFrancais(date("Y-m-d"));
        
        $table = ['[%%name%%]', '[%%date%%]', '[%%contact%%]' ];
        $tableReplace = [$name, $date, $contact];
        $description =  str_replace($table, $tableReplace, $description);

        echo $description; 
    }

    public function saveSaisine(Request $request){

            if($this->enregistreSaisine($request)){
                return redirect()->route('requerant.saisines')->with('success', 'Votre saisine a été envoyée avec succès à la CAIDP');
            }
    }

    public function enregistreSaisine(Request $request){
        $request->validate([
                // 'typeSaisine' => 'required',
                'description' => 'required',
                'motif' => 'required',
                'demande_id' => 'required',
            ]);
            
            $Saisinepredefinie = Saisinepredefinie::find($request->motif);
            $motif = $Saisinepredefinie->typeSaisine;

            $Saisine = new Saisine;
            $Saisine->description = $request->description;
            $Saisine->motif = $motif;
            $Saisine->demande_id = $request->demande_id;
            $Saisine->autosave = 1;
            $Globals =  new \App\Tools\Globals;
            $Saisine->numSaisine = $Globals->numeroSaisine();
            $Saisine->auteurSaisine = isset($request->savebyorganisme) ? 2 : 1 ;
            $auteurSaisine = $Saisine->auteurSaisine;
            // dd($auteurSaisine)

            if($Saisine->save()){
                
                $lastSaisine = $this->lastSaisine();
                // dd($lastSaisine);
                // générer le PDF
                $Demande = Demande::find($request->demande_id);
                $organisme_id = $Demande->organisme_id;

                $Globals = new Globals;
                $Saisine_Path = $Globals->Saisine_Path();
                $data = $request->description;
                $pdf = PDF::loadView('pdf.saisineGenerator',compact('data'))->save(public_path().$Saisine_Path.$Globals->genererDecisonPDF($Demande->numDemande, $Saisine->motif, $Saisine->created_at, $lastSaisine->id.'.pdf'));   

                $Demande = Demande::find($request->demande_id);
                $organisme_id = $Demande->organisme_id;
                // Selectionner la CAIDP
                $CAIDP = User::where('caidp', 1)->with('caidpData')->where('responsable_id', null)->where('requerant_id', null)->get();
                $Organisme = User::wherehas('responsable', function(Builder $query)use($organisme_id){
                    $query->where('organisme_id', $organisme_id);
                })->get();
                // dump($Organisme);

                
                $Globals = new Globals;
                $auteur = $Globals->auteurSaisine($Saisine->auteurSaisine, $Saisine->demande->requerant->nom." ".$Saisine->demande->requerant->prenom, $Saisine->demande->organisme->organisme);


                if (isset($request->savebyorganisme)) {
                    $Requerant = User::with('requerant')->where('requerant_id', $Demande->requerant_id)->first();
                    $Requerant->notify(new AccuseReceptionSaisne($Demande, $lastSaisine, $auteur, $auteurSaisine)); 
                }else{
                    $Requerant = $this->findUser();
                    $Requerant->notify(new AccuseReceptionSaisne($Demande, $lastSaisine, $auteur));
                }
                
                // Envoie de la saisine a la CAIDP par mail
                Notification::send($CAIDP, new SendSaisine($Demande, $lastSaisine, $Requerant, $auteur));
                Notification::send($Organisme, new SendSaisine($Demande, $lastSaisine, $Requerant, $auteur));
                // Notification::send($Organisme, new AlertOganismeSaisine($Demande, $lastSaisine, $Requerant));
                // dd('');
                
                return true;

            }else{

                // return 
            }
    }

    public function lastSaisine(){
        return Saisine::orderBy('id', 'DESC')->limit(1)->first();
    }

    public function listSaisine(){
       
        // dd($Saisines);
        $Saisines = $this->AllSaisine();
        return view('requerant.listSaisine', compact('Saisines'));
    }

    public function AllSaisine(){
        $User = $this->findUser();
        $Demande = Demande::where('requerant_id', $User->requerant->id )->get('id')->toArray();
        $Saisines = Saisine::whereIn('demande_id', $Demande )->with('facilitation')->with('contentieu')->with('demande')->get();
        // return view('requerant.listSaisine', compact('Saisines'));
        return $Saisines;
    }

    

    public function seeSaisine(Request $request, $id){
        $Saisine = Saisine::whereId($id)->with('decisioncaipdp')->with('demande')->with('facilitation')->with('contentieu')->first();
        $organisme = Organisme::find($Saisine->demande->organisme_id)->first('organisme');
        // dd($Saisine);
        return view('requerant.detailsSaisine', compact('Saisine', 'organisme'));
    }

    public function detailUsager(){
        return Requerant::find(\Auth::user()->requerant_id);
    }

    public function profil(){
        $User = Requerant::whereId(\Auth::user()->requerant_id)->with('qualite')->with('type')->first();
        // dd($User);
        return view('requerant.profil', compact('User'));
    }

    public function updateProfil(Request $request){
        $DemandeController = new DemandeController;
        $InscriptionRequerant = $DemandeController->InscriptionRequerant($request);
        $InscriptionRequerant = json_decode($InscriptionRequerant, true);
        if($InscriptionRequerant['error'] == false){
            $type = "success";
            $message = "Modification effectuée avec succès !";
        }else{
            $type = "error";
            $message = $InscriptionRequerant['message'];
        }
        return redirect()->back()->with($type, $message);
    }

    

    
}
