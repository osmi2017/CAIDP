@inject("DemandeController","App\Http\Controllers\Organisme\DemandeController")
@inject("DateRewrite","App\Tools\DateRewrite")
@inject("Globals","App\Tools\Globals")
@extends('layouts.requerant')
@section('content')
<style type="text/css">
    .datatable a {
        color: #000;
        text-decoration: blink !important;
    }
    .datatable a:hover {
        color: blue;

    }
/*    .New{
        animation: New 1s infinite;
    }
    @keyframes New{
        0%{opacity: 1;}
        50%{opacity: 0;}
        100%{opacity: 1;}
    }*/

    .label-info{
		background: green;
	}
	.label-warning{
		background: orange;
	}
	.label-danger{
		background: red;
	}
    
</style>
<div class="row" id="">
	<div class="col-sm-12">

		<div class="dashboard-list-box margin-top-0">
			<div class="panel-heading">
				<div>La liste des saisines
					<a class="button pull-right " href="{{ route('requerant.formSaisine') }}">Faire une saisine</a>
				</div>

			</div>
			<hr>
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
						</tr>
					</thead>
					<tbody>
						@foreach($Saisines as $value)
						<tr>
							<td>
								<a href="{{ route('requerant.seeSaisine', $value->id) }}" style="color: red;font-weight: bold;">{{ $value->numSaisine }}</a>
							</td>
							<td><a href="{{ route('requerant.seeSaisine', $value->id) }}">{{ $value->demande->libelle }}</a></td>
							<td><a href="{{ route('requerant.seeSaisine', $value->id) }}">{{ $value->demande->numDemande }}</a></td>
							<td><a href="{{ route('requerant.seeSaisine', $value->id) }}">{{ $value->motif }}</a></td>
							<td><a href="{{ route('requerant.seeSaisine', $value->id) }}">{{ $Globals->State($value->etat) }} </a></td>
							<td> <a href="{{ route('requerant.seeSaisine', $value->id) }}">{{ $DateRewrite->dateTimeFrancais($value->created_at) }} </a></td>
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
         "order": [[ 2 "desc" ],[ 6, "desc" ] ],


        });
    </script>
@stop