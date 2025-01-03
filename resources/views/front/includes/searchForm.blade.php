<div class="main-search-input">

	<div class="main-search-input-item">
		<input type="text" list="informationSearching" name="libelle" placeholder="Que cherchez-vous ?" value="" id="searchInput">
		<datalist id="" class="datalist" >
			@foreach($totalInfo as $value)
				<option>{{ $value->libelle }}</option>
			@endforeach
		</datalist>
	</div>

	<div class="main-search-input-item">
		<select id="organismeId"  multiple="multiple" name="organisme">
			@foreach($allOrganisme as $value )
				<option>{{ $value->organisme }}</option>
			@endforeach
			
		</select>
	</div>

	<a class="button" href="#" id="rechercher">Rechercher</a>

</div>
<div id="rechercherEmpty" class="alert alert-danger" style="display: none"></div>