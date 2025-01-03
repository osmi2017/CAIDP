@inject("DemandeController","App\Http\Controllers\Organisme\DemandeController")
@inject("UsagerController","App\Http\Controllers\UsagerController")
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
    .New{
        animation: New 1.5s infinite;
    }
    @keyframes New{
        0%{opacity: 1;}
        50%{opacity: 0;}
        100%{opacity: 1;}
    }
    
</style>
<div class="row">
	<!-- Item -->
	<div class="col-lg-4 col-md-4">
		<div class="dashboard-stat color-1">
			<div class="dashboard-stat-content"><h4>{{ count($DemandeEC) }}</h4> <span>Demandes en cours</span></div>
			{{-- <div class="dashboard-stat-icon"><i class="im im-icon-Map2"></i></div> --}}
		</div>
	</div>

	<!-- Item -->
	<div class="col-lg-4 col-md-4">
		<div class="dashboard-stat color-2">
			<div class="dashboard-stat-content"><h4>{{ count($DemandePS) + count($DemandeTS) }}</h4> <span>Demandes satisfaites</span></div>
			{{-- <div class="dashboard-stat-icon"><i class="im im-icon-Line-Chart"></i></div> --}}
		</div>
	</div>

	
	<!-- Item -->
	<div class="col-lg-4 col-md-4">
		<div class="dashboard-stat color-3">
			<div class="dashboard-stat-content"><h4>{{ count($DemandeNS) }}</h4> <span>Demande non satisfaite</span></div>
			{{-- <div class="dashboard-stat-icon"><i class="im im-icon-Add-UserStar"></i></div> --}}
		</div>
	</div>

	<!-- Item -->
	{{-- <div class="col-lg-4 col-md-4">
		<div class="dashboard-stat color-4">
			<div class="dashboard-stat-content"><h4></h4> <span></span></div>
			<div class="dashboard-stat-icon"></div>
		</div>
	</div> --}}
</div>
<div class="row" id="indexList">
	<div class="col-sm-12">
		<div class="dashboard-list-box margin-top-0">
			<div class="panel-heading">
				<h4>La liste des demandes faites
				<a href="{{ route('requerant.faireDemande') }}" class="pull-right button New">Faire une demande1</a>
				</h4>
			</div>
			<div class="panel-body">
				<table class="table table-hover table-striped table-bordered datatable">
					<thead>
						<tr>
							<th>Num. Demande</th>
							<th>Demande</th>
							<th>organisme</th>
							<th>Etat</th>
							<th>Date de soumission </th>
							<th>Delai de réponse</th>
						</tr>
					</thead>
					<tbody>
						@foreach($Demande as $value)
						<tr>
							<td ><a href="{{ route('requerant.seeDemande', $value->id) }}" style="color: orange; font-weight: bold;">{{ $value->numDemande }}</a></td>
							<td><a href="{{ route('requerant.seeDemande', $value->id) }}">{{ $value->libelle }}</a></td>
							<td>{{ $value->organisme->organisme }}</td>
							<td>
								@if($value->decison)
	                                @php 
	                                $etat = $value->decison->etat;
	                                $envoie = $value->decison->envoye;
	                                @endphp
	                                @if($etat==0 && $envoie==null)
	                                    <span class="{{ $Globals->EtatDemande($etat)['span'] }}">
	                                {{ $Globals->EtatDemande($etat, "En attente de validation de decison")['texte'] }}</span>
	                                @elseif($etat==1 && $envoie==null)
	                                    <span class="{{ $Globals->EtatDemande($etat)['span'] }}">
	                                {{ $Globals->EtatDemande($etat, "En attente de transmission")['texte'] }}
	                                @elseif($etat==1 && $envoie!=null)
	                                    {{-- @if($value->liquide==1) --}}
	                                    <span class="{{ $Globals->EtatDemande($value->favorable)['span'] }}">
	                                    {{ $Globals->EtatDemande($value->favorable)['texte'] }}</span>
	                                @endif
	                            @else
	                                <span class="{{ $Globals->EtatDemande(null)['span'] }}">
	                                {{ $Globals->EtatDemande(null)['texte'] }}</span>
	                            @endif
							</td>
							 <td> {{ $DateRewrite->dateTimeFrancais($value->dateDemande) }} </td>
							<td>
								{{ $DateRewrite->dateFrancais(json_decode($DemandeController->checkDedelaisDemande($value->requerant->id, $value->dateDemande, $value->id), true)['dateFin']) }} 
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<br><br>
@php 
$Saisines = $UsagerController->AllSaisine();
// dd($Saisines);

@endphp

<div class="row" id="listSaisine">
	<div class="col-sm-12">

		<div class="dashboard-list-box margin-top-0">
			<div class="panel-heading">
				<div> <h4>La liste des saisines
					<a class="button pull-right " href="{{ route('requerant.formSaisine') }}">Faire une saisine</a>
				</h4>
				</div>

			</div>
			{{-- <hr> --}}
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
							<td><a href="{{ route('requerant.seeSaisine', $value->id) }}">{{ $Globals->StateReq($value->etat) }} </a></td>
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