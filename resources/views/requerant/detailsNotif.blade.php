@inject("DemandeController","App\Http\Controllers\Organisme\DemandeController")
@inject("DateRewrite","App\Tools\DateRewrite")
@inject("Globals","App\Tools\Globals")
<h3 class="text-center" style="background: #f8fafc; padding: 20px; margin-bottom: 40px">
	Accusé de réception
</h3>
<div class="text-center">Demande d'information</div>
<hr>
<table class="table table-bordered table-striped" style="width: 100%; margin: auto;">
	<tr>
		<td>Numéro de la demande</td>
		<td style="color: red; font-weight: bold;">{{ $Notification->data['numDemande'] }}</td>
	</tr>
	<tr>
		<td>
			Documents/informations demandé(e)s
		</td>
		<td>
			<h4>{{ $Notification->data['libelle'] }}</h4>
		</td>
	</tr>
	<tr>
		<td>
			Organisme public
		</td>
		<td>
			{{ $Notification->data['organisme'] }}
		</td>
	</tr>
	
	<tr>
		<td>Date de soumission</td>
		 <td> {{ $Notification->data['dateDemande'] }} </td>
	</tr>
	<tr>
		<td>Delai de réponse</td>
		<td>{{ $Notification->data['delaisRequis'] }} </td>
	</tr>
	<tr>
		<td>Direction</td>
		<td> {{ $Notification->data['direction'] }} </td>
	</tr>
	<tr>
		<td>Service</td>
		<td> {{ $Notification->data['service']  }} </td>
	</tr>
	<tr>
		<td>Demandeur</td>
		<td>{{ $Notification->data['requerant_nom']  }}</td>
	</tr>
	<tr>
		<td>Contact</td>
		<td>{{ $Notification->data['requerant_contact'] }}</td>
	</tr>
	@if($Notification->data['requerant_email']!=null)
	<tr>
		<td>Email</td>
		<td>{{ $Notification->data['requerant_email']}}</td>
	</tr>
	@endif
	
	
</table>