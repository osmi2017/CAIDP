@if($Organismes->count()<1)
	<div class="text-center color">
		<mark class="alert alert-danger text-center color">
			<i class="fa fa-times"></i> Aucun résultat trouvé !
		</mark>
	</div>
@else
<ul class="list-4 color">
	@foreach($Organismes as $value)
	<li>
		<a href="{{ route('organismePublics', $value->id) }}">  {{ $value->organisme }}  <br>
		<span style="font-size: 13px; font-style: italic;">{{ $value->information->where('public', 1)->count() }} document(s) publié(s)</span>
		</a> 
	</li>
	@endforeach
	
</ul>	
@endif