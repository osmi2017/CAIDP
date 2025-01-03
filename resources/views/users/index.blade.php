@inject("Globals", "App\Tools\Globals")
@inject("PrivillegeBtn", "App\PrivillegeBtn")
@extends('layouts.admin')

@section('content')
<div class="row">
	<div class="col-sm-12">
		
		<a class="btn btn-info pull-right" href="{{ route('Responsable.nouveau') }}"> <i class="fa fa-user-plus"></i> Nouvel utilisateur</a>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-info">
			<div class="panel-heading">
				<div class="panel-title">Liste des utilisateurs</div>
			</div>
			<div class="panel-body">
			<table class="table datatable">
				<thead>
					<tr>
						<th>Nom & Prénom</th>
						<th>Qualité</th>
						<th>Email</th>
						{{-- <th>Etat</th> --}}
						<th>Contact</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					{{-- {{dd(Auth::user()->id)}} --}}
					@foreach($Responsables as $responsable)
					@if($responsable->id!==Auth::user()->responsable_id)
					<tr>
						<td>{{ $responsable->nom." ".$responsable->prenom }}</td>
						<td>{{ $responsable->qualiteresponsable->qualite }}</td>
						<td>{{ $responsable->email }}</td>
						{{-- <td> <label class="{{ $Globals->Etat($responsable->etat)['span'] }}">{{ $Globals->Etat($responsable->etat)['texte'] }}</label></td> --}}
						<td>{{ $responsable->contact }}</td>
						<td>
							{{-- <a class="{{ $Globals->Etat($responsable->etat)['btn'] }}"><i class="{{ $Globals->Etat($responsable->etat)['icon'] }}"></i> {{ $Globals->Etat($responsable->etat)['action'] }}</a> --}}
							<a class="btn btn-info btn-rounded " href="{{ route('Responsable.nouveau', $responsable->id) }}"><i class="fa fa-edit"></i> Modifier</a>
						@if($PrivillegeBtn->checkPrivilege()['createUser']===true)
							<form action="{{ route('Responsable.delete', $responsable->id) }}" style= "display: inline;" method="post" alt="{{ $responsable->id }}">
								@method('delete') @csrf
								<a class="btn btn-danger btn-rounded supp"><i class="fa fa-trash"></i> Supprimer</a>
							</form>
						@endif
						</td>
					</tr>
					@endif
					@endforeach
				</tbody>		
			</table>
			</div>
		</div>
	</div>
</div>

@stop