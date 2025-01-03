<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="_token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CAIDP') }}</title>

    <!-- Scripts -->

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
 
    <!-- Styles -->
    <link href="{{ asset('admin/css/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/caidp.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/intlTelInput.css') }}">
	<script src="{{ asset('js/intelinput/intlTelInput.js') }}"></script>
</head>
<body class="container-fluid">
	<div class="row row_height">

		<div class="col-sm-6 page_left text-center hidden-xs">
			<h2>Inscription organismes plublics </h2>
		</div>
		<form action="{{ url('/organisme/save/') }}" method="post"  enctype="multipart/form-data">
			 {{ csrf_field() }}
		<div class="col-sm-6 page_right">
			<div class="mainContent">
				<div class="messageError"></div>
				@if(session('error')) 
	                <div class="alert alert-danger"> 
	                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
	                    {{ session('error') }} 
	                </div> 
	            @endif
				@if ($errors->any())
			        <div class="alert alert-danger">
			            <ul>
			                @foreach ($errors->all() as $error)
			                    <li>{{ $error }}</li>
			                @endforeach
			            </ul>
			        </div>
			    @endif
				<div id="step-1" class="stepBox">
					<div  class="step">1/3 <br> <i class="fa fa-building text-danger"></i> Information de l'Organisme </div>
					<div class="formDiv col-sm-8 col-sm-offset-2" data-rel="1">
						<div class="form-group @error('organisme') is-invalid @enderror">
							<input type="text" value="{{ old('organisme') }}" name="organisme" class="form-control" required="" placeholder="Dénommination  *" >
							 	@error('organisme')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
						</div>
						<div class="form-group @error('siege') is-invalid @enderror">
							<input type="text" value="{{ old('siege') }}" name="siege" class="form-control" required="" placeholder="Siège *">
							@error('siege')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
						</div>
						<div class="form-group @error('email') is-invalid @enderror">
							<div class="input-group">
							<input type="email" value="{{ old('email') }}" name="email[]" class="form-control" required="" placeholder="Email de l'organisme *" rel="1" >
							<div class="input-group-addon emailPro" title="Ajouter un nouveau champ" id=""><a href="#"><i class="fa fa-plus"></i></a></div>
							</div>
							@error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
						</div> 
						<div id="emailBoxPro"></div>
						<div class="form-group @error('contact') is-invalid @enderror">
							<div class="input-group">
							<input type="text" value="" name="contact[]" class="form-control contactInput contact phone" required="" 	>
							<div class="input-group-addon contactPro" title="Ajouter un nouveau champ"><a href="#"><i class="fa fa-plus"></i></a></div>
							</div>
							@error('contact')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
						</div> 
						<div id="contactBoxPro"></div>
						<div class="form-group @error('logo') is-invalid @enderror">
							<label for="logo" class="btn btn-default">Télécharger le logo </label>
							<input type="file" name="logo" class="hide" id="logo">
							 <img id="preview" src="#" alt="Votre logo" class="hide" width="100" />
						</div>
						<hr>
						<div id="showLogo"></div>
						<div class="form-group">
							<a class="btn btn-warning pull-right disabled  send suivant" rel="2"> Suivant <i class="fa fa-chevron-right"></i> </a>
						</div>

									
					</div>
				</div>
				<div id="step-2" class="hide stepBox">
					<div class="step">2/3 <br> <i class="fa fa-user text-danger"></i> Information du responsable (Respo. Info, Respo. Hiéra, etc.) </div>
					<div class="formDiv col-sm-8 col-sm-offset-2" data-rel="2">
						<div class="form-group @error('nom') is-invalid @enderror">
							<input type="text" value="{{ old('nom') }}" name="nom" class="form-control" required="" placeholder="Nom  *">
							@error('nom')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
						</div>
						<div class="form-group @error('prenom') is-invalid @enderror">
							<input type="text" value="{{ old('prenom') }}" name="prenom" class="form-control" required="" placeholder="Prénom *">
							@error('prenom')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
						</div>
						<div class="form-group  hide">
							<select class="form-control" id="qualite" name="qualite" required="">
								{{-- <option value="">Qualité</option>
								@foreach($Qualiteresponsable as $value)
									<option value="{{ $value->id }}">{{ $value->qualite }}</option>
								@endforeach --}}
								<option value="autre">Autres</option>
								@error('qualite')
	                                <span class="invalid-feedback" role="alert">
	                                    <strong>{{ $message }}</strong>
	                                </span>
                            	@enderror
							</select>
						</div>
						<div class='form-group' @error('qualite') is-invalid @enderror>
			                <input required placeholder='Qualité' type='text' class='form-control' name='autreQualite' list="qualiteList">
			                <datalist id="qualiteList">
			                    @foreach ($Qualiteresponsable as  $value)
			                        <option><?php echo $value->qualite ?></option>
			                    @endforeach
			                </datalist>
			                @error('qualite')
	                            <span class="invalid-feedback" role="alert">
	                                <strong>{{ $message }}</strong>
	                            </span>
                            @enderror
			            </div>
						<div class="form-group">
							<input type="checkbox" name="ri" value="ri" id="ri" class="responsabilite"> Responsable de l'information  <br>
							<input type="checkbox" name="rh" value="rh" id="rh" class="responsabilite"> Responsable hiérachique
						</div>
						
						<div class="form-group @error('emailrespo') is-invalid @enderror">
							<div class="input-group">
							<input type="email" name="emailrespo[]" class="form-control" required="" placeholder="Email *">
							<div class="input-group-addon emailRespo" title="Ajouter un nouveau champ"><a href="#"><i class="fa fa-plus"></i></a></div>
							</div>
							@error('emailrespo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
						</div>
						<div id="emailBoxRespo"></div>
						<div class="form-group @error('contactRespo') is-invalid @enderror">
							<div class="input-group">
							<input type="text" value="{{ old('contact') }}" name="contactRespo[]" class="form-control contactInput phone" required="" placeholder="Contact *"> 
							<div class="input-group-addon contactRespo" title="Ajouter un nouveau champ"><a href="#"><i class="fa fa-plus"></i></a></div>
							</div>
							@error('contactRespo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
						</div>
						<div id="contactBoxRespo"></div>
						
						<hr>
						<div class="form-group">
							<a class="btn btn-default pull-left  precedent " rel="1"><i class="fa fa-chevron-left"></i> Prcécédent </a>
							<a class="btn btn-warning pull-right disabled  send suivant" rel="3"> Suivant <i class="fa fa-chevron-right"></i> </a>
						</div>

									
					</div>
				</div>
				<div id="step-3" class="hide stepBox">
					<div class="step">3/3 <br> <i class="fa fa-lock text-danger"></i>  Paramètre de connexion </div>
					<div class="formDiv col-sm-8 col-sm-offset-2" data-rel="3">
						<div class="form-group @error('emailUser') is-invalid @enderror">
							<div>
								<input type="email" id="emailUser" list="listEmail"  value="{{ old('emailUser') }}" name="emailUser" class="form-control" required="" placeholder="Email de connexion  *" autocomplete="off" >
								<datalist id="listEmail"></datalist>
							</div>
							 	@error('emailUser')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
						</div>
						<div class="form-group @error('password') is-invalid @enderror">
							<div class="input-group">
								<div class="input-group-addon" title="Rendre le mot de passe visible ou le cacher">
									<a id="eyeCheck" href="#" ><i class="fa fa-eye"></i></a>
								</div>
								<input type="password" value="{{ old('password') }}" name="password" class="form-control" required="" placeholder="Mot de passe">
								<div class="input-group-addon" title="Vous pouvez défnir un mot de passe ou le générer">
									<a id="generer" href="#" style="text-decoration: none; color: black">générer </a><i class="fa fa-question-circle" ></i>
								</div>
							@error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        	</div>
                            
						</div>
						<div class="form-group" style="">
							<div style="text-decoration-line: underline;">Mes privilèges</div>
							@foreach($Privilege as $value)
								<input type="checkbox" readonly="" checked="" disabled=""> {{ $value->privilege }} <br>
							@endforeach
						</div>
						<hr>
						<input type="hidden" name="savebyorganisme" value="1">
						<div class="form-group">
							<a class="btn btn-default pull-left  precedent " rel="2"><i class="fa fa-chevron-left"></i> Prcécédent </a>
							<a class="btn btn-warning save send pull-right disabled" >
								<span></span>
								Enregistrer
							</a>
						</div>

									
					</div>
				</div>
			</div>
			<div id="propulsedBy" class="pull-right"><a href="">Propulsé par la CAIDP</a></div>
		</div>
		</form>
		
	</div>

<script type="text/javascript" src="{{ asset('admin') }}/js/plugins/jquery/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<link rel="stylesheet" href="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.css">
<script src="{{ asset('plugins/Inputmask-5.x') }}/dist/jquery.inputmask.js"></script>
<script type="text/javascript" src="{{ asset('js/inscription.js') }}"></script>
</body>
</html>