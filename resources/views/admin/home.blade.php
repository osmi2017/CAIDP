@inject('Globals', 'App\Tools\Globals')
@inject('adminController', 'App\Http\Controllers\adminController')
@extends('layouts.caidp')
@section('home')
<div class="row clearfix">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="info-box bg-light-green hover-expand-effect">
            <div class="icon">
                <i class="material-icons">insert_drive_file</i>
            </div>
            <div class="content">
                <div class="text">SAISINES EN COURS</div>
                <div class="number count-to" data-from="0" data-to="{{ $SaisinesEnCours }}" data-speed="15" data-fresh-interval="20">{{ $SaisinesEnCours }}</div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="info-box bg-cyan hover-expand-effect">
            <div class="icon">
                <i class="material-icons">insert_drive_file</i>
            </div>
            <div class="content">
                <div class="text">SAISINES TRAITEES</div>
                <div class="number count-to" data-from="0" data-to="{{ $SaisinesCloturees }}" data-speed="1000" data-fresh-interval="20">{{ $SaisinesCloturees }}</div>
            </div>
        </div>
    </div>
    {{-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="info-box bg-cyan hover-expand-effect">
            <div class="icon">
                <i class="material-icons">insert_drive_file</i>
            </div>
            <div class="content">
                <div class="text">AMPLIATIONS</div>
                <div class="number count-to" data-from="0" data-to="{{ $Ampliations }}" data-speed="1000" data-fresh-interval="20">{{ $Ampliations }}</div>
            </div>
        </div>
    </div> --}}


</div>
@stop

@section('content')
<style type="text/css">
    .datatable a {
        color: #000;
        text-decoration: blink !important;
    }
    .datatable a:hover {
        color: blue;

    }
    .New{
        animation: New 1s infinite;
    }
    @keyframes New{
        0%{opacity: 1;}
        50%{opacity: 0;}
        100%{opacity: 1;}
    }
    
</style>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    SAISINES1
                </h2>
            </div>
            <div class="body">
                <table id="homeDatatable" class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Num. Saisine</th>
                            <th>Réquérant</th>
                            <th>Organisme</th>
                            <th>Demande</th>
                            <th>Motif</th>
                            <th>Date</th>
                            <th>Etat</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- {{ dd($Saisines) }} --}}
                        @foreach($Saisines as $value)
                        <tr>
                            <td><a style="color: red;font-weight: bold;" class="" href="{{ route('admin.newSaisine', $value->id_saisine) }}">{{ $value->numSaisine }}</a></td>
                            <td><a href="{{ route('admin.newSaisine', $value->id_saisine) }}">{{ $Globals->checkNameOrga($value->denomination, $value->nom, $value->prenom) }}</a></td>
                            <td><a href="{{ route('admin.newSaisine', $value->id_saisine) }}">{{ $value->organisme }}</a></td>
                            <td><a href="{{ route('admin.newSaisine', $value->id_saisine) }}">{{ $value->libelle }}</a></td>
                            <td><a href="{{ route('admin.newSaisine', $value->id_saisine) }}">{{ $value->motif }}</a></td>
                            <td><a href="{{ route('admin.newSaisine', $value->id_saisine) }}">{{ $value->saisineDate }}</a></td>
                            <td>  <a href="{{ route('admin.newSaisine', $value->id_saisine) }}">{{ $Globals->State($value->etat_saisine, $adminController->checkFacilitation($value->id_saisine),  $adminController->checkContentieu($value->id_saisine)) }}</a></td>
                           
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
                   
@stop


@section('js')
    <script type="text/javascript">
        $("#homeDatatable").DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/French.json"
        },
         "order": [[ 6, "desc" ]],


        });
    </script>
@stop