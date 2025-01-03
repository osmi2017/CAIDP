@extends('layouts.requerant')
@inject("loginForm", "App\Http\Controllers\ConnexionController")
@section('content')
@php
$loginForm = $loginForm->loginForm();
@endphp
<div class="add-listing-section">

	<!-- Headline -->
	<div class="add-listing-headline">
		<h3><i class="sl sl-icon-user"></i> Modifier mon profil</h3>
	</div>
	<!-- Title -->
	<form action="{{ route('requerant.updateProfil') }}" method="post" id="sendReqForm"  enctype="multipart/form-data" >
        @csrf()
			<div class="row with-forms ">
                <label class="col-md-3 col-xs-12 control-label col-sm-offset-2">Type de demandeur <span class="required">*</span></label>
                <div class="col-md-6 col-xs-12">                                            
                    <select class="form-control " id="type_id" name="type_id" required="">
                        <option value="{{ $User->type->id }}">{{ $User->type->type }}</option>
                    	@foreach($loginForm['Type'] as $value)
                        @if($User->type->id != $value->id)
                    		<option value="{{ $value->id }}">{{ $value->type }}</option>
                        @endif
                    	@endforeach
                    	
                    </select>
                    
                    <span class="invalid-feedback text-danger" role="alert" style="display: none;"></span>
                	
                </div>
            </div>
			<div id="denomminationBox" class="row with-forms {{ $User->type->id == 2 ? '' : 'hide' }}">
                    @php
                        $requisClass = ($User->type->id == 2) ? 'requis' : '';
                    @endphp
                    <label class="col-md-3 col-xs-12 control-label col-sm-offset-2 {{ $requisClass }}">Dénomination Entreprise/Structure</label>
                    <div class="col-md-6 col-xs-12">                                            
                        <input class="form-control sm-control" value="{{ $User->denomination }}" name="denomination" id="denomination"  type="text">
                        <span class="invalid-feedback text-danger" role="alert" style="display: none;"></span>
                    </div>
                </div>

            <div id="nomPrenomBox" >
                <div class="{{ $User->type->id != 2 ? "" : "hide" }}">
            	<label class="col-md-2 col-xs-12 control-label col-sm-offset-2 requis"> </label>
		        <div class="col-md-7 col-xs-12">                                            
		            <input  name="civilite" type="radio" value="M" style="display: inline-block; width: 19%"> <span style="color: #777">Monsieur</span>
		            <input  name="civilite" type="radio" value="Mme" style="display: inline-block; width: 19%"> <span style="color: #777">Madame</span>
		            <input  name="civilite" type="radio" value="Mlle" style="display: inline-block; width: 19%"> <span style="color: #777">Mademoiselle</span>
		            <span class="invalid-feedback text-danger" role="alert" style="display: none;"></span>
		        </div>

            <div class="row with-forms ">
				<span class="invalid-feedback text-danger" role="alert" style="display: none;"></span>
                <label class="col-md-3 col-xs-12 control-label col-sm-offset-2 requis">Nom & prénom 1<span class="required">*</span></label>
                <div class="col-md-2 col-xs-4">                                            
                    <input class="form-control sm-control" value="{{ $User->nom }}" placeholder="Nom" name="nom" required="" type="text">
                </div>
            
                <div class="col-md-4 col-xs-8">                                            
                    <input class="form-control sm-control" placeholder="Prénom" value="{{ $User->prenom }}" name="prenom" required="" type="text">
                    
                    <span class="invalid-feedback text-danger" role="alert" style="display: none;"></span>
               		
                </div>
            </div>
            </div>
                </div>
            <div class="row with-forms ">
                <label class="col-md-3 col-xs-12 control-label col-sm-offset-2">Email <b class="fa fa-question" title="Ajouter une adresse mail afin de recevoir la réponse dans votre boîte, ou laisser vide dans le cas contraire" ></b> </label>
                <div class="col-md-6 col-xs-12">                                            
                    <input list="emailReq" min="0" max="5" step="3" id="emailReqField" class="form-control sm-control" value="{{ $User->email }}"  name="email" autocomplete="off" type="email">
                    <datalist id="emailReq">
                	</datalist>
                    <strong></strong>
					
                    <span class="invalid-feedback text-danger" role="alert" style="display: none;"></span>
                	
                </div>
            </div> 
            <div class="row with-forms ">
                <label class="col-md-3 col-xs-12 control-label col-sm-offset-2">Contact <span class="required">*</span> </label>
                <div class="col-md-6 col-xs-12">                                            
                    <input class="form-control contact contactNumber  sm-control" value="{{ $User->contact }}" name="contact" required="" type="text">
                    
                    <span class="invalid-feedback text-danger" role="alert" style="display: none;"></span>
                </div>
            </div>
            <div class="row with-forms ">
                <label class="col-md-3 col-xs-12 control-label col-sm-offset-2">Définir un mot de passe  <span class="required">*</span></label>
                <div class="col-md-6 col-xs-12">                                            
                    <input class="form-control   sm-control" value="" name="password"  type="password" required="">
                    
                    <span class="invalid-feedback text-danger" role="alert" style="display: none;"></span>
                </div>
            </div>
			
			
            
            
            <div class="row with-forms ">
                <label class="col-md-3 col-xs-12 control-label col-sm-offset-2">Contact </label>
                <div class="col-md-6 col-xs-12">                                            
                    <input class="form-control contactNumber  sm-control" value="{{ $User->contact2 }}" name="contact2"  type="text">
                    
                    <span class="invalid-feedback text-danger" role="alert" style="display: none;"></span>
                </div>
            </div>
            
            <div id="representantData" class="row with-forms">
                <div id="nomPrenomBox" class="{{ $User->type->id == 2 ? "" : "hide" }}">
                    <label class="col-md-2 col-xs-12 control-label col-sm-offset-2 requis"> </label>
                    <div class="col-md-7 col-xs-12">                                            
                        <input  name="civilite" type="radio" value="M" style="display: inline-block; width: 19%"> <span style="color: #777">Monsieur</span>
                        <input  name="civilite" type="radio" value="Mme" style="display: inline-block; width: 19%"> <span style="color: #777">Madame</span>
                        <input  name="civilite" type="radio" value="Mlle" style="display: inline-block; width: 19%"> <span style="color: #777">Mademoiselle</span>
                        <span class="invalid-feedback text-danger" role="alert" style="display: none;"></span>
                    </div>
                <div class="row with-forms ">
                    <span class="invalid-feedback text-danger" role="alert" style="display: none;"></span>
                    <label class="col-md-3 col-xs-12 control-label col-sm-offset-2 requis">Représentatnt<span class="required">*</span></label>
                    <div class="col-md-2 col-xs-4">                                            
                        <input class="form-control sm-control" value="{{ $User->nom }}" placeholder="Nom" name="nom" required="" type="text">
                    </div>
                
                    <div class="col-md-4 col-xs-8">                                            
                        <input class="form-control sm-control" placeholder="Prénom" value="{{ $User->prenom }}" name="prenom" required="" type="text">
                        
                        <span class="invalid-feedback text-danger" role="alert" style="display: none;"></span>
                        
                    </div>
                </div>
                </div>
            </div>
			<div id="titreBox" class="row with-forms hide" required="required">
                <label class="col-md-3 col-xs-12 control-label col-sm-offset-2 requis">Titre/Poste</label>
                <div class="col-md-6 col-xs-12">                                            
                    <input class="form-control sm-control" value="{{ $User->titre }}" name="titre" id="titre" type="text">
                    
                    <span class="invalid-feedback text-danger" role="alert" style="display: none;"></span>
                	
                </div>
            </div>
            <div id="nameBox" class="">
            <div class="row with-forms " style="margin-bottom: 15px;">
                <label class="col-md-3 col-xs-12 control-label col-sm-offset-2">Qualité <span class="required">*</span> </label>
                <div class="col-md-6 col-xs-12">  
                	<input type="text" name="qualite" class="sm-control" list="listQualite" value="{{ $User->qualite->qualite }}" >
                	<datalist id="listQualite">
                		@foreach($loginForm['Qualite'] as $value)
                    		<option>{{ $value->qualite }}</option>
                    	@endforeach	
                	</datalist> 
                </div>
            </div>
            </div>
            
            <div id="qualiiteBox" class="row with-forms">
                <label class="col-md-3 col-xs-12 control-label col-sm-offset-2 requis">Type de secteur d'activité</label>
                <div class="col-md-6 col-xs-12">
                    	@foreach($loginForm['Typesecteurs'] as $value)
                    		<input type="radio" name="type_secteur" value="{{ $value->id }}" style="display: inline-block;width: 25%"> <span style="color: #777">{{ $value->type_secteur }}</span>
                    	@endforeach
                    
                    <span class="invalid-feedback text-danger" role="alert" style="display: none;"></span>
                	
                </div>
            </div>
            <div id="secteurBox" class="row with-forms">
                <label class="col-md-3 col-xs-12 control-label col-sm-offset-2 requis">Secteur d'activité</label>
                <div class="col-md-6 col-xs-12">   
                	<input type="text" name="secteur" list="listSecteur" class=" form-control sm-control">
                	<datalist id="listSecteur">
                    	@foreach($loginForm['Secteurs'] as $value)
                    		<option>{{ $value->secteur }}</option>
                    	@endforeach
                	</datalist>
                    <span class="invalid-feedback text-danger" role="alert" style="display: none;"></span>
                </div>
            </div>
            
            


			
            
            <div id="" class="row with-forms ">
                <label class="col-md-3 col-xs-12 control-label col-sm-offset-2 requis">Lieu d'habitation </label>
                <div class="col-md-6 col-xs-12"> 
                    <input type="text" name="ville" list="listville" class=" sm-control">
                    <datalist id="listville">
                    	@foreach($loginForm['Villes'] as $value)
                    		<option>{{ $value->ville }}</option>
                    	@endforeach
                	</datalist>
                    <span class="invalid-feedback text-danger" role="alert" style="display: none;"></span>
                </div>
            </div>
            <div class="row with-forms " style="margin-bottom: 15px;">
                <label class="col-md-3 col-xs-12 control-label col-sm-offset-2">Adresse postale </label>
                <div class="col-md-6 col-xs-12">                                            
                    <input name="adressePostale" value="{{ $User->adressePostale }}" class="form-control sm-control" type="text">
                    <span class="invalid-feedback text-danger" role="alert" style="display: none;"></span>
				</div>
            </div>
        	
        	

            
            <div class="hide" id="mandantBox">
            <hr>
            <div class="row">
            	<h3 class="control-label col-sm-offset-2 col-md-3 ">Identité du mandant</h3>
            </div>
            	<hr>
            <div class="row with-forms">
            	<label class="col-md-3 col-xs-12 control-label col-sm-offset-2">Nom & prénom 2<span class="required">*</span></label>
            	<div class="col-md-2 col-xs-12 ">
            		<input name="nomMandataire" class="form-control sm-control" type="text">
            		<span class="invalid-feedback text-danger" role="alert" style="display: none;"></span>
            	</div>	
            	<div class="col-md-4 col-xs-12 ">
            		<input name="prenomMandataire" class="form-control sm-control" type="text">
            		<span class="invalid-feedback text-danger" role="alert" style="display: none;"></span>
            	</div>	
            </div>
           <div id="" class="row with-forms">
		        <label class="col-md-2 col-xs-12 control-label col-sm-offset-2 requis"> </label>
		        <div class="col-md-7 col-xs-12">                                            
		            <input  name="sexeMandataire" type="radio" value="M" style="display: inline-block; width: 19%"> <span style="color: #777">Monsieur</span>
		            <input  name="sexeMandataire" type="radio" value="Mme" style="display: inline-block; width: 19%"> <span style="color: #777">Madame</span>
		            <input  name="sexeMandataire" type="radio" value="Mlle" style="display: inline-block; width: 19%"> <span style="color: #777">Mademoiselle</span>
		            <span class="invalid-feedback text-danger" role="alert" style="display: none;"></span>
		        </div>
		    </div>
		                        
            {{-- <div class="">
            	<label class="col-md-3 col-xs-12 control-label col-sm-offset-2">Sexe <span class="required">*</span></label>
            	<div class="col-md-6 col-xs-12 ">
            		<input name="sexeMandataire" value="M" checked="" id="Hmandant" type="radio"> <label for="Hmandant">Masculin</label>
            		<input name="sexeMandataire" value="F" id="Fmandant" type="radio"> <label for="Fmandant">Feminin</label>
            	</div>	
            </div> --}}
            <div class="row with-forms">
            	<label class="col-md-3 col-xs-12 control-label col-sm-offset-2">Email {{-- <span class="required">*</span> --}}</label>
            	<div class="col-md-6 col-xs-12 ">
            		<input name="emailMandant" class="form-control sm-control" type="text"> 
            	</div>	
            </div>
            
            {{-- <div class="row with-forms">
            	<label class="col-md-3 col-xs-12 control-label col-sm-offset-2">Profession <span class="required">*</span></label>
            	<div class="col-md-6 col-xs-12 ">
            		<input name="professionMandant" class="form-control sm-control" type="text">
            		<span class="invalid-feedback text-danger" role="alert" style="display: none;"></span>
            	</div>	
            </div>
            <div class="row with-forms">
            	<label class="col-md-3 col-xs-12 control-label col-sm-offset-2">Domicile </label>
            	<div class="col-md-6 col-xs-12 ">
            		<input name="domicileMandant" list="domicileMandant" class="form-control sm-control" type="text">
                    <span class="invalid-feedback text-danger" role="alert" style="display: none;"></span>
                	<datalist id="domicileMandant">
                    	@foreach($loginForm['Villes'] as $value)
                    		<option>{{ $value->ville }}</option>
                    	@endforeach
                	</datalist>
			</div>	
            </div> --}}
            <div class="row with-forms">
            	<label class="col-md-3 col-xs-12 control-label col-sm-offset-2">Pièce justificative <span class="required">*</span></label>
            	<div class="col-md-6 col-xs-12 ">
            		<input name="pieceMandant" type="file" style="border: none;">
                    <span class="invalid-feedback text-danger" role="alert" style="display: none;"></span>
            	</div>	
            </div>
            
        </div>



        
    <input type="hidden" name="requerant_id" value="{{ $User->id }}">
	<div class="row with-forms">
		<div class="col-sm-4 col-sm-offset-2">
			<input class="button border fw margin-top-10" id="sendReq" value="Continuer" type="submit">
		</div>
	</div>
	<br>
</form>


</div>


<div id="representantName" class="hide">
    <div id="nomPrenomBox" class="">
        <label class="col-md-2 col-xs-12 control-label col-sm-offset-2 requis"> </label>
        <div class="col-md-7 col-xs-12">                                            
            <input  name="civilite" type="radio" value="M" style="display: inline-block; width: 19%"> <span style="color: #777">Monsieur</span>
            <input  name="civilite" type="radio" value="Mme" style="display: inline-block; width: 19%"> <span style="color: #777">Madame</span>
            <input  name="civilite" type="radio" value="Mlle" style="display: inline-block; width: 19%"> <span style="color: #777">Mademoiselle</span>
            <span class="invalid-feedback text-danger" role="alert" style="display: none;"></span>
        </div>
    <div class="row with-forms ">
        <span class="invalid-feedback text-danger" role="alert" style="display: none;"></span>
        <label class="col-md-3 col-xs-12 control-label col-sm-offset-2 requis">Représentatnt<span class="required">*</span></label>
        <div class="col-md-2 col-xs-4">                                            
            <input class="form-control sm-control" value="{{ $User->nom }}" placeholder="Nom" name="nom" required="" type="text">
        </div>
    
        <div class="col-md-4 col-xs-8">                                            
            <input class="form-control sm-control" placeholder="Prénom" value="{{ $User->prenom }}" name="prenom" required="" type="text">
            
            <span class="invalid-feedback text-danger" role="alert" style="display: none;"></span>
            
        </div>
    </div>
    </div>
</div>

<div id="nomPrenomBoxData" class="hide">
    <div id="" class="row with-forms">
        <label class="col-md-2 col-xs-12 control-label col-sm-offset-2 requis"> </label>
        <div class="col-md-7 col-xs-12">                                            
            <input  name="civilite" type="radio" value="M" style="display: inline-block; width: 19%"> <span style="color: #777">Monsieur</span>
            <input  name="civilite" type="radio" value="Mme" style="display: inline-block; width: 19%"> <span style="color: #777">Madame</span>
            <input  name="civilite" type="radio" value="Mlle" style="display: inline-block; width: 19%"> <span style="color: #777">Mademoiselle</span>
            <span class="invalid-feedback text-danger" role="alert" style="display: none;"></span>
        </div>
    <div class="row with-forms ">
        <span class="invalid-feedback text-danger" role="alert" style="display: none;"></span>
        <label class="col-md-3 col-xs-12 control-label col-sm-offset-2 requis">Nom & prénom3<span class="required">*</span></label>
        <div class="col-md-2 col-xs-4">                                            
            <input class="form-control sm-control" value="{{ $User->nom }}" placeholder="Nom" name="nom" required="" type="text">
        </div>
    
        <div class="col-md-4 col-xs-8">                                            
            <input class="form-control sm-control" placeholder="Prénom" value="{{ $User->prenom }}" name="prenom" required="" type="text">
            
            <span class="invalid-feedback text-danger" role="alert" style="display: none;"></span>
            
        </div>
    </div>
    </div>
</div>


@stop