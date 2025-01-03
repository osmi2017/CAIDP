<style type="text/css">
	#localmenu ul {
		padding: 0;
		width: 100%;
	}
	#localmenu ul li{
		padding: 0;
		width: 100%;
		display: block;
	}
	
	#localmenu ul li a{
		display: block;
	    float: left;
	    width: 100%;
	    line-height: 19px;
	    color: #777;
	    font-size: 13px;
	    font-weight: 400;
	    padding: 15px 10px 15px 15px;
	    text-decoration: none;
	    border-bottom: 1px solid #98abbb;
	    vertical-align: text-bottom;
	}
	#localmenu ul li a.active, #localmenu ul li a:hover{
		/*background: #ed6834;*/
		font-weight: bold;
		color: #ed6834;
	}
</style>
<div class="col-sm-3">
	<div class="panel panel-info" id="localmenu">
		<div class="panel-heading">
			<div class="panel-title">
				Paramètre
			</div>
		</div>
		<div class="panel-body">
			<ul>
				<li><a href="{{ route('Responsable.param', $Responsable->id) }}" class="{{ (strpos(Route::currentRouteName(), 'Responsable.param') === 0) ? 'active' : '' }}"><i class="fa fa-user-edit"></i> Modifier mon compte  </a></li>
				<li><a href="{{ route('Responsable.organisme') }}" class="{{ (strpos(Route::currentRouteName(), 'Responsable.organisme') === 0) ? 'active' : '' }}"><i class="fa fa-cog" ></i> Paramètre organisme</a></li>
				<li><a href="{{ route('Responsable.typeValidForm') }}" class="{{ (strpos(Route::currentRouteName(), 'Responsable.typeValidForm') === 0) ? 'active' : '' }}"><i class="fa fa-check" ></i> Définir le type de validation de décision</a></li>
				
			</ul>
		</div>
	</div>
</div>