@extends('layouts.admin')

@section('content')
	<div class="row">
		<div class="col-sm-12">
			<a href="{{ route('institutions.inform.demandeDetails', 1) }}"><i class="fa fa-chevron-left"></i> Retour</a>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-info ">
				<div class="panel-heading panel-remove">
					<div class="panel-title">
						Ajouter une décison
					</div>
				</div>
				<div class="panel-body">
					<form class="form-horizontal">
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Décison</label>
                            <div class="col-md-6 col-xs-12">                                            
                                <textarea class="form-control" rows="15"></textarea>
                                <!-- <span class="help-block">Default textarea field</span> -->
                            </div>
                        </div>
					</form>
				</div>
				<div class="panel-footer">
					<a class="btn btn-lg btn-info pull-right">
						<i class="fa fa-check"></i> Valider
					</a>
				</div>
			</div>
			
		</div>
	</div>
@stop

