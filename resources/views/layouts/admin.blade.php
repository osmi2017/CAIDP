@inject('UserController', 'App\Http\Controllers\UserController')
@php $User = $UserController->userData()  @endphp
<!DOCTYPE html>
<html lang="fr">
    <head>        
        <!-- META SECTION -->
        <title>{{ config('app.name', 'CAIDP') }}</title>          
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="_token" content="{{csrf_token()}}" />
        
        <link rel="icon" href="{{ asset('favicon.png') }}" type="image/x-icon" />

        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="{{ asset('admin') }}/css/theme-blue.css"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('plugins/fontawesome/css/all.css') }}">
        <script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.3.2/socket.io.js"></script>

        
        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <!-- Bootstrap JS -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        @yield('css')     

        <!-- EOF CSS INCLUDE -->
    </head>
    <body class="fixed">
        {{-- {{$UserController->UserNotifications()->count()}} --}}
        @yield('signature')
        
                @yield('modeTransmission')
            
        @yield('overlay')
        <!-- START PAGE CONTAINER -->
        <div class="page-container" id="mainBody">
            
            <!-- START PAGE SIDEBAR -->
            <div class="page-sidebar page-sidebar-fixed">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                    <li class="xn-logo">
                        <a href="{{ route('home') }}" style="font-size: 20px;"> 
                                {{ $User['organisme']->organisme }}
                           <!--  FOXY MAG -->
                        </a>
                        <a href="#" class="x-navigation-control"></a>
                    </li>
                    <li class="xn-profile">
                        <a href="#" class="profile-mini">
                        </a>
                        <div class="profile">
                            <div class="profile-image">
                                @if($User['organisme']->logo)
                                    <img src="{{ asset('images/') }}/{{ $User['organisme']->logo }}" alt="Logo"> 
                                @else
                                    <i class="fas fa-user-circle fa-7x"></i>
                                @endif

                            </div>
                            <div class="profile-data">
                                <div class="profile-data-name"> {{ Auth::user()->name }} </div>
                                <div class="profile-data-title">
                                @if ($User['responsable'] && $User['responsable']->qualiteresponsable)
                                        {{ $User['responsable']->qualiteresponsable->qualite }} <br>
                                        
                                    @endif
                                </div>
                            </div>
                        </div>                                                                        
                    </li>
                                                  

                    <li class="xn-title">Navigation</li>
                    @if(Auth()->user()->responsable_id!=null)
                        @include("menu.informaticien")
                    @else
                        @include("menu.admin")
                    @endif

                    {{-- @switch(Auth::user()->type)
                    @case("caidp")
                    @case("utilisateur")

                    @case("organisme")
                        @if(Auth::user()->droit==="ri")
                            @include("menu.informaticien")
                        @else
                            @include("menu.informaticien")

                        @endif

                    @endswitch --}}
                    
                    
                                                         
                </ul>
                <!-- END X-NAVIGATION -->
            </div>
            <!-- END PAGE SIDEBAR -->
            
            <!-- PAGE CONTENT -->
            <div class="page-content">
                
                <!-- START X-NAVIGATION VERTICAL -->
                <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                    <!-- TOGGLE NAVIGATION -->
                    <!-- SEARCH -->
                    <li class="">
                        <div class="plugin-clock" style="color: white; font-size: 18px;font-weight: bold;margin:5px 0 0 60px;"></div> 
                        <div class="plugin-date" style="color: white; font-size: 12px;font-weight: bold;margin:0px 0 0 10px;"></div>
                    </li>   
                    <!-- END SEARCH -->
                    <!-- SIGN OUT -->
                    <li class="xn-icon-button pull-right">
                        <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-power-off"></span></a>                        
                    </li> 
                    <!-- END SIGN OUT -->
                    <!-- MESSAGES -->
                   {{--  <li class="xn-icon-button pull-right">
                        <a href="#"><span class="fa fa-envelope"></span></a>
                        <div class="informer informer-danger"> {{$UserController->UserNotifications()->count()}}</div>
                        <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
                            <div class="panel-heading">
                                <h3 class="panel-title"><span class="fa fa-bell"></span> Notifications</h3>                                
                                <div class="pull-right">
                                    <span class="label label-danger"> {{$UserController->UserNotifications()->count()}}  </span>
                                </div>
                            </div>
                            <div class="panel-body list-group list-group-contacts " style="max-height: 200px;">
                               @foreach($UserController->UserNotifications() as $Notifications)
                                <a href="#" class="list-group-item" >
                                    <p>
                                    
                                    </p>
                                </a>
                                @endforeach
                            </div>     
                            <div class="panel-footer text-center">
                                <a href="pages-messages.html">Voir toutes les notifications</a>
                            </div>                            
                        </div>                        
                    </li> --}}
                    <!-- END MESSAGES -->
                    
                </ul>
                <!-- END X-NAVIGATION VERTICAL -->                     
                
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="{{ route('home') }}">Accueil </a></li>                    
                    <li class="active">@yield('PageTile', 'Tableau de bord')</li>
                </ul>
                <!-- END BREADCRUMB -->                
                
                <div class="page-title">                    
                    <!-- <h2><span class="fa fa-home text-primary"></span> @yield('PageTile', 'Tableau de bord')</h2> -->
                </div>                   
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="messageError"></div>
                {{-- {{ $User }} --}}
                <div class="page-content-wrap">
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
                
                </div>
                <!-- END PAGE CONTENT WRAPPER -->                
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->

        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-power-off"></span>  <strong>Déconnexion</strong> ?</div>
                    <div class="mb-content">
                        <p>Voulez-vous vraiment vous déconnecter ?</p>                    
                        <p>Cliquez sur NON si vous ne souhaitez pas vous déconnecter.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="{{ route('deconnexion') }}" class="btn btn-success btn-lg">Oui, me déconnecter</a>
                            <button class="btn btn-default btn-lg mb-control-close">Non</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->
       
        <!-- START PRELOADS -->
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
        <audio id="audio-alert" src="{{ asset('admin') }}/audio/alert.mp3" preload="auto"></audio>
        <audio id="audio-fail" src="{{ asset('admin') }}/audio/fail.mp3" preload="auto"></audio>
        <!-- END PRELOADS -->                 
        
    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
        <script type="text/javascript" src="{{ asset('admin') }}/js/plugins/jquery/jquery.min.js"></script> 
        <script type="text/javascript" src="{{ asset('admin') }}/js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="{{ asset('admin') }}/js/plugins/bootstrap/bootstrap.min.js"></script>        
        <!-- END PLUGINS -->

        <!-- THIS PAGE PLUGINS -->
        <script type="text/javascript" src="{{ asset('admin') }}/js/plugins/datatables/jquery.dataTables.min.js"></script>  
        <!-- END PAGE PLUGINS -->         

        <!-- START TEMPLATE -->
        <script src="{{ asset('plugins/Inputmask-5.x') }}/dist/jquery.inputmask.js"></script>
        <script type="text/javascript" src="{{ asset('admin') }}/js/plugins.js"></script>        
        <script type="text/javascript" src="{{ asset('admin') }}/js/actions.js"></script>   
        <script type="text/javascript" src="{{ asset('admin') }}/js/plugins/summernote/summernote.js"></script>     
        <script type="text/javascript" src="{{ asset('admin') }}/js/caidp.js"></script>     
        <script type='text/javascript' src='{{ asset('admin') }}/js/notify.js'></script>
        <script type="text/javascript" src="{{ asset('admin') }}/js/caidpwidzard.js"></script>     
        {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script> --}}
        <script src="{{ asset('js/sweetalert.min.js') }}"></script>
        {{-- ========================================================= SIGNATURE====================================== --}}
{{-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>  --}}
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<!--[if IE]> 
    <script type="text/javascript" src="js/excanvas.js"></script> 
    <![endif]-->
<script type="text/javascript" src="{{ asset('plugins/jquery.signature.package-1.2.0') }}/js/jquery.ui.touch-punch.min.js"></script>
 
<script type="text/javascript" src="{{ asset('plugins/jquery.signature.package-1.2.0') }}/js/jquery.signature.js"></script>
<script type="text/javascript" src="{{ asset('js') }}/message.js"></script>
<script type="text/javascript">

</script>
{{-- ========================================================= SIGNATURE====================================== --}}

        
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->  
    <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>  -->

    @yield('js')  
  
    </body>
</html>






