@extends('layouts.email')
@inject("DemandeController","App\Http\Controllers\Organisme\DemandeController")
@inject("DateRewrite","App\Tools\DateRewrite")
@inject("Globals","App\Tools\Globals")
@section('title')
	{{ $subject }}
@stop

@section('body')
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
		<td>Direction</td>
		<td> {{ $Demande->direction }} </td>
	</tr>
	<tr>
		<td>Service</td>
		<td> {{ $Demande->service }} </td>
	</tr>
	<tr>
		<td>Demandeur</td>
		<td>{{ isset($Demandeur) && !is_null($Demandeur) ? $Demandeur->requerant->nom." ".$Demandeur->requerant->prenom :  $notifiable->requerant->nom." ".$notifiable->requerant->prenom." " }}</td>
	</tr>
	<tr>
		<td>Contact</td>
		<td>{{ isset($Demandeur) && !is_null($Demandeur) ? $Demandeur->requerant->contact : $notifiable->requerant->contact }}</td>
	</tr>
	<tr>
		<td>Email</td>
		<td>{{  isset($Demandeur) && !is_null($Demandeur) ? $Demandeur->requerant->email : $notifiable->requerant->email}}</td>
	</tr>
</table>
@stop

