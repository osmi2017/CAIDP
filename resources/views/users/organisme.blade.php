@extends('layouts.admin')
@section('content')
<div class="row">
	@if($Responsable && $Responsable->id == Auth::user()->responsable_id)
	@include('users.localmenu')
	@endif
	<div class="{{ $Responsable && $Responsable->id == Auth::user()->responsable_id ? "col-sm-9" : "col-sm-12" }}">
		<div class="panel panel-info">
			<div class="panel-heading">
				<div class="panel-title">Modifier les informations de l'organisme</div>
			</div>
			<div class="panel-body">
				<div id="step-1" class="stepBox">
				<form class="form-horizontal" method="post" action="{{ route('Responsable.organismeSave') }}" enctype="multipart/form-data">
					@csrf
					<div class="formDiv col-sm-12" data-rel="1">
						<div class="form-group @error('organisme') is-invalid @enderror">
							<label class="col-sm-4 control-label" for="organisme">Dénomination</label>
							<div class="col-sm-6">
								<input type="text" value="{{ $Organisme ? $Organisme->organisme :  old('organisme') }}" name="organisme" class="form-control" required="" placeholder="Dénommination  *" id="organisme">
							 	@error('organisme')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
						</div>
						<div class="form-group @error('siege') is-invalid @enderror">
							<label class="col-sm-4 control-label" for="siege">Siège</label>
							<div class="col-sm-6">
								<input type="text" value="{{ $Organisme ? $Organisme->siege : old('siege') }}" name="siege" id="siege" class="form-control" required="" placeholder="Siège *">
								@error('siege')
	                                <span class="invalid-feedback" role="alert">
	                                    <strong>{{ $message }}</strong>
	                                </span>
	                            @enderror
	                        </div>
						</div>
						<div class="form-group @error('email') is-invalid @enderror">
							<label class="col-sm-4 control-label" for="email">Email</label>
							<div class="col-sm-6">
								<div class="input-group">
								<input type="email" value="{{ $Organisme->email ? $Organisme->email : old('email') }}" name="email[]" id="email" class="form-control" required="" placeholder="Email de l'organisme *" rel="1" >
								<div class="input-group-addon emailPro" title="Ajouter un nouveau champ" id=""><a href="#"><i class="fa fa-plus"></i></a></div>
								</div>
								@error('email')
	                                <span class="invalid-feedback" role="alert">
	                                    <strong>{{ $message }}</strong>
	                                </span>
	                            @enderror
	                        </div>
						</div> 
						<div id="emailBoxPro"></div>
						<div class="form-group @error('contact') is-invalid @enderror">
							<label class="col-sm-4 control-label" for="contact">Contact</label>
							<div class="col-sm-6">
								<div class="input-group">
								<input type="text" value="{{ $Organisme ? $Organisme->contact : old('contact') }}" id="contact" name="contact[]" class="form-control contactInput" required="" placeholder="Contact *">
								<div class="input-group-addon contactPro" title="Ajouter un nouveau champ"><a href="#"><i class="fa fa-plus"></i></a></div>
								</div>
								@error('contact')
	                                <span class="invalid-feedback" role="alert">
	                                    <strong>{{ $message }}</strong>
	                                </span>
	                            @enderror
	                        </div>
						</div> 
						<div id="contactBoxPro"></div>
						<div class="form-group @error('logo') is-invalid @enderror">
							<label for="logo" class="btn btn-default col-sm-offset-4">Télécharger le logo </label>
							<input type="file" name="logo" class="hide" id="logo">
							 <img id="preview" src="#" alt="Votre logo" class="hide" width="100" />
						</div>
						<hr>
						<div id="showLogo"></div>
						<div class="form-group">
							<button class="btn btn-warning pull-right"><i class="fa fa-save"></i> Suivant </button>
						</div>

									
					</div>
				</form>
				</div>
			</div>
		</div>
	</div>
</div>

@stop

@section('js')
<script type="text/javascript">
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $('#preview').removeClass('hide');
      $('#preview').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]);
  }
}
$("#logo").change(function() {
  readURL(this);
});
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


	$("#qualite").change(function(){
	var x = $(this).parent().parent();
	if($(this).val()=="autre"){
			if(x.find('div').hasClass('autoFiledQualite')){
				$(".autoFiledQualite").remove();
			};

		$(this).parent().after("<br><br><div class='form-group autoFiledQualite'><label class='col-sm-4 control-label'>Préciser la qualité</label><div class='col-sm-6'><input required placeholder='Veuillez préciser votre qualité' type='text' class='form-control' name='autreQualite'></div></div>");
	}else{
		if(x.find('div').hasClass('autoFiledQualite')){
				$(".autoFiledQualite").remove();
		};
	}
});

$(document).on('click', ".emailPro",function(){
	var parent = $("#emailBoxPro"),
			 i = parent.find("input").length,
			 n = parseInt(i)+2;
			 checkInputLength(parent);
		input = '<div class="form-group" style="margin-bottom:10px;"><label class="col-sm-4 control-label">Email '+n+' </label><div class="col-sm-6"><div class="input-group"><input type="text" name="email[]" required class="form-control fieldJsEmail"  placeholder="Email de l\'organisme '+n+'" ><div class="input-group-addon " title="Ajouter un nouveau champ"><a href="#" class="remove"><i class="fa fa-times"></i></a></div></div></div></div> ';
		parent.append(input);
	return false;
});

$(document).on('click', ".contactPro",function(){
	var parent = $("#contactBoxPro"),
			 i = parent.find("input").length,
			 n = parseInt(i)+2;
			 checkInputLength(parent);
		input = '<div class="form-group" style="margin-bottom:10px;"><label class="col-sm-4 control-label">Contact '+n+' </label><div class="col-sm-6"><div class="input-group"><input type="text" name="contact[]" class="form-control fieldJs contactInput"  placeholder="Contact  de l\'organisme '+n+'" ><div class="input-group-addon " title="Ajouter un nouveau champ"><a href="#" class="remove"><i class="fa fa-times"></i></a></div></div></div></div>';
		parent.append(input);
	$(".contactInput").inputmask({"mask": "99 99 99 99 99"}); 
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