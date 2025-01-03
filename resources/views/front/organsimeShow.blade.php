@extends('layouts.front')
@section('header')
<div id="titlebar">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2>Fiche de l'organisme</h2>
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
<style type="text/css">
	h4 a.active{
		color: orange;
		font-weight: bold;
	}
</style>
<div class="" >
<div id="titlebar" class="listing-titlebar">
	<div class="listing-titlebar-title">
		<div class="row">
			<div class="col-sm-4">
				<img src="{{ $Organisme->logo ? asset('images/'.$Organisme->logo) : asset('images/logo-defaul.png') }}">
			</div>
			<div class="col-sm-8">
				<h2> {{ $Organisme->organisme }} </h2>
				<span>
					<div>
						<i class="fa fa-map-marker"></i> {{ $Organisme->siege }} <br>
						<i class="fa fa-envelope"></i> {{ $Organisme->email }} 
						@if(json_decode($Organisme->autrecontact, true)['email']!=null)
							@foreach(json_decode($Organisme->autrecontact, true)['email'] as $email)
								/ {{ $email }} 
							@endforeach
						@endif
						<br>
						<i class="fa fa-phone"></i> {{ $Organisme->contact }} 
						@if(json_decode($Organisme->autrecontact, true)['contact']!=null)
							@foreach(json_decode($Organisme->autrecontact, true)['contact'] as $contact)
								/ {{ $contact }} 
							@endforeach
						@endif
						
					</div>
				</span>
				<div class="star-rating" data-rating="5">
					<mark class="rating-counter color">{{ $Information->count() }} document(s) publié(s) </mark>
				</div>
			</div>
		</div>
		<span id="organisme_id" alt="{{ $Organisme->id }}"></span>
		<hr>
		<h4>
			<a href="#" class="pull-left active" id="docPub"> <i class="fa fa-file"></i> Liste des documents publiés</a>
			<a href="#" class="pull-right" id="lisRespo"><i class="fa fa-users"></i> Responsables de l'information</a>

		</h4>
		<br>
		<hr>
		<div class="" id="displayInfo">
			@include('front.displayInfo')
		</div>
		<div id="displayrespo" class="hide">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Nom & prénoms</th>
						<th>Qualité</th>
						<th>Email</th>
						<th>Contacts</th>
					</tr>
				</thead>
				<tbody>
					@foreach($Organisme->Responsable as $value)
					@if($value->ri==1)
					<tr>
						<td>{{ $value->nom." ".$value->npreom }}</td>
						<td>{{ $value->qualiteresponsable->qualite}}</td>
						<td>{{ $value->email}}</td>
						<td>{{ $value->contact}}</td>
					</tr>
					@endif
					@endforeach
				</tbody>
			</table>
		</div>
		
	</div>
</div>
	<!-- Listing Item -->
	<!-- Listing Item / End -->

</div>

@stop

@section('right')
<br><br><br>
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