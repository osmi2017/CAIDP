<?php

namespace App\Http\Controllers\Organisme;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Document;
use App\Source;
use App\Information;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\MainDemandeController;
use App\Tools\Globals;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $Demande_Path;
    public $Mandant_Path ;
    public $Document_Path ;

    public function __construct(){
        $this->middleware('Responsable');
        $Globals = new Globals;
        $this->Demande_Path = $Globals::Demande_Path();
        $this->Mandant_Path = $Globals::Mandant_Path();
        $this->Document_Path = $Globals::Document_Path();
    }

    public function checkOrganismeId() {
        $InformationController = new InformationController;
        return $InformationController->checkOrganismeId();
    }

    public function index()
    {
        

        $Documents = information::where('organisme_id', $this->checkOrganismeId()['organisme']->id)->with('document')->get();
        // dd($Documents);
        return view('documents.index', compact('Documents'));
    }

    public function create()
    {
        $source = Source::all();
        return view('documents.create', compact('source'));
    }

    public function detail($id){
        $Information = Information::whereId($id)->where('organisme_id', $this->checkOrganismeId()['organisme']->id)->with('document')->with('source')->first();
        if(is_null($Information)){
            return redirect()->route('Documents.index')->with('error', 'Vous n\'avez pas accès à cette page');
        }
        // dd($Information);
        return view('documents.detail', compact('Information'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) 
    {
        // dd();
        $request->validate([
            'libelle'=>'required',
            'information'=>'',
            'source'=>'required',
            'documents.*'=>'mimes:pdf,jpeg,jpg,png'
        ]);
        // dd();

        $InformationController = new InformationController;
        $MainDemandeController = new MainDemandeController;

        if($_POST['information']=="" && $_FILES['documents']['name'][0]==""){

            if(isset($_POST['information_id']) && $_POST['information_id']!=""){
                $findInform = $InformationController->findInformation($_POST['information_id']);
                $findDocuments = $InformationController->findDocuments($_POST['information_id']);
                // dd($findInform);
                $_POST['information'] = $findInform->information;

            }else{
                $data['error'] = true;
                $data['message'] = "Veuillez ajouter une information ou un télécharger un documents !";
                return redirect()->back()->with('error', 'Veuillez ajouter une information ou un télécharger un documents !');
            }            
        }

        $data['libelleInfo'] = $_POST['libelle'];
        $data['information'] = $_POST['information'];
        $data['dateCommunication'] = now();
        $data['public'] = 1;
        $data['demande_id'] = null;
        
        // Save source before Informations
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

        $object = new \stdClass();
        $data['source_id'] = $source_id;
        foreach ($data as $key => $value)
        {
            $object->$key = $value;
        }
  

        

        if(isset($_POST['information_id']) && $_POST['information_id']!=null){            
            $EnregistrerInformation = $InformationController->EnregistrerInformation($object, $_POST['information_id']);
            $Inform_id = $_POST['information_id'] ;
        }else{
            $EnregistrerInformation = $InformationController->EnregistrerInformation($object);
            $Inform_id = $InformationController->lastInform()->id;
        }

        if($EnregistrerInformation===true && $_FILES['documents']['name'][0]!=""){

            // Save Documents
            $AjouterDocumentDemande = $MainDemandeController->AjaxPostDocSave($_FILES['documents'], $Inform_id, $this->Document_Path);   
            if($AjouterDocumentDemande==true){
                return redirect()->route('Documents.index')->with("success", "Le document a été enregistré avec succès !");
            }else{
                return redirect()->back("error", "Une erreur est survenue lors de l'enregistrement, veuillez recommencer svp. !");
            }
        }elseif($EnregistrerInformation===true){
                return redirect()->route('Documents.index')->with("success", "Une erreur est survenue lors de l'enregistrement, veuillez recommencer svp. !");
        }else {
               
                return redirect()->back("error", "Une erreur est survenue lors de l'enregistrement, veuillez recommencer svp. !");
        }
        
    }
 
 
    public function show($id) 
    {
        $documents = Document::find($id);
        return view('admin.documents.detail', compact('documents')); 
    }
 
 
    public function edit($id) 
    {
        $documents = Document::find($id);
        return view('admin.documents.edit', compact('documents')); 
    }
 
 
    public function update(Request $request, $id) 
    {
        $documents = Document::find($id);
        $documents->libelle = $request->libelle;
        $documents->document = $request->document;
        $documents->created_at = $request->created_at;
        $documents->updated_at = $request->updated_at;
        $documents->demande_id = $request->demande_id;
        $documents->information_id = $request->information_id;
            if($documents->save())
            {
                return redirect()->route('Documents.index')->with('success', 'modification effectuée avec succès'); 
            }else
            {
                return redirect()->back()->with('error', 'La modification à échoué ');
            }
        }
 
 
    public function destroy(Request $request, $id) 
    {
        $documents = Document::find($id);
        if($documents->delete())
            {
                return redirect()->route('Documents.index')->with('success', 'suppression effectuée avec succès'); 
            }else
            {
                return redirect()->back()->with('error', 'La suppression à échoué ');
        }
    }
}
