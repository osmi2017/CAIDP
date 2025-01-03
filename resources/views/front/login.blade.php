@inject("loginForm", "App\Http\Controllers\ConnexionController")
<style type="text/css">
	.sm-control{
		height: 30px !important;
	}
	.required{
		font-weight: bold;
		font-size: 18px;
		color: red;
	}
</style>
@php
$accueil = null;
$loginForm = $loginForm->loginForm();

$session = explode("/",  Session::get('url.intended'));
$accueil = end($session);



@endphp
<script src="{{ asset('js/intelinput/intlTelInput.js') }}"></script>


<!-- Sign In Popup -->
	<div id="sign-in-dialog" class="zoom-anim-dialog " style="max-width: 80%">

		<div class="small-dialog-header">
			<h3> @if($accueil=="accueil") Mon tableau de bord @else Faire une demande @endif
			<a href="#" class="" id="closeLoginModal"><i class="fa fa-times-circle pull-right"></i></a>
			</h3>
		</div>

		<!--Tabs -->
		<div class="errorBox"></div>
		<div class="sign-in-form style-1">

			<ul class="tabs-nav">
				<li class="active"><a href="#inscription" id="tab2Box">Nouveau requérant</a></li>
				<li class=""><a href="#login" id="tab1Box">Accéder à mon tableau de bord</a></li>
			</ul>

			<div class="tabs-container alt">
				
				<!-- Login -->
				<div class="tab-content" id="tab1" style="display: none;">
					<form method="post" class="login">

						<p class="form-row form-row-wide">
							<label for="pseudo">Numéro, Email ou numéro de la demande:
								<i class="im im-icon-Male"></i>
								<input type="text" class="input-text" name="pseudo" id="pseudo" value="{{ old('pseudo') }}" placeholder="" />
							</label>
							<span class="error"></span>				
						</p>

						<p class="form-row form-row-wide ">
						<div class="password-toggle">
						<label for="password">Mot de passe:
							<i class="im im-icon-Lock-2"></i>
							<input class="input-text password" type="password" name="password" id="password" value="{{ old('pseudo') }}" />
							<span class="toggle-icon" onclick="togglePasswordVisibility()">&#128065;</span>
							
						</label>
						</div>

							<span class="error"></span>
							<span class="lost_password">
								<a href="#" >Mot de passe oublié ?</a>
							</span>
						</p>
						@if ($errors->any())
					    <div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					    @endif
						<div class="form-row">
							<input type="submit" class="button border margin-top-5" name="login" value="Se connecter" id="loginBtn" />
							<div class="checkboxes margin-top-10">
								<input id="remember-me" type="checkbox" name="remember" value="1">
								<label for="remember-me">resté connecté</label>
								<span class="error"></span>
							</div>
						</div>
						
					</form>
				</div>

				<!-- Register -->
				<div class="tab-content" id="tab2" >
					<div class="" id="loginError"></div>
					<form  method="POST" id="sendReqForm"  enctype="multipart/form-data"  >
							<div class="row with-forms ">
	                            <label class="col-md-3 col-xs-12 control-label col-sm-offset-2">Type de demandeur <span class="required">*</span></label>
	                            <div class="col-md-6 col-xs-12">                                            
	                                <select class="form-control " id="type_id" name="type_id" required="">
	                                	@foreach($loginForm['Type'] as $value)
	                                		<option value="{{ $value->id }}">{{ $value->type }}</option>
	                                	@endforeach
	                                	
	                                </select>
	                                
                                    <span class="invalid-feedback text-danger" role="alert" style="display: none;"></span>
                                	
	                            </div>
	                        </div>
							<div id="denomminationBox" class="row with-forms hide">
	                            <label class="col-md-3 col-xs-12 control-label col-sm-offset-2 requis">Dénomination Entreprise/Structure123</label>
	                            <div class="col-md-6 col-xs-12">                                            
	                                <input class="form-control sm-control" value="" name="denomination" id="denomination"  type="text">
                                    <span class="invalid-feedback text-danger" role="alert" style="display: none;"></span>
	                            </div>
	                        </div>
	                        <div id="nomPrenomBox">
	                        	<label class="col-md-2 col-xs-12 control-label col-sm-offset-2 requis"> </label>
						        <div class="col-md-7 col-xs-12">                                            
						            <input  name="civilite" type="radio" value="M" style="display: inline-block; width: 19%"> <span style="color: #777">Monsieur</span>
						            <input  name="civilite" type="radio" value="Mme" style="display: inline-block; width: 19%"> <span style="color: #777">Madame</span>
						            <input  name="civilite" type="radio" value="Mlle" style="display: inline-block; width: 19%"> <span style="color: #777">Mademoiselle</span>
						            <span class="invalid-feedback text-danger" role="alert" style="display: none;"></span>
						        </div>
	                        <div class="row with-forms ">
								<span class="invalid-feedback text-danger" role="alert" style="display: none;"></span>
	                            <label class="col-md-3 col-xs-12 control-label col-sm-offset-2 requis">Nom & prénom<span class="required">*</span></label>
	                            <div class="col-md-2 col-xs-4">                                            
	                                <input class="form-control sm-control" value=" " placeholder="Nom" name="nom" required="" type="text">
	                            </div>
	                        
	                            <div class="col-md-4 col-xs-8">                                            
	                                <input class="form-control sm-control" placeholder="Prénom" value=" " name="prenom" required="" type="text">
	                                
                                    <span class="invalid-feedback text-danger" role="alert" style="display: none;"></span>
                               		
	                            </div>
	                        </div>
	                        </div>
	                        <div class="row with-forms ">
	                            <label class="col-md-3 col-xs-12 control-label col-sm-offset-2">Email <b class="fa fa-question" title="Ajouter une adresse mail afin de recevoir la réponse dans votre boîte, ou laisser vide dans le cas contraire" ></b> </label>
	                            <div class="col-md-6 col-xs-12">                                            
	                                <input list="emailReq" min="0" max="5" step="3" id="emailReqField" class="form-control sm-control" value="  " name="email" autocomplete="off" type="email">
	                                <datalist id="emailReq">
	                            	</datalist>
	                                <strong></strong>
									
                                    <span class="invalid-feedback text-danger" role="alert" style="display: none;"></span>
                                	
	                            </div>
	                        </div> 
	                        <div class="row with-forms ">
	                            <label class="col-md-3 col-xs-12 control-label col-sm-offset-2">Contact <span class="required">*</span> </label>
	                            <div class="col-md-6 col-xs-12">                                            
	                                <input class="form-control contact  phone sm-control" id="cont" value="" name="contact" required="" type="text">
									

	                                
                                    <span class="invalid-feedback text-danger" role="alert" style="display: none;"></span>
                                </div>
	                        </div>
	                        <div class="row with-forms ">
							
	                            <label class="col-md-3 col-xs-12 control-label col-sm-offset-2">Définir un mot de passe  <span class="required">*</span></label>
	                            <div class="col-md-6 col-xs-12 password-toggle">                                            
	                                <input class="form-control   sm-control password" id="password1" value="" name="password"  type="password" required=""/>
	                                
                                    <span class="invalid-feedback text-danger" role="alert" style="display: none;"></span>
                                </div>
							
	                        </div>
							
							
	                        
	                        
	                        {{-- <div class="row with-forms ">
	                            <label class="col-md-3 col-xs-12 control-label col-sm-offset-2">Contact 2 </label>
	                            <div class="col-md-6 col-xs-12">                                            
	                                <input class="form-control contactNumber  sm-control" value="8888888888" name="contact2"  type="text">
	                                
                                    <span class="invalid-feedback text-danger" role="alert" style="display: none;"></span>
                                </div>
	                        </div> --}}
	                        
	                        <div id="representantData" class="row with-forms">
	                            
	                        </div>
							<div id="titreBox" class="row with-forms hide" required="required">
	                            <label class="col-md-3 col-xs-12 control-label col-sm-offset-2 requis">Titre/Poste</label>
	                            <div class="col-md-6 col-xs-12">                                            
	                                <input class="form-control sm-control" value="" name="titre" id="titre" type="text">
	                                
                                    <span class="invalid-feedback text-danger" role="alert" style="display: none;"></span>
                                	
	                            </div>
	                        </div>
	                        <div id="nameBox" class="">
	                        <div class="row with-forms " style="margin-bottom: 15px;">
	                            <label class="col-md-3 col-xs-12 control-label col-sm-offset-2">Qualité <span class="required">*</span> </label>
	                            <div class="col-md-6 col-xs-12">  
	                            	<input type="text" name="qualite" class="sm-control" list="listQualite">
	                            	<datalist id="listQualite">
	                            		@foreach($loginForm['Qualite'] as $value)
	                                		<option>{{ $value->qualite }}</option>
	                                	@endforeach	
	                            	</datalist> 
	                            </div>
	                        </div>
	                        </div>
	                        <div id="" class="">
	                        <div class="row with-forms " style="margin-bottom: 15px;">
	                            <label class="col-md-3 col-xs-12 control-label col-sm-offset-2">Etes-vous un mandataire ? <span class="required">*</span> </label>
	                            <div class="col-md-6 col-xs-12">  
	                            	 <input  name="mandant" type="radio" value="oui" style="display: inline-block; width: 19%" > <span style="color: #777">Oui</span>
	                            	  <input  name="mandant" type="radio" value="non" style="display: inline-block; width: 19%" checked> <span style="color: #777">Non </span>
	                            	
	                            </div>
	                        </div>
	                        </div>
	                        
	                        {{-- <div id="qualiiteBox" class="row with-forms">
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
	                                <input name="adressePostale" value="" class="form-control sm-control" type="text">
	                                <span class="invalid-feedback text-danger" role="alert" style="display: none;"></span>
								</div>
	                        </div> --}}
                        	
                        	

	                        
	                        <div class="hide" id="mandantBox">
	                        <hr>
	                        <div class="row">
	                        	<h3 class="control-label col-sm-offset-2 col-md-3 ">Identité du mandant</h3>
	                        </div>
	                        	<hr>
	                        
	                       <div id="" class="row with-forms hide" style="display: hide">
						        <label class="col-md-2 col-xs-12 control-label col-sm-offset-2 requis"> Type de mandataire</label>
						        <div class="col-md-7 col-xs-12">                                            
						            <input  name="type_mandant" type="radio" value="pers_moral" style="display: inline-block; width: 19%"> <span style="color: #777">Personne morale</span>
						            <input  name="type_mandant" type="radio" value="pers_phys" style="display: inline-block; width: 19%" checked=""> <span style="color: #777">Personne physique</span>
						        </div>
						    </div>
						    <div  class="row with-forms hide" id="denomBox">
						        <label class="col-md-3 col-xs-12 control-label col-sm-offset-2 requis">Dénomination/Structure124</label>
						        <div class="col-md-6 col-xs-12">                                            
						            <input  name="denommination1" type="text" placeholder="denommination" class="form-control sm-control" id="denomination1" > 
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
						    <div class="row with-forms">
	                        	<label class="col-md-3 col-xs-12 control-label col-sm-offset-2 labelName" id="nomMandatairelabel">Nom & prénom555 <span class="required">*</span></label>
	                        	<div class="col-md-2 col-xs-12 ">
	                        		<input name="nomMandataire" class="form-control sm-control" type="text">
	                        		<span class="invalid-feedback text-danger" role="alert" style="display: none;"></span>
	                        	</div>	
	                        	<div class="col-md-4 col-xs-12 ">
	                        		<input name="prenomMandataire" class="form-control sm-control" type="text">
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
	                        		<input name="emailMandant" class="form-control sm-control" type="email"> 
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



                        

					<div class="row with-forms">
						<div class="col-sm-4 col-sm-offset-2">
							<input class="button border fw margin-top-10" id="sendReq" value="Continuer" type="submit">
						</div>
					</div>
					<br>
					</form>
					
				
	                       
		                
				</div>

			</div>
		</div>
	</div>
	<!-- Sign In Popup / End -->

	<div class="hide" id="representantName">
		<div id="" class="row">
	        <label class="col-md-2 col-xs-12 control-label col-sm-offset-2 requis"> </label>
	        <div class="col-md-7 col-xs-12">                                            
	            <input  name="civilite" type="radio" value="M" style="display: inline-block; width: 19%"> <span style="color: #777">Monsieur</span>
	            <input  name="civilite" type="radio" value="Mme" style="display: inline-block; width: 19%"> <span style="color: #777">Madame</span>
	            <input  name="civilite" type="radio" value="Mlle" style="display: inline-block; width: 19%"> <span style="color: #777">Mademoiselle</span>
	            <span class="invalid-feedback text-danger" role="alert" style="display: none;"></span>
	        </div>
	    </div>


		<div class="form-control">
			<label class="col-md-3 col-xs-12 control-label col-sm-offset-2 requis">Représentant <span class="required">*</span></label>
	    <div class="col-md-2 col-xs-12">                                            
	        <input class="form-control sm-control" value="" placeholder="Nom" name="nom" required="" type="text">
	    </div>

	    <div class="col-md-4 col-xs-12">                                            
	        <input class="form-control sm-control" placeholder="Prénom" value="" name="prenom" required="" type="text">
	        
	        <span class="invalid-feedback text-danger" role="alert" style="display: none;"></span>
	   		
	    </div>
		</div>
	</div>

	<div id="nomPrenomBoxData" class="hide">
	<div id="" class="row">
        <label class="col-md-2 col-xs-12 control-label col-sm-offset-2 requis"> </label>
        <div class="col-md-7 col-xs-12">                                            
            <input  name="civilite" type="radio" value="M" style="display: inline-block; width: 19%"> <span style="color: #777">Monsieur</span>
            <input  name="civilite" type="radio" value="Mme" style="display: inline-block; width: 19%"> <span style="color: #777">Madame</span>
            <input  name="civilite" type="radio" value="Mlle" style="display: inline-block; width: 19%"> <span style="color: #777">Mademoiselle</span>
            <span class="invalid-feedback text-danger" role="alert" style="display: none;"></span>
        </div>
    </div>
	<div class=" form-control">
		<span class="invalid-feedback text-danger" role="alert" style="display: none;"></span>
        <label class="col-md-3 col-xs-12 control-label col-sm-offset-2 requis">Nom & prénom777<span class="required">*</span></label>
        <div class="col-md-2 col-xs-4">                                            
            <input class="form-control sm-control remplacement" value="" placeholder="Nom" name="nom" required type="text" >
        </div>
    
        <div class="col-md-4 col-xs-8">                                            
            <input class="form-control sm-control remplacement" placeholder="Prénom" value="" name="prenom" required type="text" >
            
            <span class="invalid-feedback text-danger" role="alert" style="display: none;"></span>
       		
        </div>
	</div>
	</div>



<script type="text/javascript" src="{{ asset('admin') }}/js/plugins/jquery/jquery.min.js"></script> 

	<script type="text/javascript">
		$(document).ready(function(){
			@if($accueil=="accueil")
				$("#tab1Box").click();
			@endif
		})
	</script>