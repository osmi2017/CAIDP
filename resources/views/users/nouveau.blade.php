@inject("PrivillegeBtn", "App\PrivillegeBtn")
@extends('layouts.admin')

@section('content')
{{-- <div class="row">
	<div class="col-sm-12">
		<a class="btn btn-info" href="{{ route('Responsable.index') }}">
			<i class="fa fa-chevron-left"></i> Retour
		</a>
	</div>
</div> --}}
<div class="row">
	@if($Responsable && $Responsable->id == Auth::user()->responsable_id)
	@include('users.localmenu')
	@endif
	<div class="{{ $Responsable && $Responsable->id == Auth::user()->responsable_id ? "col-sm-9" : "col-sm-12" }}">
		<div class="panel panel-info">
			<div class="panel-heading">
				<div class="panel-title">Ajouter un utilisateur</div>
			</div>
			<div class="panel-body">
				<form action="{{ route('Responsable.store') }}" method="post" class="form-horizontal">
				@csrf
				<div id="step-2" class="stepBox">
					<h3 class="text-center">Informations personnelles</h3>
					<hr>
					<div class="" data-rel="2">
						<div class="form-group @error('nom') is-invalid @enderror">
							<label class="col-sm-4 control-label">Nom</label>
							<div class="col-sm-6">
								<input type="text" value="{{ $Responsable ? $Responsable->nom : old('nom') }}" name="nom" class="form-control" required="" placeholder="Nom  *">
								@error('nom')
	                                <span class="invalid-feedback" role="alert">
	                                    <strong>{{ $message }}</strong>
	                                </span>
	                            @enderror
							</div>
						</div>
						<div class="form-group @error('prenom') is-invalid @enderror">
							<label class="col-sm-4 control-label">Prénom</label>
							<div class="col-sm-6">
								<input type="text" value="{{ $Responsable ? $Responsable->prenom : old('prenom') }}" name="prenom" class="form-control" required="" placeholder="Prénom *">
								@error('prenom')
	                                <span class="invalid-feedback" role="alert">
	                                    <strong>{{ $message }}</strong>
	                                </span>
	                            @enderror
	                        </div>
						</div>
						<div class="form-group @error('qualite') is-invalid @enderror hide">
							<label class="col-sm-4 control-label">Qualité</label>
							<div class="col-sm-6">
								<select class="form-control" id="qualite" name="qualite" required="">
									<option value="autre">Autres</option>
									@error('qualite')
	                                <span class="invalid-feedback" role="alert">
	                                    <strong>{{ $message }}</strong>
	                                </span>
	                            @enderror
								</select>
							</div>
						</div>
						<div class='form-group autoFiledQualite'>
							<label class='col-sm-4 control-label'>Qualité </label>
							<div class='col-sm-6'>
								<input required placeholder='Veuillez préciser votre qualité' type='text' class='form-control' name='autreQualite' list="autreQualiteList" @if($Responsable) value="{{ $Responsable->Qualiteresponsable->qualite }}" @endif >
								<datalist id="autreQualiteList">
									@foreach($Qualiteresponsable as $value)
										<option value="{{ $value->id }}">{{ $value->qualite }}</option>
									@endforeach
								</datalist>
							</div>
						</div>
						<div class="form-group">
							<label class='col-sm-4 control-label'>Responsable de l'information</label>
							<div class='col-sm-6'>
								<input type="checkbox" name="ri" value="ri" id="ri" class="responsabilite" @if($Responsable && $Responsable->ri==1) checked="" @endif >  
							</div>
						</div>
						<div class="form-group">
							<label class='col-sm-4 control-label'>Responsable hiérachique </label>
							<div class='col-sm-6'>
								<input type="checkbox" name="rh" value="rh" id="rh" class="responsabilite" @if($Responsable && $Responsable->rh==1) checked="" @endif > 
							</div>
							
						</div>
						
						<div class="form-group @error('email') is-invalid @enderror">
							<label class="col-sm-4 control-label">Email</label>
							<div class="col-sm-6">
							<div class="input-group">
								<input type="email" name="emailrespo[]" class="form-control" required="" placeholder="Email *" value="{{ $Responsable ? $Responsable->email : old('email') }}">
								<div class="input-group-addon email" title="Ajouter un nouveau champ"><a href="#"><i class="fa fa-plus"></i></a></div>
								</div>
								@error('email')
	                                <span class="invalid-feedback" role="alert">
	                                    <strong>{{ $message }}</strong>
	                                </span>
	                            @enderror
	                        </div>
						</div>
						<div id="emailBoxRespo">
							@if($Responsable && json_decode($Responsable->autrecontact, true)['email'])
							@php $i=2; @endphp
							@foreach(json_decode($Responsable->autrecontact, true)['email'] as $email)
							<div class="form-group">
								<label class="col-sm-4 control-label">Email {{ $i }} </label>
								<div class="col-sm-6">
									<div class="input-group">
										<input type="text" name="emailrespo[]" class="form-control fieldJs "  placeholder="" value="{{ $email }}" >
										<div class="input-group-addon " title="Ajouter un nouveau champ">
											<a href="#" class="remove"><i class="fa fa-times"></i></a>
										</div>
									</div>
								</div>
							</div>
							@php $i++ @endphp
							@endforeach
							@endif
						</div>
						<div class="form-group @error('contactRespo') is-invalid @enderror">
							<label class="col-sm-4 control-label">Contact</label>
							<div class="col-sm-6">
								<div class="input-group">
								<input type="text" name="contactRespo[]" class="form-control contactInput" required="" placeholder="Contact *" value="{{ $Responsable ? $Responsable->contact : old('contact') }}"> 
								<div class="input-group-addon contactRespo" title="Ajouter un nouveau champ"><a href="#"><i class="fa fa-plus"></i></a></div>
								</div>
								@error('contactRespo')
	                                <span class="invalid-feedback" role="alert">
	                                    <strong>{{ $message }}</strong>
	                                </span>
	                            @enderror
	                        </div>
						</div>
						{{-- {{dd(json_decode($Responsable->autrecontact, true)['contact'])}} --}}
						<div id="contactBoxRespo">
							@if($Responsable && json_decode($Responsable->autrecontact, true)['contact'])
							@php $i=2; @endphp
							@foreach(json_decode($Responsable->autrecontact, true)['contact'] as $contact)
							<div class="form-group">
								<label class="col-sm-4 control-label">Contact {{ $i }} </label>
								<div class="col-sm-6">
									<div class="input-group">
										<input type="text" name="contactRespo[]" class="form-control fieldJs contactInput"  placeholder="" value="{{ $contact }}" >
										<div class="input-group-addon " title="Ajouter un nouveau champ">
											<a href="#" class="remove"><i class="fa fa-times"></i></a>
										</div>
									</div>
								</div>
							</div>
							@php $i++ @endphp
							@endforeach
							@endif
						</div>
						<hr>
						<h3 class="text-center">Informations de connexion</h3>
						<hr>
						<div class="form-group @error('email') is-invalid @enderror">
							<label class="col-sm-4 control-label">Email de connexion</label>
							<div class="col-sm-6">
									<input type="text" name="email" list="listEmail" class="form-control" value="{{ $Responsable ? $Responsable->user->email : old('email') }}" >
									<datalist id="listEmail">
									</datalist>
									@error('email')
	                                <span class="invalid-feedback" role="alert">
	                                    <strong>{{ $message }}</strong>
	                                </span>
	                            @enderror
							</div>
						</div>
						<div class="form-group @error('password') is-invalid @enderror {{ $Responsable && Auth::user()->responsable_id == $Responsable->id ? "" : "hide" }}">
							<label class="col-sm-4 control-label">Mot de passe</label>
							<div class="col-sm-6">
									<input type="password" name="password" class="form-control" value="" >
									@error('password')
	                                <span class="invalid-feedback" role="alert">
	                                    <strong>{{ $message }}</strong>
	                                </span>
	                            @enderror
							</div>
						</div>
						
						<div class="form-group {{ $Responsable && Auth::user()->responsable_id == $Responsable->id ? "hide" : "" }}" style="">
								<label class="col-sm-4 control-label">Privilèges</label>
								<div class="col-sm-6">
									
									@foreach($Privilege as $value)
										
										@php
										$isChecked = false;
										if ($Responsable) {
											$privilegesOrga = json_decode($Responsable->user->privilegesOrga, true);
											$isChecked = ($Responsable && $privilegesOrga && isset($privilegesOrga[$value->variable]) && $privilegesOrga[$value->variable] == true);
										}
										@endphp
										<input type="checkbox" name="privilege[]" value="{{ $value->variable }}" id="{{ $value->variable=="valideDecison" ? $value->variable."1" : $value->variable }}" @if($isChecked) checked @endif>
										<label for="{{ $value->variable=="valideDecison" ? $value->variable."1" : $value->variable }}">{{ strtolower($value->privilege) }}</label> <br>
									@endforeach
								</div>
							</div>
							<div class="form-group @error('qualite') is-invalid @enderror {{ $Responsable && $Responsable->id ? "hide" : "" }} ">
								<label class="col-sm-4 control-label"></label>
							<div class="col-sm-6">
								<i>NB:Le mot de passe sera généré et envoyé par mail</i>
							</div>
						</div>
						
						<hr>
						{{-- {{ dd(Auth::user()) }} --}}
						@if($Responsable && $Responsable->id == Auth::user()->responsable_id)
							<div class="form-group">
								<input type="hidden" name="responsable_id" value="{{ $Responsable->id }}">
								<button class="btn btn-warning   send suivant col-sm-offset-4" rel="3"><i class="fa fa-save"></i> Modifier  </button>
							</div>
						@else
						@if($PrivillegeBtn->checkPrivilege()['createUser']!==false)
							<div class="form-group">
								@if($Responsable)
									<input type="hidden" name="responsable_id" value="{{ $Responsable->id }}">
									<button class="btn btn-warning   send suivant col-sm-offset-4" rel="3"><i class="fa fa-save"></i> Modifier  </button>
								@else
								<button class="btn btn-warning   send suivant col-sm-offset-4" rel="3"><i class="fa fa-save"></i> Enregister  </button>
								@endif
							</div>
						@else
							<div class="alert alert-warning">
	                        	<i class="fa fa-warning"></i> {{ $PrivillegeBtn->textNoPriv() }}
	                        </div>
						@endif
						@endif
									
					</div> 
					
					</form> 
			</div>
		</div>
	</div>
</div>

@stop


@section('js')
<script type="text/javascript">

$(document).on("blur", "input[name='emailrespo[]']", function(){
	var emailrespo = $(this).val();
	$("#listEmail").append("<option>"+emailrespo+"</option>");
});

$(document).on('click', '.remove', function(){
	$(this).each(function(){
		var parent = $(this).parent().parent().parent(),
			bigparent = parent.parent();
			bigparent.remove();
		var i = bigparent.find("input").length,
			n = parseInt(i)+2;
			checkInputLength(bigparent);
	})
	return false;
});

function checkInputLength(f){
	libelle = f.attr('id');
	if(libelle=="emailBoxRespo" || libelle == "emailBoxPro" ){
		libelle = 'Email ';
	}else if(libelle=="contactBoxPro" || libelle=="contactBoxRespo"){
		libelle = 'Contact ';
	}
	var i = f.find("input").length;
	for(var y=0; y<=i; y++){
		var c = parseInt(y)+2;
		f.find("input").eq(y).attr("placeholder", libelle+ c);
	}
}


// 	$("#qualite").change(function(){
// 	var x = $(this).parent().parent();
// 	if($(this).val()=="autre"){
// 			if(x.find('div').hasClass('autoFiledQualite')){
// 				$(".autoFiledQualite").remove();
// 			};

// 		$(this).parent().after("<br><br><div class='form-group autoFiledQualite'><label class='col-sm-4 control-label'>Préciser la qualité</label><div class='col-sm-6'><input required placeholder='Veuillez préciser votre qualité' type='text' class='form-control' name='autreQualite'></div></div>");
// 	}else{
// 		if(x.find('div').hasClass('autoFiledQualite')){
// 				$(".autoFiledQualite").remove();
// 		};
// 	}
// });

$(document).on('click', ".emailPro",function(){
	var parent = $("#emailBoxPro"),
			 i = parent.find("input").length,
			 n = parseInt(i)+2;
			 checkInputLength(parent);
		input = '<div class="form-group"><label class="col-sm-4 control-label">Contact '+n+' </label><div class="col-sm-6"><div class="input-group"><input type="text" name="email[]" required class="form-control fieldJsEmail"  placeholder="Email de l\'organisme '+n+'" ><div class="input-group-addon " title="Ajouter un nouveau champ"><a href="#" class="remove"><i class="fa fa-times"></i></a></div></div></div></div>';
		parent.append(input);
	return false;
});

$(document).on('click', ".contactPro",function(){
	var parent = $("#contactBoxPro"),
			 i = parent.find("input").length,
			 n = parseInt(i)+2;
			 checkInputLength(parent);
		input = '<div class="form-group"><label class="col-sm-4 control-label">Contact '+n+' </label><div class="col-sm-6"><div class="input-group"><input type="text" name="contact[]" class="form-control fieldJs contactInput"  placeholder="Contact  de l\'organisme '+n+'" ><div class="input-group-addon " title="Ajouter un nouveau champ"><a href="#" class="remove"><i class="fa fa-times"></i></a></div></div></div></div>';
		parent.append(input);
	$(".contactInput").inputmask({"mask": "99 99 99 99"}); 
	return false;
});
// ======================================================================================
$(document).on('click', ".email",function(){
	var parent = $("#emailBoxRespo"),
			 i = parent.find("input").length,
			 n = parseInt(i)+2;
			 checkInputLength(parent);
		input = '<div class="form-group"><label class="col-sm-4 control-label">Email '+n+' </label><div class="col-sm-6"><div class="input-group"><input type="text" name="emailrespo[]" required class="form-control fieldJsEmail"  placeholder="Email  '+n+'" ><div class="input-group-addon " title="Ajouter un nouveau champ"><a href="#" class="remove"><i class="fa fa-times"></i></a></div></div></div></div>';
		parent.append(input);
	return false;
});

$(document).on('click', ".contactRespo",function(){
	var parent = $("#contactBoxRespo"),
			 i = parent.find("input").length,
			 n = parseInt(i)+2;
			 checkInputLength(parent);
		input = '<div class="form-group"><label class="col-sm-4 control-label">Contact '+n+' </label><div class="col-sm-6"><div class="input-group"><input type="text" name="contactRespo[]" class="form-control fieldJs contactInput"  placeholder="Contact  '+n+'" ><div class="input-group-addon " title="Ajouter un nouveau champ"><a href="#" class="remove"><i class="fa fa-times"></i></a></div></div></div></div>';
		parent.append(input);
	$(".contactInput").inputmask({"mask": "99 99 99 99 99"}); 
	return false;
});
$(".contactInput").inputmask({"mask": "99 99 99 99 99"}); 
</script>
@stop