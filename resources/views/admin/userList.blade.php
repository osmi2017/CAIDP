@inject('Globals', 'App\Tools\Globals')
@inject('adminController', 'App\Http\Controllers\adminController')
@extends('layouts.caidp')
@section('home') 
<a href="{{ route('admin.nouveau') }}" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Ajouter utilisateur</a>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <i class="fa fa-users" ></i> Liste des utilisateurs             
            </div>
            <div class="body">
                <table class="table table-striped datatable">
                    <thead>
                        <tr>
                            <th>Nom et prénom</th>
                            <th>Qualite</th>
                            <th>Contact</th>
                            <th>Email</th>
                            {{-- <th>Etat</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($Caidps as $value)
                        <tr>
                            <td>{{ $value->nom." ".$value->nom }}</td>
                            <td>{{ $value->qualite }}</td>
                            <td>{{ $value->contact }}</td>
                            <td>{{ $value->email }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>    

            </div> 
        </div> 
    </div> 
@stop 