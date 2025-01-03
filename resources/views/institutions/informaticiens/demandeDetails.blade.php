@extends('layouts.admin')
@section('content')

<div class="row">
	<div class="col-sm-12">
		<a href="#"><i class="fa fa-chevron-left"></i> Retour</a>
	</div>
</div>
<br>

<div class="row">
	<div class="col-sm-9">
		<div class="panel panel-info">
			<div class="panel-heading">
				<div class="panel-title">
					Détails de la demande d'AAI  
				</div>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-bordered">
						<tr>
							<th>Numéro de demande</th>
							<td class="text-info"><b>N°001-27/03/19</b></td>
						</tr>
						<tr>
							<th>Libellé de la demande  </th>
							<td>Bilan des activités de l'année 2015-2016</td>
						</tr>
						<tr>
							<th>Demandeur</th>
							<td>Coulibaly Mamadou</td>
						</tr>
						<tr>
							<th>Date de demande</th>
							<td>23 Mars 2017</td>
						</tr>
						<tr>
							<th>Delais</th> 
							<td>7 Jours restants  
								@if(Auth::user()->droit==="ri")Proroger 
									- <a class="" href="{{ route('institutions.inform.prorogerDelais', 1) }}">
									<i class="fa fa-arrow-right"></i></a>
								@endif
							</td>
						</tr>
						<tr>
							<th>Etat</th>
							<td><span class="label label-warning">En cours de traitement...</span></td>
						</tr>
						<tr>
							<th>Décision</th>
							<td>
								@if(Auth::user()->droit==="ri")Proroger 
								<a href="{{ route('institutions.inform.decision', 1) }}"> <i class="fa fa-file-text-o"></i> Ajouter une décision</a>
								@else
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
								cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
								proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
								cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
								proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
								<br>
								<br>
								<a class="btn btn-danger mb-control" data-box="#invalideDecision">
									<i class="fa fa-times"></i> Invalider
								</a>
								<a class="btn btn-success">
									<i class="fa fa-check"></i> Valider
								</a>
								
								@endif
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-3">

        <div class="panel panel-info">
            <div class="panel-body">
                <h3><span class="fa fa-download"></span> Joindre un document</h3>                                    
                <p>Veuillez cliquer pour joindre un document a la demande</p>
                <form action="#" class="dropzone dropzone-mini dz-clickable">
                	
                </form>
            </div>
             <div class="text-center">
             	Ou  <br> <br>
                <a class="btn btn-success" href="{{ route('institutions.inform.formFichier', 1) }}">
                	<i class="fa fa-file-text"></i> Remplir un formulaire
                </a>
                <br><br><br>
             </div>
        </div>

	</div>

</div>

@stop

@section('js')
<script type="text/javascript" src="{{ asset('admin') }}/js/plugins/dropzone/dropzone.min.js"></script>
        <script type="text/javascript" src="{{ asset('admin') }}/js/plugins/fileinput/fileinput.min.js"></script>        
        <script type="text/javascript" src="{{ asset('admin') }}/js/plugins/filetree/jqueryFileTree.js"></script>
        <script type='text/javascript' src="{{ asset('admin') }}/js/plugins/noty/jquery.noty.js"></script>
@stop
@include("globals.alerts.alertInvalideDecision")