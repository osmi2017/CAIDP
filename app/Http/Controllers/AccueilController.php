<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Information;
use App\Organisme;
use App\Document;
use Illuminate\Database\Eloquent\Builder;

class AccueilController extends Controller
{
    public function __construct(){
        // $this->middleware('Requerant')->only('organismePublics');
    }

    public function index(){
    	// Toutes les Organisme ayant publié ou pas 
    	$allOrganisme = Organisme::all();
    	// ============================================
    	$Information = Information::with('document')->with('organisme')->wherePublic(1)->orderBy('created_at', 'DESC')->paginate(15);
    	$Organismes = Organisme::with('information')->orderBy('organisme', 'ASC')->paginate(15);
      // $Organismes = Organisme::whereHas('information', function(Builder $query){$query->where('public', 1);})->orderBy('organisme', 'ASC')->paginate(15);
    	$totalInfo = Information::with('document')->with('organisme')->wherePublic(1)->get();
    	//dd($Information);
      return view('front.index', compact('Information','totalInfo', 'allOrganisme', 'Organismes'));
    }

    public function organismeSearch(){
        $Organismes = Organisme::with('information')->orderBy('organisme', 'ASC')->paginate(15);
        // $Organismes = Organisme::whereHas('information', function(Builder $query){$query->where('public', 1);})->orderBy('organisme', 'ASC')->paginate(15);
        return $Organismes;
    }

    public function ajaxInfo(Request $request){
    	if($request->ajax()){
    		if($request->organisme_id!=null){
    			return $this->oneOrganismePagination($request->organisme_id);
    		}else{
    			return $this->allOrganismePagination();
    		}
    	}
    }

    public function allOrganismePagination(){
    	$Information = Information::with('document')->with('organisme')->wherePublic(1)->paginate(15);
      //dd($Information);
    	return view('front.displayInfo', compact('Information'))->render();
    }

    public function oneOrganismePagination($id){
    	$Information = Information::where('organisme_id', $id)->with('organisme')->wherePublic(1)->paginate(15);
    	//dd($Information);
      return view('front.displayInfo', compact('Information'))->render();
    }

    

    public function findOrganisme(Request $request){
    	if($request->ajax()){
    		$organisme = $request->organisme;
    		$Organismes = Organisme::with('information')->where('organisme', 'like', "%$organisme%")->paginate(15);
        // dd($Organismes);
    		return view('front.organismeSearch', compact('Organismes'))->render();
    	}
    }

    public function listRespo(){
      $listRespo = \App\Responsable::with('organisme')->where('ri', 1)->get();

      return view('front.listRespo', compact('listRespo'));
    }

    public function organismePublics($id){

    	$Organisme = Organisme::whereId($id)->with('responsable')->first();
    	if($Organisme){
    		$Information = Information::with('document')->where('organisme_id', $id)->with('organisme')->wherePublic(1)->orderBy('created_at', 'DESC')->paginate(15);
    		$Organismes = Organisme::with('information')->paginate(15);
        // $Organismes = Organisme::whereHas('information', function(Builder $query){$query->where('public', 1);})->paginate(15);
    		return view('front.organsimeShow', compact('Organisme', 'Organismes', 'Information'));
    	}else{
    		return redirect()->back();
    	}
    }

   public function searchOrganisme(request $request){
   		if($request->ajax()){
   			$searchInput = $request->searchInput;
   			$allOrganisme = Organisme::whereHas('information', function(Builder $query)use ($searchInput){$query->where('public', 1)->where('libelle', 'like', "%$searchInput%");})->get();
   			if($allOrganisme->count()==0){
   				$allOrganisme = Organisme::all();
   			}
   			ob_start();
   			foreach($allOrganisme as $value){
   			?>
   			<option> <?php echo $value->organisme ?></option>
   			<?php
   			}
   			return ob_get_clean();
   			// return view('front.homesearch', compact('allOrganisme'))->render();
   		}
   } 

   public function resulatRecherche(request $request){
    if($request->ajax()){
   			$libelle = $request->libelle;
   			$organisme = []; 

         if (is_array($request->organisme)) {
          foreach ($request->organisme as $org) {
              $organisme[] = $org;
          }
      } else {
        $organisme[0]=$request->organisme;
      }
   			$arrayID = array();
        //dd($organisme); 

         $this->setSession($libelle, $organisme);
        // ==============================================
        $InformationData = Information::with('document')->with('organisme');
        //dd($InformationData);
        $libelleArray = explode(" ", $libelle);
        
        if(in_array("rapport", $libelleArray)){ 
            array_push($libelleArray, "bilan") ;
        }elseif(in_array("bilan", $libelleArray)){ 
            array_push($libelleArray, "rapport") ;
        }elseif(in_array("Rapport", $libelleArray)){ 
            array_push($libelleArray, "bilan") ;
        }elseif(in_array("Bilan", $libelleArray)){ 
            array_push($libelleArray, "rapport") ;
        }elseif(in_array("RAPPORT", $libelleArray)){ 
            array_push($libelleArray, "bilan") ;
        }elseif(in_array("BILAN", $libelleArray)){ 
            array_push($libelleArray, "rapport") ;
        }
        //dd($libelleArray);
        //$predefArray = ['de', 'la', 'des', 'du', 'le', 'la', 'les', 'ou', 'pour', 'avec', 'et','lors', 'depuis', 'sans'];
        //foreach($libelleArray as $key =>   $value){
          //if(!in_array($value, $predefArray)){
            //$InformationData->orWhere('libelle', 'like', "%$value%");
          //}else{
            //unset($libelleArray[$key]);
          //}
        //}
        $Information = array();
        //dd($organisme);
        if(!empty($organisme)){
     			foreach ($organisme as $value) {
     				$organismeID = Organisme::where("organisme", $value)->first(); 
              echo $value;
     				  array_push($arrayID, $organismeID->id);
     		  }
   				$InformationData->whereHas('organisme', function(Builder $query)use($arrayID){$query->whereIn('id', $arrayID);});
        }
        

          
   				$InformationData =  $InformationData->where('public', 1)->distinct('libelle')->get()->toArray();
           
          foreach ($InformationData as $key => $value) {
            array_push($Information, $value);
            //dd($Information);
          }
         
   			if(count($Information)>0){
          //dd(count($Information));
   			  $title = "<h2 class='text-center'>Recherche de : <b>".$libelle."<b></h2><br>";
        }else{
          $title = null;
        }
        if($title==null){
          // dd($title);
          $noFind = "<span style='font-size:18px'>Recherche de : <b>'".$libelle."'</span></b>";
          $noFind .= "<br><span style='font-size:24px'> Aucun résultat ne correspond à votre requête</span><br>";
        }else{
          $noFind = null;
        }
        // dd($noFind);

        $libelleArray = implode("-", $libelleArray);
        $libelleArray = explode("-", strtolower($libelleArray));
        $Information = json_encode($Information);
        //dd($Information);
   			return view('front.displayInfo', compact('Information', 'title', 'libelleArray', 'noFind'));
    }
   }

   public function formulaireDemande(){
        return view('front.formDemande');
   }

   public function setSession($libelle, $organisme=null){
      \Session::put('libelle', $libelle);
      $findOrganismeID = $this->findOrganismeID($organisme);
      // dd($organisme);
      if($organisme!=null){
         if($findOrganismeID){
            \Session::put('organisme', $findOrganismeID->organisme);
         }
      }
   }

   public function findOrganismeID($organisme){
     $organisme = $organisme[0];
      $Organisme = Organisme::where('organisme', 'like', "%$organisme%")->first();
      if($Organisme->count()>0){
         return $Organisme;
      }else{
         return false;
      }
   }
}


