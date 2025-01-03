@extends('layouts.requerant')
@section('content')
{{-- {{dd(\Session())}} --}}
<style type="text/css">
	.add-listing-section textarea {
	    min-height: 120px !important;
	    margin-bottom: 35px;
	}
</style>
<div class="add-listing-section">

	<!-- Headline -->
	<div class="add-listing-headline">
		<h3><i class="sl sl-icon-doc"></i> Formulaire de demande d'informations/documents</h3>
		
		
		
	</div>
	<!-- Title -->
	<form action="{{ route('requerant.saveDemande') }}" method="post">
		@csrf()
	<div class="row with-forms">
		<div class="col-md-6">
			<h5>Document ou information demandé(e) <i class="tip" data-tip-content="Vous pouvez faire la demande de plusieurs documents ou information"><div class="tip-content">Vous pouvez faire la demande de plusieurs documents ou information</div></i></h5>
			<textarea name="libelle" cols="30" rows="2" id="description" placeholder="Ex : - Rapport des activités 2019&#10; - Liste des commissaires &#10; - Liste des organismes publics en CI" lang="fr" spellcheck="true" required="">{{ \Session('libelle') ? \Session('libelle') : old('libelle') }}</textarea>
		</div>
		<div class="col-md-6">
			<h5>Organisme</h5>
			<input class="search-field" type="text" name="organisme" list="organisme"  placeholder="Rechercher un organisme" required=""  value="{{ \Session('organisme') ? \Session('organisme') : old('organisme') }}" autocomplete="off">
			<datalist class="" id="organisme">
				@foreach($Organismes as $value)
					<option>{{ $value->organisme }}</option>
				@endforeach
			</datalist>
		</div>
	</div>
	 <input type="hidden" name="description">
	{{-- <div class="row with-forms">
		<div class="col-sm-12">
			<h5>Description de la demande <i>(Optionnel)</i></h5>
			<textarea name="description" cols="40" rows="3" id="description" placeholder="Description" lang="fr" spellcheck="true"></textarea>
		</div>
	</div> --}}

	{{-- ================== --}}
	<div class="row with-forms">
		<div class="col-md-6">
			<h5>Direction <i>(Optionnel)</i></h5>
			<input class="search-field" type="text" name="direction" placeholder="Optionnel" list="listService" autocomplete="off">
			<datalist class="" id="listService">
				@foreach($Direction as $value)
					<option>{{ $value->direction }}</option>
				@endforeach
			</datalist>
		</div>
		<div class="col-md-6">
			<h5>Service <i>(Optionnel)</i></h5>
			<input class="search-field" type="text" name="service" list="listService" autocomplete="off" >
			<datalist class="" id="listService">
				@foreach($Service as $value)
					<option>{{ $value->service }}</option>
				@endforeach
			</datalist>
		</div>
	</div>
	{{-- ================== --}}
	<input type="hidden" name="autosave" value="1">
	<div class="row with-forms">
		<button class="btn btn-succes pull-right" type="submit">
			Valider
		</button>
	</div>
	</form>

</div>


@stop


@section('js')

<script type="text/javascript">
	
</script>

@stop