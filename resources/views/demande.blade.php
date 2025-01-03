@inject("DateRewrite","App\Tools\DateRewrite")
@inject("Globals","App\Tools\Globals")
@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <a class="btn btn-info pull-right"><i class="fa fa-plus"></i> Ajouter une demande</a>
        </div>
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
                        <table class="table table-striped table-hover datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Libelle de la demande</th>
                                    <th>Etat</th>
                                    <th>Demandeurs</th>
                                    <th>Types</th>
                                    <th>Date demande</th>
                                    <th>enregistrée par</th>
                                    <th>Delais de réponse</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i=0 @endphp
                                @foreach($Demande as $value)
                                @php $i++ @endphp
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td><a href="{{ route('institutions.inform.ajoutDemande', $value->id) }}">{{ $value->libelle }}</a></td>
                                    <td><span class="{{ $Globals->EtatDemande($value->favorable)['span'] }}">{{ $Globals->EtatDemande($value->favorable)['texte'] }}</span></td>
                                    <td>{{ $value->requerant->nom." ".$value->requerant->prenom}} </td>
                                    <td>{{ $value->requerant->type->type }}  </td>
                                    <td> {{ $DateRewrite->dateTimeFrancais($value->dateDemande) }} </td>
                                    <td> </td>
                                    <td> </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
@endsection
