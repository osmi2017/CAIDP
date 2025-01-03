@inject('UserController', 'App\Http\Controllers\UserController')
@inject('UsagerController', 'App\Http\Controllers\UsagerController')
<!DOCTYPE html>
<head>

@php
	$detailUsager = $UsagerController->detailUsager();
	// dd($detailUsager);
@endphp
<!-- Basic Page Needs
================================================== -->
<title>{{ config('app.name', 'CAIDP') }}</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>{{ config('app.name', 'CAIDP') }}</title> 
<meta name="_token" content="{{csrf_token()}}" />
<!-- CSS
================================================== -->
<link rel="stylesheet" href="{{asset('front')}}/css/style.css">
<link rel="stylesheet" href="{{asset('front')}}/css/main-color.css" id="colors">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css">
<script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
</head>

<body>
<div class="overLay">
	<div class="fermerOverLay"> <i class="fa fa-times"></i> Fermer </i></div>
	<div class="contentOverLay"></div>
</div>
<!-- Wrapper -->
<div id="wrapper">

<!-- Header Container
================================================== -->
<header id="header-container" class="fixed fullwidth dashboard">

	<!-- Header -->
	<div id="header" class="not-sticky">
		<div class="container">
			
			<!-- Left Side Content -->
			<div class="left-side">
				
				<!-- Logo -->
				<div id="logo">
					<h3 class="text-red text-center" style="color: white">
						@if($detailUsager->denomination)
							{{ $detailUsager->denomination }}
						@else
							{{ $detailUsager->nom." ".$detailUsager->prenom }}
						@endif
					</h3>
				</div>

				<!-- Mobile Navigation -->
				<div class="mmenu-trigger">
					<button class="hamburger hamburger--collapse" type="button">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</button>
				</div>
				<div class="clearfix"></div>
				<!-- Main Navigation / End -->
				
			</div>
			<!-- Left Side Content / End -->

			<!-- Right Side Content / End -->
			<div class="right-side">
				<!-- Header Widget -->
				<div class="header-widget">
					<a href="{{ route('Accueil') }}" class="button border with-icon">Page d'accueil<i class="sl sl-icon-home"></i></a>
				</div>
				<!-- Header Widget / End -->
			</div>
			<!-- Right Side Content / End -->

		</div>
	</div>
	<!-- Header / End -->

</header>
<div class="clearfix"></div>
<!-- Header Container / End -->


<!-- Dashboard -->
<div id="dashboard">

	<!-- Navigation
	================================================== -->

	<!-- Responsive Navigation Trigger -->
	<a href="dashboard.html#" class="dashboard-responsive-nav-trigger"><i class="fa fa-reorder"></i> MENU</a>

	<div class="dashboard-nav">
		<div class="dashboard-nav-inner">

			<ul data-submenu-title="Menu">
			<li class="{{ (strpos(Route::currentRouteName(), 'requerant.index') === 0) ? 'active' : '' }}"><a href="{{route('requerant.index')}}"><i class="sl sl-icon-settings"></i> Tableau de bord</a></li>
				
				<li class="{{ (strpos(Route::currentRouteName(), 'requerant.faireDemande') === 0) ? 'active' : '' }}"><a href="{{ route('requerant.faireDemande') }}"><i class="sl sl-icon-doc"></i> Faire une demande</a></li>
				<li class="{{ (strpos(Route::currentRouteName(), 'requerant.formSaisine') === 0) ? 'active' : '' }}"><a href="{{route('requerant.formSaisine')}}"><i class="sl sl-icon-doc"></i> Saisir la CAIDP</a></li>
				
				<li class="{{ (strpos(Route::currentRouteName(), 'requerant.notitif') === 0) ? 'active' : '' }}">
					<a href="{{ route('requerant.notitif') }}">
						<i class="sl sl-icon-envelope-open"></i> 
						Notifications 
						@if($UserController->UserNotifications()->count()!=0)
						<span class="nav-tag messages">
							{{$UserController->UserNotifications()->count()}}
						</span>
						@endif
					</a>
				</li>
				<li class="{{ (strpos(Route::currentRouteName(), 'requerant.saisines') === 0) ? 'active' : '' }}"><a href="{{ route('requerant.saisines') }}"><i class="sl sl-icon-doc"></i> Mes saisines </a></li>
				
				
			</ul>

			<ul data-submenu-title="Mon compte">
				<li class=""><a href="{{ route('requerant.profil') }}"><i class="sl sl-icon-user"></i> Mon profil</a></li>
				<li><a href="{{ route('deconnexion') }}"><i class="sl sl-icon-power"></i> Déconnexion</a></li>
			</ul>
			
		</div>
	</div>
	<!-- Navigation / End -->


	<!-- Content
	================================================== -->
	<div class="dashboard-content">

		<!-- Content -->
			@if(session('error')) 
                <div class="notification error closeable margin-bottom-30">
					<p>{{ session('error') }}</p>
					<a class="close"></a>
				</div>
            @endif 
            @if(session('success')) 
                <div class="notification success closeable margin-bottom-30">
					<p>{{ session('success') }}</p>
					<a class="close"></a>
				</div>
            @endif 
            
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
			@yield('content')


			<!-- Copyrights -->
			<div class="col-md-12">
				<div class="copyrights">© {{ date("Y") }} Développé par la CAIDP</div>
			</div>


	</div>
	<!-- Content / End -->


</div>
<!-- Dashboard / End -->


</div>
<!-- Wrapper / End -->


<!-- Scripts
================================================== -->
<script type="text/javascript" src="{{asset('front')}}/scripts/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="{{asset('front')}}/scripts/jquery-migrate-3.1.0.min.js"></script>
<script type="text/javascript" src="{{asset('front')}}/scripts/mmenu.min.js"></script>
<script type="text/javascript" src="{{asset('front')}}/scripts/chosen.min.js"></script>
<script type="text/javascript" src="{{asset('front')}}/scripts/slick.min.js"></script>
<script type="text/javascript" src="{{asset('front')}}/scripts/rangeslider.min.js"></script>
<script type="text/javascript" src="{{asset('front')}}/scripts/magnific-popup.min.js"></script>
<script type="text/javascript" src="{{asset('front')}}/scripts/waypoints.min.js"></script>
<script type="text/javascript" src="{{asset('front')}}/scripts/counterup.min.js"></script>
<script type="text/javascript" src="{{asset('front')}}/scripts/jquery-ui.min.js"></script>
<script type="text/javascript" src="{{asset('front')}}/scripts/tooltips.min.js"></script>
<script type="text/javascript" src="{{asset('front')}}/scripts/custom.js"></script>
<script type='text/javascript' src='{{ asset('admin') }}/js/notify.js'></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script> --}}
<script src="{{ asset('js/sweetalert.min.js') }}"></script>
<script type="text/javascript" src="{{asset('front')}}/scripts/requerant.js"></script>

<script type="text/javascript">
	$(".datatable").DataTable({
		"language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/French.json"
        },
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Tout"]]
	});
	
</script>

@yield('js')
</body>
</html>