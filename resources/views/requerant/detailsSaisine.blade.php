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
		margin-right: 20px !important;
		;
	}
	.label-info{
		background: green;
	}
	.label-warning{
		background: orange;
	}
	.label-danger{
		background: red;
	}
	ul.iframeData li{
		display: inline-block;
		margin-right: 15px;
	}
</style>
<div class="row">
	<div class="col-sm-12">
		<div class="add-listing-section">
			<!-- Headline -->
			<div class="add-listing-headline">
				<h3><i class="sl sl-icon-doc"></i> Recap de la saisine</h3>
			</div>
			<table class="table table-bordered">
				<tr>
					<td colspan="2" class="text-center">
						<h3 style="color: blue;font-weight: 600">
							{{ $Saisine->motif }}

						</h3>
							<h5>{{ $Saisine->demande->libelle }}</h5>
						<h4>Etat de la Demande {{ $Globals->State($Saisine->etat, count($Saisine->facilitation)>0 ? true : null , count($Saisine->contentieu) >0 ? true : null) }}</h4>
					</td>
				</tr>
				
				<tr>
					<th>Numéro de la saisine</th>
					<td style="color: orange; font-weight: 700">{{ $Saisine->numSaisine }}</td>

				</tr>
				<tr>
					<th>Numéro de la demande</th>
					<td style="color: red; font-weight: 700">{{ $Saisine->demande->numDemande }}
						<a href="{{ route('requerant.seeDemande', $Saisine->demande->id) }}">Voir la demande</a>
					</td>

				</tr>
				
				<tr>
					<th>Organisme concerné</th>
					<td>{{ $organisme->organisme }}</td>

				</tr>
				<tr>
					<th>Date de soumission</th>
					 <td> {{ $DateRewrite->dateTimeFrancais($Saisine->created_at) }} </td>
				</tr>
				<tr>
					<th> Courier de saisine</th>
					<td colspan="" class="text-center">
						@if($Saisine->autosaisine==1)
						<div class="iframe">
							<iframe src="{{ asset($Globals->Saisine_Path().$Globals->genererDecisonPDF($Saisine->motif, $Saisine->created_at, $Saisine->id.'.pdf'))}}"></iframe>
							<br>
							<a class="button default grownup"><i class="fa fa-search"></i> Agrandir</a>
							<a class="button" download="" href="{{ $Globals->Saisine_Path().$Globals->genererDecisonPDF($Saisine->motif, $Saisine->created_at, $Saisine->id.'.pdf')}}"><i class="fa fa-download"></i> Télécharger</a>
						</div>
						@else
						<p>
							{!! $Saisine->description !!}
						</p>
						@endif
					</td>
				</tr>
				<tr>
					<th>Saisine enregistrée par</th>
					<td>
						{{ $Globals->CheckAutosaisine($Saisine->autosave, $Saisine->savebycaidp, $Saisine->savebyorganisme ) }}
					</td>
				</tr>
				<tr>
					<th>Auteur de la saisine</th>
					<td>
						{{ $Globals->auteurSaisine($Saisine->auteurSaisine, $Saisine->demande->requerant->nom." ".$Saisine->demande->requerant->prenom, $Saisine->demande->organisme->organisme) }}
					
					</td>
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
			{{-- {{ dd($Saisine->decisioncaipdp ) }} --}}
			<div class="add-listing-headline">
				<h3><i class="sl sl-icon-doc"></i> Réponse de la CAIDP</h3>
			</div>
			@if($Saisine->decisioncaipdp && $Saisine->decisioncaipdp->etat==1 && $Saisine->decisioncaipdp->decisioncaipdpsfile)
				<ul class="iframeData">
				@foreach($Saisine->decisioncaipdp->decisioncaipdpsfile as $value)
				<li>
							@if($value->nomFichier)
							{{ $value->nomFichier }} <br>
							@endif
					<iframe src="{{ asset("/decisionFile/".$value->file) }}"></iframe>
							<br>
							<a class="button default grownup"><i class="fa fa-search"></i> Agrandir</a>
							<a class="button" download="" href="{{ asset('decisionFile/'.$value->file) }}"><i class="fa fa-download"></i> Télécharger</a>

				</li>
				@endforeach
				</ul>
			@else
				<h2 class="text-center">Aucune réponse disponible </h2>	
			@endif
		</div>
	</div>
</div>
@stop
