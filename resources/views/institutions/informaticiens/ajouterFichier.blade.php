@extends('layouts.admin')

@section('content')
	<div class="row">
		<div class="col-sm-12">
			<a href="{{ route('institutions.inform.demandeDetails', 1) }}"><i class="fa fa-chevron-left"></i> Retour</a>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-info ">
				<div class="panel-heading panel-remove">
					<div class="panel-title">
						Ajouter un commentaire
					</div>
				</div>
				<div class="panel-body">
					<form>
						<textarea class="summernote"></textarea>
					</form>
				</div>
				<div class="panel-footer">
					<a class="btn btn-lg btn-info pull-right">
						<i class="fa fa-check"></i> Valider
					</a>
				</div>
			</div>
			
		</div>
	</div>
@stop