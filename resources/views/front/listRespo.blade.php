@extends('layouts.front')
@section('header')
<div id="titlebar">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2>Liste des responsables d'informations des organismes publics</h2>
				<nav id="breadcrumbs">
					<ul>
						<li><a href="{{ route('Accueil') }}">Accueil</a></li>
						<li>Organisme</li>
					</ul>
				</nav>
			</div>
		</div>
	</div>
</div>
@stop


@section('main')
<br><br>
<!-- Sorting / Layout Switcher -->

<!-- Sorting / Layout Switcher / End -->
<hr>


<div class="" id="">

	<table class="table table-striped table-hover datatable table-bordered table-condensed">
		<thead>
			<tr>
				<th>Organisme</th>
				<th>Responsable de l'infomation</th>
				<th>Email</th>
				<th>Contact</th>
			</tr>
		</thead>
		<tbody>
		@if(isset($listRespo) && count($listRespo) > 0)
		@foreach($listRespo as $value)
        <tr>
            <td>{{ $value->organisme->organisme }}</td>
            <td>{{ $value->nom." ".$value->prenom }}</td>
            <td>{{ $value->email }}</td>
            <td>{{ $value->contact }}</td>
        </tr>
    @endforeach
				
			@else
				<tr>
					<td colspan="4">No data available</td>
				</tr>
			@endif
		</tbody>
	</table>

</div>

@stop

@section('right')
<br><br>
@inject('AccueilController', 'App\Http\Controllers\AccueilController')
@php 
$Organismes = $AccueilController->organismeSearch();
@endphp
<div class="widget margin-bottom-40">
	<h3 class="margin-top-0 margin-bottom-30">Organismes publics</h3>
	<br>
	<!-- Area Range -->
	<input type="text" name="" class="form-control" placeholder="Rechercher un organisme" id="inputSearchOrganisme">
	<div class="organisme-listing" id="organismeSearchBox">
		@include('front.organismeSearch')
		
	</div>
</div>
@stop



