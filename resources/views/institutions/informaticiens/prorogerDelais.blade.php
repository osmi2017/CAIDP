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
						Prorogation de delais 
					</div>
				</div>
				<div class="panel-body">
					<form class="form-horizontal">
						<div class="form-group">                                        
                            <label class="col-md-3 col-xs-12 control-label">Sélectionner une date</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                    <input type="text" class="form-control datepicker" value="2014-11-01">
                                </div>
                                <!-- <span class="help-block">Cliquer dans le champ pour afficgier le calendrier</span> -->
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Motif de prorogation du delais</label>
                            <div class="col-md-6 col-xs-12">                                            
                                <textarea class="form-control" rows="5"></textarea>
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

@section('js')
<script type="text/javascript" src="{{ asset('admin') }}/js/plugins/bootstrap/bootstrap-datepicker.js"></script>
@stop