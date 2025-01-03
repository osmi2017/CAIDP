@extends('layouts.email')
@inject("DemandeController","App\Http\Controllers\Organisme\DemandeController")
@inject("DateRewrite","App\Tools\DateRewrite")
@inject("Globals","App\Tools\Globals")
@section('title')
	Delais de réponse expiré
@stop

@section('body')
<div class="well">
	@if($requerant!=null)
		Bonjour {{ $notifiable->name }},<br> Votre demande portant le libellé : <b>{{ $Demande->libelle }}</b> adressée à : <b>{{ $Demande->organisme->organisme }}</b> n'a pas eu de réponse jusqu'à expiration du delais maximal prévu. <br>
		Voulez-vous saisir la caidp ? <br>
		<br>
		<div style="text-align: center;">
			<a href="{{ route('requerant.formSaisine', $Demande->id) }}" class="btn btn-success">Oui, Saisir la CAIDP</a>
		</div>
	@elseif($organisme!=null)
		Bonjour {{ $notifiable->nom." ".$notifiable->prenom }}, la demande de <b>{{ $Globals->checkNameOrga($Demande->requerant->denomination, $Demande->requerant->nom, $Demande->requerant->prenom) }} </b> portant le libellé : <b> {{ $Demande->libelle }} </b> a expiré sans aucune réponse de votre part.   
	@else 
		Bonjour {{ $notifiable->name }},<br> une demande portant le libellé : <b>{{ $Demande->libelle }}</b> adressée à : {{ $Demande->organisme->organisme }} n'a pas eu de réponse jusqu'à expiration du delais maximal prévu. <br>
			
		<a href="{{ route('admin.newSaisine') }}">
			Voulez-vous faire une auto-saisir ? <br>
		</a>
		<br>
		<div style="text-align: center;">
			<a href="#" class="btn btn-success">Oui, Saisir la CAIDP</a>
		</div>
	@endif
</div>
<br><br>
<table class="table table-bordered table-striped" style="width: 80%; margin: auto;">
	<tr>
		<td>Numéro de la demande</td>
		<td style="color: red; font-weight: bold;">{{ $Demande->numDemande }}</td>
	</tr>
	<tr>
		<td>
			Documents/informations demandé(e)s
		</td>
		<td>
			<h4>{{ $Demande->libelle }}</h4>
		</td>
	</tr>
	<tr>
		<td>
			Organisme public
		</td>
		<td>
			{{ $Demande->organisme->organisme }}
		</td>
	</tr>
	
	<tr>
		<td>Date de soumission</td>
		<td> {{ $DateRewrite->dateTimeFrancais($Demande->dateDemande) }} </td>
	</tr>
	<tr>
		<td>Delai de réponse</td>
		<td> 
			{{ $DateRewrite->dateFrancais(json_decode($DemandeController->checkDedelaisDemande($Demande->requerant_id, $Demande->dateDemande, $Demande->id), true)['dateFin']) }}
		 </td>
	</tr>
	<tr>
		<td>Demandeur</td>
		<td>{{ $Demande->requerant->nom." ".$Demande->requerant->prenom }}</td>
	</tr>
	<tr>
		<td>Contact</td>
		<td>{{ isset($Demande) && !is_null($Demande) ? $Demande->requerant->contact : $notifiable->requerant->contact }}</td>
	</tr>
	<tr>
		<td>Email</td>
		<td>{{  isset($Demande) && !is_null($Demande) ? $Demande->requerant->email : $notifiable->requerant->email}}</td>
	</tr>
</table>
@stop

