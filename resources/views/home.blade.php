@inject("DemandeController","App\Http\Controllers\Organisme\DemandeController")
@inject("DateRewrite","App\Tools\DateRewrite")
@inject("Globals","App\Tools\Globals")
@extends('layouts.admin')

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
        animation: New 2s infinite;
        background: black;
        color: white;
    }
    @keyframes New{
        0%{opacity: 1;}
        50%{opacity: 0;}
        100%{opacity: 1;}
    }
    
</style>
<div class="row">
        <div class="col-md-6">
        
         <!-- START WIDGET REGISTRED -->
        <div class="widget widget-default widget-item-icon" >
            <div class="widget-item-left">
                <span class="fa fa-folder"></span>
            </div>
            <div class="widget-data">
                <div class="widget-int num-count">{{ count($DemandeEC) }}</span> Demandes en cours</div>
                
                {{-- <div class="widget-subtitle">2 ce mois</div> --}}
            </div>
                            
        </div>                            
        <!-- END WIDGET REGISTRED -->
        
    </div>
    <div class="col-md-6">
        
        <!-- START WIDGET MESSAGES -->
        <div class="widget widget-default widget-item-icon">
            <div class="widget-item-left">
                <span class="fa fa-file"></span>
            </div>                             
            <div class="widget-data">
                <div class="widget-int num-count"> {{ count($DemandeTS) + count($DemandePS) }} Demandes satisfaites</div>
                {{-- <div class="widget-title">Demandes partiellement satisfaites</div> --}}
                <div class="widget-subtitle">Communication totale : {{ count($DemandeTS) }}</div>
                <div class="widget-subtitle">Communication partielle : {{ count($DemandePS)  }}</div>
            </div>      

        </div>                            
        <!-- END WIDGET MESSAGES -->
        
    </div>
    <div class="col-md-6">
        
        <!-- START WIDGET REGISTRED -->
        <div class="widget widget-info widget-item-icon" >
            <div class="widget-item-left">
                <span class="far fa-file-text"></span>
            </div>
            <div class="widget-data">
                <div class="widget-int num-count">{{ count($DemandeNS) }} Demandes non satisfaites</div>
                {{-- <div class="widget-title">Demandes non satisfaites</div> --}}
                <div class="widget-subtitle">Décision de ne pas répondre : {{ count($DemandeNS) }} </div>
                <div class="widget-subtitle">Demande forcloses (Aucune suite) : 0 </div>
            </div>
                            
        </div>                            
        <!-- END WIDGET REGISTRED -->
        
    </div>
    <div class="col-md-6">
        
        <!-- START WIDGET REGISTRED -->
        <div class="widget widget-info widget-item-icon" >
            <div class="widget-item-left">
                <span class="far fa-file-text"></span>
            </div>
            <div class="widget-data">
                <div class="widget-int num-count">{{ count($DemandeCont) }} Saisine{{ count($DemandeCont) >1 ? "s" :"" }} CAIDP </div>
                {{-- <div class="widget-title"></div> --}}
                {{-- <div class="widget-subtitle">2 ce mois</div> --}}
            </div>
                            
        </div>                            
        <!-- END WIDGET REGISTRED -->
        
    </div>
    

    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title"><i class="fa fa-file text-info"></i> Liste des demandes</div>
                </div>
                <div class="panel-body">
                    <div class="progress">
                        <div class="progress-bar bg-success progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-width="80" >70%</div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="homeDatatable">
                            <thead>
                                <tr>
                                    <th>Num. Demande</th>
                                    <th>Libelle de la demande</th>
                                    <th>Etat</th>
                                    <th>Demandeurs</th>
                                    <th>Types</th>
                                    <th>Date demande</th>
                                    <th>Delais de réponse</th>
                                    <th>Enregistrée par</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i=0 @endphp
                                @foreach($Demande as $value)
                                @php $i++ @endphp
                                <tr>
                                    <td style="font-weight: bold;"><b>{{ $value->numDemande }}</b></td>
                                    <td><a href="{{ route('institutions.inform.ajoutDemande', $value->id) }}">{{ $value->libelle }}</a></td>
                                    <td>
                                        @if($value->decison)
                                            @php 
                                            $etat = $value->decison->etat;
                                            $envoie = $value->decison->envoye;
                                            @endphp
                                            @if($etat==0 && $envoie==null)
                                                <span class="{{ $Globals->EtatDemande($etat)['span'] }}">
                                            {{ $Globals->EtatDemande($etat, "En attente de validation de decison")['texte'] }}</span>
                                            @elseif($etat==1 && $envoie==null)
                                                <span class="{{ $Globals->EtatDemande($etat)['span'] }}">
                                            {{ $Globals->EtatDemande($etat, "En attente de transmission")['texte'] }}
                                            @elseif($etat==1 && $envoie!=null)
                                                {{-- @if($value->liquide==1) --}}
                                                <span class="{{ $Globals->EtatDemande($value->favorable)['span'] }}">
                                                {{ $Globals->EtatDemande($value->favorable)['texte'] }}</span>
                                            @endif
                                        @elseif($value->dateProrogation==null && $value->information==null)
                                        <span class="label label-info New">
                                            Nouveau
                                        </span>
                                        @else
                                            <span class="{{ $Globals->EtatDemande(null)['span'] }}">
                                            {{ $Globals->EtatDemande(null)['texte'] }}</span>
                                        @endif
                                    </td>
                                    <td>{{  $Globals->checkNameOrga($value->requerant->denomination, $value->requerant->nom, $value->requerant->prenom)}} </td>
                                    <td>{{ $value->requerant->type->type }}  </td>
                                    <td> {{ $DateRewrite->dateTimeFrancais($value->dateDemande) }} </td>
                                    <td> {{ $DateRewrite->dateFrancais(json_decode($DemandeController->checkDedelaisDemande($value->requerant->id, $value->dateDemande, $value->id), true)['dateFin']) }} </td>
                                    <td>{{  $Globals->savedBy($value->autosave, $value->savebyorganisme, $value->savebycaidp) }}</td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="col-md-3">
            
            <!-- LIST GROUP WITH BADGES -->
            <div class="panel panel-info">
                <div class="panel-heading ">
                    <h3 class="panel-title"> <i class="fa fa-bell text-info"></i> Notifications</h3>
                </div>
                <div class="panel-body">
                    <ul class="list-group border-bottom">
                        <li class="list-group-item">Alerte délais<span class="badge">14</span></li>
                        <li class="list-group-item">Accusé de reception<span class="badge badge-danger">8</span></li>
                        <li class="list-group-item">Messages recus<span class="badge badge-info">7</span></li>
                        <li class="list-group-item">Maecenas mauris diam<span class="badge badge-success">25</span></li>
                        <li class="list-group-item">Curabitur porttitor massa justo<span class="badge badge-warning">58</span></li>
                    </ul>                                
                <div class="text-center">
                    <a href="#" class="btn text-white">Voir toutes nes notifications <i class="fa fa-chevron-right"></i> </a>
                </div>
                </div>
            </div>
            <!-- END LIST GROUP WITH BADGES -->

        </div> --}}
    </div>
</div>
@endsection

@section('js')
    <script type="text/javascript">
        $("#homeDatatable").DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/French.json"
        },
         "order": [[ 0, "desc" ],[ 4, "desc" ] ],


        });
    </script>
@stop