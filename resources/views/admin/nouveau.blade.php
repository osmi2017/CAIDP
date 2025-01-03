@inject('Globals', 'App\Tools\Globals')
@inject('adminController', 'App\Http\Controllers\adminController')
@extends('layouts.caidp')
@section('home') 
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                Ajouter utilisateur               
            </div>
            <div class="body">
                    <form class="form-horizontal" action="{{ route('admin.update') }}" method="post" > 
                    {{ csrf_field() }} 
                        <div class="row clearfix {{ $errors->has('nom') ? ' has-error' : ''}}"> 
                            <label for="nom"  class="col-sm-3 control-label form-control-label">Nom & Prénom</label> 
                            <div class="col-sm-3"> 
                                <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="nom" required=""  class="form-control" id="nom" value="{{ old('nom') }}" placeholder="Nom">
                                        </div>
                                    </div>
                                @if ($errors->has('nom')) 
                                    <span span  class="help-block"> 
                                        {{ $errors->first('nom') }} 
                                    </span> 
                                @endif 
                            </div> 
                            <div class="col-sm-5"> 
                                <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="prenom" required=""  class="form-control" id="prenom" value="{{ old('prenom') }}" placeholder="Prénom">
                                        </div>
                                    </div>
                                @if ($errors->has('prenom')) 
                                    <span span  class="help-block"> 
                                        {{ $errors->first('prenom') }} 
                                    </span> 
                                @endif 
                            </div> 
                        </div> 
                        <div class="row clearfix {{ $errors->has('civilite') ? ' has-error' : ''}}"> 
                            <label for="civilite"  class="col-sm-3 control-label form-control-label"></label> 
                            <div class="col-sm-8"> 
                                <div class="form-group">
                                        <div class="">
                                            <input type="radio" name="civilite" required=""  class="form-control" id="Monsieur" value="Monsieur" checked=""> <label for="Monsieur">Monsieur</label>
                                            <input type="radio" name="civilite" required=""  class="form-control" id="Madame" value="Madame"> <label for="Madame">Madame</label>
                                            <input type="radio" name="civilite" required=""  class="form-control" id="Mademoiselle" value="Mademoiselle"> <label for="Mademoiselle">Mademoiselle</label>
                                        </div>
                                    </div>
                                 @if ($errors->has('civilite')) 
                                    <span span  class="help-block"> 
                                        {{ $errors->first('civilite') }} 
                                    </span> 
                                @endif 
                            </div> 
                        </div> 
                        <div class="row clearfix {{ $errors->has('contact') ? ' has-error' : ''}}"> 
                            <label for="contact"  class="col-sm-3 control-label form-control-label">Contact et Email</label> 
                            <div class="col-sm-4"> 
                                <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="contact" required=""  class="form-control" id="contact" value="{{ old('ontact') }}" placeholder ="Contact">
                                        </div>
                                    </div>
                                 @if ($errors->has('contact')) 
                                    <span span  class="help-block"> 
                                        {{ $errors->first('contact') }} 
                                    </span> 
                                @endif 
                            </div> 
                            <div class="col-sm-4"> 
                                <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="email" required=""  class="form-control" id="email" value="{{old('>email') }}" placeholder="Email">
                                        </div>
                                    </div>
                                 @if ($errors->has('email')) 
                                    <span span  class="help-block"> 
                                        {{ $errors->first('email') }} 
                                    </span> 
                                @endif 
                            </div> 
                        </div> 
                        <div class="row clearfix {{ $errors->has('qualite') ? ' has-error' : ''}}"> 
                            <label for="qualite"  class="col-sm-3 control-label form-control-label">Qualite</label> 
                            <div class="col-sm-8"> 
                                <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="qualite" required=""  class="form-control" id="qualite" list="qualiteList" value="{{ old('ualite') }}" autocomplete="off">
                                            <datalist id="qualiteList">
                                                @foreach($Responsables as $value)
                                                    <option>{{ $value->qualite }}</option>
                                                @endforeach
                                            </datalist>
                                        </div>
                                    </div>
                                 @if ($errors->has('qualite')) 
                                    <span span  class="help-block"> 
                                        {{ $errors->first('qualite') }} 
                                    </span> 
                                @endif 
                            </div> 
                        </div> 
                        <div class="actions clearfix">
                            <button type="submit" class="btn btn-danger pull-right btn-lg"><i class="fa fa-save"></i>  Enregistrer</button>  
                        </div>
                    </form> 
                </div> 
            </div> 
        </div> 
    </div> 
@stop 