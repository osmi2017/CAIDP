<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Decision;
use App\Demande;
use PDF;
use App\Http\Controllers\RequerantController;
use App\Tools\Globals;
use App\Notifications\SendDecisionNotification;

class DecisionController extends Controller
{
    public function __construct(){
    	return $this->middleware('auth');
    }

    public function Ajouter(){

    }

    public function EnregistrerDecision($donnees){
        // dd($donnees);
        if($donnees->decison_id==null){
    	    $Decision = new Decision;
            $Decision->propose_par_ri = $donnees->propose_par_ri;
        }else{
            $Decision = Decision::whereId($donnees->decison_id)->first();
        }
    	$Decision->decison = $donnees->decison;
        $Decision->valide_par_rh = $donnees->valide_par_rh;
        $Decision->dateValidation = $donnees->dateValidation;
        $Decision->etat = $donnees->etat;
        $Decision->date_envoie = $donnees->date_envoie;
        $Decision->isDecision = $donnees->isDecision;
        $Decision->notificationFile = $donnees->notificationFile;
        $Decision->envoye = $donnees->envoye;
        $Decision->demande_id = $donnees->demande_id;
        // dd($donnees->isDecision);
        if($Decision->save()){
            $this->editDemande($donnees->demande_id);
            $this->validerDecision($donnees->demande_id);
        	return true;
        }else{
        	return false;
        }
            

    }

    public function editDemande($demande_id){
        $Demande = Demande::find($demande_id);
        if($Demande->favorable==null){
            $Demande->favorable = 1;
            $Demande->etat = 1;
        }

        $Demande->liquide = 1;
        $Demande->motifliquide = 1;
        $Demande->dateliquide = now();
        $Demande->save();
    }

    public function validerDecision($demande_id){
        $Decision = Decision::where('demande_id', $demande_id)->first();
        $Demande = Demande::find($demande_id);
        if($Decision->etat===1){
            if($Demande->transmission!=null){
            // dd();
            // Vérifier si transmission prévoit l'envoie par mail
                $transmission = json_decode($Demande->transmission, true);
                // dd(gettype($transmission));

                if(in_array("email", $transmission)){
                    $email=true;
                }else{
                    $email = false;
                }
            }else{
                $email = false;
            }
            //dd($email, $demande_id );
            //dd( $demande_id);
            if($Decision->isDecision!=null ){
                $this->genererDecisonPDF($demande_id, $email);
            }
        }
        
    }

    public function confirmeDecision(Request $request){
        $Decision = Decision::find($request->decison_id);
        $Decision->etat = 1;
        
        if($Decision->save()){
            if($request->transmiValid){
                $this->editDemande($Decision->demande_id);
            }
            $this->validerDecision($Decision->demande_id);
            $data['error'] = false;
            $data['message'] = "Rapport validé avec succès";
            return json_encode($data);
        }
    } 

    public function lastDescision(){
        return Decision::OrderBy('id', 'DESC')->first();
    }

    public function findDescision($demande_id){
        // dd(Decision::where('demande_id', $demande_id)->first());
        return Decision::where('demande_id', $demande_id)->first();
    }


    public function genererDecisonPDF($demande_id, $email){
        // if($email===true){
            
            $Globals = new Globals;
            $Demande = Demande::whereId($demande_id)->with('requerant')->with('organisme')->with('decison')->first();
            $Decision = Decision::where('demande_id', $Demande->id)->first();
            $Organisme = \App\Organisme::where('id', $Demande->organisme_id)->first();
            //dd($Organisme);
            !is_dir("admin/decisions") ? mkdir("admin/decisions") : "";
            // $pdf = PDF::loadHTML($decison)->save('admin/decisions/'.$Globals->genererDecisonPDF($Demande->libelle, $Demande->created_at, $Demande->id.'.pdf'));
            $decison = $Decision->decison;
            
            $view = view('pdf.decision', compact('decison'))->render();
            //dd($view);
            $pdf = PDF::loadHTML($view)->save('admin/decisions/'.$Globals->genererDecisonPDF($Demande->libelle, $Demande->created_at, $Demande->id.'.pdf'));
            // dd();
        // dd($decison);
            
                $RequerantController = new RequerantController;
                // $Requerant = $RequerantController->findRequerant($Demande->requerant_id);
                //dd($Demande->requerant_id);
                $User = \App\User::where('requerant_id', $Demande->requerant_id)->with('requerant')->first();
                //dd($Demande->requerant_id);
                $User->notify(new SendDecisionNotification($Demande, $Decision, $Organisme));
                // =========== SEND NOTIF TO MANDANT ==========================
                if($Demande->mandant_id){
                    $Mandant = \App\Mandant::find($Demande->mandant_id);
                    // dd($Mandant);
                    $Mandant->notify(new SendDecisionNotification($Demande, $Decision, $Organisme));
                }
        // }
    }

    public function previewPDF(){
        $text = \session('text');
        $pdf = PDF::loadHTML($text);
        return $pdf->stream();
    }
}
