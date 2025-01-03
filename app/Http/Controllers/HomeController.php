<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Demande;
use App\User;
use App\Saisine;
use Auth;
use Illuminate\Database\Eloquent\Builder;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('Responsable');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $userOrganismeId = User::whereId(Auth::user()->id)->with('responsable')->first();
        if ($userOrganismeId->caidp === 1) {
            return redirect()->route('admin.Home');
        }

        $Demande = Demande::Envoyees()->where("organisme_id",$userOrganismeId->responsable->organisme_id)->with('requerant')->with('information')->with('organisme')->with('decison')->get();
        // dd($Demande);
        $DemandeTS = Demande::Envoyees()->where("organisme_id", $userOrganismeId->responsable->organisme_id)->where("favorable", 3)->whereLiquide(1)->whereMotifliquide(1)->wherehas('decison', function (Builder $query){ $query->where("envoye", 1);})->orderBy('id', 'DESC')->get();
        // dd($DemandeTS);
        $DemandePS = Demande::Envoyees()->where("organisme_id", $userOrganismeId->responsable->organisme_id)->where("favorable", 2)->whereLiquide(1)->wherehas('decison', function (Builder $query){ $query->where("envoye", 1);})->get();
        $DemandeNS = Demande::Envoyees()->where("organisme_id", $userOrganismeId->responsable->organisme_id)->where("favorable", 1)->whereLiquide(1)->get();
        $DemandeEC = Demande::Envoyees()->where("organisme_id", $userOrganismeId->responsable->organisme_id)->whereLiquide(null)->get();
        $organisme_id = $userOrganismeId->responsable->organisme_id;
        $DemandeCont = Saisine::wherehas('demande', function(Builder $query)use( $organisme_id){
            $query->where('organisme_id', $organisme_id);
        })->get();
        // dd($DemandeCont);
        return view('home', compact('Demande', 'DemandeTS', 'DemandePS', 'DemandeNS', 'DemandeEC', 'DemandeCont'));
    }
}
