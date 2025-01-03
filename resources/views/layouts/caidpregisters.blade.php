<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
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
<body class="container">
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
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
