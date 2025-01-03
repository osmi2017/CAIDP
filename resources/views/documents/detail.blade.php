@inject('Globals', "App\Tools\Globals")
@inject("DateRewrite","App\Tools\DateRewrite")
@extends('layouts.admin')

@section('content')
<div class="row">
	<div class="col-sm-12">
		<a class="btn btn-info" href="{{ route('Documents.index') }}">
			<i class="fa fa-chevron-left"></i> Retour
		</a>
	</div>
</div>
<div class="row">
	<div class="{{ $Information->document ? "col-sm-8" : "col-sm-12" }}">
		<div class="panel panel-info">
			<div class="panel-heading">
				<div class="panel-title">
					Details de document
				</div>
			</div>
			<div class="panel-body">
				<table class="table">
					<tr>
						<td>Libellé</td>
						<td>{{ $Information->libelle }}</td>
					</tr>
					@if($Information->information)
					<tr>
						<td>information texte</td>
						<td>{{ $Information->information }}</td>
					</tr>
					@endif
					<tr>
						<td>Date de publication</td>
						<td>{{ $DateRewrite->dateFrancais($Information->dateCommunication) }}</td>
					</tr>
					<tr>
						<td>Source</td>
						<td>{{ $Information->source->source }}</td>
					</tr>
					<tr>
						<td>Visibilité</td>
						<td><spa{{ $Information->libelle }}n class="{{ $Globals->Visibilite($Information->public)['span'] }}">{{ $Globals->Visibilite($Information->public)['texte'] }}</span></td>
					</tr>
					<tr>
						<td>Nombre de vue</td>
						<td>{{ $Information->vue }}</td>
					</tr>
					
				</table>
			</div>
		</div>
	</div>
	@if($Information->document)
	<div class="col-sm-4">
		<div class="row">
		@foreach($Information->document as $Doc)
			<div class="col-sm-6">
				<iframe class="zoomScaneBox" src="{{ asset($Globals::Document_Path().$Doc->document) }}" style="border: 1px"></iframe>
				<div class="text-center">
 				<a class="btn zoomScane"><i class="fa fa-search-plus"></i> Zoomer</a>
 			</div>
			</div>
		@endforeach
		</div>
	</div>
	@endif
</div>

@stop

@section('overlay')
<div class="overlay">
		<a href="#" title="fermer" id="CloseFoxContent"><i class="fa fa-times fa-2x"></i></a>
	<div class="contentFoxBox">
		<div class="body">
		</div>
	</div>
</div>
@stop