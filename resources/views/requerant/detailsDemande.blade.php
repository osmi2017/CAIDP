@inject("DemandeController","App\Http\Controllers\Organisme\DemandeController")
@inject("DateRewrite","App\Tools\DateRewrite")
@inject("Globals","App\Tools\Globals")
@extends('layouts.requerant')
@section('content')
<style type="text/css">
	/*.iframe a, .iframe iframe{
		display: inline-block;
		float: left;
	}*/
	.iframe a{
		margin-right: 20px !impo
		;
	}
</style>
<div class="row">
	<div class="col-sm-12">
		<div class="add-listing-section">
			<!-- Headline -->
			<div class="add-listing-headline">
				<h3><i class="sl sl-icon-doc"></i> Informations de la demande</h3>
			</div>
			<table class="table table-bordered">
				<tr>
					<td colspan="2" class="text-center">
						<h3 style="">
							{{ $Demande->libelle }}
						</h3>
						<h5>{{ $Demande->organisme->organisme }}</h5>
					</td>
				</tr>
				<tr>
					<th>Date de soumission</th>
					 <td> {{ $DateRewrite->dateTimeFrancais($Demande->dateDemande) }} </td>
				</tr>
				<tr>
					<th>Delai de réponse</th>
					
						<br>
						@if($Demande->dateProrogation!=null)
							<u>Motif de la prorogation :</u> 
							<ul>
								<li>{{ $Demande->motifProrogation }}</li>
							</ul>
						@endif
					 </td>
				</tr>
				<tr>
					<th>Direction</th>
					<td> {{ $Demande->direction }} </td>
				</tr>
				<tr>
					<th>Service</th>
					<td> {{ $Demande->service }} </td>
				</tr>
				
			</table>
			
		</div>
	</div>
</div>

<br><br>
<div class="row">
	<div class="col-sm-12">
		<div class="add-listing-section">
			<!-- Headline -->
			<div class="add-listing-headline">
				<h3><i class="sl sl-icon-doc"></i> Réponse à la demande</h3>
			</div>
			@if($Decision)
				<table class="table">
					<tr>
						<td>Notification</td>
						<td>
							<div class="iframe">
								<iframe src="{{ $Globals->Decision_Path().$Globals->genererDecisonPDF($Demande->libelle, $Demande->created_at, $Demande->id.'.pdf') }}"></iframe>
								<br>
								<a class=" default grownup"><i class="fa fa-search"></i> Agrandir</a>
								<a class="" download="" href="{{ $Globals->Decision_Path().$Globals->genererDecisonPDF($Demande->libelle, $Demande->created_at, $Demande->id.'.pdf') }}"><i class="fa fa-download"></i> Télécharger</a>
							</div>
						</td>
					</tr>
				</table>
			@endif
			@if($Information)
			<table class="table table-bordered">
				<tr>
					<th>Date de communication</th>
					 <td> {{ $DateRewrite->dateTimeFrancais($Demande->information->dateCommunication) }} </td>
				</tr>
				@if($Information->information!="")
				<tr>
					<th>Information demandée</th>
					<td>{{ $Information->information }}</td>
				</tr>
				{{-- 
				<!--
				<tr>
					<td>Visibilité du Document</td>
					<td>{{ $Globals->Visibilite($Demande->information->public) }}</td>

				</tr>
-->
--}}
				@endif
				@if($Information->document)
				<tr>
					<th>Documents demandés</th>
					<td class="text-center">
						@foreach($Information->document as $value)
							<div class="iframe">
								<iframe src="{{ $Globals->Document_Path()."/".$value->document }}"></iframe>
								<br>
								<a class=" default grownup"><i class="fa fa-search"></i> Agrandir</a>
								<a class="" download="" href="{{ $Globals->Document_Path()."/".$value->document }}"><i class="fa fa-download"></i> Télécharger</a>
							</div>
							<hr>
						@endforeach
					</td>
				</tr>
				<tr>
					<td>Visibilité du Document</td>
					<td><span class="{{ $Globals->Visibilite($Demande->information->public)['span'] }}">{{ $Globals->Visibilite($Demande->information->public)['texte'] }}</span></td>
				</tr>
				@endif

				
			</table>
			@else
				<h2 class="text-center">Aucune réponse disponible </h2>
			@endif
			
		</div>
	</div>
</div>
@stop