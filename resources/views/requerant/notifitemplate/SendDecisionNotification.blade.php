<div class="alert alert-ssuccess text-center">
	<h3 class="alert alert-ssuccess">Réponse à une demande d'information/document</h3>
	<hr>
	<p>
		{{ $Notification->data['message'] }} <br>
		@if(isset($Notification->data['id']) or isset($Notification->data['link']))
			<a href="{{ route('requerant.seeDemande', $Notification->data['id']) }}"> Accéder au détails </a>
		@endif
	</p>
</div>