@inject("Globals", "App\Tools\Globals")
@inject("DateRewrite","App\Tools\DateRewrite")
@inject("PrivillegeBtn", "App\PrivillegeBtn")
@extends('layouts.admin')

@section('content')
<div class="row">
	
	<div class="col-sm-12">
		<div class="panel panel-info">
			<div class="panel-heading">
				<div class="panel-title">Liste des saisines
				<a class="btn btn-danger pull-right btn-rounded" href="{{ route('createSaisines') }}" style="">Faire une saisine</a>
				</div>
			</div>
			<div class="panel-body">
			<table class="table table-hover table-striped table-bordered " id="homeDatatable">
					<thead>
						<tr>
							<th>Num. Saisine</th>
							<th>Demande</th>
							<th>Num. Demande</th>
							<th>Motif de saisine</th>
							<th>Etat saisine</th>
							<th>Date de saisine </th>
							<th>Auteur saisine </th>
						</tr>
					</thead>
					<tbody>
						
						@foreach($Saisines as $value)
						<tr>
							<td>
								<a href="{{ route('MySaisines.detail', $value->id) }}" style="color: red;font-weight: bold;">{{ $value->numSaisine }}</a>
							</td>
							<td><a href="{{ route('MySaisines.detail', $value->id) }}">{{ $value->demande->libelle }}</a></td>
							<td><a href="{{ route('MySaisines.detail', $value->id) }}">{{ $value->demande->numDemande }}</a></td>
							<td><a href="{{ route('MySaisines.detail', $value->id) }}">{{ $value->motif }}</a></td>
							<td><a href="{{ route('MySaisines.detail', $value->id) }}">{{ $Globals->State($value->etat) }} </a></td>
							<td> <a href="{{ route('MySaisines.detail', $value->id) }}">{{ $DateRewrite->dateTimeFrancais($value->created_at) }} </a></td>
							<td></td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

@stop

@section('js')
    <script type="text/javascript">
        $("#homeDatatable").DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/French.json"
        },
         "order": [[ 0, "desc" ],[ 4, "desc" ] ],


        });
    </script>
@stop