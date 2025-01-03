<?php

namespace App\Http\Controllers\Organisme;

use App\Saisine;
use Auth;
use App\User;
use App\Organisme;
use App\Saisinepredefinie;
use App\Tools\DateRewrite;
use App\Docfacilitation;
use App\Doccontentieu;
use App\Messag;
use App\Http\Controllers\UsagerController;
use Illuminate\Database\Eloquent\Builder;



use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SaisineController extends Controller
{

    public function __construct()
    {
        $this->middleware('Responsable');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userOrganismeId = User::whereId(Auth::user()->id)->with('responsable')->first();
        $organisme_id = $userOrganismeId->responsable->organisme_id;
        $Saisines =  Saisine::wherehas('demande', function(Builder $query)use( $organisme_id){
            $query->where('organisme_id', $organisme_id);
        })->get();
        
        return view('organismes.saisines.index', compact(('Saisines')));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Demandes = \App\Demande::where('organisme_id', $this->findUser()->responsable->organisme_id)->get();
        // dd($Demandes);
        $Saisinepredefinies = \App\Saisinepredefinie::all();
        // return view('requerant.formSaisine', compact('Demandes', 'Saisinepredefinies'));
        return view('organismes.saisines.create',  compact('Demandes', 'Saisinepredefinies'));
    }

    public function checkSaisine(Request $request){
        // dd($request);
        $motif = $request->motif ;
        $Saisinepredefinie = Saisinepredefinie::find($motif);
        $description = $Saisinepredefinie->textSaisine;
        $User = $this->findUser();
        // dd($User);
        $name = $User->responsable->organisme->organisme;
        $contact = $User->responsable->organisme->contact;
        $DateRewrite = new DateRewrite;
        $date = $DateRewrite->dateFrancais(date("Y-m-d"));
        
        $table = ['[%%name%%]', '[%%date%%]', '[%%contact%%]' ];
        $tableReplace = [$name, $date, $contact];
        $description =  str_replace($table, $tableReplace, $description);

         echo $description; 

    }

    public function findUser(){
        $id  = \Auth::id();
        $Organisme = User::with('responsable')->where('id', $id)->first();
        // dd($Organisme);
        return $Organisme;
        // dd($id);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $UsagerController = new UsagerController;
        $enregistreSaisine = $UsagerController->enregistreSaisine($request);
         
        if($enregistreSaisine){
            return redirect()->route('MySaisines')->with('success', 'La saisine a été envoyée avec succès.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        
        $userOrganismeId = User::whereId(Auth::user()->id)->with('responsable')->first();
        $organisme_id = $userOrganismeId->responsable->organisme_id;
        $Saisine = Saisine::whereId($id)->with('decisioncaipdp')->with('demande')->with('facilitation')->with('contentieu')->wherehas('demande', function(Builder $query)use( $organisme_id){
            $query->where('organisme_id', $organisme_id);})->first();
        if(!$Saisine){
            return redirect()->back()->with('error', "Vous n'avez pas accès à ces données");
        }
        $docFacilitations = Docfacilitation::whereHas('facilitation', function ($query) use ($id) {
            $query->where('saisine_id', $id);
        })->get();
        $doccontentieus = Doccontentieu::whereIn('contentieu_id', function ($query) use ($id) {
            $query->select('id')
                ->from('contentieus')
                ->where('saisine_id', $id);
        })
        ->get();
        
        if(sizeof($Saisine->contentieu)!="0"){
        
        $contentieuId = $Saisine->contentieu[0]->id;
        
        $messages = Messag::with('contentieu')->where('contentieu_id', $contentieuId)->get();
        }
        else{
            $messages=NULL;   
        }
        //dd($messages);
        $organisme = Organisme::find($Saisine->demande->organisme_id)->first('organisme');
        return view('organismes.saisines.detail', compact('Saisine', 'organisme','docFacilitations','doccontentieus','messages'));
        // dd($Saisine);
    }   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
