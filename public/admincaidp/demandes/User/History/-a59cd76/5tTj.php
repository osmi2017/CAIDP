@inject("CheckSaisineEdit","App\Http\Controllers\Organisme\CheckSaisineEdit ")
@inject('Globals', 'App\Tools\Globals')
@inject("DateRewrite","App\Tools\DateRewrite")
@extends('layouts.caidp')
@section('content')
<style type="text/css">
	ul.iframeData li{
		display: inline-block;
		margin-right: 15px;
	}
    #pageTitle{
        bottom: 0;
        position: fixed;
        z-index: 999;
        background: #eee;
        width: 100%;
        margin-top: 50px;
        text-align: center;
        color: #ed6834;
        left: 0;
        right: 0;
        font-weight: bold;
        border-top: solid 1px #ddd;
    }
    .file-group {
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .file-input {
            flex: 2;
        }

        .file-name {
            flex: 3;
        }

        .remove-file {
            background-color: #f44336;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 5px;
        }

        .remove-file:hover {
            background-color: #d32f2f;
        }

        #add-file {
            margin-top: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 5px;
        }

        #add-file1:hover {
            background-color: #45a049;
        }
        #add-file1 {
            margin-top: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 5px;
        }

        #add-file1:hover {
            background-color: #45a049;
        }
        .remove-file1:hover {
            background-color: #d32f2f;
        }
        .remove-file1 {
            background-color: #f44336;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 5px;
        }
        .file-input1 {
            flex: 2;
        }

        .file-name1 {
            flex: 3;
        }
        .file-group1 {
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
</style>
<div class="modal fade bd-example-modal-xl" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
       <div class="modal-body">
          
        
                    <div id="contentieu_reponse">
                    <div class="row" id="msg">
                    <div class="col-md-12 offset-md-3 chat" id="chat">
                    
        
    		</div>
		</div>

		<form id="messageForm">
                    <input id="user_id"/>
                    <input id="contentieu_id"/>
                    <input id="caidp_id" value="1"/>
                    <label for ="reponse">Tapez le message ici:</label>
                    <textarea class="form-control" id="reponse" rows="3"></textarea><br>
                    <button type="submit" id="envoyer_reponse" class="btn btn-success float-right">Envoyer reponse</button>
                    </form>
                   </div>	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" >Fermer</button>
        
        
      </div>
    </div>
  </div>
</div>
@if($Saisine)
   <div id="pageTitle">
        <h3> {{ $Saisine->numSaisine." / ".$Globals->checkReqOrga($Saisine->demande->requerant)." - ".$Saisine->demande->organisme->organisme }}  </h3>
   </div>
@endif
<div class="row clearfix">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
        @if($Saisine)
        <div class="header hide">
            <h2>{{ $Saisine->numSaisine." / ".$Globals->checkReqOrga($Saisine->demande->requerant)." - ".$Saisine->demande->organisme->organisme }}</h2>
        </div>
        @endif
        <div class="body">
            <div id="wizard_horizontal" role="application" class="wizard clearfix">
                <div class="steps clearfix">
                    <ul role="tablist" id="wizardRow">
                        <li  class="first current {{ $CheckSaisineEdit->addDone($Saisine) }} " >
                        	<a id="wizard_horizontal-t-0" href="#" data-content="wizard_horizontal-p-0" >
                        		<span class="number">1</span> <br>Requerant
                        	</a>
                        </li>
                        <li  class=" disabled {{ $CheckSaisineEdit->addDone($Saisine) }} " >
                        	<a id="wizard_horizontal-t-1" href="#" data-content="wizard_horizontal-p-1" >
                        		<span class="number">2</span> <br>Organisme
                        	</a>
                        </li>
                        <li  class="disabled {{ $CheckSaisineEdit->addDone($Saisine) }} " >
                        	<a id="wizard_horizontal-t-2" href="#" data-content="wizard_horizontal-p-2" >
                        		<span class="number">3</span> <br>Demande
                        	</a>
                        </li>
                        <li  class="disabled {{ $CheckSaisineEdit->addDone($Saisine) }} " >
                        	<a id="wizard_horizontal-t-3" href="#" data-content="wizard_horizontal-p-3">
                        		<span class="number">4</span> <br>Saisine
                        	</a>
                        </li>
                       <!-- <li  class="disabled {{ $CheckSaisineEdit->addDone($Saisine) }} " >
                        	<a id="wizard_horizontal-t-4" href="#" data-content="wizard_horizontal-p-4">
                        		<span class="number">5</span> <br>Facilitation
                        	</a>
                        </li>-->
                        
                        <li  class="disabled {{ $Saisine && count($Saisine->contentieu)!=0 ? "done" : "" }}" >
                        	<a id="wizard_horizontal-t-5" href="#" data-content="wizard_horizontal-p-5">
                        		<span class="number">5</span> <br>Instruction
                        	</a>
                        </li>
                        
                        <li  class="disabled last" >
                        	<a id="wizard_horizontal-t-6" href="#" data-content="wizard_horizontal-p-6" >
                        		<span class="number">6</span> <br>Décision
                        	</a>
                        </li>

                    </ul>
                </div>
                <div class="content clearfix">
                    <section id="wizard_horizontal-p-0"  class="body current" >
                        <form enctype="multipart/form-data" class="form-horizontal {{ !$Saisine ? "" : "hide" }}" >
                        	<legend>Identification du requérant</legend>
                        	<div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="email">Email</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input id="emailChecker" name="email" class="form-control" placeholder="Trouver un requerant existant à partir de son mail" type="email" autocomplete="off"  value="{{ $Saisine ? $Saisine->demande->requerant->email:"" }}">
                                        </div>
                                    </div>
                                    <span class="invalid-feedback"></span>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="contact">Contact <span>*</span> </label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input id="contactChecker" name="contact" class="form-control contactNumber" placeholder="Trouver un requerant existant à partir de son contact" type="text" required="" autocomplete="off" value="{{ $Saisine ? $Saisine->demande->requerant->contact:"" }}">
                                        </div>
                                    </div>
                                    <span class="invalid-feedback"></span>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="type_id">Type de demandeur</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="">
                                            @foreach($Type as $value)
                                                <input name="type_id" type="radio" id="typeDem{{ $value->id }}" value="{{ $value->id }}"  />
                                                <label for="typeDem{{ $value->id }}">{{ $value->type }}</label>
                                            @endforeach
                                            
                                        </div>  
                                    </div>
                                    <span class="invalid-feedback"></span>
                                </div>
                            </div>
                            <div class="row clearfix hide" id="denomminationBox">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="secteur">Dénomination Entreprise/Structure</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="denomination" name="denomination"  class=" form-control sm-control" placeholder="" value="{{ $Saisine ? $Saisine->demande->requerant->denomination:"" }}">
                                            
                                        </div>
                                    </div>
                                    <span class="invalid-feedback"></span>
                                </div>
                            </div>
                            <div id="nomPrenomBox" style="margin-bottom: 13px">
                                <div class="row clearfix" style="display:none">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="civilite"></label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="display:none">
                                        <div class="form-group">
                                            <div class="">
                                                <input name="civilite" type="radio" id="M" value="M"  />
                                                <label for="M">Monsieur</label>
                                                <input name="civilite" type="radio" id="Mme" value="Mme"  />
                                                <label for="Mme">Madame</label>
                                                <input name="civilite" type="radio" id="Mlle" value="Mlle"  />
                                                <label for="Mlle">Mademoiselle</label>
                                            </div>
                                            <span class="invalid-feedback"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5 form-control-label">
                                        <label for="nom">Nom et prénom <span>*</span></label>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-3 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input id="nom" name="nom" class="form-control" value="{{ $Saisine ? $Saisine->demande->requerant->nom:"" }}" type="text" required="" placeholder="Nom">
                                            </div>
                                            <span class="invalid-feedback"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-7 col-md-6 col-sm-6 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input id="prenom" name="prenom"  value="{{ $Saisine ? $Saisine->demande->requerant->prenom:"" }}" class="form-control" type="text" required="" placeholder="Prénom">
                                            </div>
                                        </div>
                                        <span class="invalid-feedback"></span>
                                    </div>
                                </div>
                            </div>
                            
                           {{--  <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="prenom">Prénom <span>*</span></label>
                                </div>
                                
                            </div> --}}
                            
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="contact2">Contact</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input id="contact2" name="contact2" value="{{ $Saisine ? $Saisine->demande->requerant->contact2:"" }}" class="form-control contactNumber" placeholder="" type="text">
                                        </div>
                                    </div>
                                    <span class="invalid-feedback"></span>
                                </div>
                            </div>
                            
                            <div id="nameBox">
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="qualite">Qualité du demandeur <span>*</span></label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                        	<input type="text"  class="form-control requis" list="listQualite" id="qualite" name="qualite" required="" autocomplete="off" value="{{ $Saisine ? $Saisine->demande->requerant->qualite->qualite:"" }}">
			                               	<datalist id="listQualite">
			                            		@foreach($QualiteReq as $value)
			                                		<option>{{ $value->qualite }}</option>
			                                	@endforeach	
			                            	</datalist> 
                                        </div>
                                    </div>
                                    <span class="invalid-feedback"></span>
                                </div>
                            </div>
                            </div>
                             <div id="representantData" style="margin-bottom: 13px;">
                                
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="type_secteur">Type de secteur d'activité</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="">
                                            @foreach($Typesecteurs as $value)
	                                		<input type="radio" name="type_secteur" value="{{ $value->id }}" id="id{{ $value->id }}"> 
	                                		<label for="id{{ $value->id }}">{{ $value->type_secteur }}</label>
	                                	@endforeach
                                			
                                        </div>
                                    </div>
                                    <span class="invalid-feedback"></span>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="secteur">Secteur d'activité</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                        	<input type="text" id="secteur" name="secteur" list="listSecteur" class=" form-control sm-control" placeholder="Ex : Informe, Banque" value="{{ $Saisine && $Saisine->demande->requerant->secteur ? $Saisine->demande->requerant->secteur->secteur :"" }}">
		                            		<datalist id="listSecteur">
		                                	@foreach($Secteurs as $value)
		                                		<option>{{ $value->secteur }}</option>
		                                	@endforeach
	                            			</datalist>
                                       	</div>
                                    </div>
                                    <span class="invalid-feedback"></span>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="secteur">Etes-vous mandataire ?</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="">
                                            <input name="mandant" type="checkbox" id="mandant" value="oui"  />
                                                <label for="mandant"></label>
                                        </div>
                                    </div>
                                    <span class="invalid-feedback"></span>
                                </div>
                            </div>
                            
                             <div class="hide" id="mandantBox">
                            <h4>Informations mandant</h4>
                            <hr>
                            <div class="row clearfix hide">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="type_id">Type de mandant</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="">
                                            <input name="type_mandant" type="radio" id="pers_moral" value="pers_moral"  />
                                            <label for="pers_moral">Personne morale</label>
                                            <input name="type_mandant" type="radio" id="pers_phys" value="pers_phys"  checked="" />
                                            <label for="pers_phys">Personne physique</label>
                                            
                                        </div>  
                                    </div>
                                    <span class="invalid-feedback"></span>
                                </div>
                            </div>
                            <div class="row clearfix hide" id="denomBox">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="secteur">Dénomination Entreprise/Structure</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="denommination" name="denommination"  class=" form-control sm-control" placeholder="" value="">
                                            
                                        </div>
                                    </div>
                                    <span class="invalid-feedback"></span>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="civiliteMandant"></label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="">
                                            <input name="sexeMandataire" type="radio" id="MM" value="M"  />
                                            <label for="MM">Monsieur</label>
                                            <input name="sexeMandataire" type="radio" id="MMme" value="Mme"  />
                                            <label for="MMme">Madame</label>
                                            <input name="sexeMandataire" type="radio" id="MMlle" value="Mlle"  />
                                            <label for="MMlle">Mademoiselle</label>
                                        </div>
                                        <span class="invalid-feedback"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5 form-control-label">
                                    <label for="nom" id="nomMandatairelabel">Nom & prénom<span>*</span></label>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-3 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input id="nomMandataire" name="nomMandataire" class="form-control" value="" type="text" required="" placeholder="Nom">
                                        </div>
                                        <span class="invalid-feedback"></span>
                                    </div>
                                </div>
                                <div class="col-lg-7 col-md-6 col-sm-6 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input id="prenomMandataire" name="prenomMandataire"  value="" class="form-control" type="text" required="" placeholder="Prénom">
                                        </div>
                                    </div>
                                    <span class="invalid-feedback"></span>
                                </div>
                            </div>
                            
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="">Email</label>
                                </div>
                                <div class="col-md-10 col-xs-12 ">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="emailMandant" class="form-control"> 
                                        </div>
                                    </div>
                                </div>  
                            </div>

                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="">Pièce justification <span>*</span> </label>
                                </div>
                                <div class="col-md-6 col-xs-12 ">
                                     <div class="form-group">
                                        <div class="-line">
                                            <input type="file" name="pieceMandant" >
                                         <span class="invalid-feedback text-danger" role="alert"></span>
                                        </div>
                                    </div>
                                </div>  
                            </div>

                         </div>

                            <input type="hidden" name="requerantId" id="requerantId" value="{{ $Saisine ? $Saisine->demande->requerant->id  : ""}}">
                            <input type="hidden" id="savebycaidp"  name="savebycaidp" value="{{ $Saisine ? $Saisine->demande->requerant->savebycaidp  : ""}}">
                            <div class="actions clearfix">
                                <div class="progress" style="display:none">
                                    <div class="progress-bar  progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-width="100" aria-valuenow="0"></div>
                                </div>
			                    <a href="#" class="btn btn-info pull-right btn-lg next {{ $Saisine  ? ""  : "hide"}} waves-effect" style="margin-left: 10px">Suivant <i class="fa fa-chevron-right"></i></a>
			                    <a href="#" class="btn btn-success pull-right btn-lg send waves-effect" id="sendDemandeur" > <span><i class="fa fa-save"></i></span>  Enregistrer  </a>

			                </div>
                        </form>
                        <div id="requerantDataTable" class="EditForm {{ $Saisine ? "" : "hide" }}">
                        	<div class="clearfix">
                                @if($Saisine && $Saisine->demande->requerant->savebycaidp)
			                    <a href="#" class="btn btn-success  editBtn pull-left btn-lg waves-effect" >Modifier</a>
                                @endif
			                    <a href="#" class="btn btn-info pull-right btn-lg next waves-effect">Suivant <i class="fa fa-chevron-right"></i> </a>			                    
			                </div>
			                <hr>
                        	@if($Saisine)
                        	<table class="table table-striped">
                                <caption>Information du requérant</caption>

                        	
                        		<tr>
                        			<th>Nom et Prénom</th>
                        			<td>{{ $Saisine->demande->requerant->nom." ".$Saisine->demande->requerant->prenom }}</td>
                        		</tr>
                        		<tr>
                        			<th>Qualité</th>
                        			<td>{{ $Saisine->demande->requerant->qualite->qualite}}</td>
                        		</tr>
                        		<tr>
                        			<th>Contact 1</th>
                        			<td>{{ $Saisine->demande->requerant->contact }}</td>
                        		</tr>
                                <tr>
                        			<th>Type de demandeur</th>
                        			<td>{{ $Saisine->demande->requerant->type->type }}</td>
                        		</tr>
                                <tr>
                        			<th>Contact 2</th>
                        			<td>{{ $Saisine->demande->requerant->contact2 }}</td>
                        		</tr>
                        		<tr>
                        			<th>Email</th>
                        			<td>{{ $Saisine->demande->requerant->email }}</td>
                        		</tr>
                                <tr>
                        			<th>Type de secteur d'activité</th>
                        			<td>{{ $Saisine->demande->requerant->secteur->secteur }}</td>
                        		</tr>
                        		
                        	</table>

                            @if($Saisine->demande->mandant_id)
                            <table class="table table-striped">
                                <caption>Information du mandataire</caption>
                                @if($Saisine->demande->mandant->denommination!=null)
                                <tr>
                                    <td>Dénomination</td>
                                    <td>{{ $Saisine->demande->mandant->denommination }}</td>
                                </tr>
                                @endif
                                <tr>
                                    <th>{{ $Saisine->Demande->mandant->denommination!=null ? "Représentant" : "Nom et prénom" }}</th>
                                    <td>{{ $Saisine->demande->mandant->nom." ".$Saisine->demande->mandant->prenom }}</td>
                                </tr>
                                @if($Saisine->demande->mandant->email)
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $Saisine->demande->mandant->email }}</td>
                                </tr>
                                @endif
                                <tr>
                                    <th>Pièce justificative</th>
                                    <td>
                                        <iframe src="{{ asset('mandats/'.$Saisine->demande->mandant->pieceMandant) }}"></iframe>
                                        <a href="#" title="Zoomer" class="ZoomerIframe"><i class="fa fa-search-plus" ></i>Zoomer</a>
                                    </td>
                                </tr>
                            </table>
                            @endif
                        	@endif
                        </div>
                    </section>

                    <section id="wizard_horizontal-p-1"  class="body hide">
                        <form enctype="multipart/form-data" class="form-horizontal {{ !	$Saisine ? "" : "hide" }}" >
                        	<legend>Enregistrement de l'organisme</legend>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="organisme">Dénomination</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" value="{{ $Saisine ? $Saisine->demande->organisme->organisme:"" }}" name="organisme" class="form-control" required="" id="checkOrga" list="organismeList" autocomplete="off">
                                            <datalist id="organismeList">
                                            	@foreach($Organisme as $value)
                                            		<option>{{ $value->organisme }}</option>
                                            	@endforeach
                                            </datalist>
                                        </div>
                                        <span class="invalid-feedback"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="siege">Siège <span>*</span></label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" value="{{ $Saisine ? $Saisine->demande->organisme->siege:"" }}" name="siege" id="siege" class="form-control" required="" placeholder="Siège *">
                                        </div>
                                        <span class="invalid-feedback"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="email">Email <span>*</span></label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="email" value="{{ $Saisine ? $Saisine->demande->organisme->email:"" }}" name="email[]" id="email" class="form-control" required="" rel="1" >
                                        </div>
                                    </div>
                                    <span class="invalid-feedback"></span>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="contact">Contact</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" value="{{ $Saisine ? $Saisine->demande->organisme->contact:"" }}" id="contact" name="contact[]" class="form-control contactInput contactNumber" required="" placeholder="Contact *">
                                        </div>
                                    </div>
                                    <span class="invalid-feedback"></span>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="display:none">
                                    <label for="logo">Logo1 <span>*</span> </label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="display:none">
                                    <div class="form-group">
                                        <div class="form-ine">
                                           	<input type="file" name="logo" class="" id="logo">
							 				<img id="preview" src="#" alt="Votre logo" class="{{$Saisine && $Saisine->demande->organisme->logo!=null ? "" : "hide" }}" width="100" />
							 				@if( $Saisine && $Saisine->demande->organisme->logo!=null)
							 					<img src="{{ asset('images/'.$Saisine->demande->organisme->logo) }}">
							 				@endif
                                        </div>
                                    </div>
                                    <span class="invalid-feedback"></span>
                                </div>
                            </div>
                            <input type="hidden" name="reqIdQual" id="reqIdQual" value="{{ $Saisine ? $Saisine->demande->requerant->id : "" }}">
                            <br>
                            <legend>Identification du responsable de l'information</legend>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="nom">Nom</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" value="{{ $Saisine && $RespoInfo ? $RespoInfo->nom : ""}}" name="nom" id="nom" class="form-control" required="" >
                                        </div>
                                    </div>
                                    <span class="invalid-feedback"></span>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="prenom">Prénom</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                        	<input type="text" value="{{ $Saisine && $RespoInfo ? $RespoInfo->nom : ""}}" name="prenom" id="prenom" class="form-control" required="">                                			
                                        </div>	
                                    </div>
                                    <span class="invalid-feedback"></span>
                                </div>
                            </div>
                            

                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="autreQualite">Qualité</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                        	<input required  type='text' class='form-control' name='autreQualite' list="autreQualiteList" autocomplete="off" id="autreQualite" value="{{ $Saisine && $RespoInfo ? $RespoInfo->qualiteresponsable->qualite : ""}}">
											<datalist id="autreQualiteList">
												@foreach($Qualiteresponsable as $value)
													<option>{{ $value->qualite }}</option>
												@endforeach
											</datalist>
                                        </div>
                                    </div>
                                    <span class="invalid-feedback"></span>
                                </div>
                            </div>
                            <div class="row clearfix hide">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="ri">Responsable de l'information </label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="">
                                            <input type="hide" name="ri" value="rh" id="ri" class="responsabilite" >
                                        </div>
                                    </div>
                                    <span class="invalid-feedback"></span>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="emailrespo">Email</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                        	<input type="email" name="emailrespo[]" class="form-control" required="" value="{{ $Saisine ? $RespoInfo->email : "" }}" id="emailrespo">
                                       	</div>
                                    </div>
                                    <span class="invalid-feedback"></span>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="contactRespo">Contact</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                        	<input type="text" name="contactRespo[]" class="form-control contactInput contactNumber" required=""  value="{{ $Saisine ? $RespoInfo->contact : "" }}" id="contactRespo"> 
                                       	</div>
                                    </div>
                                    <span class="invalid-feedback"></span>
                                </div>
                            </div>
                            <input type="hidden" name="responsable_id" id="responsable_id" value="{{ $Saisine && $RespoInfo?  $RespoInfo->id : "" }}">
                            <input type="hidden"  name="qualite" value="autre">
                            <input type="hidden" id="organisme_id"  name="organisme_id" value="{{ $Saisine ? $Saisine->demande->organisme->id : ""}}">
                            <input type="hidden" id="savebycaidp"  name="savebycaidp" value="1">
                            <div class="actions clearfix">
                                <div class="progress" style="display:none">
                                    <div class="progress-bar  progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-width="100" aria-valuenow="0"></div>
                                </div>
                            	<a href="#" class="btn btn-default pull-left btn-lg previous  waves-effect" ><i class="fa fa-chevron-left"></i> Précédent </a>
                            	<a href="#" class="btn btn-info pull-right btn-lg next hide waves-effect" style="margin-left: 10px">Suivant <i class="fa fa-chevron-right"></i></a>
			                    <a href="#" class="btn btn-success pull-right btn-lg send" id="sendOrganisme" class="waves-effect"><span><i class="fa fa-save"></i></span> Enregistrer</a>
			                </div>
                        </form>
                        <div id="organismeDataTable" class="EditForm {{ $Saisine ? "" : "hide" }}">
                        	<div class="clearfix">
                                @if($Saisine && $Saisine->demande->organisme->savebycaidp)
			                    <a href="#" class="btn btn-success  editBtn pull-left btn-lg waves-effect" >Modifier</a>
                                @endif
			                    <a href="#" class="btn btn-info pull-right btn-lg next waves-effect" >Suivant <i class="fa fa-chevron-right"></i></a>			                    
			                </div>
			                <hr>
			                @if($Saisine)
			                <table class="table table-striped">
			                	<caption><h4>Information organisme</h4></caption>
                               
			                	<tr>
			                		<th>Organisme</th>
			                		<td>{{ $Saisine->demande->organisme->organisme }}</td>
			                	</tr>
			                	<tr>
			                		<th>siege</th>
			                		<td>{{ $Saisine->demande->organisme->siege }}</td>
			                	</tr>
			                	<tr>
			                		<th>contact</th>
			                		<td>{{ $Saisine->demande->organisme->contact }}</td>
			                	</tr>
			                	<tr>
			                		<th>Email</th>
			                		<td>{{ $Saisine->demande->organisme->email }}</td>
			                	</tr>
			                </table>
			                <br>
			                <table class="table table-striped">
			                	<caption><h4>Responsable de l'information</h4></caption>
			                	<thead>
			                		<tr>
			                			<th>Nom & prénom</th>
			                			<th>Qualité</th>
			                			<th>Contact</th>
			                			<th>Email</th>
			                		</tr>
			                	</thead>
			                	<tbody>
			                		@foreach($Saisine->demande->organisme->responsable as $value)
			                		<tr>
			                			<td>{{ $value->nom." ".$value->prenom }}</td>
			                			<td>
			                				{{ $value->qualiteresponsable->qualite }}
			                				
			                			</td>
			                			<td>{{ $value->contact }}</td>
			                			<td>{{ $value->email }}</td>
			                		</tr>
			                		@endforeach
			                	</tbody>
			                </table>
			                @endif
			                <hr>

			            </div>

                    </section>

                    <section id="wizard_horizontal-p-2"  class="body hide">
                        <form class="form-horizontal {{ !$Saisine ? "" : "hide" }}">
                        	<legend>Enregistrement de la demande qui fait objet de la saisine</legend>
                        	<div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="emailrespo">objet de la demande <span>*</span></label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea class="form-control" type="text" name="libelle" required="" spellcheck="true" list="saisineLoad" placeholder="Ex : - Rapport des activités 2019&#10; - Liste des commissaires &#10; - Liste des organismes publics en CI">{{ $Saisine ? $Saisine->demande->libelle : "" }}</textarea>
                                        	{{-- <input value="" autocomplete="off" > --}}
                                        	{{-- <datalist id="saisineLoad"></datalist> --}}
                                       	</div>
                                    </div>
                                    <span class="invalid-feedback"></span>
                                </div>
                            </div>
                            <div class="row clearfix" style="display:none">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="emailrespo">Description</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                        	<textarea name="description" cols="40" rows="3" id="description" placeholder="Description" lang="fr" spellcheck="true" class="form-control">{{ $Saisine ? $Saisine->demande->description : "" }}</textarea>
                                       	</div>
                                    </div>
                                    <span class="invalid-feedback"></span>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="emailrespo">Date de soumission</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                        	<input type="text" name="dateDemande" class="form-control date" required="" value="{{ $Saisine ? explode(" ",  $Saisine->demande->dateDemande)[0] : "" }}">
                                       	</div>
                                    </div>
                                    <span class="invalid-feedback"></span>
                                </div>
                            </div>
                            <div class="row clearfix">
	                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
	                                <label for="dateSaisine">Document(s) </label>
	                            </div>
	                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div id="file-container">
	                                <div class="form-group">
	                                    <div class="">
                                    @if($Saisine && $Saisine->demande->savebycaidp)
                                        @foreach($demande_doc as $file)
                                        @if(is_array($file))
                                        @foreach($file as $subFile)
                                        <div class="document-item">
                                                <input value="{{ asset('admincaidp/demandes/' . $subFile) }}" >
                                                <input type="text" class="file-name" placeholder="Nom du document" name="document_names[]" value="{{ basename($subFile) }}">
                                                <button type="button" class="remove-file">Supprimer</button></br>
                                            </div>
                                            @endforeach
                                            @else
                                            <div class="document-item">
                                            <input value="{{ asset('admincaidp/demandes/' . $file) }}" >
                                                <input type="text" class="file-name" placeholder="Nom du document" name="document_names[]" value="{{ basename($file) }}">
                                                <button type="button" class="remove-file">Supprimer</button>
                                            </div>
                                            @endif
                                        @endforeach
                                    @else
                                        <input type="file" class="form-control" name="documents[]" multiple>
                                        <input type="text" class="file-name" placeholder="Nom du document" name="document_names[]">
                                    @endif
                                 </div>
                                           
	                                </div>
                                </div>
                                <button type="button" id="add-file">Ajouter un autre fichier</button>
	                                <span class="invalid-feedback"></span>
	                            </div>
	                        </div>
                            <div class="row clearfix" style="display:none">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="emailrespo">Direction</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                        	<input class="form-control" type="text" name="direction" placeholder=""  spellcheck="true" value="{{ $Saisine ? $Saisine->demande->direction : "" }}">
                                       	</div>
                                    </div>
                                    <span class="invalid-feedback"></span>
                                </div>
                            </div>
                            <div class="row clearfix" style="display:none">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="emailrespo">Service </label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                        	<input class="form-control" type="text" name="service" placeholder="" spellcheck="true" value="{{ $Saisine ? $Saisine->demande->service : "" }}" >
                                       	</div>
                                    </div>
                                    <span class="invalid-feedback"></span>
                                </div>
                            </div>
                            <input type="hidden" id=""  name="savebycaidp" value="1">
                            <input type="hidden" name="dem_idHide" value="{{ $Saisine ? $Saisine->demande->id : "" }}">
                            <input type="hidden" name="reqId" id="reqId" value="{{ $Saisine ? $Saisine->demande->requerant->id : "" }}">
                            <input type="hidden" name="orga_id" id="orga_id" value="{{ $Saisine ? $Saisine->demande->organisme->id : "" }}">
                            <div class="actions clearfix">
                                <div class="progress" style="display:none">
                                    <div class="progress-bar  progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-width="100" aria-valuenow="0"></div>
                                </div>
                            	<a href="#" class="btn btn-default pull-left btn-lg previous  waves-effect" ><i class="fa fa-chevron-left"></i> Précédent </a>
                            	<a href="#" class="btn btn-info pull-right btn-lg next hide waves-effect" style="margin-left: 10px">Suivant <i class="fa fa-chevron-right"></i></a>
			                    <a href="#" class="btn btn-success pull-right btn-lg send" id="sendInform" class="waves-effect"><span><i class="fa fa-save"></i></span> Enregistrer</a>
			                </div>        
                            
                        </form>
                        <div id="demandeDataTable" class="EditForm {{ $Saisine ? "" : "hide" }}">
                        	<div class="clearfix">
                                {{-- @if($Saisine && $Saisine->demande->savebycaidp) --}}
			                    <a href="#" class="btn btn-success editBtn pull-left btn-lg waves-effect" >Modifier</a>
                                {{-- @endif --}}
			                    <a href="#" class="btn btn-info pull-right btn-lg next waves-effect" >Suivant <i class="fa fa-chevron-right"></i></a>	
			                </div>
			                <hr>
			                @if($Saisine)
			                <table class="table table-striped">
                               
			                	
			                	<tr>
			                		<th>Objet de la demande</th>
			                		<td>{!! $Saisine->demande->libelle !!}</td>
			                	</tr>
			                	<tr>
			                		<th>Date de soumission</th>
			                		<td>{{ $Saisine->demande->dateDemande }}</td>
			                	</tr>
                                <tr>
			                		<th>Documents</th>
                                
			                		<td>
                                    @foreach($demande_doc as $file)
                                          
                                        @if(is_array($file))
                                            <!-- Handle the case where $file is an array -->
                                            @foreach($file as $subFile)
                                                <a href="{{ asset('admincaidp/demandes/' . $subFile) }}" target="_blank">{{$subFile}}</a><br>
                                            @endforeach
                                        @else
                                            <a href="{{ asset('admincaidp/demandes/' . $file) }}" target="_blank">{{$file}}</a><br>
                                        @endif
                                    @endforeach
                                    </td>
                                    
			                	</tr>

			                </table>
			                @endif
			            </div>
                    </section>

                    <section id="wizard_horizontal-p-3"  class="body hide">
                    	<form enctype="multipart/form-data" class="form-horizontal {{ !$Saisine ? "" : "hide" }}" >
                    		<legend>Enregistrement de la saisine</legend>
	                        <div class="row clearfix">
	                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
	                                <label for="motif">Auteur de la saisine <span>*</span> </label>
	                            </div>
	                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
	                                <div class="form-group">
	                                    <div class="">
	                                    	<input type="radio" name="auteurSaisine" value="1" id="usager" checked=""> <label for="usager">Personne physique</label> 
	                                    	<input type="radio" name="auteurSaisine" value="2" id="organisme" > <label for="organisme">Personne morale</label> 
	                                    	<input type="radio" name="auteurSaisine" value="3" id="organisme" > <label for="organisme">Autosaisine</label> 
	                                   	</div>
	                                </div>
	                                <span class="invalid-feedback"></span>
	                            </div>
	                        </div>
	                        <div class="row clearfix">
	                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
	                                <label for="motif">Motif de la saisine <span>*</span> </label>
	                            </div>
	                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
	                                <div class="form-group">
	                                    <div class="form-line">
	                                    	<input class="form-control" type="text" name="motif" value="{{ $Saisine ? $Saisine->motif : "" }}" placeholder="" spellcheck="true" required="" list="SaisinepredefiniesList" {{ $CheckSaisineEdit->checkReadable($Saisine) }} >
	                                    	<datalist id="SaisinepredefiniesList">
	                                    		@foreach($Saisinepredefinies as $value)
	                                    		<option >{{ $value->typeSaisine }}</option>
	                                    		@endforeach
	                                    	</datalist>
	                                   	</div>
	                                </div>
	                                <span class="invalid-feedback"></span>
	                            </div>
	                        </div>
	                        <div class="row clearfix">
	                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
	                                <label for="description">Description </label>
	                            </div>
	                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
	                                <div class="form-group">
	                                    <div class="form-line">
	                                    	<textarea class="form-control" name="description" value="{{ $Saisine ? $Saisine->description: "" }}" placeholder="" spellcheck="true" {{ $CheckSaisineEdit->checkReadable($Saisine) }}></textarea>
	                                   	</div>
	                                </div>
	                                <span class="invalid-feedback"></span>
	                            </div>
	                        </div> 
	                        <div class="row clearfix">
	                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
	                                <label for="dateSaisine">Date de la saisine </label>
	                            </div>
	                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
	                                <div class="form-group">
	                                    <div class="form-line">
	                                    	<input type="text" class="form-control date" name="dateSaisine" value="{{ $Saisine ? explode(" ", $Saisine->dateSaisine)[0] : "" }}" placeholder="" {{ $CheckSaisineEdit->checkReadable($Saisine) }}>
	                                   	</div>
                                        
	                                </div>
	                                <span class="invalid-feedback"></span>
	                            </div>
	                        </div>
                            <div class="row clearfix">
	                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
	                                <label for="dateSaisine">Documents </label>
	                            </div>
	                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div id="file-container1">
	                                <div class="form-group">
	                                    <div class="">
	                                    	<input type="file" class="form-control " name="documents[]" multiple>
	                                    	<input type="text" class="file-name" placeholder="Nom du document">
	                                   	</div>
                                           
	                                </div>
                                </div>
                                <button type="button" id="add-file1">Ajouter un autre fichier1</button>
	                                <span class="invalid-feedback"></span>
	                            </div>
	                        </div>
	                        <hr>
	                        <div class="row clearfix">
	                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
	                                <label for="dateSaisine">Résumé de l'affaire </label>
	                            </div>
	                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
	                                <div class="form-group">
	                                    <div class="form-line">
	                                    	<textarea class="form-control" name="resume" id="resume">{{ $Saisine ? $Saisine->resume : "" }}</textarea>
	                                   	</div>
	                                </div>
	                                <span class="invalid-feedback"></span>
	                            </div>
	                        </div>
	                        
	                        <input type="hidden" name="demande_id" id="demande_id" value="{{ $Saisine ? $Saisine->demande->id : "" }}">
	                        <input type="hidden" name="saisine_id" id="saisine_id" value="{{ $Saisine ? $Saisine->id : "" }}">
                            @if(!$Saisine)
                            <input type="hidden" id=""  name="savebycaidp" value="1">
                            @elseif($Saisine && $Saisine->savebycaidp)
                            <input type="hidden" id=""  name="savebycaidp" value="1">
                            @endif
                            <div class="actions clearfix">
                                <div class="progress" style="display:none">
                                    <div class="progress-bar  progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-width="100" aria-valuenow="0"></div>
                                </div>
                            	<a href="#" class="btn btn-default pull-left btn-lg previous  waves-effect" ><i class="fa fa-chevron-left"></i> Précédent </a>
                            	<a href="#" class="btn btn-info pull-right btn-lg next hide waves-effect" style="margin-left: 10px">Suivant <i class="fa fa-chevron-right"></i></a>
			                    <a href="#" class="btn btn-success pull-right btn-lg send" id="sendSaisine" class="waves-effect"><span><i class="fa fa-save"></i></span> Enregistrer</a>
			                </div>
	                        
                        </form>
                        <div id="saisineDataTable" class="EditForm {{ $Saisine ? "" : "hide" }}">
                        	<div class="clearfix">
			                    <a href="#" class="btn btn-success editBtn pull-left btn-lg waves-effect" >Modifier</a>
			                    <a href="#" class="btn btn-info pull-right btn-lg next waves-effect" >Suivant <i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i></a>	
			                </div>
			                <hr>
			                @if($Saisine)
			                <table class="table table-striped">
			                	<tr>
			                		<th>Objet de la saisine</th>
			                		<td>{{ $Saisine->motif }}</td>
			                	</tr>
			                	
			                	<tr>
			                		<th>Date de saisine</th>
			                		<td>{{ $Saisine->dateSaisine }}</td>
			                	</tr>
			                	<tr>
			                		<th>Etat</th>
			                		<td>{{ $Saisine->etat }}</td>
			                	</tr>
			                	<tr>
			                		<td>Accusé de reception/Documents</td>
			                		<td>
			                			<ul>
			                				{{-- {{ dd($Saisine->docsaisine) }} --}}
			                			@foreach($Saisine->docsaisine as $value)
			                				<li>
            									<a href="#" title="Zoomer" class="ZoomerIframe"><i class="fa fa-search-plus" ></i>Zoomer</a>
            									<br>
            									<iframe src="{{ asset("/docsaisines/".$value->document) }}" width="200"></iframe> <br>
            									<span class="renameFile" data-type="saisine" contenteditable="" id="{{ $value->id }}" data-default="Nommer le fichier" data-change="{{ $value->nomFichier ? 1 : 0 }}">{{ $value->nomFichier ? $value->nomFichier : "Renommer le fichier ici" }}</span>
            								</li>	
			                			@endforeach
			                			</ul>
			                			
			                		</td>
			                	</tr>
			                	<tr>
			                		<th>Résumé</th>
			                		<td>{!! $Saisine->resume !!}</td>
			                	</tr>
			                	
			                </table>
			                @endif
			            </div>

                    </section>
                    <!--<section id="wizard_horizontal-p-4"  class="body hide">
                        <form enctype="multipart/form-data" class="form-horizontal" >
                        	<legend>Enregistrement d'une action</legend>
                        	<div id="facilitationList">
                        		@include("admin.include.facilitationList")
                        	</div>
                        	<hr>
                        	<div class="row clearfix suiteForm" @if($Saisine) style="display: none;" @endif >
	                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
	                                <label for="dateFacilitation">Date <span>*</span></label>
	                            </div>
	                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
	                                <div class="form-group">
	                                    <div class="form-line">
	                                    	<input type="text" name="dateFacilitation" id="dateFacilitation" class="form-control date" required="">
	                                   	</div>
	                                </div>
	                                <span class="invalid-feedback"></span>
	                            </div>
	                        </div>
	                        <div class="row clearfix suiteForm" @if($Saisine) style="display: none;" @endif >
	                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
	                                <label for="actionFacilitation">Action <span>*</span></label>
	                            </div>
	                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
	                                <div class="form-group">
	                                    <div class="form-line">
	                                    	<input type="text" name="actionFacilitation" id="actionFacilitation" class="form-control " required="" list="actionFacilitationList" value="">
	                                    	@if(!is_null($actionFacilitation))
	                                    	<datalist id="actionFacilitationList">
	                                    		@foreach($actionFacilitation as $value)
	                                    		<option>{{ $value->actionFacilitation }}</option>
	                                    		@endforeach
	                                    	</datalist>
	                                    	@endif
	                                   	</div>
	                                </div>
	                                <span class="invalid-feedback"></span>
	                            </div>
	                        </div>
	                        
	                        <div class="row clearfix suiteForm"  @if($Saisine) style="display: none;" @endif>
	                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
	                                <label for="suite">Contenu </label>
	                            </div>
	                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
	                                <div class="form-group">
	                                    <div class="form-line">
	                                    	<textarea class="form-control" name="suite" id="suite" ></textarea>
	                                   	</div>
	                                </div>
	                                <span class="invalid-feedback"></span>
	                            </div>
	                        </div>
	                        <div class="row clearfix suiteForm"  @if($Saisine) style="display: none;" @endif>
	                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
	                                <label for="suite">Pièces jointes </label>
	                            </div>
	                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
	                                <div class="form-group">
	                                    <div class="">
	                                    	<input type="file" name="docFacilitation[]" multiple="">
	                                   	</div>
	                                </div>
	                                <span class="invalid-feedback"></span>
	                            </div>
	                        </div>
	                        
	                        <input type="hidden" name="saisine_id" id="saisine_id" value="{{ $Saisine ? $Saisine->id : "" }}">
                            <div id="ficilitationHiddenBox"></div>
                            <div class="actions clearfix">
                                <div class="progress" style="display:none">
                                    <div class="progress-bar  progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-width="100" aria-valuenow="0"></div>
                                </div>
                            	<a href="#" class="btn btn-default pull-left btn-lg previous  waves-effect" > <i class="fa fa-chevron-left"></i> Précédent</a>
                            	<a href="#" class="btn btn-info pull-right btn-lg next    waves-effect passer" style="margin-left: 10px">
                            		@if($Saisine && is_null($Saisine->facilitation))
                            			Passer cette étape 
                            		@else
                            			Suivant <i class="fa fa-chevron-right"></i>
                            		@endif
                            	</a>
			                    {{-- <a href="#"   style="margin-left: 10px" class="btn btn-warning pull-right btn-lg next waves-effect @if($Saisine && is_null($Saisine->facilitation)) @endif " id="passeFacilitation" >Passer cette étape</a> --}}
			                    <a href="#" class="btn btn-success pull-right btn-lg send  waves-effect suiteForm" @if($Saisine) style="display: none;" @endif id="sendContentieu"><span><i class="fa fa-save"></i></span> Enregistrer</a>
			                </div>
	                        
                        </form>
                    </section>-->
                    <section id="wizard_horizontal-p-5"  class="body hide">
                        <form enctype="multipart/form-data" class="form-horizontal" >
                        	<legend>Enregistrement d'une action</legend>
                        	<div id="contentieuList">
                        		@include('admin.include.contentieuList')
                        	</div>
                        	<hr>
                        	<div class="row clearfix argumentForm"  @if($Saisine) style="display: none;" @endif>
	                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
	                                <label for="dateContentieux">Date <span>*</span></label>
	                            </div>
	                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
	                                <div class="form-group">
	                                    <div class="form-line">
	                                    	<input type="text" name="dateContentieux" id="dateContentieux" class="form-control date" required="">
	                                   	</div>
	                                </div>
	                                <span class="invalid-feedback"></span>
	                            </div>
	                        </div>
	                        <div class="row clearfix argumentForm" @if($Saisine) style="display: none;" @endif >
	                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
	                                <label for="actionContentieu">Action <span>*</span></label>
	                            </div>
	                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
	                                <div class="form-group">
	                                    <div class="form-line">
	                                    	<input type="text" name="actionContentieu" id="dateFacilitation" class="form-control " required="" list="actionContentieuList">
	                                    	@if(!is_null($actionContentieu))
	                                    	<datalist id="actionContentieuList">
	                                    		@foreach($actionContentieu as $value)
	                                    		<option>{{ $value->actionContentieu }}</option>
	                                    		@endforeach
	                                    	</datalist>
	                                    	@endif
	                                   	</div>
	                                </div>
	                                <span class="invalid-feedback"></span>
	                            </div>
	                        </div>
	                        <div class="row clearfix argumentForm"  @if($Saisine) style="display: none;" @endif>
	                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
	                                <label for="suite">Contenu </label>
	                            </div>
	                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
	                                <div class="form-group">
	                                    <div class="form-line">
	                                    	<textarea class="form-control summernote" name="argument" id="argument" ></textarea>
	                                   	</div>
	                                </div>
	                                <span class="invalid-feedback"></span>
	                            </div>
	                        </div>
	                        <div class="row clearfix argumentForm"  @if($Saisine) style="display: none;" @endif>
	                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
	                                <label for="suite">Pièces jointes </label>
	                            </div>
	                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
	                                <div class="form-group">
	                                    <div class="form-line">
	                                    	<input type="file" name="docContentieu[]" multiple="">
	                                   	</div>
	                                </div>
	                                <span class="invalid-feedback"></span>
	                            </div>
	                        </div>
                            <div id="contentieuHiddenBox"></div>
	                        <input type="hidden" name="saisine_id" id="saisine_id" value="{{ $Saisine ? $Saisine->id : "" }}">
                            <div class="actions clearfix">
                                <div class="progress" style="display:none">
                                    <div class="progress-bar  progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-width="100" aria-valuenow="0"></div>
                                </div>
                            	<a href="#" class="btn btn-default pull-left btn-lg previous  waves-effect" ><i class="fa fa-chevron-left"></i> Précédent </a>
                            	<a href="#" class="btn btn-info pull-right btn-lg next @if($Saisine && $Saisine->contentieux) hide @endif waves-effect" style="margin-left: 10px">Suivant <i class="fa fa-chevron-right"></i></a>
			                    <a href="#" class="btn btn-success pull-right btn-lg send waves-effect "  id="sendContentieu"><span><i class="fa fa-save"></i></span> Enregistrer</a>
			                </div>
	                        
                        </form>
                    </section>
                    <section id="wizard_horizontal-p-6"  class="body hide">
                        <form enctype="multipart/form-data" class="form-horizontal {{ $Saisine && $Saisine->decisioncaipdp ? "hide" : "" }}" >
                        	<legend>Décision</legend>
                        	<div class="">
                        		<a class="btn btn-default pull-right" style="margin-left: 10px" id="fullSc"><i class="fa fa-search-plus"></i> Plein écran</a>
                    			<a class="btn btn-info preview  pull-right waves-effect" href="#" style="margin-left: 10px" > <i class="fa fa-search-plus"></i> Prévisualiser</a>
                        		<a class="btn btn-warning  pull-right" style="margin-left: 10px"  id="printDecision"> <i class="fa fa-print"></i> Imprimer</a> <br>
                        		<a class="text-center" target="_blank" href="" onclick="slideUpB($(this))" id="sendPrintBtn" style="display: none;">
										Cliquer ici	                        				
                        		</a>
                        	</div>
                        	<br><br>
                        	<div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="decisionFile">Type de décision <span>*</span> </label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="">
                                           	<input type="radio" name="typeDecision" class="" id="sansObjet" required="" value="Sans objet" checked=""> <label for="sansObjet">Sans objet</label>
                                           	<input type="radio" name="typeDecision" class="" id="rejet" required="" value="rejet"> <label for="rejet">Rejet</label>
                                           	<input type="radio" name="typeDecision" class="" id="Injonction" required="" value="Injonction"> <label for="Injonction">Injonction</label>
                                           	<input type="radio" name="typeDecision" class="" id="Sanction" required="" value="Sanction"> <label for="Sanction">Sanction</label>
                                        </div>
                                    </div>
                                    <span class="invalid-feedback"></span>
                                </div>
                            </div>
                        	{{-- <hr> --}}
                        	<div class="row clearfix">
	                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
	                                <label for="suite">Email de notification<span>*</span></label>
	                            </div>
	                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
	                                <div class="form-group">
	                                    <div class="form-line">
	                                    	<?php
	                                    	$Caidp = "CAIDP";
	                                    	$nomReq = $Saisine ? $Saisine->demande->requerant->nom." ".$Saisine->demande->requerant->prenom : "";
	                                    	$logo = asset('params')."/".$Param->logo ;
	                                    	$logo = "<img src='".$logo."' width='150' style='float:left'><br><br><br>";
	                                    	$dateDecision = $DateRewrite->dateTimeFrancais(date("Y-m-d"));
			                            	$table = ['[%%logo%%]', '[%%date%%]', '[%%organisme%%]','[%%email%%]','[%%contact%%]', '[%%nomReq%%]', '[%%titre%%]', '[%%signature%%]' ];
			                            	$tableReplace = [$logo, $dateDecision, $Caidp, $Param->email1, $Param->contact1, $nomReq , "", ""]
	                                    	?>
	                                    	<textarea class="form-control decisionEdit" name="decision" id="decision" required="">{{ $Decisioncaipdp ? $Decisioncaipdp->decision :  str_replace($table, $tableReplace, $Decisionpredefiniescaidp->decisonPredefinie) }}</textarea>
	                                   	</div>
	                                </div>
	                                <span class="invalid-feedback"></span>
	                            </div>
	                        </div>
	                        <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="decisionFile">Décision signée <span>*</span> </label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-ine">
                                           	<input type="file" name="decisionFile[]" class="" id="decisionFile" required="" multiple="">
                                        </div>
                                    </div>
                                    <span class="invalid-feedback"></span>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7 previewText">
                                </div>
                                <div>
                                    @if($Saisine && $Saisine->decisioncaipdp && $Saisine->decisioncaipdp->decisioncaipdpsfile )
                                    <div id="preloadIframe">
                                        @include('admin.include.preloadIframe')
                                    </div>
                                    @endif
                                </div>
                                <div class="previewTextError"></div>
                            </div>
                            <input type="hidden" name="saisine_id" id="saisine_id" value="{{ $Saisine ? $Saisine->id : "" }}">
                            {{-- @if($Saisine && $Decisioncaipdp) --}}
                                <input type="hidden" id="decision_id" name="decision_id" value="{{$Saisine && $Decisioncaipdp ? $Decisioncaipdp->id : "" }}">
                            {{-- @endif --}}
                            <div class="actions clearfix">
                                <div class="progress" style="display:none">
                                    <div class="progress-bar  progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-width="100" aria-valuenow="0"></div>
                                </div>
                            	<a href="#" class="btn btn-default pull-left btn-lg previous  waves-effect" > <i class="fa fa-chevron-left"></i> Précédent</a>
                                <a href="#" class="btn btn-success pull-right btn-lg send" id="sendDecision" class="waves-effect">Finaliser</a>
			                    <a href="#" class="btn btn-default pull-right btn-lg send" id="sendDecisionSave" class="waves-effect" style="margin-right: 10px">Enregister</a>
			                </div>


                        

                        </form>
                        <div id="decisionDataTable" class="EditForm {{ $Saisine && $Saisine->decisioncaipdp ? "" : "hide" }}">
                            
                            @if($Saisine && $Saisine->decisioncaipdp)
                            {{-- @if($Saisine->decisioncaipdp) --}}
                            @include('admin.include.decision')
                            @endif
                            {{-- @endif --}}
                        </div>
                    </section>
                    
                </div>
                <div class="messageError"></div>
                {{-- <div class="actions clearfix">
                    <ul role="menu" aria-label="Pagination">
                        <li class="disabled" ><a href="#previous" class="previous">Previous</a></li>
                        <li  ><a href="#" class="next" class="waves-effect">Next</a></li>
                       
                    </ul>
                </div> --}}
            </div>
        </div>
    </div>
</div>
</div>
<div id="BoxHidden" class="hide">
		<a class="btn btn-danger " id="fullScInv">Réduire</a>
		<a class="btn btn-info preview"> <i class="fa fa-print"></i> Prévisualiser</a>
	</div>



{{-- ==================== --}}
<div id="nomPrenomBoxData" class="hide">
    <div class="row clearfix" style="display:none">
        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
            <label for="civilite"></label>
        </div>
        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="display:none">
            <div class="form-group">
                <div class="">
                    <input name="civilite" type="radio" id="M" value="M"  />
                    <label for="M">Monsieur</label>
                    <input name="civilite" type="radio" id="Mme" value="Mme"  />
                    <label for="Mme">Madame</label>
                    <input name="civilite" type="radio" id="Mlle" value="Mlle"  />
                    <label for="Mlle">Mademoiselle</label>
                </div>
                <span class="invalid-feedback"></span>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5 form-control-label">
            <label for="nom">Nom & prénom<span>*</span></label>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-3 col-xs-7">
            <div class="form-group">
                <div class="form-line">
                    <input id="nom" name="nom" class="form-control" value="{{ $Saisine ? $Saisine->demande->requerant->nom:"" }}" type="text" required="" placeholder="Nom">
                </div>
                <span class="invalid-feedback"></span>
            </div>
        </div>
        <div class="col-lg-7 col-md-6 col-sm-6 col-xs-7">
            <div class="form-group">
                <div class="form-line">
                    <input id="prenom" name="prenom"  value="{{ $Saisine ? $Saisine->demande->requerant->prenom:"" }}" class="form-control" type="text" required="" placeholder="Prénom">
                </div>
            </div>
            <span class="invalid-feedback"></span>
        </div>
    </div>
</div>
{{-- ==================== --}}




{{-- ==================== --}}
<div id="representantName" class="hide">
    <div class="row clearfix" style="display:none"  >
        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
            <label for="civilite"></label>
        </div>
        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="display:none">
            <div class="form-group">
                <div class="">
                    <input name="civilite" type="radio" id="M" value="M"  />
                    <label for="M">Monsieur</label>
                    <input name="civilite" type="radio" id="Mme" value="Mme"  />
                    <label for="Mme">Madame</label>
                    <input name="civilite" type="radio" id="Mlle" value="Mlle"  />
                    <label for="Mlle">Mademoiselle</label>
                </div>
                <span class="invalid-feedback"></span>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5 form-control-label">
            <label for="nom">Représentant<span>*</span></label>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-3 col-xs-7">
            <div class="form-group">
                <div class="form-line">
                    <input id="nom" name="nom" class="form-control" value="{{ $Saisine ? $Saisine->demande->requerant->nom:"" }}" type="text" required="" placeholder="Nom">
                </div>
                <span class="invalid-feedback"></span>
            </div>
        </div>
        <div class="col-lg-7 col-md-6 col-sm-6 col-xs-7">
            <div class="form-group">
                <div class="form-line">
                    <input id="prenom" name="prenom"  value="{{ $Saisine ? $Saisine->demande->requerant->prenom:"" }}" class="form-control" type="text" required="" placeholder="Prénom">
                </div>
            </div>
            <span class="invalid-feedback"></span>
        </div>
    </div>
</div>
{{-- ==================== --}}



@stop

@section('overlay')
<div class="overlay">
        <a href="#" title="fermer" id="CloseFoxContent"><i class="fa fa-times fa-2x"></i></a>
    <div class="contentFoxBox">
        <div class="body">
        </div>
    </div>
</div>
@stop

@section('js')
@if($Saisine)
{{ $CheckSaisineEdit->activeBox($Saisine) }}
@endif

<script>
    CKEDITOR.replace( 'decision' );
    CKEDITOR.replace( 'resume' );
    CKEDITOR.replace( 'argument' );
    CKEDITOR.replace( 'suite' );
</script>

@stop