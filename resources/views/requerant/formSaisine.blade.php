@extends('layouts.requerant')
@section('content')
{{-- {{dd(\Session())}} --}}
<a class="button border" href="{{ route('requerant.index') }}#listSaisine">Voir liste de saisines</a>
<div class="add-listing-section">

	<!-- Headline -->
	<div class="add-listing-headline">
		<h3><i class="sl sl-icon-doc"></i> Formulaire de saisine</h3>
	</div>
	<!-- Title -->
	<form action="{{ route('requerant.saveSaisine') }}" method="post" id="formSaisine">
		@csrf()
	<div class="row with-forms">
		<div class="col-md-6">
			<h5>Demande <i class="tip" data-tip-content="Veuillez sélectionner la demande qui fait l'objet de la saisine"><div class="tip-content"></div></i></h5>
			<select class="search-field" id="demande_id" name="demande_id">
				@foreach($Demandes as $value)
					<option value="{{ $value->id }}">{{ $value->libelle }} : {{ $value->numDemande }}</option>
				@endforeach
			</select>
		</div>
		<div class="col-md-6">
			<h5>Motif de la saisine </h5>
			<select class="search-field" id="motif" name="motif">
				<option value="0">---</option>
				@foreach($Saisinepredefinies as $value)
					<option value="{{ $value->id }}">{{ $value->typeSaisine }}</option>
				@endforeach
			</select>
		</div>
	</div>
	{{-- ================== --}}
	<div class="row with-forms">	
		<div class="col-md-12">
			<h5> Courier de saisine</i></h5>
			<textarea name="description" id="description" rows="50"></textarea>
		</div>
	</div>
	{{-- ================== --}}
	<br>
	<div class="row with-forms">
		<button class="button btn btn-succes pull-right" type="submit" id="sendCAIDP">
			Saisir la CAIDP
		</button>
	</div>
	</form>

</div>
@stop

@section('js')
<script type="text/javascript">
	CKEDITOR.replace( 'description', {
      width: '100%',
      height: 500
    } );
</script>
@stop