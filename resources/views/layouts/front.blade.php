<!DOCTYPE html>
<head>
<!-- Basic Page Needs
================================================== -->
<title>{{ config('app.name', 'CAIDP') }}</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="_token" content="{{csrf_token()}}" />

<!-- CSS
================================================== -->
<link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('front/css/main-color.css') }}" id="colors">
<link rel="stylesheet" href="{{ asset('sweetalert2/dist/sweetalert2.min.css') }}">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="{{ asset('css/intlTelInput.css') }}">
<script src="{{ asset('js/intelinput/intlTelInput.js') }}"></script>

@yield('css')
</head>

<body>

<!-- Wrapper -->
<div id="wrapper">

<!-- Header Container
================================================== -->
<header id="header-container">

	<!-- Header -->
	<div id="header">
		<div class="container">
			
			<!-- Left Side Content -->
			<div class="left-side">
				
				<!-- Logo -->
				<div id="logo">
					<a href="{{route('Accueil') }}"><img src="{{ asset('logo.png') }}" width="250" alt=""></a>
				</div>

				<!-- Mobile Navigation -->
				<div class="mmenu-trigger">
					<button class="hamburger hamburger--collapse" type="button">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</button>
				</div>

				<!-- Main Navigation -->
				<nav id="navigation" class="style-1">
					<ul id="responsive">

						{{-- <li>
							<a href="listings-grid-with-sidebar-1.html#">Home</a>
						</li> --}}
						
					</ul>
				</nav>
				<div class="clearfix"></div>
				<!-- Main Navigation / End -->
				
			</div>
			<!-- Left Side Content / End -->

			<!-- Right Side Content / End -->
			<div class="right-side">
				<div class="header-widget">
					<a href="{{ route('requerant.index') }}" class="sign-in popup-with-zoom-anim">
						<i class="sl sl-icon-login"></i>Mon tableau de bord
					</a>
					<a href="{{ route('listRespo') }}" class="sign-in popup-with-zoom-anim">Liste des responsables de l'information </a>
					<a href="{{ route('requerant.faireDemande') }}" class="button border with-icon">Faire une demande<i class="fa fa-file-o"></i></a>
					
					@if(\Auth::check())
						<a href="{{ route('deconnexion') }}" class="button with-icon" title="Déconnexion">
							<i class="fa fa-power-off"></i>
						</a>
					@endif
				</div>
			</div>
			<!-- Right Side Content / End -->

			
		</div>
	</div>
	<!-- Header / End -->

</header>
@yield('header')
<!-- Header Container / End -->


<!-- Titlebar
================================================== -->


<!-- Content
================================================== -->
<div class="container">
	<div class="row">

		<div class="col-lg-9 col-md-8 padding-right-30" id="mainFront">

			@yield('main')

		</div>


		<!-- Sidebar
		================================================== -->
		<div class="col-lg-3 col-md-4">
			<div class="sidebar">

				<!-- Widget -->
				@yield('right')
				<!-- Widget / End -->

			</div>
		</div>
		<!-- Sidebar / End -->
	</div>
</div>


<!-- Footer
================================================== -->
<div id="footer" class="margin-top-15">
	<!-- Main -->
	<div class="container">
		<!-- Copyright -->
		<div class="row">
			<div class="col-md-12">
				<div class="copyrights">{{ date("Y")}} - Propulsé par la <a href="http://www.caidp.ci" target="_blank">CAIDP</a></div>
			</div>
		</div>

	</div>

</div>
<!-- Footer / End -->


<!-- Back To Top Button -->
{{-- <div id="backtotop"><a href="listings-grid-with-sidebar-1.html#"><i class="fa fa-user"></i></a></div> --}}


</div>
<!-- Wrapper / End -->
<div id="searchResult">
	<a href="#" id="closeResult"><i class="fa fa-times-circle fa-2x  text-danger" id="closeResult"></i></a>
	<div class="container">
		<div class="row">
			<div id="searchContent">
				
			</div>
		</div>
	</div>
</div>
@if(session('login'))
<div id="loginBox" class="" >
	@include('front.login')
</div>
@endif

<!-- Scripts
================================================== -->

{{-- ================================== --}}
<script type="text/javascript" src="{{ asset('front') }}/scripts/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="{{ asset('front') }}/scripts/jquery-migrate-3.1.0.min.js"></script>
<script type="text/javascript" src="{{ asset('front') }}/scripts/mmenu.min.js"></script>
<script type="text/javascript" src="{{ asset('front') }}/scripts/chosen.min.js"></script>
<script type="text/javascript" src="{{ asset('front') }}/scripts/slick.min.js"></script>
<script type="text/javascript" src="{{ asset('front') }}/scripts/rangeslider.min.js"></script>
<script type="text/javascript" src="{{ asset('front') }}/scripts/magnific-popup.min.js"></script>
<script type="text/javascript" src="{{ asset('front') }}/scripts/waypoints.min.js"></script>
<script type="text/javascript" src="{{ asset('front') }}/scripts/counterup.min.js"></script>
<script type="text/javascript" src="{{ asset('front') }}/scripts/jquery-ui.min.js"></script>
<script type="text/javascript" src="{{ asset('front') }}/scripts/tooltips.min.js"></script>
<script type="text/javascript" src="{{ asset('admin') }}/js/plugins/datatables/jquery.dataTables.min.js"></script>  
{{-- <script type="text/javascript" src="{{ asset('front') }}/scripts/custom.js"></script> --}}
 {{-- <script type='text/javascript' src='{{ asset('admin') }}/js/notify.js'></script> --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script> --}}
<script src="{{ asset('js/sweetalert2.min.js') }}"></script>
<script src="{{ asset('plugins/Inputmask-5.x') }}/dist/jquery.inputmask.js"></script>
<script type="text/javascript" src="{{ asset('front') }}/scripts/caidpFront.js"></script>
{{-- ================================== --}}

<script type="text/javascript">
	$(".datatable").DataTable({
		"language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/French.json"
        },
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Tout"]]
	});
	
</script>

@if(session('login'))
<script type="text/javascript">
	$("body, html").css('overflow', 'hidden');
</script>
@endif

<script type="text/javascript" src="{{ asset('front/jquery-multiselect/fSelect.js') }}" ></script>
<script type="text/javascript">
	$('#organismeId').fSelect();
</script>

@yield('js')

</body>
</html>