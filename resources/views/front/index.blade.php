@extends('layouts.front')
@section('header')
<div class="clearfix" id="caidpHeader">
	<div class="main-search-inner">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2 class="text-white text-weight">
						Trouvez des documents ou informations <br> 
					</h2>
					<h4 class="">d'intérêt public</h4>

					@include("front.includes.searchForm")
				</div>
			</div>

		</div>

	</div>
</div>

@stop

@section('main')
<br><br>
<!-- Sorting / Layout Switcher -->
<div class="row margin-bottom-25 " id="docAllTotal">
		<h4><b>{{ $totalInfo->count() }} documents publics publiés disponibles</b></h4>
		<!-- Sort by -->
	
</div>
<!-- Sorting / Layout Switcher / End -->
<hr>


<div class="" id="displayInfo">

	<!-- Listing Item -->
	@include('front.displayInfo')
	<!-- Listing Item / End -->

</div>

@stop

@section('right')
<br><br>

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


@section('js')
<script type="text/javascript" src="{{ asset('front/jquery-multiselect/fSelect.js') }}" ></script>
<script type="text/javascript">
	$('#organismeId').fSelect();
</script>
@stop

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('front/jquery-multiselect/fSelect.css') }}">
@stop

