@inject("Globals", "App\Tools\Globals")
@inject("DateRewrite","App\Tools\DateRewrite")
@inject("PrivillegeBtn", "App\PrivillegeBtn")
@extends('layouts.admin')

@section('content')
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-info">
			<div class="panel-heading">
				<div class="panel-title">Ajouter une saisine</div>
			</div>
			<div class="panel-body">
				<form class="form-horizontal" action="{{ route('saisines.store') }}" method="post">
					@csrf()
					<div class="form-group">
						<label class="control-label col-sm-3">
							Demande
						</label>
						<div class="col-sm-7">
							<select class="form-control" id="demande_id" name="demande_id">
							@foreach($Demandes as $value)
								<option value="{{ $value->id }}">{{ $value->libelle }} : {{ $value->numDemande }}</option>
							@endforeach
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-3">
							Motif de la saisine
						</label>
						<div class="col-sm-7">
							<select class="form-control" id="motif" name="motif">
								<option value="0">---</option>
								@foreach($Saisinepredefinies as $value)
									<option value="{{ $value->id }}">{{ $value->typeSaisine }}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-3">
							Courier de saisine
						</label>
						<div class="col-sm-7">
							<textarea name="description" id="description" rows="10" class="form-control"></textarea>
						</div>
					</div>

					<hr>
					<div class="form-group">
						<label class="control-label col-sm-3">						
						</label>
						<div class="col-sm-7">
							<button type="submit" class="btn btn-success">Saisir CAIDP</button>
						</div>
                    </div>
                    <input type="hidden" name="savebyorganisme" value="1">

					
				</form>
			</div>
		</div>
	</div>
</div>

@stop



@section('js')
<script type="text/javascript">
	CKEDITOR.replace( 'description' );
</script>
@stop