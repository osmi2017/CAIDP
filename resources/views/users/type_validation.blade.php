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
	<div class="col-sm-12">
		<div class="panel panel-info">
			<div class="panel-heading">
				<div class="panel-title">
					Définir de type de validation de décison
				</div>
			</div>
			<div class="panel-body">
				<form action="{{ route('Responsable.saveValidation') }}" method="post" enctype="multipart/form-data">
					@csrf()
					<table class="table table-bordered" id="fromValidation">
						{{-- <tr class=" editable {{ $Validation && !empty($Validation) && $Validation->typeValide=="sign" ? "bg-info" : "" }}">
							<td title="" width="50%">
								Signature manuelle en ligne <br> <i class="">(Vous devez disposer d'un appareil tactile)</i>
							</td>
							<td><input type="radio" name="validation" value="sign" {{ $Validation && !empty($Validation) && $Validation->typeValide=="sign" ? "checked" : "" }}></td>
						</tr> --}}
						<tr class=" editable {{ $Validation && !empty($Validation) && $Validation->typeValide=="imprim" ? "bg-info" : "" }}">
							<td title="">Imprimer la décison, signer, et envoyer</td>
							<td><input type="radio" name="validation" value="imprim" {{ $Validation && !empty($Validation) && $Validation->typeValide=="imprim" ? "checked" : "" }}></td>
						</tr>
						<tr class=" editable {{ $Validation && !empty($Validation) && $Validation->typeValide=="image" ? "bg-info" : "" }}">
							<td title="">Pré-enregistrer une signature</td>
							<td><input type="radio" name="validation" value="image" {{ $Validation && !empty($Validation) && $Validation->typeValide=="image" ? "checked" : "" }}></td>
						</tr>
						<tr class="{{ $Validation && !empty($Validation) && $Validation->typeValide=="image" ? "" : "hide" }} uploadFile">
							<td colspan="2">
								<div class="{{ isset($Validation) && !empty($Validation) ? "" : "hide" }} imagePrev">
									<img src="{{ asset('signatures/'.$Validation->scane) }}" width="400" height="200">
									<a href="#" id="changeScane">
										<i class="fa fa-edit"></i> Modifier
									</a>
								</div>
								
								<div class="{{ isset($Validation) && !empty($Validation) ? "hide" : "" }} inputDiv">
									<input type="file" name="scane" id="scaneImg" value="Télécharger" width="400"  ><br>
									<img id="preview" src="#" alt="Votre signature" class="hide" width="400" />
								<i>Taille max : 300ko</i>
								</div>
							</td>
						</tr>
					</table>
					<button type="submit" class="btn btn-info pull-right">
						<i class="fa fa-save"></i> Enregistrer
					</button>
				</form>
			</div>
		</div>
	</div>	
</div>
@stop

