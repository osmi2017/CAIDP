<?php

namespace App\Http\Controllers\Organisme;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use App\Rapport;
use App\Bilan;
use App\Demande;
use App\Requerant;
use App\Responsable;
use App\Qualite;
use App\Globals;
use App\Information;
use App\Motifrapport;
use App\Tools\DateRewrite;
use Illuminate\Database\Eloquent\Builder;
use PDF;

class RapportController extends Controller
{
	public function __construct(){
		// $this->checkResponsable()
        $this->middleware('Responsable');
	}
    public function formulaire(){
    	return view('rapport');
    }

    public function modifierMotif(Request $request){
        // dd($request->input());
        foreach ($request->request as $key => $value) {
            $validator = \Validator::make($request->all(), [
                $key => 'required',
            ]);
        }
        if($validator->fails()){
            $data['error'] = true;
            $data['message'] = "Le champ ne peux pas etre vide !";
            return json_encode($data);
        }

        $organismeData = $this->userData()['organisme'];
        $Motifrapport = Motifrapport::where('id', $request->id)->first();
        // dd($Motifrapport);
        foreach ($request->request as $key => $value) {
            $Motifrapport->$key = $value;
        }
        $Motifrapport->auto = 1;
        // dd($Motifrapport);
        if($Motifrapport->save()){
           // $Motifrapport->
            // dd();
        }


    } 

    public function Supprimer($id){
        Motifrapport::find($id)->delete();
        return 0;
    }

    public function modifier(Request $request){
        foreach ($request->request as $key => $value) {
    		$validator = \Validator::make($request->all(), [
    			$key => 'required',
        	]);
    		}
    	
    	if($validator->fails()){
    		$data['error'] = true;
    		$data['message'] = "Le champ ne peux pas etre vide !";
    		return json_encode($data);
    	}
    	$organismeData = $this->userData()['organisme'];
    	$Rapport = Rapport::where('organisme_id', $organismeData->id)->first();

    	if($Rapport){
    		$RapportData = $Rapport;
    	}else{
    		$RapportData = new Rapport;
    	}

    	if(!$Rapport && !$request->organisme){
    		$organisme = $organismeData->organisme;
    	}elseif(!$Rapport && $request->organisme){
    		$organisme = $request->organisme;
    	}else{
    		$organisme = $organismeData->organisme;
    	}
    	// POUR LE PREMIER ENREGISTREMENT SI RAPPORT VIDE, INSERER LES RAPPORT GENERES DANS LE RAPPORT FINAL
        // SI selfEditing = null, alors il n'y a pas encore eu de modification manuelle, docn toujours remplir a partir de la table Bilan
    	$organisme = $request->organisme ? $request->organisme : $organismeData->organisme;
    	$RapportData->organisme_id = $organismeData->id;
    	$RapportData->organisme = $organisme;
    	foreach ($request->request as $key => $value) {
    		$RapportData->$key = $value;
    	}
        $request->selfEditing = 1;
    	if($RapportData->save()){
    		return "ok";
    	}else{
    		return "nok";
    	}
    }

    public function findMotifProroData(){
        $organisme_id = $this->userData()['organisme']->id;
        $reqSatisDelais3Motfif = Demande::distinct('motifProrogation')->where('organisme_id', '=', $organisme_id)->where('motifProrogation', '!=', null)->whereFavorable(3)->get('motifProrogation');

        $reqPartSafDelais3Motif = Demande::distinct('motifProrogation')->where('organisme_id', '=', $organisme_id)->where('motifProrogation', '!=', null)->whereFavorable(2)->get('motifProrogation');

        return compact('reqSatisDelais3Motfif','reqPartSafDelais3Motif');
    }

    public function rapportDetaille(){
        
    	$findMotifProroData = $this->findMotifProroData();
    	$reqSatisDelais3Motfif = json_encode($findMotifProroData['reqSatisDelais3Motfif']->toArray());
        $reqPartSafDelais3Motif = json_encode($findMotifProroData['reqPartSafDelais3Motif']->toArray());
    	
    	$User = $User =  $this->userData();
    	$organisme_id = $User['organisme']->id;
    	$Rapport = Rapport::where('organisme_id', $organisme_id)->first();
        //dd($Rapport);
    	$Bilan = Bilan::where('organisme_id', $organisme_id)->first();
    	$Globals = Globals::first();

   
    		$demandeTraite = $this->demandeTraite();
	    	$documentsPublies = $this->documentsPublies();
	    	$modaliteAcces = $this->modaliteAcces();
	    	$qualiteDemandeur = $this->qualiteDemandeur();
    	

    	if(!$Bilan){
    		$Bilan = new Bilan;
    	}else{
    		$Bilan = $Bilan;
    	}
    		// ============================================================================
    		$Responsable = $this->checkResponsable();
    		$Bilan->respoOrga = $Responsable['ResponsableHiera'] ? $Responsable['ResponsableHiera']->nom." ".$Responsable['ResponsableHiera']->prenom : $User['responsable']->nom." ".$User['responsable']->prenom;
    		$Bilan->respoInfo = $Responsable['ResponsableInfo'] ? $Responsable['ResponsableInfo']->nom." ".$Responsable['ResponsableInfo']->prenom : $User['responsable']->nom." ".$User['responsable']->prenom;


    		$Bilan->reqSatisDelais1 = $demandeTraite['reqSatisDelais1'];
    		$Bilan->reqSatisDelais2 = $demandeTraite['reqSatisDelais2'];
    		$Bilan->reqSatisDelais3 = $demandeTraite['reqSatisDelais3'];
    		$Bilan->reqPartSafDelais1 = $demandeTraite['reqPartSafDelais1'];
    		$Bilan->reqPartSafDelais2 = $demandeTraite['reqPartSafDelais2'];
    		$Bilan->reqPartSafDelais3 = $demandeTraite['reqPartSafDelais3'];
    		$Bilan->nbreReqNonSatisf = $demandeTraite['nbreReqNonSatisf'];
    		$Bilan->nbreDocuPub = $documentsPublies['nbreDocuPub'];
    		$Bilan->modPub = $documentsPublies['modPub'];
    		$Bilan->comPartielSurPlace = $modaliteAcces['comPartielSurPlace'];
    		$Bilan->comPartielMail = $modaliteAcces['comPartielMail'];
    		$Bilan->comPartielPapier = $modaliteAcces['comPartielPapier'];
    		$Bilan->comPartielSiteWeb = $modaliteAcces['comPartielSiteWeb'];
    		$Bilan->comPartielAutre = $modaliteAcces['comPartielAutre'];
    		$Bilan->commentaire = null;
    		$Bilan->organisme_id = $organisme_id;
            $Bilan->organisme = $User['organisme']->organisme;
            $Bilan->reqSatisDelais3Motfif = $reqSatisDelais3Motfif;
            $Bilan->reqPartSafDelais3Motif = $reqPartSafDelais3Motif;
    		$Bilan->comTotalSurPlace = $modaliteAcces['comTotalSurPlace'];
    		$Bilan->comTotalMail = $modaliteAcces['comTotalMail'];
    		$Bilan->comTotalPapier = $modaliteAcces['comTotalPapier'];
    		$Bilan->comTotalSiteWeb = $modaliteAcces['comTotalSiteWeb'];
    		$Bilan->comTotalAutre = $modaliteAcces['comTotalAutre'];
    		$Bilan->journaliste = $qualiteDemandeur['journaliste'];
    		$Bilan->professeur = $qualiteDemandeur['professeur'];
    		$Bilan->public = $qualiteDemandeur['public'];
    		$Bilan->prive = $qualiteDemandeur['prive'];
    		$Bilan->autre = $qualiteDemandeur['autre'];
    		$Bilan->annee = date("Y");
    		$Bilan->save();


    	// }
        $Rapport = $Rapport ? $Rapport : new Rapport;
        //dd($demandeTraite);
        //dd($Rapport->selfEditing);
    	if($Rapport->selfEditing!=1){
    		// dd($Rapport);
    		
    	// ========================================================================================
    		
    		$Rapport->respoOrga = $Responsable['ResponsableHiera'] ? $Responsable['ResponsableHiera']->nom." ".$Responsable['ResponsableHiera']->prenom : $User['responsable']->nom." ".$User['responsable']->nom;
    		$Rapport->respoInfo = $Responsable['ResponsableHiera'] ? $Responsable['ResponsableHiera']->nom." ".$Responsable['ResponsableHiera']->prenom : $User['responsable']->nom." ".$User['responsable']->nom;
    		$Rapport->reqSatisDelais1 = $demandeTraite['reqSatisDelais1'];
    		$Rapport->reqSatisDelais2 = $demandeTraite['reqSatisDelais2'];
    		$Rapport->reqSatisDelais3 = $demandeTraite['reqSatisDelais3'];
    		$Rapport->reqPartSafDelais1 = $demandeTraite['reqPartSafDelais1'];
    		$Rapport->reqPartSafDelais2 = $demandeTraite['reqPartSafDelais2'];
    		$Rapport->reqPartSafDelais3 = $demandeTraite['reqPartSafDelais3'];
    		$Rapport->nbreReqNonSatisf = $demandeTraite['nbreReqNonSatisf'];
    		$Rapport->nbreDocuPub = $documentsPublies['nbreDocuPub'];
    		$Rapport->modPub = $documentsPublies['modPub'];
    		$Rapport->comPartielSurPlace = $modaliteAcces['comPartielSurPlace'];
    		$Rapport->comPartielMail = $modaliteAcces['comPartielMail'];
    		$Rapport->comPartielPapier = $modaliteAcces['comPartielPapier'];
    		$Rapport->comPartielSiteWeb = $modaliteAcces['comPartielSiteWeb'];
    		$Rapport->comPartielAutre = $modaliteAcces['comPartielAutre'];
    		$Rapport->commentaire = null;
            $Rapport->reqSatisDelais3Motfif = $reqSatisDelais3Motfif;
            $Rapport->reqPartSafDelais3Motif = $reqPartSafDelais3Motif;
    		$Rapport->organisme_id = $organisme_id;
            $Rapport->organisme = $User['organisme']->organisme;
    		$Rapport->comTotalSurPlace = $modaliteAcces['comTotalSurPlace'];
    		$Rapport->comTotalMail = $modaliteAcces['comTotalMail'];
    		$Rapport->comTotalPapier = $modaliteAcces['comTotalPapier'];
    		$Rapport->comTotalSiteWeb = $modaliteAcces['comTotalSiteWeb'];
    		$Rapport->comTotalAutre = $modaliteAcces['comTotalAutre'];
    		$Rapport->journaliste = $qualiteDemandeur['journaliste'];
    		$Rapport->professeur = $qualiteDemandeur['professeur'];
    		$Rapport->public = $qualiteDemandeur['public'];
    		$Rapport->prive = $qualiteDemandeur['prive'];
    		$Rapport->autre = $qualiteDemandeur['autre'];
    		$Rapport->autre = $qualiteDemandeur['autre'];
    		$Rapport->autre = $qualiteDemandeur['autre'];

    		$Rapport->intitule = $Globals->rapport;
    		// $Rapport->autre = $qualiteDemandeur['commentaire'];
    		$Rapport->date = date("Y-m-d");
    		$Rapport->save();



            
    		
    	}


        // =================================================
        // Motifrapport::where('organisme_id', $organisme_id)->where('auto', null)->delete();
        $MOTIFDELAIS = json_decode($reqSatisDelais3Motfif, true);
        // dd($reqSatisDelais3Motfif);
        foreach($MOTIFDELAIS as $key => $value){
            foreach ($value as $val) {
                $Motifrapport = Motifrapport::firstOrCreate(['reqSatisDelais3Motfif'=>$val, 'organisme_id'=> $organisme_id]);
                $MotifrapportNew =  new Motifrapport;
            }
        }
        $reqSatisDelais3MotfifData = Motifrapport::where('reqSatisDelais3Motfif', "!=", null)->where('organisme_id', $organisme_id)->get();
        // =================================================

    	
        // =================================================
        // Motifrapport::where('organisme_id', $organisme_id)->where('auto', null)->delete();
        // dd($reqPartSafDelais3Motif);
        $MOTIFD = json_decode($reqPartSafDelais3Motif, true);
        // dd($reqSatisDelais3Motfif);
        foreach($MOTIFD as $key => $value){
            foreach ($value as $val) {
                $Motifrapport = Motifrapport::firstOrCreate(['reqPartSafDelais3Motif'=>$val, 'organisme_id'=> $organisme_id]);
                $MotifrapportNew =  new Motifrapport;
            }
        }
        $reqPartSafDelais3MotifData = Motifrapport::where('reqPartSafDelais3Motif', "!=", null)->where('organisme_id', $organisme_id)->get();
        // =================================================
        

        // $Secteur = \App\Secteur::whereHas('requerant', function(Builder $query)use($organisme_id){
        //     $query->wherehas('demande', function(Builder $query)use($organisme_id){
        //         $query->where('organisme_id',$organisme_id);
        //     });
        // })->groupBy('id')->selectRaw('*, count(*) as total')->get();
        $Secteur = \DB::SELECT("SELECT secteur, count(secteurs.id) as total FROM secteurs, demandes, requerants WHERE secteurs.id = requerants.secteur_id AND demandes.requerant_id = requerants.id AND demandes.organisme_id = $organisme_id GROUP BY secteurs.id ");
        // dd($Secteur);


    	
    	$lieu = $Rapport->lieu ? $Rapport->lieu : "Abidjan";
    	// dd($motifProroData);
    	return compact('Rapport', 'Bilan', 'lieu' , 'reqSatisDelais3Motfif', 'reqPartSafDelais3Motif', 'reqSatisDelais3MotfifData', 'reqPartSafDelais3MotifData', 'Secteur');

    }

    public function checkResponsable(){
    	$ResponsableHiera = Responsable::whereRh(1)->first();
    	$ResponsableInfo = Responsable::whereRi(1)->first();
    	return compact('ResponsableInfo', 'ResponsableHiera');
    }

    public function userData(){
    	$User = new UserController;
    	return $User->userData();
    }

    public function demandeTraite(){
    	$DateRewrite = new DateRewrite;

    	$reqSatisDelais1 = 0;
    	$reqSatisDelais2 = 0;
    	$reqSatisDelais3 = 0;

    	$reqPartSafDelais1 = 0;
    	$reqPartSafDelais2 = 0;
    	$reqPartSafDelais3 = 0;
    	

    	$organisme_id = $this->userData()['organisme']->id;
    	$dataReaquete = Demande::Envoyees()->Annee()->where('liquide', 1)->where('organisme_id', $organisme_id)->with('requerant')->with('information')->whereFavorable(3)->get();
    	// Satiifaction Totale ==========================================================
    	$SatiifactionTotale = $dataReaquete;
    	$SatiifactionPartielle = $dataReaquete;
    	$SatiifactionTotale = $dataReaquete;
    	// dd($SatiifactionTotale);
    	foreach ($SatiifactionTotale as $key => $value) {
    		$delais = Qualite::find($value->requerant->qualite_id)->duree;
    		$calculeDelaiRequis = $DateRewrite->calculeDelaiRequis($value->dateDemande,  $value->information->dateCommunication);
    		if($calculeDelaiRequis<="15"){
    			// if($calculeDelaiRequis===true){
    				$reqSatisDelais1 = $reqSatisDelais1 + 1;
    			// }else{
    			// 	$reqSatisDelais3 = $reqSatisDelais3 + 1;
    			// }
    		}elseif($calculeDelaiRequis>"15" && $calculeDelaiRequis<="30"  ){
    			// if($calculeDelaiRequis===true){
    				$reqSatisDelais2 = $reqSatisDelais2 + 1;
    			// }else{
    			// 	$reqSatisDelais3 = $reqSatisDelais3 + 1;
    			// }
    		}elseif($calculeDelaiRequis>"30"){
                // if($calculeDelaiRequis===true){
                    $reqSatisDelais3 = $reqSatisDelais3 + 1;
                // }else{
                //  $reqSatisDelais3 = $reqSatisDelais3 + 1;
                // }
            }
    	}
    	// Satisfaction partielle ========================================================
    	$SatiifactionPartielle = Demande::Envoyees()->Annee()->where('liquide', 1)->where('organisme_id', $organisme_id)->with('requerant')->with('information')->whereFavorable(2)->get();
        // dd($SatiifactionPartielle);
    	foreach ($SatiifactionPartielle as $key => $value) {
    		$delais = Qualite::find($value->requerant->qualite_id)->duree;
    		$calculeDelaiRequis = $DateRewrite->calculeDelaiRequis($value->dateDemande,  $value->information->dateCommunication);
    		if($calculeDelaiRequis<="15"){
    			// if($calculeDelaiRequis===true){
    				$reqPartSafDelais1 = $reqPartSafDelais1 + 1;
    			// }else{
    				// $reqPartSafDelais3 = $reqPartSafDelais3 + 1;
    			// }
    		}elseif($calculeDelaiRequis>"15" && $calculeDelaiRequis<="30"){
    			// if($calculeDelaiRequis===true){
    				$reqPartSafDelais2 = $reqPartSafDelais2 + 1;
    			// }else{
    				// $reqPartSafDelais3 = $reqPartSafDelais3 + 1;
    			// }
    		}elseif($calculeDelaiRequis>"30"){
                // if($calculeDelaiRequis===true){
                    $reqPartSafDelais3 = $reqPartSafDelais3 + 1;
                // }else{
                    // $reqPartSafDelais3 = $reqPartSafDelais3 + 1;
                // }
            }
    	}

    	// Non Satisfaction  ========================================================
    	$NonSatisfaction = Demande::Envoyees()->Annee()->where('liquide', 1)->where('organisme_id', $organisme_id)->with('requerant')->whereFavorable(1)->get();
    	
    	$nbreReqNonSatisf = $NonSatisfaction->count();
    	
    	
    	return compact('reqSatisDelais1', 'reqSatisDelais2', 'reqSatisDelais3','reqPartSafDelais1', 'reqPartSafDelais2', 'reqPartSafDelais3', 'nbreReqNonSatisf');
    }


    public function documentsPublies(){
    	$User = $this->userData();
    	$organisme_id = $User['organisme']->id;
    	$DocPub = Information::where('organisme_id', $organisme_id)->get();
    	$nbreDocuPub = $DocPub->count();
    	$modPub = Demande::Envoyees()->Annee()->where('liquide', 1)->where('favorable', '!=', 1)->where('organisme_id', $organisme_id)->with('information')->get();
    	$modPubTable = array();
    	foreach ($modPub as $value) {
    		foreach (json_decode($value->transmission, true) as  $val) {
    			if(!in_array($val, $modPubTable)){
    				array_push($modPubTable, $val);
    			}
    		}

    	}
    		$modPubTableLib = array();
    		foreach ($modPubTable as $value) {
    			array_push($modPubTableLib,  $this->libelleTransmission($value));
    		}
    		$modPubTable = implode(" - ", $modPubTableLib);
    		$modPub = $modPubTable ;

    	return compact('nbreDocuPub', 'modPub');
    }

    public function modaliteAcces(){
    	// Communication totale de document/information consulté(e) gratuitement sur place
    	$User = $this->userData();
    	$organisme_id = $User['organisme']->id;
    	$comTotalSurPlace = 0;
    	$comTotalMail = 0;
    	$comTotalPapier = 0;
    	$comTotalSiteWeb = 0;
    	$comTotalAutre = 0;

    	$comPartielSurPlace = 0;
    	$comPartielMail = 0;
    	$comPartielPapier = 0;
    	$comPartielSiteWeb = 0;
    	$comPartielAutre = 0;
    	

    	$modaliteAcces = Demande::Envoyees()->Annee()->where('liquide', 1)->where('favorable',  3)->where('organisme_id', $organisme_id)->get();
    	if($modaliteAcces){
    		// ================ Numerique =====================
    		// dd($modaliteAcces);
    		foreach ($modaliteAcces as $value) {
    			$tabe = json_decode($value->transmission, true);
    			foreach ($tabe as  $val) {
    				if($val=='surplace' && in_array('surplace', $tabe)){
    					$comTotalSurPlace+= 1;
    				}
    			}
    		}
    		// =============== End Numérique ==================
    		// ================ Mail =====================
    		foreach ($modaliteAcces as $value) {
    			$tabe = json_decode($value->transmission, true);
    			foreach ($tabe as  $val) {
    				if($val=='numerique' && in_array('numerique', $tabe)){
    					$comTotalAutre+= 1;
    				}
    			}
    		}
    		// =============== End Mail ==================
    		// ================ comTotalPapier =====================
    		foreach ($modaliteAcces as $value) {
    			$tabe = json_decode($value->transmission, true);
    			foreach ($tabe as  $val) {
    				if($val=='physique' && in_array('physique', $tabe)){
    					$comTotalPapier+= 1;
    				}
    			}
    		}
    		// =============== End comTotalPapier ==================
    		// ================ comTotalSiteWeb =====================
    		foreach ($modaliteAcces as $value) {
    			$tabe = json_decode($value->transmission, true);
    			foreach ($tabe as  $val) {
    				if($val=='site' && in_array('site', $tabe)){
    					$comTotalSiteWeb+= 1;
    				}
    			}
    		}
    		// =============== End comTotalSiteWeb ==================
    		// ================ comTotalSiteWeb =====================
    		foreach ($modaliteAcces as $value) {
    			$tabe = json_decode($value->transmission, true);
    			foreach ($tabe as  $val) {
    				if($val=='email' &&  in_array('email', $tabe)){
    					$comTotalMail+= 1;
    				}
    			}
    		}
    		
    	}
    		// ===========================================================================================================
    		

    		$modaliteAccesPart = Demande::Envoyees()->Annee()->where('liquide', 1)->where('favorable',  2)->where('organisme_id', $organisme_id)->get();
    		// dd($modaliteAccesPart);
    	if($modaliteAccesPart){
    		// ================ Numerique =====================
    		foreach ($modaliteAccesPart as $value) {
    			$tabe = json_decode($value->transmission, true);
    			foreach ($tabe as  $val) {
    				if($val=='surplace' && in_array('surplace', $tabe)){
    					$comPartielSurPlace+= 1;
    				}
    			}
    		}
    		
    		// =============== End Numérique ==================
    		// ================ Mail =====================
    		foreach ($modaliteAccesPart as $value) {
    			$tabe = json_decode($value->transmission, true);
    			foreach ($tabe as  $val) {
    				if($val=='numerique' && in_array('numerique', $tabe)){
    					$comPartielAutre+= 1;
    				}
    			}
    		}
    		
    		// =============== End Mail ==================
    		// ================ comTotalPapier =====================
    		foreach ($modaliteAccesPart as $value) {
    			$tabe = json_decode($value->transmission, true);
    			foreach ($tabe as  $val) {
    				if($val=='physique' && in_array('physique', $tabe)){
    					$comPartielPapier+= 1;
    				}
    			}
    		}
    		
    		// =============== End comTotalPapier ==================
    		// ================ comTotalSiteWeb =====================
    		foreach ($modaliteAccesPart as $value) {
    			$tabe = json_decode($value->transmission, true);
    			foreach ($tabe as  $val) {
    				if($val=='site' && in_array('site', $tabe)){
    					$comPartielSiteWeb+= 1;
    				}
    			}
    		}
    		
    		// =============== End comTotalSiteWeb ==================
    		// ================ comTotalSiteWeb =====================
    		foreach ($modaliteAccesPart as $value) {
    			$tabe = json_decode($value->transmission, true);
    			foreach ($tabe as  $val) {
    				if($val=='email' && in_array('email', $tabe)){
    					$comPartielMail+= 1;
    				}
    			}
    		}
    		
    		

    		// ===========================================================================================================
    		return compact('comPartielAutre', 'comPartielMail', 'comPartielPapier', 'comPartielSiteWeb', 'comPartielAutre', 'comPartielAutre', 'comPartielAutre', 'comPartielAutre', 'comPartielAutre', 'comPartielAutre', 'comTotalSurPlace', 'comPartielSurPlace', 'comTotalMail', 'comTotalPapier', 'comTotalSiteWeb', 'comTotalAutre' );

    		
    	}

    }

    public function qualiteDemandeur(){
    	$journaliste = 0;
    	$professeur = 0;
    	$prive = 0;
    	$public = 0;
    	$autre = 0;
    	$qualiteDemandeur = Demande::Envoyees()->Annee()->where('liquide', 1)->where('organisme_id', $this->userData()['organisme']->id)->with('requerant')->get();
    	if($qualiteDemandeur){
    		foreach($qualiteDemandeur as $value){
	    		$Qualite = Qualite::find($value->requerant->qualite_id);
	    		if($Qualite && $Qualite->qualite=="Journaliste"){
	    			$journaliste+=1;
	    		}
	    	}

	    	foreach($qualiteDemandeur as $value){
	    		$Qualite = Qualite::find($value->requerant->qualite_id);
	    		if($Qualite && $Qualite->qualite=="Chercheur"){
	    			$professeur+=1;
	    		}
	    	}

	    	foreach($qualiteDemandeur as $value){
	    		$Qualite = Qualite::find($value->requerant->qualite_id);
	    		if($Qualite && $Qualite->qualite=="Public"){
	    			$Public+=1;
	    		}
	    	}

	    	foreach($qualiteDemandeur as $value){
	    		$Qualite = Qualite::find($value->requerant->qualite_id);
	    		if($Qualite && $Qualite->qualite=="Privé"){
	    			$prive+=1;
	    		}
	    	}

	    	foreach($qualiteDemandeur as $value){
	    		$Qualite = Qualite::find($value->requerant->qualite_id);
	    		if($Qualite){
	    			if($Qualite->qualite=="Paysans" OR $Qualite->qualite=="ONG" OR $Qualite->qualite=="Autre")
	    			$autre+=1;
	    		}
	    	}

    	}
	    return compact('prive', 'public', 'professeur', 'journaliste', 'autre');	
    }

    public function libelleTransmission($libelle){
    	switch ($libelle) {
    		case 'email':
    			return "Courier Electronique";
    			break;
    		case 'faxe':
    			return "Faxe";
    			break;
    		case 'physique':
    			return "Physique (Papier)";
    			break;
    		case 'numerique':
    			return "Numérique (Clé, CD,etc.)";
    			break;
    		case 'surplace':
    			return "Consulté sur place";
    			break;
    		case 'site':
    			return "Redirigé vers le site";
    			break;
    		
    		default:
    			# code...
    			break;
    	}
    } 

    public function imprimerRapport($type=null){
    	// return view ('imprimerRapport');
    	// PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
    	$User = $this->userData();
    	$Rapport = Rapport::where('organisme_id', $User['organisme']->id)->first();
        $Motifrapport = Motifrapport::where('organisme_id', $User['organisme']->id)->get('reqSatisDelais3Motfif', 'reqPartSafDelais3Motif');
        // dd($Motifrapport);
    	$DateRewrite = new DateRewrite;
    	$date = $DateRewrite->dateFrancais($Rapport->date);
    	$logo = $User['organisme']->logo;
    	$pdf = PDF::loadView('imprimerRapport', compact('Rapport', 'date', 'logo', 'User', 'Motifrapport'))->setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif', 'fontHeightRatio'=>'1.3']);
    	if($type!=null){
        	return $pdf->stream();
    	}else{
        	return $pdf->download("Rapport-Annuel-".date('Y'));
    	}
    }

    public function prevRapport(){

        return view('imprimerRapport')->render();
    }

    
}
