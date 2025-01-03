@extends('layouts.email')
@inject("Globals","App\Tools\Globals")
@section('title')
	CREATION DE COMPTE
@stop
@section('body')
	<p>Bonjour {{ $notifiable->name }}</p>
	<div>
		@if($privilege)
		Votre compte de gestion des demandes d'accès à l'information et documents publics a été créé avec succès sur la plateforme CAIDP pour le compte de : <br> <b>{{ $organisme }} </b> <br>
		@else
		Votre compte a été créé avec succès sur la plateforme CAIDP. <br> Veuillez trouver le lien de connexion ci-après. <br>
		@endif
		<div class="well">
			Email : {{ $notifiable->email }} <br>
			Mot de passe  : {{ $pass }} <br>
		</div>
	</div>
	@if($privilege)
	<br>
	<caption><b>Vos privilèges sont les suivants</b></caption>
	<table class="table table-bordered table-striped" style="width: 40%; margin: auto;">
		@foreach(json_decode($privilege, true) as $key => $value)
			@if($value!=false)
			<tr>
				<td>
					{{ $Globals->Privileges($key) }}
				</td>
			</tr>
			@endif
		@endforeach
	</table>
	<br><br>
	@endif
	<div style="text-align: center;">
		<a class="btn btn-primary" href="{{ url('/login') }}">Lien de connexion</a>
	</div>
@stop