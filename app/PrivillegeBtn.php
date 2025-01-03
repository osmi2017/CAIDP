<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrivillegeBtn extends Model
{
	public function checkPrivilege(){
		$Auth = \Auth::user()->privilegesOrga;
		return json_decode($Auth, true);
	}
	public function textNoPriv(){
		return "Vous n'avez pas les privilèges requis pour éffectuer cette action.";
	}
    public function PrivillegeBtnValidation($type){
        $checkPrivilege = $this->checkPrivilege()[$type];
        if($checkPrivilege==false){

            $data['error'] = true;
            $data['text'] = $this->textNoPriv();
        }else{
            $data['error'] = false;
            $data['text'] = $this->textNoPriv();
        }
        return $data;
    }
    
    public function decisionBtn($Demande, $Decision){
        // dd("null");
        $createDecison = $this->PrivillegeBtnValidation('createDecison')['error'];
        $valideDecison = $this->PrivillegeBtnValidation('valideDecison')['error'];
        $sendDecison = $this->PrivillegeBtnValidation('sendDecison')['error'];

        if($valideDecison===true){
            $valideDecison = "hide";
        }else{
            if($Decision->etat==1){
                $valideDecison = "hide";
            }
        }
        // dd($valideDecison);
       if($sendDecison===true){
            $sendDecison = "hide";
        }else{
            if($Decision->etat==0){
                $sendDecison = "hide";
            }
        }

        ob_start();
        ?>
        <a class="btn btn-warning pull-left editerForm <?php if($createDecison){ echo "hide" ;}?> "><i class="fa fa-edit"></i>Modifier</a> 
        <a class="btn btn-success pull-left <?php echo $valideDecison; ?>" id="valideDecison"><i class="fa fa-check"></i>Valider</a>
        <a class="btn btn-info pull-left <?php echo $sendDecison ?>" id="envoyerDecison" ><i class="fa fa-send"></i>Envoyer</a>
        <?php
        echo ob_get_clean();
    }
}




// {"createUser":true,"createDemande":true,"createFile":true,"createDecison":true,"valideDecison":true,"sendDecison":true}
