@inject('Globals', "App\Tools\Globals")
@inject("DateRewrite","App\Tools\DateRewrite")
@extends('layouts.admin')

@section('content')
<div class="row">
	<div class="col-sm-12">
		<a class="btn btn-info pull-right" href="{{ route('Documents.create') }}"><i class="fa fa-plus"></i>Publication de documents/information</a>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-info">
			<div class="panel-heading">
				<div class="panel-title">Listes des documents/informations puubliés(es) </div>
			</div>
			<div class="panel-body">
				<table class="table table-striped datatable">
					<thead>
						<tr>
							<th>Documents/Informations</th>
							<th>Visibilté</th>
							<th>Date d'ajout</th>
							<th>Nombre de vues</th>
						</tr>
					</thead>
					<tbody>
						@foreach($Documents as $document)
						<tr>
							<td><a href="{{ route('Documents.detail', $document->id) }}">{{ $document->libelle }}</a> </td>
							<td><spa{{ $document->libelle }}n class="{{ $Globals->Visibilite($document->public)['span'] }}">{{ $Globals->Visibilite($document->public)['texte'] }}</span></td>
							<td>{{ $DateRewrite->dateFrancais($document->dateCommunication) }}</td>
							<td>{{ $document->vue }} <i class="fa fa-eye"></i> </td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

@stop