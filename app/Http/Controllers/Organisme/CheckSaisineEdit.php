<?php

namespace App\Http\Controllers\Organisme;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Organisme\DemandeController;
use App\Tools\DateRewrite;

class CheckSaisineEdit extends Controller
{
    public function hideClass($Saisine){
        if($Saisine){
            echo "hide";
        }
    }

    public function showClass($Saisine){
        if(!$Saisine){
            echo "hide";
        }
    }

    public function addDone($Saisine){
        if($Saisine){
            echo "done";
        }
    }

    public function readOnly($Saisine){
        if($Saisine){
            // echo "readonly";
        }
    }
    

    public function showClassInfo($Saisine){
        if(!$this->checkInformation($Saisine)){
            echo "hide";
        }
    }

    public function hideClassInfo($Saisine){
        if($this->checkInformation($Saisine)){
            echo "hide";
        }
    }

    public function addDoneInfo($Saisine){
        if($this->checkInformation($Saisine)){
            echo "done";
        }
    }

    public function hideClassProro($Saisine){
        if($this->checkProro($Saisine)){
            echo "hide";
        }
    }
    public function showClassProro($Saisine){
        if(!$this->checkProro($Saisine)){
            echo "hide";
        }
    }
    public function addDoneProro($Saisine){
       if($this->checkProro($Saisine)){
            echo "done";
        }
    }

    public function readOnlyProro($Saisine){
        if($this->checkProro($Saisine)){
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
    public function selectedBox($Saisine){
        if($Saisine){
            // dd($Saisine->decisioncaipdp->etat);
            if(count($Saisine->facilitation)==0 && count($Saisine->contentieu)==0 && $Saisine->etat==null){
                return "facilitation";
            }elseif(count($Saisine->facilitation)==0 && count($Saisine->contentieu)==0 && $Saisine->etat!=null){
                return "decison";
            }elseif(count($Saisine->facilitation)>0 && count($Saisine->contentieu)==0){
                return "contentieu";
            }elseif(count($Saisine->facilitation)==0 && count($Saisine->contentieu)>0){
                // dd();
                return "decison";
            }elseif(count($Saisine->facilitation)>0 && count($Saisine->contentieu)>0){
                return "decison";
            }
        }
    }

    public function activeBox($Saisine){
        $position = 0;
        $selectedBox = $this->selectedBox($Saisine);
        // dd($selectedBox);
        if($selectedBox=="facilitation"){
            $position = 4;
        }elseif($selectedBox=="contentieu"){
            $position = 5;
        }elseif($selectedBox=="decison"){
            $position = 6;
        }
        ?>
        <script type="text/javascript">
            $(document).ready(function(){
                // setTimeout(function(){
                    <?php if($position==6){ ?>
                        if( !$("#wizard_horizontal .steps li").eq(5).hasClass('done')){
                            $("#wizard_horizontal .steps li").eq(5).addClass('done')   
                        }
                    <?php } ?>
                    $("#wizard_horizontal .steps li").eq(<?php echo $position; ?>).find("a").trigger('click');
                // }, 1000);
            })
        </script>
        <?php
    }

    public function checkReadable($Saisine){
        if($Saisine && $Saisine->autosave){
            return "readonly='readOnly'";
        }elseif($Saisine && $Saisine->savebyorganisme){
            return "readonly";
        }
    }




}
