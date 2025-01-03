@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-info">
			<div class="panel-heading">
				<div class="panel-title">PUBLICATION DE DOCUMENT/INFORMATION</div>
			</div>
			<div class="panel-body">
				<form class="form-horizontal" enctype="multipart/form-data" action="{{ route('Documents.store') }}" method="post">
					@csrf
                    <div class="form-group {{ $errors->has('libelle') ? ' has-error' : ''}}"> 
							<label for="libelle"  class="col-sm-3 control-label">Libellé  <span class="required">*</span></label> 
							<div class="col-sm-6"> 
 								<input type="text" name="libelle" value="{{ old('libelle') }}" required=""  class="form-control" id="libelle"> 
								 @if ($errors->has('libelle')) 
									<span span  class="help-block"> 
										{{ $errors->first('libelle') }} 
									</span> 
								@endif 
							</div> 
						</div> 
                    
                    <div class="form-group ">
                        <label class="col-md-3 col-xs-12 control-label">Veuillez ajouter l'information relative à la demande </label>
                        <div class="col-md-6 col-xs-12">                                            
							<textarea class="form-control" rows="7" name="information" id="information">{{ old('information') }}</textarea>                                
                            <span class="invalid-feedback text-danger" role="alert" style="display: none;"></span>
                        	
                        </div>
                    </div>
                    
                    <div class="form-group ">
                        <label class="col-md-3 col-xs-12 control-label">Joindre les documents relatives à la demande <i class="fas fa-question-circle cursor" title="Vous pouvez sélectionner plusieurs"></i> </label>
                        <div class="col-md-6 col-xs-12 infoPhoto"> 
                           	<input type="file" multiple="true" class="" id="documents" name="documents[]">
                        </div>
                    </div> 
                    <div class="form-group @error('source') has-error @enderror">
                        <label class="col-md-3 col-xs-12 control-label">Source du document <span class="required">*</span></label>
                        <div class="col-md-6 col-xs-12"> 
                                <input type="text" list="source" class="form-control " id="" name="source"  required="" autocomplete="off" value="{{ old('source') }}">
                                @error('source')
									<span span  class="help-block"> 
										{{ $message }} 
									</span> 
								@endif 
                                <datalist id="source">
                                		@foreach($source as $source)
                                		<option id="{{ $source->source }}"> {{ $source->source }} </option>

                                		@endforeach
                                </datalist>
                        </div>	                            
                    </div> 
                    {{-- <div class="form-group ">
                        <label class="col-md-3 col-xs-12 control-label">Visibilité </label>
                        <div class="col-md-6 col-xs-12"> 
                            <input type="radio" class="" value="1" id="public" name="public" id="public"> <label for="public">Public</label> <br>
                                        <span class="invalid-feedback text-danger" role="alert"></span>
                            
                        </div>
                    </div> --}}
                    
                    <div class="actionBar">
                    	<button type="submit" class="btn btn-success pull-right" id="" href="#"><span></span> Enregistrer informations demandées</button>
                	</div>  
                	</div>                       
		        	
                    </form> 
			</div>
		</div>
	</div>
</div>

@stop

@section('js')

<script type="text/javascript" src="{{ asset('admin') }}/js/plugins/bootstrap/bootstrap-datepicker.js"></script>
<script type="text/javascript">
	$(".datepicker").attr('autocomplete', 'off');
	$(".datepicker").datepicker();
</script>
@stop