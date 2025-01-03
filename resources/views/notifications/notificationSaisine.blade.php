@inject("DemandeController","App\Http\Controllers\Organisme\DemandeController")
@inject("DateRewrite","App\Tools\DateRewrite")
@inject("Globals","App\Tools\Globals")
<link rel="stylesheet" type="text/css" href="{{asset('Login')}}/vendor/bootstrap/css/bootstrap.min.css">
<h3 class="text-center" style="background: #f8fafc; padding: 20px; margin-bottom: 40px">
	{{ $objet ? $objet : "Notification" }}
</h3>
<p style="padding: 0 10%">
	{{ $text }}
</p>
<br>
<table class="table table-bordered table-striped" style="width: 80%; margin: auto;">
	@if(isset($auteur) && $auteur!=null)
	<tr>
		<td>Auteur de la saisine </td>
		<td style="color: blue; font-weight: bold;">{{ $auteur }}</td>
	</tr>
	@endif
	<tr>
		<td>Numéro de la saisine </td>
		<td style="color: blue; font-weight: bold;">{{ $Demande->numSaisine }}</td>
	</tr>
	
	<tr>
		<td>Demande objet de la saisine </td>
		<td style="color: blue; font-weight: bold;">{{ $Demande->libelle }}</td>
	</tr>
	
	<tr>
		<td>Numéro de la demande</td>
		<td style="color: red; font-weight: bold; font-size: 18px">{{ $Demande->numDemande }}</td>
	</tr>

	<tr>
		<td>Motif de la saisine</td>
		<td>{{ $Saisine->motif }}</td>
	</tr>
	<tr>
		<td>Date de reception</td>
		 <td> {{ $DateRewrite->dateTimeFrancais($Saisine->created_at) }} </td>
	</tr>
	<tr>
		<td>Demandeur</td>
		<td>{{ $Demandeur->requerant->nom." ".$Demandeur->requerant->prenom." " }}</td>
	</tr>
	<tr>
		<td>Contact</td>
		<td>{{ $Demandeur->requerant->contact }}</td>
	</tr>
	@if($Demandeur->requerant->email)
	<tr>
		<td>Email</td>
		<td>{{ $Demandeur->requerant->email}}</td>
	</tr>
	@endif
	
	
</table>
	
	<br><br>
	@if(isset($libelle) && !is_null($libelle))
	<h3 class="text-center">
		Information communiquée suite à la demande
	</h3>
	<p style="padding: 0 10px;">
		{{ $libelle }}
	</p>

	<br>
	@endif

<div class="text-center" style="background: #f8fafc; padding: 20px; margin-top: 40px">
	Propulsé par la CAIDP
</div>
