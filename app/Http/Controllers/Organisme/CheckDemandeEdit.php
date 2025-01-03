<?php

namespace App\Http\Controllers\Organisme;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Organisme\DemandeController;
use App\Tools\DateRewrite;

class CheckDemandeEdit extends Controller
{
    public function hideClass($Demande){
        if($Demande){
            echo "hide";
        }
    }

    public function showClass($Demande){
        if(!$Demande){
            echo "hide";
        }
    }

    public function addDone($Demande){
        if($Demande){
            echo "done";
        }
    }

    public function readOnly($Demande){
        if($Demande){
            // echo "readonly";
        }
    }

    public function sendNext($Demande){
        if($Demande){
        	?>	
        		<script type="text/javascript">
        			setTimeout(function(){
        				$("ul.steps_5 li").eq(1).trigger('click');
        			}, 1000)
        			// alert();
        		</script>
        	<?php
        }
    }

    public function sendNextDemande($Demande){
        if($Demande){
        	?>	
        		<script type="text/javascript">
        			setTimeout(function(){
        				$("ul.steps_5 li").eq(2).trigger('click');
        			}, 1500)
        			// alert();
        		</script>
        	<?php
        }
    }
    public function sendNextProro($Demande){
        if($Demande){
            if($Demande->dateProrogation!=null){
                ?>  
                    <script type="text/javascript">
                        setTimeout(function(){
                            $("ul.steps_5 li").eq(3).trigger('click');
                        }, 2000)
                        // alert();
                    </script>
                <?php
            }
        }
    }    
    public function sendNextInform($Demande){
        if($Demande){
            if($Demande->information){
            	?>	
            		<script type="text/javascript">
            			setTimeout(function(){
            				$("ul.steps_5 li").eq(4).trigger('click');
            			}, 2500)
            			// alert();
            		</script>
            	<?php
            }
        }
    }
    

    public function checkInformation($Demande){
    	if(!is_null($Demande)){
    		if(!is_null($Demande->information)){
    			return true;
    		}
    	}
    }

    public function checkInformationNoData($Demande, $Decision){
        // dd($this->checkDecison($Decision));
         if(!is_null($Demande)){
            if(is_null($Demande->information) AND $this->checkDecison($Decision)===true ){
                return true;
            }          
        }
    }

    public function checkInformationNoDataDisplayForm($Demande, $Decision){
        // dd($this->checkDecison($Decision));
         if(!is_null($Demande)){
            if(is_null($Demande->information) AND is_null($this->checkDecison($Decision)) ){
                return true;
            }else{
                return false;
            }          
        }else{
            return true;
        }
    }

    

    

    public function showClassInfo($Demande){
        if(!$this->checkInformation($Demande)){
            echo "hide";
        }
    }

    public function hideClassInfo($Demande){
        if($this->checkInformation($Demande)){
            echo "hide";
        }
    }

    public function addDoneInfo($Demande){
        if($this->checkInformation($Demande)){
            echo "done";
        }
    }

    public function readOnlyInform($Demande){
        if($this->checkInformation($Demande)){
            echo "readonly";
        }
    }

    // ====================== Prorogation ============================================
    public function checkProro($Demande, $Decision=null){
        if(!is_null($Demande)){
            if(!is_null($Demande->dateProrogation) OR !is_null($Demande->information) OR !is_null($this->checkDecison($Decision) )){
                return true;
            }
        }
    }

    public function checkProroNoData($Demande, $Decision=null){
        if(!is_null($Demande)){
            if(!is_null($Demande->dateProrogation)){
                // dd();
                return false;
            }elseif(is_null($Demande->dateProrogation) AND !is_null($Demande->information) ){
                return true;
            }elseif(is_null($Demande->dateProrogation) AND is_null($Demande->information) AND !is_null($Decision) ){
                return true;
            }else{
                return false;
            }
        }
    }

    
    public function hideClassProro($Demande){
        if($this->checkProro($Demande)){
            echo "hide";
        }
    }
    public function showClassProro($Demande){
        if(!$this->checkProro($Demande)){
            echo "hide";
        }
    }
    public function addDoneProro($Demande){
       if($this->checkProro($Demande)){
            echo "done";
        }
    }

    public function readOnlyProro($Demande){
        if($this->checkProro($Demande)){
            echo "readOnly";
        }
    }

    public function newDateProro($date, $jour){
        $newDate = new DateRewrite;
        return $newDate->newDate($date, $jour);
    }

    public function checkDecison($Decision=null){
        if(!is_null($Decision)){
            return true;
        }
    }
    public function selectedBox($Demande, $Decision){
        if($Demande){
            if(is_null($Demande->dateProrogation) AND is_null($Demande->information) AND is_null($this->checkDecison($Decision) )){
                return "proro";
            }elseif(is_null($Demande->dateProrogation) AND is_null($Demande->information) AND !is_null($this->checkDecison($Decision) )){
                return "decison";
            }elseif(is_null($Demande->dateProrogation) AND !is_null($Demande->information) AND !is_null($this->checkDecison($Decision) )){
                return "decison";
            }elseif(!is_null($Demande->dateProrogation) AND !is_null($Demande->information) AND !is_null($this->checkDecison($Decision) )){
                return "decison";
            }elseif(!is_null($Demande->dateProrogation) AND !is_null($Demande->information) AND is_null($this->checkDecison($Decision) )){
                return "information";
            }elseif(is_null($Demande->dateProrogation) AND !is_null($Demande->information) AND is_null($this->checkDecison($Decision) )){
                return "decison";
            }elseif(!is_null($Demande->dateProrogation) AND is_null($Demande->information) AND is_null($this->checkDecison($Decision) )){
                return "information";
            }elseif(!is_null($Demande->dateProrogation) AND is_null($Demande->information) AND !is_null($this->checkDecison($Decision) )){
                return "decison";
            }
        }
    }

    public function activeBox($Demande, $Decision){
        $selectedBox = $this->selectedBox($Demande, $Decision);
        // dd($selectedBox);
        if($selectedBox=="proro"){
            $position = 2;
        }elseif($selectedBox=="information"){
            $position = 3;
        }elseif($selectedBox=="decison"){
            $position = 4;
        }
        ?>
        <script type="text/javascript">
            $(document).ready(function(){
                // setTimeout(function(){
                    $("ul.steps_5 li").eq(<?php echo $position; ?>).trigger('click');
                // }, 1000);
            })
        </script>
        <?php
    }

    public function DemandeController($reqID, $dateSoumission, $demande_id,   $dateCommunication){
        $DemandeController = new DemandeController;
        $DateRewrite = new DateRewrite;

        $delaisRequis = $DemandeController->checkDedelaisDemande($reqID, $dateSoumission, $demande_id);
        $delaisRequis = json_decode($delaisRequis, true)['dateFin'];
        $differenteDate = $DateRewrite->differenteDate($dateCommunication, $delaisRequis);
        // dd($dateCommunication." - ".$delaisRequis);
        if($differenteDate>0){
            return false;
        }else{
            return true;
        }
    }

    public function afficherDelais($reqID, $dateSoumission, $demande_id, $dateCommunication=null){
        $text = "L'information a été communiquée hors délais";
        if($dateCommunication==null){
            $dateCommunication = date("Y-m-d");
            $text = "Le delais requis a expiré !";
        }
        // dd($dateCommunication);
        $delais = $this->DemandeController($reqID, $dateSoumission, $demande_id , $dateCommunication);
        if($delais===true){
            ob_start()
            ?>
            <div class="alert alert-warning-2"><i class="fa fa-warning"></i> <?php echo $text ?> </div>
            <?php
            echo ob_get_clean();
        }
    }



}
