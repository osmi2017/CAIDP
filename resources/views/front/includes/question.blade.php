<div id="questionBox">
	<div class="QB-heder">
		{{-- <a href="#"><i class="fa fa-times" title="fermer la fenêtre"></i></a> --}}
	</div>
	<div class="QB-body">
		<a href="#"  id="QBheadereduce" class="btnAction" style="float: right; margin-top: -40px; padding: 5px 8px; color: white"><i class="fa fa-chevron-down" title="Réduire la fenêtre"></i></a>
			<p id="Quest1">Avez-vous trouvé le document ou l'information recherché(e) ?</p> 
			<p id="Quest2">Voulez-vous faire une demande ?</p>
		<a class="button  with-icon faireDemande" href="{{ route('requerant.faireDemande') }}">
		Oui faire une demande
			<i class="fa fa-send"></i>
	</a>
	</div>
	
</div>