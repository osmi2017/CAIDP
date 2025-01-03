@inject('adminController', 'App\Http\Controllers\adminController')
@inject('Globals', 'App\Tools\Globals')
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>{{ config('app.name', 'CAIDP') }} : Gestion de saisine</title>
    <!-- Favicon-->
    <link rel="icon" href="{{ asset('admincaidp')}}/favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{ asset('admincaidp')}}/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{ asset('admincaidp')}}/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{ asset('admincaidp')}}/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{ asset('admincaidp')}}/css/style.css" rel="stylesheet">
    {{-- <link href="{{ asset('admincaidp')}}/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" /> --}}

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{ asset('admincaidp')}}/css/themes/all-themes.css" rel="stylesheet" />
    <link href="{{ asset('admincaidp')}}/css/themes/admincaidp.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/datepicker/0.6.5/datepicker.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link href="{{ asset('plugins/summernote/summernote.css') }}" rel="stylesheet">
    @yield('css')
    <meta name="_token" content="{{csrf_token()}}" />
</head>

<body class="theme-red">
    <!-- Page Loader -->
    {{-- @yield('overlay') --}}
    {{-- <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Patientez...</p>
        </div>
    </div> --}}
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay">
        <div id="closeOverLay"><a href="#" id="closeOverLayBtn"><i class="fa fa-times fa-2x text-white"></i></a></div>
        <div class="overlayContent"></div>
    </div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="{{ route('admin.Home')}}">Gestion des demandes d'accès à l'information et documents d'intérêt public</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Call Search -->
                    <!-- #END# Call Search -->
                    <!-- Notifications -->
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            {{-- <i class="material-icons">notifications</i>
                            <span class="label-count">7</span> --}}
                        </a>
                    </li>
                    <li>
                        <a href="{{url('deconnexion')}}">
                            <i class="material-icons">power_settings_new</i>
                        </a>
                    </li>
                    <!-- #END# Notifications -->
                    <!-- Tasks -->
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="{{ asset('admincaidp')}}/images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ \Auth::user()->name }}</div>
                    <div class="email">{{ $adminController->checkUser()->qualite }}</div>
                    
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MENU</li>
                    <li class="{{ $Globals->menuActif('admin.Home') }}">
                        <a href="{{ route('admin.Home') }}">
                            <i class="material-icons">dashboard</i>
                            <span>Tableau de bord</span>
                        </a>
                    </li>
                    <li class="{{ $Globals->menuActif('admin.newSaisine') }} ">
                        <a href="{{ url('administrateurs/nouvelle-saisine') }}">
                            <i class="material-icons">assignment</i>
                            <span>Enregistrer une saisine</span>
                        </a>
                    </li>
                    <li class="{{ $Globals->menuActif('admin.userList') }} {{ $Globals->menuActif('admin.nouveau') }}">
                        <a href="{{ route('admin.userList') }}">
                            <i class="material-icons">person_add</i>
                            <span>Utilisateurs</span>
                        </a>
                    </li>
                    <li class="{{ $Globals->menuActif('admin.show') }}">
                        <a href="{{ route('admin.show', Auth::user()->caidp_id) }}">
                            <i class="material-icons">settings</i>
                            <span>Mon compte</span>
                        </a>
                    </li>
                    
                    
                    </div>
                </div>
            </div>
        </aside>
        <!-- #END# Right Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
            @if(session('success')) 
                <div class="alert alert-success"> 
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
                    {{ session('success') }} 
                </div> 
            @endif 
            @if(session('error')) 
                <div class="alert alert-danger"> 
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
                    {{ session('error') }} 
                </div> 
            @endif 
            {{-- {{ dd($adminController->checkUser())}}< --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="block-header">
                @yield('title')
            </div>
            <div>
                @yield('home')
            </div>
            <div class="content">
                @yield('content')
            </div>
        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="{{ asset('admincaidp')}}/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{ asset('admincaidp')}}/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="{{ asset('admincaidp')}}/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="{{ asset('admincaidp')}}/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{ asset('admincaidp')}}/plugins/node-waves/waves.js"></script>

    <!-- Custom Js -->
    {{-- <script src="{{ asset('admincaidp')}}/plugins/bootstrap-select/js/bootstrap-select.js"></script> --}}
    <script src="{{ asset('admincaidp')}}/js/admin.js"></script>
    <script src="{{ asset('admincaidp')}}/js/admincaidp.js"></script>
    <script type='text/javascript' src='{{ asset('admin') }}/js/notify.js'></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script> --}}
    <script src="{{ asset('js/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('plugins/Inputmask-5.x') }}/dist/jquery.inputmask.js"></script>
    <script type="text/javascript" src="{{ asset('admin') }}/js/plugins/bootstrap/bootstrap-datepicker.js"></script>
    <script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
    <script type="text/javascript" src="{{ asset('plugins/summernote/summernote.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js') }}/message.js"></script>
    <!-- Demo Js -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script> 
    <script type="text/javascript">
        $(".datatable").DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/French.json"
        },
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Tout"]]
    });

    $('.select').selectpicker();
    $(".date").datepicker({
        format : 'yyyy-mm-dd',
        language : 'fr',
    });
    </script>

    @yield('js')
</body>


</html>
