@inject("CommonController","App\Http\Controllers\CommonController ")
@inject("DateRewrite","App\Tools\DateRewrite")
@inject("Globals","App\Tools\Globals")
@inject("PrivillegeBtn","App\PrivillegeBtn")
@inject('UserController', 'App\Http\Controllers\UserController')
@inject('checkDemande', 'App\Http\Controllers\Organisme\CheckDemandeEdit')
@extends('layouts.admin')

@php 
	$ValidationDecision = $UserController->ValidationDecision();
@endphp

{{-- @section('js') --}}
{{-- @stop --}}
{{-- {{ $UserController->userPrivilege("createuser") }} --}}

{{-- {{ dd($Demande->information) }} --}}

@section('content')
	<div class="row">
		<div class="col-sm-12">
			<a href="{{ route('institutions.inform.demandeDetails', 1) }}"><i class="fa fa-chevron-left"></i> Retour</a>
		</div>
	</div>
	<br>
	@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-info ">
				<div class="panel-heading">
					<div class="panel-title">
						@if($Demande)
							Demande N° {{ $Demande->numDemande." : ".$Demande->libelle }}
						@else
							Ajouter une demande 
						@endif
					</div>
				</div>
				<div class="panel-body">

				<!-- START WIZARD WITH SUBMIT BUTTON -->
                	<div class="block">
                    	@csrf()
                    <div class="wizard show-submit ">                                
                        <ul class="steps_5 anchor">
                            <li>
                                <a href="#step-1" class="selected {{ $checkDemande->addDone($Demande) }}">
                                    <span class="stepNumber">1</span>
                                    <span class="stepDesc">Demandeur<br /><small>Informations du demandeur</small></span>
                                </a>
                            </li>
                            <li>
                                <a href="#step-2" class="{{ $checkDemande->addDone($Demande) }}">
                                    <span class="stepNumber">2</span>
                                    <span class="stepDesc">Demande<br /><small>Enregistrer la demanade</small></span>
                                </a>
                            </li>
                            <li>
                                <a href="#step-3" class="<?php if($checkDemande->selectedBox($Demande, $Decision)!="" AND $checkDemande->selectedBox($Demande, $Decision)!="proro"){ echo("done"); } ?>">
                                    <span class="stepNumber">3</span>
                                    <span class="stepDesc">Prorogation<br /><small>Définir le delais de traitement</small></span>
                                </a>
                            </li> 
                            <li>
                                <a href="#step-4" class="<?php if($checkDemande->selectedBox($Demande, $Decision)=="information" OR $checkDemande->selectedBox($Demande, $Decision)=="decison"){ echo("done"); } ?>">
                                    <span class="stepNumber">4</span>
                                    <span class="stepDesc">Document ou l'information<br /><small>Traitement de la demande</small></span>
                                </a>
                            </li> 
                            <li>
                                <a href="#step-5" class="{{ $checkDemande->selectedBox($Demande, $Decision)=="decison" ? "" : "done" }}>">
                                    <span class="stepNumber">5</span>
                                    <span class="stepDesc">Notification de la décison<br /><small>Finaliser l'enregistrement</small></span>
                                </a>
                            </li> 
                             
                                                              
                        </ul>
                        <form class="form-horizontal">
                        <div class="step" id="step-1">

                        <div class="step4Box {{ $Demande!==null ? "hide" : "" }}">
                        	<div class="row">
	                        	<h3 class="control-label col-md-3 ">Identification du requérant</h3>
	                        </div>
	                        	<hr>
                        	<div class="form-group ">
	                            <label class="col-md-3 col-xs-12 control-label">Email </label>
	                            <div class="col-md-6 col-xs-12">                                            
	                                <input type="email" list="emailReq" min="0" max="5"  step="3" id="emailReqField" class="form-control" value=" {{ $Demande ? $Demande->requerant->email : "" }} " name="email" autocomplete="off" {{ $checkDemande->readOnly($Demande) }}>
	                                <datalist id="emailReq">
	                                	@foreach($Requerant as $Requerant)
	                                		<option value={{ $Requerant->email }}>
	                                	@endforeach
	                                </datalist>
	                                <strong></strong>
									
                                    <span class="invalid-feedback text-danger" role="alert"></span>
                                	
	                            </div>
	                        </div> 
	                        <div class="form-group ">
	                            <label class="col-md-3 col-xs-12 control-label">Type de demandeur </label>
	                            <div class="col-md-6 col-xs-12">                                            
	                                <select class="form-control" id="type_id" name="type_id"  {{ $checkDemande->readOnly($Demande) }}>
	                                	@if($TypeDemande)
	                                		<option value="{{ $TypeDemande->id}}">{{$TypeDemande->type }}</option>
	                                	@endif
										@if($Type)
	                                	@foreach($Type as $value)
	                                	<option value="{{ $value->id }}">{{ $value->type }}</option>
	                                	@endforeach
										@endif
	                                </select>
	                                
                                    <span class="invalid-feedback text-danger" role="alert"></span>
                                	
	                            </div>
	                        </div>
	                        <div id="denomminationBox" class="form-group  hide">
	                            <label class="col-md-3 col-xs-12 control-label requis">Dénomination Entreprise/Structure</label>
	                            <div class="col-md-6 col-xs-12">                                            
	                                <input type="text" class="form-control" value="{{ old('denomination') }}" name="denomination" id="denomination" {{ $checkDemande->readOnly($Demande) }}>
                                    <span class="invalid-feedback text-danger" role="alert"></span>
	                            </div>
	                        </div>
	                        <div id="nomPrenomBox" style="margin-bottom: 13px">
	                        <div id="" class="form-group ">
	                            <label class="col-md-3 col-xs-12 control-label requis"> </label>
	                            <div class="col-md-6 col-xs-12">             
	                                	<input  name="civilite" type="radio" value="M"> Monsieur
	                                	<input  name="civilite" type="radio" value="Mme"> Madame
	                                	<input  name="civilite" type="radio" value="Mlle"> Mademoiselle
	                                
                                    <span class="invalid-feedback text-danger" role="alert"></span>
                               		
	                            </div>
	                        </div>
	                         <div id="" class="form-group ">
	                            <label class="col-md-3 col-xs-12 control-label requis">Nom et prénom<span class="required">*</span></label>
	                            <div class="col-md-2 col-xs-12">                                            
	                                <input type="text" class="form-control" value="{{ $Demande ? $Demande->requerant->nom : "" }}" name="nom" required="" {{ $checkDemande->readOnly($Demande) }}>
	                                
                                    <span class="invalid-feedback text-danger" role="alert"></span>
                               		
	                            </div>
	                            <div class="col-md-4 col-xs-12">                                            
	                                <input type="text" class="form-control" value="{{ $Demande ? $Demande->requerant->prenom : "" }}" name="prenom" required="" {{ $checkDemande->readOnly($Demande) }}>
	                                
                                    <span class="invalid-feedback text-danger" role="alert"></span>
                               		
	                            </div>
	                        </div>
	                        </div>
	                        {{-- <div id="" class="form-group ">
	                            <label class="col-md-3 col-xs-12 control-label requis">Prénom <span class="required">*</span></label>
	                            <div class="col-md-6 col-xs-12">                                            
	                                <input type="text" class="form-control" value="{{ $Demande ? $Demande->requerant->prenom : "" }}" name="prenom" required="" {{ $checkDemande->readOnly($Demande) }}>
	                                
                                    <span class="invalid-feedback text-danger" role="alert"></span>
                               		
	                            </div>
	                        </div> --}}
	                        
	                        <div class="form-group ">
	                            <label class="col-md-3 col-xs-12 control-label">Contact <span class="required">*</span> </label>
	                            <div class="col-md-6 col-xs-12">                                            
	                                <input type="text" class="form-control contact" value="{{ $Demande ? $Demande->requerant->contact : "" }}" name="contact" required="" {{ $checkDemande->readOnly($Demande) }}>
	                                
                                    <span class="invalid-feedback text-danger" role="alert"></span>
                                </div>
	                        </div>
                        	
	                        <div id="nameBox">
	                        <div class="form-group " style="margin-bottom: 15px;">
	                            <label class="col-md-3 col-xs-12 control-label">Qualité <span class="required">*</span> </label>
	                            <div class="col-md-6 col-xs-12"> 
	                                <input type="text" name="qualite" class="form-control requis" list="listQualite" id="qualite" name="qualite" required="" {{ $checkDemande->readOnly($Demande) }} >
	                               	<datalist id="listQualite">
	                            		@foreach($QualiteReq as $value)
	                                		<option>{{ $value->qualite }}</option>
	                                	@endforeach	
	                            	</datalist> 
	                            </div>
	                        </div>
	                        </div>
	                        {{-- <div id="qualiiteBox" class="form-group ">
	                            <label class="col-md-3 col-xs-12 control-label requis">Type de secteur d'activité</label>
	                            <div class="col-md-6 col-xs-12">  
									    @if($Typesecteurs) 
	                                	@foreach($Typesecteurs as $value)
	                                		<input type="radio" name="type_secteur" value="{{ $value->id }}"> {{ $value->type_secteur }}
	                                	@endforeach
										@endif
	                                
                                    <span class="invalid-feedback text-danger" role="alert"></span>
                                	
	                            </div>
	                        </div>
	                        <div id="" class="form-group  ">
	                            <label class="col-md-3 col-xs-12 control-label requis">Secteur d'activité</label>
	                            <div class="col-md-6 col-xs-12">
	                            	<input type="text" name="secteur" list="listSecteur" class=" form-control sm-control" placeholder="Ex : Informe, Banque">
	                            	<datalist id="listSecteur">
	                                	@foreach($Secteurs as $value)
	                                		<option>{{ $value->secteur }}</option>
	                                	@endforeach
	                            	</datalist>
                                    <span class="invalid-feedback text-danger" role="alert"></span>
                                	
	                            </div>
	                        </div> --}}
	                        
	                        
	                        <div id="representantData" style="margin-bottom: 13px;">
	                            
	                        </div>
	                        <div id="titreBox" class="form-group  hide">
	                            <label class="col-md-3 col-xs-12 control-label requis">Titre/Poste</label>
	                            <div class="col-md-6 col-xs-12">                                            
	                                <input type="text" class="form-control" value="" name="denomination" id="denomination" {{ $checkDemande->readOnly($Demande) }}>
	                                
                                    <span class="invalid-feedback text-danger" role="alert"></span>
                                	
	                            </div>
	                        </div>
	                        <div id="" class="form-group  ">
	                            <label class="col-md-3 col-xs-12 control-label requis">Etes-vous mandataire ?</label>
	                            <div class="col-md-6 col-xs-12">                                            
	                                <input name="mandant" type="checkbox" id="mandant" value="oui"  />
	                                
                                    <span class="invalid-feedback text-danger" role="alert"></span>
                                	
	                            </div>
	                        </div>
	                        
	                        
	                       
	                        {{-- <div class="form-group " style="margin-bottom: 15px;">
	                            <label class="col-md-3 col-xs-12 control-label">Adresse postale </label>
	                            <div class="col-md-6 col-xs-12">                                            
	                                <input type="text" name="adressePostale" value="{{ $Demande ? $Demande->requerant->adressePostale : "" }}"  class="form-control" >
	                                <span class="invalid-feedback text-danger" role="alert"></span>
								</div>
	                        </div>
	                        <div class="form-group " style="margin-bottom: 15px;">
	                            <label class="col-md-3 col-xs-12 control-label">Lieu d'habitation </label>
	                            <div class="col-md-6 col-xs-12">                                            
	                                <input type="text" name="ville" list="domicile" value="{{ $Demande ? $Demande->requerant->ville: "" }}" class="form-control" >
	                                <span class="invalid-feedback text-danger" role="alert"></span>
                                	<datalist id="domicile">
										@if(Countries)
                                		@foreach($Countries as $ville)
                                			<option value="{{ $ville->local_name }}">
                                		@endforeach
										@endif
                                	</datalist>

	                            </div>
	                        </div> --}}
	                        
	                        

	                        
	                        
	                        {{-- Info Mandataire ================================== --}}
	                        <div class="hide" id="mandantBox">
	                        <hr>
	                        <div class="row">
	                        	<h3 class="control-label col-md-3 ">Identité du mandant</h3>
	                        </div>
	                        	<hr>
	                        <div class="form-group">
	                        	<label class="col-md-3 col-xs-12 control-label">Nom et prénom <span class="required">*</span></label>
	                        	<div class="col-md-2 col-xs-12 ">
	                        		<input type="text" name="nomMandataire" class="form-control" r>
	                        		<span class="invalid-feedback text-danger" role="alert"></span>
	                        	</div>	
	                        	<div class="col-md-4 col-xs-12 ">
	                        		<input type="text" name="prenomMandataire" class="form-control" >
	                        		<span class="invalid-feedback text-danger" role="alert"></span>
	                        	</div>	
	                        </div>
	                        
	                        
	                        <div class="form-group">
	                        	<label class="col-md-3 col-xs-12 control-label"> </label>
	                        	<div class="col-md-6 col-xs-12 ">
	                        		<input type="radio" name="sexeMandataire"  value="M" id="Hmandant" > <label for="Hmandant">Masculin</label>
	                        		<input type="radio" name="sexeMandataire"  value="F" id="Fmandant"> <label for="Fmandant">Feminin</label>
	                        	</div>	
	                        </div>
	                        <div class="form-group">
	                        	<label class="col-md-3 col-xs-12 control-label">Email </label>
	                        	<div class="col-md-6 col-xs-12 ">
	                        		<input type="text" name="emailMandant" class="form-control"> 
	                        	</div>	
	                        </div>
	                        
	                       {{--  <div class="form-group">
	                        	<label class="col-md-3 col-xs-12 control-label">Profession <span class="required">*</span></label>
	                        	<div class="col-md-6 col-xs-12 ">
	                        		<input type="text" name="professionMandant" class="form-control">
	                        		<span class="invalid-feedback text-danger" role="alert"></span>
	                        	</div>	
	                        </div>
	                        <div class="form-group">
	                        	<label class="col-md-3 col-xs-12 control-label">Domicile </label>
	                        	<div class="col-md-6 col-xs-12 ">
	                        		<input type="text" name="domicileMandant" list="domicileMandant" class="form-control" >
	                                <span class="invalid-feedback text-danger" role="alert"></span>
                                	<datalist id="domicileMandant">
                                		@foreach($Ville as $ville)
                                			<option value="{{ $ville->ville }}">
                                		@endforeach
                                	</datalist>
	                        	</div>	
	                        </div> --}}
	                        <div class="form-group">
	                        	<label class="col-md-3 col-xs-12 control-label">Pièce justificative <span class="required">*</span></label>
	                        	<div class="col-md-6 col-xs-12 ">
	                        		<input type="file" name="pieceMandant" >
	                                <span class="invalid-feedback text-danger" role="alert"></span>
	                        	</div>	
	                        </div>

	                        
	                        
	                        </div>
	                        {{-- Info Mandataire ================================== --}}

	                        @if($PrivillegeBtn->checkPrivilege()['createDemande']!==true)
	                        	<div class="alert alert-warning">
	                        		<i class="fa fa-warning"></i> {{ $PrivillegeBtn->textNoPriv() }}
	                        	</div>
	                        @endif
	                        
	                        <div id="reqRant" class="hide">
                            	@if($Demande)
                            		<input type="hidden" name="requerantId" id="requerantId" value="{{ $Demande->requerant->id }}">
                            	@else
                            		<input type="hidden" name="requerantId" id="requerantId" value="">
                            	@endif
                            </div>

		                    <div class="actionBar">
		                    	<div class="progress">
                        			<div class="progress-bar  progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-width="100" aria-valuenow="0"></div>
                    			</div>
		                    	
		                    	<a class="btn btn-info pull-right suivant hideClass {{ $checkDemande->showClass($Demande) }}" rel="1">Suivant <i class="fa fa-chevron-right"></i> </a>
		                    	<a class="btn btn-success pull-right saveBTN {{ $checkDemande->hideClass($Demande) }} {{ $PrivillegeBtn->checkPrivilege()['createDemande'] ? "" : "noPriv" }}" id="sendDemandeur" href="#"  ><span></span> Enregistrer demandeur</a>

		                    	<a class="btn btn-danger pull-right hide no cancel">Annuler</a>
		                    </div>
		                </div>

		                {{-- =========================== DISPALY BLOCK ============================ --}}
                         	<div class="row {{ $Demande==null ? "hide" : "" }} stepResume">
                         		<br>
                         		<div class="col-sm-12">
                         		</div>
                         		<div class="col-sm-12">
                         			@if($Demande && $Demande->autoEnregsitrement==null)
                         				<a class="btn btn-success pull-left editerForm  " >Modifier <i class="fa fa-edit"></i> </a>
                         			@endif
                         			<a class="btn btn-info pull-right suivant " >Suivant <i class="fa fa-chevron-right"></i> </a>
                         			<br><br>
                         			<div id="" class="">
		                         		<table class="table table-bordered table-striped table-hover">
		                         		@if($Demande && $Demande->requerant->type_id==2)
		                         			<tr>
		                         				<td>Dénomination entreprise/Structure</td>
		                         				<td>{{ ($Demande) ? $Demande->requerant->denomination : ""  }} </td>
		                         			</tr>
		                         			<tr>
		                         				<td>Nom et prénom du représentant</td>
		                         				<td>{{ ($Demande) ?  $Demande->requerant->civilite." ".$Demande->requerant->nom." ".$Demande->requerant->prenom  : "" }} </td>
		                         			</tr>
		                         			<tr>
				                 				<td>Qualité du représentant</td>
				                 				<td> {{ ($Demande) ? $CommonController->findQualite($Demande->requerant->qualite_id)->qualite : "" }}</td>
				                 			</tr>
		                         		@else
		                         			<tr>
		                         				<td>Nom et prénom</td>
		                         				<td>{{ ($Demande) ?  $Demande->requerant->civilite." ".$Demande->requerant->nom." ".$Demande->requerant->nom  : "" }} </td>
		                         			</tr>
		                         		@endif
		                         			
		                         			<tr>
		                         				<td>Email</td>
		                         				<td> {{ ($Demande) ? $Demande->requerant->email  : "" }}</td>
		                         			</tr>
		                         			<tr>
		                         				<td>Contact</td>
		                         				<td> {{ ($Demande) ? $Demande->requerant->contact  : ""  }}</td>
		                         			</tr>
		                         			<tr>
		                         				<td>Type de demandeur</td>
		                         				<td>{{ $TypeDemande ? $TypeDemande->type : "" }} </td>
		                         			</tr>
		                         			{{-- {{ dd($Requerant) }} --}}
		                         			@if($Demande && $Demande->requerant->type_id!=2)
		                         			<tr>
				                 				<td>Qualité</td>
				                 				<td> {{ ($Demande) ? $CommonController->findQualite($Demande->requerant->qualite_id)->qualite : "" }}</td>
				                 			</tr>
				                 			@endif
		                         			<tr>
		                         				<td>Domicile</td>
		                         				<td>{{ ($Demande) ? $Demande->requerant->ville  : "" }}</td>
		                         			</tr>
		                         			<tr>
		                         				<td>Adresse Postale</td>
		                         				<td>{{($Demande) ? $Demande->requerant->adressePostale  : ""  }}</td>
		                         			</tr>
		                         		</table>

		                         		@if($Demande && !is_null($Demande->mandant))
		                         		<table class="table table-striped">
		                         			<caption>Information du mandataire</caption>
		                         			<tr>
			                         			<th>Nom et prénom</th>
			                         			<td>{{ $Demande->mandant->nom." ".$Demande->mandant->prenom }}</td>
			                         		</tr>
			                         		@if($Demande->mandant->email)
			                         		<tr>
			                         			<th>Email</th>
			                         			<td>{{ $Demande->mandant->email }}</td>
			                         		</tr>
			                         		@endif
			                         		<tr>
			                         			<th>Pièce justificative</th>
			                         			<td>
			                         				<iframe src="{{ asset($Globals::Mandant_Path().$Demande->mandant->pieceMandant) }}"></iframe>
			                         			</td>
			                         		</tr>
		                         		</table>
		                         		@endif

		                         	</div>
                         		</div>
                         		{{-- <div class="col-sm-3"> --}}
                         			
                         		{{-- </div> --}}
                         	</div>


                         	{{-- =========================== DISPALY BLOCK ============================ --}}


                        </div>  
                    	</form>

                        <form action="" role="form" class="form-horizontal" method="post" enctype="multipart/form-data">  
                        <div class="step" id="step-2"> 
                        <div class="{{ $checkDemande->hideClass($Demande) }} step4Box">
                        	<div class="row">
	                        	<h3 class="control-label col-md-3 ">Information organisme</h3>
	                        </div>
	                        <hr>
	                        <div class="hide" id="demande_ID"><input type="hidden" name="dem_idHide" value="{{ ($Demande) ? $Demande->id : "" }}"></div> 
	                        <div class="form-group ">
	                            <label class="col-md-3 col-xs-12 control-label" for="direction">Direction concernée </label>
	                            <div class="col-md-6 col-xs-12">                                            
	                                <input type="text" class="form-control" value="" list="directionList" id="direction" name="direction" >
	                               	<datalist id="directionList">
	                                @foreach($Direction as $direction)
	                               		@if($direction->direction!=null)
	                               		<option>{{ $direction->direction }}</option>
	                               		@endif
	                               	@endforeach
	                               	</datalist> 
                                    <span class="invalid-feedback text-danger" role="alert"></span>
                                	
	                            </div>
	                        </div>
	                        <div class="form-group ">
	                            <label class="col-md-3 col-xs-12 control-label">Service concerné</label>
	                            <div class="col-md-6 col-xs-12">                                            
	                                <input type="text" class="form-control" value="" id="service" list="serviceList" name="service" >
	                                <datalist id="serviceList">
	                                @foreach($Service as $service)
	                               		@if($service->service!=null)
	                               		<option>{{ $service->service }}</option>
	                               		@endif
	                               	@endforeach
                                    <span class="invalid-feedback text-danger" role="alert"></span>
                                	
	                            </div>
	                        </div>

	                        <div class="row">
	                        	<h3 class="control-label col-md-3 ">Information Demande</h3>
	                        </div>
	                        <hr>
                        	<div class="form-group ">
	                            <label class="col-md-3 col-xs-12 control-label">Libellé/Information demandé <span class="required">*</span></label>
	                            <div class="col-md-6 col-xs-12">                                            
	                                {{-- <input type="text" class="form-control" value="{{ $Demande ? $Demande->libelle : "" }}" id="libelle" name="libelle" required=""> --}}
	                                <textarea class="form-control"id="libelle" name="libelle" required=""  placeholder="Ex : - Rapport des activités 2019&#10; - Liste des commissaires &#10; - Liste des organismes publics en CI" >{{ $Demande ? $Demande->libelle : "" }}</textarea>
	                                
                                    <span class="invalid-feedback text-danger" role="alert"></span>
                                	
	                            </div>
	                        </div>
	                        {{-- <div class="form-group ">
	                            <label class="col-md-3 col-xs-12 control-label">Description </label>
	                            <div class="col-md-6 col-xs-12">                                            
									<textarea class="form-control" rows="10" name="description" >{{ $Demande ? $Demande->description : "" }} </textarea>
	                                
	                                
                                    <span class="invalid-feedback text-danger" role="alert"></span>
                                	
	                            </div>
	                        </div> --}}
	                        <input type="hidden" name="description">
	                       {{--  <div class="form-group ">
	                            <label class="col-md-3 col-xs-12 control-label">Document scané </label>
	                            <div class="col-md-6 col-xs-12">                                            
									<input type="file" class="form-conrol" rows="10" name="scane" >
	                                
	                                
                                    <span class="invalid-feedback text-danger" role="alert"></span>
                                	
	                            </div>
	                        </div> --}}

	                        <div class="form-group ">
	                            <label class="col-md-3 col-xs-12 control-label">Date de la soumission <span class="required">*</span></label>
	                            <div class="col-md-6 col-xs-12"> 
	                               	<div class="input-group">
	                                    <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
	                                    <input type="text" class="form-control datepicker" id="dateDemande" name="dateDemande" value="{{ ($Demande && $Demande->dateDemande) ? explode(" ", $Demande->dateDemande)[0] : "" }} " required="">
	                                    <div id="reqId" class="hide">
			                            	@if($Demande)
			                            		<input type="hidden" name="reqId" id="reqIdQual" value="{{ $Demande->requerant->id }}">
			                            	@else
			                            		<input type="hidden" name="reqId" id="reqIdQual" value="">
			                            	@endif
			                            </div>
	                                    <span class="invalid-feedback text-danger" role="alert"></span>
	                                	
	                                </div>
	                            </div>
	                            
	                        </div>
	                        @if($PrivillegeBtn->checkPrivilege()['createDemande']!==true)
	                        	<div class="alert alert-warning">
	                        		<i class="fa fa-warning"></i> {{ $PrivillegeBtn->textNoPriv() }}
	                        	</div>
	                        @endif
	                        <div class="actionBar">
	                        	<div class="progress">
                        			<div class="progress-bar  progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-width="100" aria-valuenow="0"></div>
                    			</div>
                    			<input type="hidden" name="savebyorganisme" value="1">
	                        	<a class="btn btn-default pull-left precedent " rel="0"><i class="fa fa-chevron-left"></i> Précédent </a>
		                    	<a class="btn btn-success pull-right saveBTN {{ $checkDemande->hideClass($Demande) }} {{ $checkDemande->hideClass($Demande) }} {{ $PrivillegeBtn->checkPrivilege()['createDemande'] ? "" : "noPriv" }}" id="sendDemande" href="#"><span></span> Enregistrer demande</a>
		                    	<a class="btn btn-danger pull-right hide no cancel">Annuler</a>
		                    	<a class="btn btn-info pull-right suivant  {{ $checkDemande->showClass($Demande) }}" rel="2">Suivant <i class="fa fa-chevron-right"></i> </a>
	                    	</div>
	                    </div>

	                    {{-- =========================== DISPALY BLOCK ============================ --}}
                         	<div class="row {{ $Demande==null ? "hide" : "" }} stepResume">
                         		<br>
                         		<div class="col-sm-12">
                         		</div>
                         		<div class="@if($Demande && $Demande->scane!="")  col-md-8 @else @col-md-4 @endif">
                         			@if($Demande && $Demande->autoEnregsitrement==null)
                         			<a class="btn btn-success pull-left editerForm  " >Modifier <i class="fa fa-edit"></i> </a>
                         			@endif
                         			<a class="btn btn-info pull-right suivant " rel="2">Suivant <i class="fa fa-chevron-right"></i> </a>
                         			<a class="btn btn-default pull-right precedent " rel="0"><i class="fa fa-chevron-left"></i> Précédent </a>
                         			<br><br>
                         			<div id="" class="">
		                         		<table class="table table-bordered table-striped table-hover">
		                         			
		                         			<tr>
		                         				<td>Libellé/Information demandé</td>
		                         				<td> {{ $Demande ? $Demande->libelle : ""  }} </td>
		                         			</tr>
		                         			{{-- <tr>
		                         				<td>Description de la demande</td>
		                         				<td> {{ $Demande ? $Demande->description : ""  }} </td>
		                         			</tr> --}}
		                         			
		                         			<tr>
		                         				<td>Date de la soumission</td>
		                         				<td>{{ $Demande ? $DateRewrite->dateTimeFrancais($Demande->dateDemande) : "" }}</td>
		                         			</tr>
		                         			<tr>
		                         				<td>Direction concernée</td>
		                         				<td>{{ $Demande ? $Demande->direction : ""  }} </td>
		                         			</tr>
		                         			<tr>
		                         				<td>Service concerné</td>
		                         				<td> {{ $Demande ? $Demande->service : ""  }} </td>
		                         			</tr>
		                         			
		                         			
		                         			
		                         		</table>
		                         	</div>
                         		</div>
                         		@if($Demande && $Demande->scane!="")
                         		<div class="col-sm-3 ">
                         			<h4>Document scané</h4>
                         			<iframe class="zoomScaneBox" src="{{ asset($Globals::Demande_Path().$Demande->scane) }}" style="border: 1px"></iframe>
                         			<div class="text-center">
                         				<a class="btn zoomScane"><i class="fa fa-search-plus"></i> Zoomer</a>
                         			</div>
                         		</div>
                         		@endif
                         	</div>


                         	{{-- =========================== DISPALY BLOCK ============================ --}}

                        </div>  
	                	</form>
	                	<form class="form-horizontal">
                        <div class="step" id="step-3"> 
                        <div class="row {{ $checkDemande->checkProro($Demande, $Decision) ? "hide": "" }} stepResume"> 
	                        <div>
	                        	<br><br><br>
		                        <div class="form-group ">
		                            <label class="col-md-3 col-xs-12 control-label"><label for="delaisChecked">Délais prorogé ?</label> </label>
		                            <div class="col-md-6 col-xs-12">
		                                <input type="checkbox" id="delaisChecked" >
	                            	</div>
	                        	</div>
	                    		<div class="form-group hide">
		                            <label class="col-md-3 col-xs-12 control-label">Motif de prorogation <span class="required">*</span> </label>
		                            <div class="col-md-6 col-xs-12">
		                            	<input class="form-control"  rows="5" name="motifProrogation" required="" value="{{ $checkDemande->checkProro($Demande, $Decision) ? $Demande->motifProrogation : "" }}" list="motifProrogationList">
		                            	<datalist id="motifProrogationList">
										@if(!$motifProrogationData->isEmpty())
												@foreach($motifProrogationData as $value)
													<option>{{ $value->motifProrogation }}</option>
												@endforeach
										@else
										<option>Pas de motif</option>	
										@endif
		                            	</datalist>
		                                
		                                <span class="invalid-feedback text-danger" role="alert"></span>
		                            	
		                            </div>
	                        	</div> 
	                        	<br><br><br><br><hr>
	                        	@if($PrivillegeBtn->checkPrivilege()['createDemande']!==true)
		                        	<div class="alert alert-warning">
		                        		<i class="fa fa-warning"></i> {{ $PrivillegeBtn->textNoPriv() }}
		                        	</div>
		                        @endif
	                        	<div class="actionBar">
	                        		<div class="progress">
	                        			<div class="progress-bar  progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-width="100" aria-valuenow="0"></div>
	                    			</div>
		                        	<a class="btn btn-default pull-left precedent " rel="1"><i class="fa fa-chevron-left"></i> Précédent </a>
			                    	<a class="btn btn-success pull-right hide saveBTN {{ $checkDemande->hideClassProro($Demande) }}  {{ $PrivillegeBtn->checkPrivilege()['createDemande'] ? "" : "noPriv" }}" id="sendProrogation" href="#"><span></span> Enregistrer le nouveau delais {{ $checkDemande->hideClassProro($Demande) }}</a>
			                    	<a class="btn btn-info pull-right  nextStep {{ $PrivillegeBtn->checkPrivilege()['createDemande'] ? "" : "noPriv" }} {{ $checkDemande->hideClassProro($Demande) }} " rel="3">Passer cette étape <i class="fa fa-chevron-right"></i> </a>
			                    	<a class="btn btn-info pull-right suivant  {{ $checkDemande->showClassProro($Demande) }}" rel="3">Suivant <i class="fa fa-chevron-right"></i> </a>
		                    	</div>                                   
	                        	{{-- <br><br><br><br>
	                        	<br><br><br><br> --}}
	                        </div>
                    	</div>

                        {{-- =========================== DISPALY BLOCK ============================ --}}
                         	<div class="row {{ !$checkDemande->checkProro($Demande, $Decision) ? "hide" : "" }}" id="step3">
                         		@if($checkDemande->checkProroNoData($Demande, $Decision)!=false)
                         			<div class="row">
                         				<div class="col-sm-12">
                         					<a class="btn btn-info pull-right suivant " rel="3">Suivant <i class="fa fa-chevron-right"></i> </a>
                         					<a class="btn btn-default pull-right precedent " rel="1"><i class="fa fa-chevron-left"></i> Précédent </a>
                         					<br><br>
                         					{{ $CommonController::displayNodata("Aucune prorogation n'a été faite pour cette demande") }}
                         				</div>
                         			</div>
                         		@else

                         		<br>
                         		<div class="col-sm-12">
                         			<a class="btn btn-info pull-right suivant " rel="3">Suivant <i class="fa fa-chevron-right"></i> </a>
                         			<a class="btn btn-default pull-right precedent " rel="2"><i class="fa fa-chevron-left"></i> Précédent </a>
                         			<br><br>
                         			<div id="" class="">
		                         		<table class="table table-bordered table-striped table-hover">
		                         			<tr>
		                         				<td>Date de prorogation</td>
		                         				<td>{{ $Demande ? $Demande->dateProrogation : "" }} </td>
		                         			</tr>
		                         			<tr>
		                         				<td>Motif de prorogation</td>
		                         				<td>  {{ ($Demande) ? $Demande->motifProrogation : "" }}</td>
		                         			</tr>
		                         		</table>
		                         	</div>
		                         	@endif
                         		</div>
                         		{{-- <div class="col-sm-3"> --}}
                         			
                         		{{-- </div> --}}
                         	</div>

                         	{{-- =========================== DISPALY BLOCK ============================ --}}


                        </div>  
                    	</form>
	                	<form class="form-horizontal" enctype="multipart/form-data">
                        <div class="step" id="step-4"> 
                        <div class="{{ $checkDemande->checkInformationNoDataDisplayForm($Demande, $Decision)==true ? "" : "hide" }} step4Box">
                        	<div id="horsdelais">{{ ($Demande) ? $checkDemande->afficherDelais($Demande->requerant_id, $Demande->dateDemande, $Demande->id) : "" }}</div>
                        	<div class="hide" id="demId"><input type="hidden" name="demande_idHidden" value="{{ ($Demande) ? $Demande->id : "" }}"></div> 
                        	<div class="hide" id=""><input type="hidden" name="information_id" value="{{ $checkDemande->checkInformation($Demande) ? $Demande->information->id : "" }}"></div> 

	                        <div class="form-group ">
	                            <label class="col-md-3 col-xs-12 control-label" style="color: #eee">Libellé de la demande </label>
	                            <div class="col-md-6 col-xs-12">    
	                                <input type="text" class="form-control" value="{{ ($Demande) ? $Demande->libelle : "" }} " name="" id="libdemanDoc" readonly="">
	                            </div>
	                        </div>
	                        <div class="form-group ">
	                            <label class="col-md-3 col-xs-12 control-label">Libellé du document/information en réponse </label>
	                            <div class="col-md-6 col-xs-12">    
	                            	<textarea class="form-control" name="libelleInfo" id="libelleInfo" required=""  placeholder="Ex : - Rapport des activités 2019&#10; - Liste des commissaires &#10; - Liste des organismes publics en CI" >{{ $checkDemande->checkInformation($Demande) ? $Demande->information->libelle : "" }}</textarea>
	                                {{-- <input type="text" class="form-control" value="{{ $checkDemande->checkInformation($Demande) ? $Demande->information->libelle : "" }}" name="libelleInfo" id="libelleInfo" required="" > --}}
                                		<input type="checkbox" id="copielibdemanDoc"> <label for="copielibdemanDoc">Cocher si vous souhaiter garder le même libellé</label>
	                                
                                    <span class="invalid-feedback text-danger" role="alert"></span>
                                	
	                            </div>
	                        </div>
	                        
	                        <div class="form-group ">
	                            <label class="col-md-3 col-xs-12 control-label">Veuillez ajouter l'information relative à la demande </label>
	                            <div class="col-md-6 col-xs-12">                                            
									<textarea class="form-control" rows="7" name="information" id="information">{{ $checkDemande->checkInformation($Demande) ? $Demande->information->information : "" }}</textarea>
	                                
	                                
                                    <span class="invalid-feedback text-danger" role="alert"></span>
                                	
	                            </div>
	                        </div>
	                        
	                        <div class="form-group ">
	                            <label class="col-md-3 col-xs-12 control-label">Joindre les documents relatifs à la demande <i>(PDF, png, jpeg,jpg)</i> <i class="fas fa-question-circle cursor" title="Vous pouvez sélectionner plusieurs"></i> </label>
	                            <div class="col-md-6 col-xs-12 infoPhoto"> 
	                               	<input type="file" multiple="true" class="" id="documents" name="documents[]">
	                            </div>
	                        </div> 
	                        <div class="form-group ">
	                            <label class="col-md-3 col-xs-12 control-label"></label>
	                            <div class="col-md-6 col-xs-12 infoPhoto"> 
	                               	<div class="previewText"></div>
	                       		 	<div class="previewTextError"></div>
	                            </div>
	                        </div>
	                        
	                        @php
	                        	if($checkDemande->checkInformation($Demande)){
	                        		$dateCommunication = $Demande->information->dateCommunication;
	                        	}elseif(isset($Demande) && !empty($Demande) && $Demande->autoEnregsitrement==1){
	                        		$dateCommunication = date("Y-m-d");
	                        	}else{
	                        		$dateCommunication = "";
	                        	}
	                        @endphp
	                       
	                        <div class="form-group {{ ($Demande && !empty($Demande) && $Demande->autoEnregsitrement==1) ? "hide" : "" }}">
	                            <label class="col-md-3 col-xs-12 control-label">Date de communication <span class="required">*</span></label>
	                            <div class="col-md-6 col-xs-12"> 
	                               	<div class="input-group">
	                                    <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
	                                    <input type="text" class="form-control todayDate" id="dateCommunication" name="dateCommunication" value=" {{ $dateCommunication }}" required="">
	                                    <span class="invalid-feedback text-danger" role="alert"></span>
	                                	
	                                </div>
	                            </div>	                            
	                        </div> 
	               
	                        <div class="form-group ">
	                            <label class="col-md-3 col-xs-12 control-label">Source du document </label>
	                            <div class="col-md-6 col-xs-12"> 
	                                    <input type="text" list="source" class="form-control " id="" name="source" value="{{ $checkDemande->checkInformation($Demande) ? $SourceInfor->source : ""  }}" autocomplete="off" placeholder="Ex:Service communication">
	                                    <datalist id="source">
											@if($Source)
	                                    	@foreach($Source as $value)
	                                    		<option id="{{ $value->id }}">{{ $value->source }}</option>
	                                    	@endforeach
											@endif
	                                    </datalist>
	                                    <span class="invalid-feedback text-danger" role="alert"></span>
	                            </div>	                            
	                        </div> 
	                        
	                        <div class="form-group hide">
	                            <label class="col-md-3 col-xs-12 control-label">Visibilité du document <i class="fa fa-question-circle" title="Les documents publics seront automatiquement publiés sur la plateforme. Cependant, ceux qui ne le seront pas seront uniquement envoyés à l'intéressé"></i> <span class="required">*</span></label>
	                            <div class="col-md-6 col-xs-12"> 
	                               	<div class="input-group">
	                                    <input type="radio" class="" value="0" id="prive" name="public" id="prive" checked=""> <label for="prive">Privé <i>(Seulement à l'intérêssé)</i></label>
	                                    <input type="radio" class="hide" value="1" id="public" name="public" id="public" @if($checkDemande->checkInformation($Demande)) {{ $Demande->information->public==true ? "checked" : ""  }}  @endif> <label for="public" class="hide">Public</label> <br>
	                                    <span class="invalid-feedback text-danger" role="alert"></span>
	                                	
	                                </div>
	                            </div>
	                            
	                        </div> 
	                        <div class="form-group ">
	                            <label class="col-md-3 col-xs-12 control-label">Type de communication <i class="fa fa-question-circle" title=""></i> <span class="required">*</span></label>
	                            <div class="col-md-6 col-xs-12">
	                            	<input type="radio" name="satisfation" value="3" id="totale" required="" checked=""> <label for="totale">communication totale</label>
	                            	<input type="radio" name="satisfation" value="2" id="partielle" > <label for="partielle" title="seule une partie des documents demandés a été communiquée">communication partielle</label> 
	                            </div>
	                        </div>
	                        <div class="" id="transmissionBox">
	                    	<div class="form-group ">
	                            <label class="col-md-3 col-xs-12 control-label">Mode de transmission <span class="required">*</span></label>
	                            <div class="col-md-6 col-xs-12">
	                            	<div class="row">
	                            		<div class="col-sm-6" ><input type="checkbox" name="transmission[]" value="email" id="courrier"  ><label for="courrier"> Courrier électronique</label></div>
	                            		<div class="col-sm-6"><input type="checkbox" name="transmission[]" value="faxe" id="faxe" > <label for="faxe" title=""> Fax</label></div>
	                            	</div>
	                            	<div class="row">
	                            		<div class="col-sm-6"><input type="checkbox" name="transmission[]" value="physique" id="physique" > <label for="physique" title=""> Version physique</label> </div>
	                            		<div class="col-sm-6"><input type="checkbox" name="transmission[]" value="numerique" id="numerique"  > <label for="numerique" title=""> Format numérique (CD, Clé)</label> </div>
	                            	</div>
	                            	<div class="row">
	                            		<div class="col-sm-6"><input type="checkbox" name="transmission[]" value="surplace" id="surplace"  > <label for="surplace" title=""> Consultation gratuite sur place</label></div>
	                            		<div class="col-sm-6"><input type="checkbox" name="transmission[]" value="site
	                            			" id="site"  > <label for="site" title=""> Redirigé vers le site</label> </div>
	                            	</div>
	                            	<div class="row">
	                            		<div class="col-sm-6"><input type="checkbox" name="transmission[]" value="op
	                            			" id="op"  > <label for="op" title=""> Redirigé vers organisme public </label> </div>
	                            	</div>
	                            	
	                            </div>
	                        </div>
	                    	</div>
	                        @if($PrivillegeBtn->checkPrivilege()['createFile']!==true)
	                        	<div class="alert alert-warning">
	                        		<i class="fa fa-warning"></i> {{ $PrivillegeBtn->textNoPriv() }}
	                        	</div>
	                        @endif
	                        <div class="actionBar">
	                        	<div class="progress">
                        			<div class="progress-bar  progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-width="100" aria-valuenow="0"></div>
                    			</div>
		                    	<a class="btn btn-default pull-left precedent " rel="2"><i class="fa fa-chevron-left"></i> Précédent </a>
		                    	<a class="btn btn-danger pull-right No_Next no {{ $checkDemande->hideClassInfo($Demande) }} {{ $checkDemande->hideClassInfo($Demande) }} {{ $PrivillegeBtn->checkPrivilege()['createFile'] ? "" : "noPriv" }}" rel="4">&nbsp; Ne rien communiquer </a>
		                    	<a class="btn btn-success pull-right  saveBTN {{ $checkDemande->hideClassInfo($Demande) }} {{ $PrivillegeBtn->checkPrivilege()['createFile'] ? "" : "noPriv" }}"  id="sendInform" href="#"><span></span> Enregistrer informations demandées</a>
		                    	<a class="btn btn-info pull-right suivant {{ $checkDemande->showClassInfo($Demande) }}" rel="4">Suivant <i class="fa fa-chevron-right"></i> </a>

		                    		
		                    		<a class="btn btn-danger pull-right hide no cancel">Annuler</a>

	                    	</div>  
	                    	</div>                       
                         	
                         	{{-- =========================== DISPALY BLOCK ============================ --}}
                         	{{-- {{ dd($Documents) }} --}}
                        @if($checkDemande->checkInformationNoData($Demande, $Decision)==false)
                         	<div class="row {{ !$checkDemande->checkInformation($Demande) ? "hide" : "" }} stepResume">
                         		<br>
                         		<div class="col-sm-12">
                         		</div>
                         		<div class="{{ ($Demande && $Documents!=null &&  $Documents->count()>0) ? "col-md-6" : "col-sm-12" }}">
                         			<a class="btn btn-success pull-left editerForm"><i class="fa fa-edit"></i>Modifier</a>
                         			<a class="btn btn-info pull-right suivant " rel="4">Suivant <i class="fa fa-chevron-right"></i> </a>
                         			<a class="btn btn-default pull-right precedent " rel="2"><i class="fa fa-chevron-left"></i> Précédent </a>
                         			<br><br>
                         			<div id="" class="">
                         				{{ (isset($Demande) && !empty($Demande->information) ) ? $checkDemande->afficherDelais($Demande->Requerant->id, $Demande->dateDemande , $Demande->id,  $Demande->information->dateCommunication) : "" }}
		                         		<table class="table table-bordered table-striped table-hover">
		                         			<tr>
		                         				<td>Libellé du document</td>
		                         				<td>{{ $checkDemande->checkInformation($Demande) ? $Demande->information->libelle : "" }} </td>
		                         			</tr>
		                         			<tr>
		                         				<td>Information publiée</td>
		                         				<td>  {{ $checkDemande->checkInformation($Demande) ? $Demande->information->information : "" }}</td>
		                         			</tr>
		                         			<tr>
		                         				
		                         				<td>Date de la communication</td>
		                         				<td> {{ $checkDemande->checkInformation($Demande) ? $DateRewrite->dateFrancais($Demande->information->dateCommunication) : "" }}</td>
		                         			</tr>
		                         			<tr>
		                         				<td>Source du document</td>
		                         				<td>{{ $checkDemande->checkInformation($Demande) ? $SourceInfor->source : "" }} </td>
		                         			</tr>
		                         			<tr>
		                         				<td>Visibilité du document</td>
		                         				<td>
		                         					@if($checkDemande->checkInformation($Demande))
		                         						@php 
		                         							$Visibilite = $Globals->Visibilite($Demande->information->public) 
		                         						@endphp
		                         						<label class="{{ $Visibilite['span'] }}">{{ $Visibilite['texte'] }}</label>
		                         					@endif
		                         					</td>
		                         			</tr>
	             							<tr>
	             								<th>Mode de transmission</th>
	             								<td>
	             									@if($Demande && $Demande->transmission!=null)
	             									<ul>			
	             									@foreach(json_decode($Demande->transmission, true) as $value)
	             										<li>{{ strtoupper($value) }}</li>
	             									@endforeach
	             									</ul>
	             									@endif
	             								</td>
	             							</tr>
		                         			
		                         			
		                         		</table>
		                         	</div>
                         		</div>
                         		@if($Demande &&  $Documents!=null &&  $Documents->count()>0)
                         		<div class="col-md-6">
                         			<h4>Documents Publié</h4>
                         			<div class="row">
                         			@foreach($Documents as $Doc)
                         				<div class="col-sm-6">
                         					<iframe class="zoomScaneBox" src="{{ asset($Globals::Document_Path().$Doc->document) }}" style="border: 1px"></iframe>
                         					<div class="text-center">
		                         				<a class="btn zoomScane"><i class="fa fa-search-plus"></i> Zoomer</a>
		                         			</div>
                         				</div>
                         			@endforeach
                         			</div>
                         			
                         		</div>
                         		@endif
                         		{{-- <div class="col-sm-3"> --}}
                         			
                         		{{-- </div> --}}
                 		@else
                    		{{ $CommonController::displayNodata("Vous n'avez ajouté aucun document, ni information") }}
               		 	@endif
                     	</div>


                         	{{-- =========================== DISPALY BLOCK ============================ --}}
                       
                        </div>
                        </form>  
                        <form class="form-horizontal ">
                        <div class="step" id="step-5"> 
                        <div class="{{ $checkDemande->checkDecison($Decision) ? "hide" : "" }} step4Box"> 
                        	{{-- <input type="hidden" name="demande_idHidden" id="demId_Decision"> --}}
                        	<div class="hide" id="demId_Decision"><input type="hidden" name="demande_idHidden" value="{{ ($Demande) ? $Demande->id : "" }}"></div> 
	                        <div id="decisonDetailsBox" class=""> <br>
	                        	<div class="form-group">
	                        		<label class="col-md-2 col-xs-12" for="decisionFormDisplay">Joindre une notification</label>
	                        		<div class="col-md-10 col-xs-12">
	                        			<input type="checkbox" id="decisionFormDisplay">
	                        			<input type="checkbox" name="isDecision"  class="hide">
	                        		</div>
	                        	</div>
	                        	<div class="form-group decisonHeaderBtn"><br>
	                        		<div class="pull-right">
	                        			<a class="btn btn-default" id="fullSc">Plein écran</a>
	                        			<a class="btn btn-info preview"> <i class="fa fa-search-plus"></i> Prévisualiser</a>
	                        			@if($ValidationDecision->typeValide!="image")
		                        			<a class="btn btn-warning" id="printDecision"> <i class="fa fa-print"></i> Imprimer</a> <br>
		                        			<a class="text-center" target="_blank" href="{{ route('impression') }}" onclick="slideUpB($(this))" id="sendPrintBtn" style="display: none;">
												Cliquer ici	                        				
		                        			</a>
	                        			@endif
	                        			<script type="text/javascript">
	                        				function slideUpB(el){
	                        					el.slideUp();
	                        				}
	                        			</script>
	                        		</div>
	                        	</div>
	                        	<div class="form-group decisonHeaderBtn">
	                        	
	                            <label class="col-md-2 col-xs-12 control-label">Edition de notification </label>
	                            <div class="col-md-10 col-xs-12">
	                            		
	                            	<?php $logo = $UserController->userData()['organisme']->logo;
	                            	if($logo!=null){
		                            	$logo = asset('images/')."/".$logo ;
		                            	$logo = "<img src='".$logo."' width='150' style='float:left'><br><br><br>";
		                            }else{
		                            	$logo = "";
		                            }

		                            if(!empty($ValidationDecision)){
		                            	$typeValidation = $ValidationDecision;
		                            	if($typeValidation->typeValide=='image'){
		                            		$link = asset('signatures/'.$typeValidation->scane);
		                            		$signature = '<div class="sig"><img src="'.$link.'" width="400"></div>';
		                            	}else{
		                            		$signature = '<div style="float:right" class="putSign"></div>';
		                            	}
		                            }

		                            if($Demande){
		                            	$reqNom = $Demande->requerant->nom." ".$Demande->requerant->prenom;
		                            		$titre = $Demande->requerant->civilite;
		                            }else{
		                            	$reqNom = "Monsieur/Madame";
		                            	$titre = "Monsieur/Madame";
		                            }

	                            	$dateDecision = $DateRewrite->dateTimeFrancais(date("Y-m-d"));
	                            	$table = ['[%%logo%%]', '[%%date%%]', '[%%organisme%%]','[%%email%%]','[%%contact%%]', '[%%nomReq%%]', '[%%titre%%]', '[%%signature%%]' ];
	                            	$tableReplace = [$logo, $dateDecision, $UserController->userData()['organisme']->organisme, $UserController->userData()['organisme']->email, $UserController->userData()['organisme']->contact, $reqNom, $titre, $signature]
	                            	  ?>
	                            	<textarea class="form-control textareaEdit" name="decison" rows="">@if(is_null($Decision)){{ str_replace($table, $tableReplace, $Decisionspredefinie->decisonPredefinie) }}@else {{ $Decision->decison }} @endif <br><br>
	                            	</textarea>
	                            </div> 

	                        @if($ValidationDecision->typeValide!="image")
	                            <div class="form-group decisonHeaderBtn">
	                            	<label class="col-md-2 col-xs-12 control-label">
	                            		Joindre la notification préalablement imprimée et signée <i class="fas fa-question-circle cursor" title="Imprimer la notification ci-dessus en cliquant sur le bouton 'imprimier'. Le signer, et le téléverser ici "></i> 
	                            	</label>
		                            <div class="col-md-6 col-xs-12 "> 
		                               	<input type="file"  class="" id="notificationFile" name="notificationFile" >
		                            </div>
		                        </div>
		                     @endif
	                        </div>
	                        
	                       

	                        
	                    	</div>
	                    	{{-- @if(!$checkDemande->checkDecison($Decision)) --}}
	                    	@if($PrivillegeBtn->PrivillegeBtnValidation('createDecison')['error']===true)
	                        	<div class="alert alert-warning">
	                        		<i class="fa fa-warning"></i> {{ $PrivillegeBtn->PrivillegeBtnValidation('createDecison')['text'] }}
	                        	</div>
	                        @endif
	                        {{-- @endif --}}
	                    	<div class="actionBar">
	                    		<input type="hidden" name="decison_id" id="decison_id" value="{{ ($Demande && $Decision) ? $Decision->id : ""}}">
	                    		<div class="progress">
                        			<div class="progress-bar  progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-width="100" aria-valuenow="0"></div>
                    			</div>
		                    	<a class="btn btn-default pull-left precedent " rel="3"><i class="fa fa-chevron-left"></i> Précédent </a>
		                    	{{-- <a class="btn btn-warning pull-right no ">Pas maintenant </a> --}}
		                    	<a class="btn btn-info pull-right saveBTN {{ $PrivillegeBtn->checkPrivilege()['createDecison'] ? "" : "noPriv" }}"  id="sendDecision" href="#"><span></span> Terminer</a>
		                    	<a class="btn btn-danger pull-right hide no cancel">Annuler</a>
	                    	</div>  
	                    	
	                    </div>

	                    	{{-- =========================== DISPALY BLOCK ============================ --}}
                         	<div class="row {{ !$checkDemande->checkDecison($Decision) ? "hide" : "" }} stepResume" id="step4">
                         		<br>
                         		<div class="col-sm-12">
                         		</div>
                         		<div class="col-sm-12 transmiValidSerialize">
                         			@if($checkDemande->checkDecison($Decision))
                         			{{ $PrivillegeBtn->decisionBtn($Demande, $Decision) }}
                         			<a class="btn btn-default pull-right precedent " rel="3"><i class="fa fa-chevron-left"></i> Précédent </a>
                         			<div class="row  alert alert-info text-center" id="tranfertQuestion" style="display: none;">
                         				<div class="col-sm-12"> 
                         					<h4>
                         						<div class="lineSend">
                         							 <span id="questionSpan">Voulez-vous également transférer au requérant ?</span> <br><br> 
                         						<input type="radio" name="transferer" checked="" value="0" id="nonValide"> <label for="nonValide">Non, juste valider</label> 
                         						<input type="radio" name="transferer" value="1" id="ouiTransf"> <label for="ouiTransf">Oui, transférer </label><br>
                         						</div>
                         						<div class="text-left transmiValid" id="transmiValid">
                         							<div class="row">
                         								Mode de transmission <hr>
                         							</div>
						                            <div class="col-md-12 col-xs-12">
						                            	<div class="row">
						                            		<div class="col-sm-3"><input type="checkbox" name="transmiValid[]" value="email" id="courrier" checked="" required=""><label for="courrier"> Courrier électronique</label></div>
						                            		<div class="col-sm-3"><input type="checkbox" name="transmiValid[]" value="faxe" id="faxe" checked="" > <label for="face" title=""> Fax</label></div>
						                            		<div class="col-sm-3"><input type="checkbox" name="transmiValid[]" value="physique" id="physique" checked=""> <label for="physique" title=""> Version physique</label> </div>
						                            		<div class="col-sm-3"><input type="checkbox" name="transmiValid[]" value="numerique" id="numerique" checked="" > <label for="numerique" title=""> Format numérique</label> </div>
						                            	</div>
						                            </div>
                         						</div>
                         					</h4> <br><br>
                         					<div>
                         						<a href="#" class="btn btn-warning" id="cancelValide">Annuler</a>
                         						<a href="#" class="btn btn-default" id="sendValidation"><span></span> OK</a>
                         					</div>
                         				</div>
                         				
                         			</div>
                         			<br>
                         			@endif
                         			<hr>
                         			<div id="" class="">
                         				</div>
                         				<div class="row">
                         				<div class="col-sm-10 col-sm-offset-1" id="decsonDisplay" style="size: 12px" title="Cliquer pour agrandir">                         						
                         					{{-- {{ dd($Decision) }} --}}
                         					@if($Decision)
                         						@if($Decision && $Decision->isDecision!=null  xor $Decision->notificationFile!=null)
                         						@php 
                         						$lien = !is_null($Decision->notificationFile) ? $Decision->notificationFile : $Globals->genererDecisonPDF($Decision->demande->libelle, $Decision->demande->created_at, $Decision->demande->id.'.pdf')
                         						@endphp
                         						{{-- {{ dd( asset($Globals::Decision_Path().$lien))}} --}}
                         						{{-- {{ asset($Globals::Document_Path().$Doc->document) }} --}}
                         						<iframe class="zoomScaneBox" src="{{ asset($Globals::Decision_Path().$lien) }}" style="border: 1px; width: 100%; height: 600px;"></iframe>
                         						@else
                         						{{ $CommonController::displayNodata("Aucune notification n'a été jointe en réponse à la demande") }}
                         						@endif
                         						@endif
                         					</div>
                         				</div>
		                         	</div>
                         		</div>
                         		{{-- <div class="col-sm-3"> --}}
                         			
                         		{{-- </div> --}}
                         	</div>


                         	{{-- =========================== DISPALY BLOCK ============================ --}}
                                                             
                        </div>  
                    	</form>
                        

                    </div>
                    {{-- </form> --}}
                	</div>                        
                <!-- END WIZARD WITH SUBMIT BUTTON -->
				</div>
			</div>
			
		</div>
	</div>
	<div id="BoxHidden" class="hide">
		<a class="btn btn-danger " id="fullScInv">Réduire</a>
		<a class="btn btn-info preview"> <i class="fa fa-print"></i> Prévisualiser</a>
	</div>



<div id="representantName" class="hide">
	<div id="" class="form-group ">
        <label class="col-md-3 col-xs-12 control-label requis"> </label>
        <div class="col-md-6 col-xs-12">             
            	<input  name="civilite" type="radio" value="M"> Monsieur
            	<input  name="civilite" type="radio" value="Mme"> Madame
            	<input  name="civilite" type="radio" value="Mlle"> Mademoiselle
            
            <span class="invalid-feedback text-danger" role="alert"></span>
       		
        </div>
    </div>
     <div id="" class="form-group ">
        <label class="col-md-3 col-xs-12 control-label requis">Représentant<span class="required">*</span></label>
        <div class="col-md-2 col-xs-12">                                            
            <input type="text" class="form-control" value="{{ $Demande ? $Demande->requerant->nom : "" }}" name="nom" required="" {{ $checkDemande->readOnly($Demande) }} placeholder="Nom">
            
            <span class="invalid-feedback text-danger" role="alert"></span>
       		
        </div>
        <div class="col-md-4 col-xs-12">                                            
            <input type="text" class="form-control" value="{{ $Demande ? $Demande->requerant->prenom : "" }}" name="prenom" required="" {{ $checkDemande->readOnly($Demande) }} placeholder="Prénom">
            
            <span class="invalid-feedback text-danger" role="alert"></span>
       		
        </div>
    </div>
</div>

<div id="nomPrenomBoxData" class="hide">
	<div id="" class="form-group ">
        <label class="col-md-3 col-xs-12 control-label requis"> </label>
        <div class="col-md-6 col-xs-12">             
            	<input  name="civilite" type="radio" value="M"> Monsieur
            	<input  name="civilite" type="radio" value="Mme"> Madame
            	<input  name="civilite" type="radio" value="Mlle"> Mademoiselle
            
            <span class="invalid-feedback text-danger" role="alert"></span>
       		
        </div>
    </div>
     <div id="" class="form-group ">
        <label class="col-md-3 col-xs-12 control-label requis">Nom et prénom<span class="required">*</span></label>
        <div class="col-md-2 col-xs-12">                                            
            <input type="text" class="form-control" value="{{ $Demande ? $Demande->requerant->nom : "" }}" name="nom" required="" {{ $checkDemande->readOnly($Demande) }}>
            
            <span class="invalid-feedback text-danger" role="alert"></span>
       		
        </div>
        <div class="col-md-4 col-xs-12">                                            
            <input type="text" class="form-control" value="{{ $Demande ? $Demande->requerant->prenom : "" }}" name="prenom" required="" {{ $checkDemande->readOnly($Demande) }}>
            
            <span class="invalid-feedback text-danger" role="alert"></span>
       		
        </div>
    </div>
</div>





@stop

@section('css')
<link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet"> 
<link type="text/css" href="{{ asset('plugins/jquery.signature.package-1.2.0') }}/css/jquery.signature.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/datepicker/0.6.5/datepicker.css">
@stop
@section('js')
 {{-- <script type="text/javascript" src="{{ asset('admin') }}/js/plugins/smartwizard/jquery.smartWizard-2.0.min.js"></script> --}}

<script type="text/javascript" src="{{ asset('admin') }}/js/plugins/bootstrap/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="{{ asset('admin') }}/js/plugins/dropzone/dropzone.min.js"></script>
<script type="text/javascript" src="{{ asset('admin') }}/js/plugins/fileinput/fileinput.min.js"></script>        
<script type="text/javascript" src="{{ asset('admin') }}/js/plugins/filetree/jqueryFileTree.js"></script>
<script>
        CKEDITOR.replace( 'decison' );

       // setTimeout(function(){
       // 	 $("ul.steps_5 li").eq(2).trigger('click');
       // 	},2000);
        // alert();
</script>
@if($Demande)
{{ $checkDemande->activeBox($Demande, $Decision) }}
@endif
{{-- {{ $checkDemande->sendNextDemande($Demande) }} --}}

{{-- {{ $checkDemande->sendNextProro($Demande) }}
{{ $checkDemande->sendNextInform($Demande) }} --}}

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/datepicker/0.6.5/datepicker.js"></script>
<script type="text/javascript">
	$("#dateDemande, .todayDate").datepicker({
		// startDate: new Date(date('Y'), date('m') - 1, date('d')),
		endDate: '+1d',
		language : 'en',
		format : 'yyyy-mm-dd',
	});
	$(".datepicker, .newDate").attr('autocomplete', 'off');
	$("span.invalid-feedback").slideUp();
	$(".newDateD").datepicker({
		format : 'yyyy-mm-dd',
		language : 'fr',
	});
	
</script>

<script>
            $(function(){
                $(".file-simple").fileinput({
                        showUpload: false,
                        showCaption: false,
                        browseClass: "btn btn-default",
                        fileType: "any"
                });              
            });            
        </script>

    @if($checkDemande->checkProro($Demande, $Decision))
    	@php
    		$start = explode(" ", $Demande->dateDemande);
    		$startDateYear = explode("-", $start[0]);
            if($QualiteDemande)
    		$endDateYear = $checkDemande->newDateProro($startDateYear[0], $QualiteDemande->duree+30);
    	
			$endDateYear = explode("-", $endDateYear);
    	// dd($endDateYear);
    		
    		// dd($end);
    	@endphp
    	<script type="text/javascript">
    		$(".newDate").datepicker({
				format : 'yyyy-mm-dd',
				language : 'fr',
				startDate : new Date({{$startDateYear[0]}}, {{ $startDateYear[1] }} - 1, {{$startDateYear[2] }}),
				endDate : new Date({{$endDateYear[0]}}, {{$endDateYear[1]}} - 1, {{$endDateYear[2]}}),
			});
    	</script>
    @else
    	<script type="text/javascript">
   			//$("#datep").datepicker({
			// 	format : 'yyyy-mm-dd',
			// 	language : 'fr',
			// });
    	</script>
    @endif



@stop
<style type="text/css">
	
</style>
@section('overlay')
<div class="overlay">
		<a href="#" title="fermer" id="CloseFoxContent"><i class="fa fa-times fa-2x"></i></a>
	<div class="contentFoxBox">
		<div class="body">
		</div>
	</div>
</div>
@stop

{{-- @section('signature')
<div id="overLaySign">
	<div id="signBox">
		<h3>Veuillez signer dans la zone ci-dessous</h3>
	<div id="sign" ></div>
	<p style="clear: both;">
	<button id="closeSign" class="btn btn-danger">Annuler</button>
	<button id="clear" class="btn btn-info disabled remove">Effacer</button>
	<button id="svg" class="btn btn-success disabled remove">OK</button>
	<button id="decisonSignPrev" class="disabled remove "><i class="fa fa-search-plus"></i>Prévisualiser</button>	
	</div>
</p>
</div>
@stop --}}
