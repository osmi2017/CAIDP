@inject('RapportController', 'App\Http\Controllers\Organisme\RapportController')
@extends('layouts.admin')
@section('content')
@php $rapportDetaille = $RapportController->rapportDetaille(); @endphp

<style type="text/css">
	table tr td[rowspan]{
		margin: auto; */
	    /* width: 214px; */
	    text-align: center !important;
	    padding: 25px;
	    position: relative;
	    /* top: 19px;*/
	}
</style>

<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-info">
			<div class="panel-heading">
				<div class="panel-title">
					Rapport <div class="pull-right" style="float: right;">
						<a href="{{ route('imprimerRapport', 'previsualiser') }}" target="_blank" class="btn btn-primary btn-rounded"><i class="fa fa-search-plus"></i> Prévisualiser</a>
						<a href="{{ route('imprimerRapport') }}" class="btn btn-info btn-rounded"><i class="fa fa-download"></i> Télécharger le rapport</a>
					</div>   
				</div>
			</div>
			<div class="panel-body">
				<table class="table table-bordered">
					<tr>
						<td>Intitulé du rapport</td>
						<td class="editable action"  data-var="intitule">
							<div class="btn pull-left">
								<a href="#" class="editBtn"><i class="fa fa-edit"></i></a>
								<a href="#" class="validBtn hide"><i class="fa fa-check"></i></a>
							</div>
							<div class="newValue textarea pull-left">{{ $rapportDetaille['Rapport']->intitule  }}</div>
						</td>
					</tr>
					<tr>
						<td>Fait à </td>
						<td class="editable action"  data-var="lieu">
							<div class="btn pull-left">
								<a href="#" class="editBtn"><i class="fa fa-edit"></i></a>
								<a href="#" class="validBtn hide"><i class="fa fa-check"></i></a>
							</div>
							<div class="newValue pull-left ville">{{ $rapportDetaille['Rapport']->lieu}}</div>
						</td>
					</tr>
					<tr>
						<td>Le </td>
						<td class="editable action"  data-var="date">
							<div class="btn pull-left">
								<a href="#" class="editBtn"><i class="fa fa-edit"></i></a>
								<a href="#" class="validBtn hide"><i class="fa fa-check"></i></a>
							</div>
							<div class="newValue pull-left dateInput">{{ $rapportDetaille['Rapport']->date  }}</div>
						</td>
					</tr>
				</table>
				<table class="table table-bordered " id="OrganismeInfo">
					<thead>
						<tr>
							<th></th>
							<th>Valeur générée</th>
							<th>Valeur réelle</th>
						</tr>
					</thead>
					<tr>
						<td>Nom de l'institut ou de l'organisme</td>
						<td class="generer">{{  $rapportDetaille['Bilan']->organisme}}</td>
						<td class="editable action"  data-var="organisme">
							<div class="btn pull-left">
								<a href="#" class="editBtn"><i class="fa fa-edit"></i></a>
								<a href="#" class="validBtn hide"><i class="fa fa-check"></i></a>
							</div>
							<div class="newValue pull-left">{{  $rapportDetaille['Rapport']->organisme}}</div>
						</td>
					</tr>
					<tr>
						<td>Nom du responsable de l’organisme ou de la personne ayant la plus haute autorité</td>
						<td class="generer">{{ $rapportDetaille['Bilan']->respoOrga  }}</td>
						<td class="editable action" data-var="respoOrga">
							<div class="btn pull-left">
								<a href="#" class="editBtn"><i class="fa fa-edit"></i></a>
								<a href="#" class="validBtn hide"><i class="fa fa-check"></i></a>
							</div>
							<div class="newValue pull-left">{{ $rapportDetaille['Rapport']->respoOrga  }}</div>
						</td>
					</tr>
					<tr>
						<td>Nom, fonction et contact du responsable de l’information</td>
						<td class="generer">{{  $rapportDetaille['Bilan']->respoInfo}}</td>
						<td class="editable action"  data-var="respoInfo">
							<div class="btn pull-left">
								<a href="#" class="editBtn"><i class="fa fa-edit"></i></a>
								<a href="#" class="validBtn hide"><i class="fa fa-check"></i></a>
							</div>
							<div class="newValue pull-left">{{  $rapportDetaille['Rapport']->respoInfo}}</div>
						</td>
					</tr>
					

				</table>
					
				<table class="table table-bordered " id="OrganismeInfo">
					<caption><b>Requête totalement satisfaite</b></caption>
					<thead>
						<tr>
							<th></th>
							<th>Valeur générée</th>
							<th>Valeur réelle</th>
						</tr>
					</thead>
					<tr>
						<td>Nombre de requêtes satisfaites totalement dans un délai de 15 jours</td>
						<td class="generer">{{ $rapportDetaille['Bilan']->reqSatisDelais1}}</td>
						<td class="editable action"  data-var="reqSatisDelais1">
							<div class="btn pull-left">
								<a href="#" class="editBtn"><i class="fa fa-edit"></i></a>
								<a href="#" class="validBtn hide"><i class="fa fa-check"></i></a>
								
							</div>
							<div class="newValue pull-left">{{$rapportDetaille['Rapport']->reqSatisDelais1}}</div>
						</td>
					</tr>
					<tr>
						<td>Nombre de requêtes satisfaites totalement dans un délai de 30 jours</td>
						<td class="generer">{{ $rapportDetaille['Bilan']->reqSatisDelais2}}</td>
						<td class="editable action" data-var="reqSatisDelais2">
							<div class="btn pull-left">
								<a href="#" class="editBtn"><i class="fa fa-edit"></i></a>
								<a href="#" class="validBtn hide"><i class="fa fa-check"></i></a>
							</div>
							<div class="newValue pull-left">{{$rapportDetaille['Rapport']->reqSatisDelais2}}</div>
						</td>
					</tr>
					<tr>
						<td>Nombre de requêtes satisfaites totalement hors délai légal</td>
						<td class="generer">{{ $rapportDetaille['Bilan']->reqSatisDelais3}}</td>
						<td class="editable action"  data-var="reqSatisDelais3">
							<div class="btn pull-left">
								<a href="#" class="editBtn"><i class="fa fa-edit"></i></a>
								<a href="#" class="validBtn hide"><i class="fa fa-check"></i></a>
							</div>
							<div class="newValue pull-left">{{$rapportDetaille['Rapport']->reqSatisDelais3}}</div>
						</td>
					</tr>
					<tr>
						<td>Motifs de la prorogation de délai</td>
						<td class="generer"><ul>@foreach(json_decode($rapportDetaille['Bilan']->reqSatisDelais3Motfif, true) as $value)
								<li>{{ $value['motifProrogation']}}</li><br>@endforeach</ul></td>
						<td class="editable action " >
							{{-- <div class="addRowDiv" style="background: gray; text-align: center;color: white;cursor: pointer;">
									<i class="fa fa-plus fa-2x"></i>
							</div> --}}
							@foreach($rapportDetaille['reqSatisDelais3MotfifData'] as $value)
							<div class="row one">
								<div class="btn col-sm-1">
									<a href="#" class="editBtn"><i class="fa fa-edit"></i></a>
									<a href="#" class="validBtn hide"><i class="fa fa-check"></i></a>
								</div >
								<div class="col-sm-11 data" data-ID="{{ $value['id']}}" data-var="reqSatisDelais3Motfif">
									{{-- <div class=""> --}}
										<div class=" pull-left">
											<ul>
												<li>
													<div class="newValue pull-left">{{ $value['reqSatisDelais3Motfif']}}</div> &nbsp;&nbsp;
													<a href="#" class="supBtn pull-left" style="color: red; margin-left: 10px" ><i class="fa fa-times"></i></a>
												</li>
											</ul>
									
										</div>
									{{-- </div> --}}
								</div>	
							</div>					
							@endforeach
						</td>
					</tr>
					
				</table>
				<table class="table table-bordered " id="OrganismeInfo">
					<caption><b>Requête partiellement satisfaite</b></caption>
					<thead>
						<tr>
							<th></th>
							<th>Valeur générée</th>
							<th>Valeur réelle</th>
						</tr>
					</thead>
					<tr>
						<td>Nombre de requêtes satisfaites partiellement dans un délai de 15 jours</td>
						<td class="generer">{{$rapportDetaille['Bilan']->reqPartSafDelais1}}</td>
						<td class="editable action"  data-var="reqPartSafDelais1">
							<div class="btn pull-left">
								<a href="#" class="editBtn"><i class="fa fa-edit"></i></a>
								<a href="#" class="validBtn hide"><i class="fa fa-check"></i></a>
							</div>
							<div class="newValue pull-left">{{$rapportDetaille['Rapport']->reqPartSafDelais1}}</div>
						</td>
					</tr>
					<tr>
						<td>Nombre de requêtes satisfaites partiellement dans un délai de 30 jours</td>
						<td class="generer">{{$rapportDetaille['Bilan']->reqPartSafDelais2}}</td>
						<td class="editable action" data-var="reqPartSafDelais2">
							<div class="btn pull-left">
								<a href="#" class="editBtn"><i class="fa fa-edit"></i></a>
								<a href="#" class="validBtn hide"><i class="fa fa-check"></i></a>
							</div>
							<div class="newValue pull-left">{{$rapportDetaille['Rapport']->reqPartSafDelais2}}</div>
						</td>
					</tr>
					<tr>
						<td>Nombre de requêtes satisfaites partiellement hors délai légal</td>
						<td class="generer">{{$rapportDetaille['Bilan']->reqPartSafDelais3}}</td>
						<td class="editable action"  data-var="reqPartSafDelais3">
							<div class="btn pull-left">
								<a href="#" class="editBtn"><i class="fa fa-edit"></i></a>
								<a href="#" class="validBtn hide"><i class="fa fa-check"></i></a>
							</div>
							<div class="newValue pull-left">{{$rapportDetaille['Rapport']->reqPartSafDelais3}}</div>
						</td>
					</tr>
					<tr>
						<td>Motifs de la progation de délai</td>
						<td class="generer">
							<ul>
								@foreach(json_decode($rapportDetaille['Bilan']->reqPartSafDelais3Motif, true) as $value)
								<li>{{ $value['motifProrogation']}}</li><br>
								@endforeach
							</ul>
						</td>
						<td class="editable action"  data-var="reqPartSafDelais3Motif" >
							@foreach($rapportDetaille['reqPartSafDelais3MotifData'] as $value)
							<div class="row one">
								<div class="btn col-sm-1">
									<a href="#" class="editBtn"><i class="fa fa-edit"></i></a>
									<a href="#" class="validBtn hide"><i class="fa fa-check"></i></a>
								</div >
								<div class="col-sm-11 data" data-ID="{{ $value['id']}}" data-var="reqPartSafDelais3Motif">
									{{-- <div class=""> --}}
										<div class=" pull-left">
											<ul>
												<li>
													<div class="newValue pull-left">{{ $value['reqPartSafDelais3Motif']}}</div> &nbsp;&nbsp;
													<a href="#" class="supBtn pull-left" style="color: red; margin-left: 10px" ><i class="fa fa-times"></i></a>
												</li>
											</ul>
									
										</div>
									{{-- </div> --}}
								</div>	
							</div>	
							@endforeach
						</td>
					</tr>
					
					
				</table>
				<table class="table table-bordered">
					<caption><b>Requêtes non satisfaites</b></caption>
					<thead>
					<tr>
						<th></th>
						<th>Valeur générée</th>
						<th>Valeur réelle</th>
					</tr>
					</thead>
					<tr>
						<td>Nombre de requêtes non satisfaites </td>
						<td class="generer">{{$rapportDetaille['Bilan']->nbreReqNonSatisf}}</td>
						<td class="editable action"  data-var="nbreReqNonSatisf" >
							<div class="btn pull-left">
								<a href="#" class="editBtn"><i class="fa fa-edit"></i></a>
								<a href="#" class="validBtn hide"><i class="fa fa-check"></i></a>
							</div>
							<div class="newValue pull-left"><div class="newValue pull-left">{{$rapportDetaille['Rapport']->nbreReqNonSatisf}}</div></div>
						</td>
					</tr>
					<tr>
						<td class="generer">Motifs invoqués de requêtes non satisfaites</td>
						<td class="editable action"  data-var="MotifReqNonSatisf" colspan="2">
							<div class="btn pull-left">
								<a href="#" class="editBtn"><i class="fa fa-edit"></i></a>
								<a href="#" class="validBtn hide"><i class="fa fa-check"></i></a>
							</div>
							<div class="newValue pull-left textarea"><div class="newValue pull-left">{{$rapportDetaille['Rapport']->MotifReqNonSatisf}}</div></div>
						</td>
					</tr>
				</table>

				<table class="table table-bordered " id="OrganismeInfo">
					<caption><b>Documents publiés</b></caption>
					<thead>
						<tr>
							<th></th>
							<th>Valeur générée</th>
							<th>Valeur réelle</th>
						</tr>
					</thead>
					<tr>
						<td>Nombre de documents publiés</td>
						<td class="generer">{{$rapportDetaille['Bilan']->nbreDocuPub}}</td>
						<td class="editable action"  data-var="nbreDocuPub">
							<div class="btn pull-left">
								<a href="#" class="editBtn"><i class="fa fa-edit"></i></a>
								<a href="#" class="validBtn hide"><i class="fa fa-check"></i></a>
							</div>
							<div class="newValue pull-left">{{$rapportDetaille['Rapport']->nbreDocuPub}}</div>
						</td>
					</tr>
					<tr>
						<td>Mode de publication</td>
						<td class="generer">{{$rapportDetaille['Bilan']->modPub}}</td>
						<td class="editable action" data-var="modPub">
							<div class="btn pull-left">
								<a href="#" class="editBtn"><i class="fa fa-edit"></i></a>
								<a href="#" class="validBtn hide"><i class="fa fa-check"></i></a>
							</div>
							<div class="newValue pull-left">
									{{$rapportDetaille['Rapport']->modPub}}
							</div>
						</td>
					</tr>
					
				</table>
				<table class="table table-bordered " id="OrganismeInfo">
					<caption><b>Modalité d'accès aux informations et documents</b></caption>
					<thead>
						<tr>
							<th colspan="2"></th>
							<th>Valeur générée</th>
							<th>Valeur réelle</th>
						</tr>
					</thead>
					<tr>
						<td rowspan="2">Consultation gratuite</td>
						<td>Communication totale </td>
						<td class="generer">{{$rapportDetaille['Bilan']->comTotalSurPlace}}</td>
						<td class="editable action"  data-var="comTotalSurPlace">
							<div class="btn pull-left">
								<a href="#" class="editBtn"><i class="fa fa-edit"></i></a>
								<a href="#" class="validBtn hide"><i class="fa fa-check"></i></a>
							</div>
							<div class="newValue pull-left">{{$rapportDetaille['Rapport']->comTotalSurPlace}}</div>
						</td>
					</tr>
					<tr>
						<td>Communication partielle </td>
						<td class="generer">{{$rapportDetaille['Bilan']->comPartielSurPlace}}</td>
						<td class="editable action"  data-var="comPartielSurPlace">
							<div class="btn pull-left">
								<a href="#" class="editBtn"><i class="fa fa-edit"></i></a>
								<a href="#" class="validBtn hide"><i class="fa fa-check"></i></a>
							</div>
							<div class="newValue pull-left">{{$rapportDetaille['Rapport']->comPartielSurPlace}}</div>
						</td>
					</tr>
					<tr><td colspan="5"></td></tr>

					<tr>
						<td rowspan="2">Courier électronique</td>
						<td>Communication totale  </td>
						<td class="generer">{{$rapportDetaille['Bilan']->comTotalMail}}</td>
						<td class="editable action"  data-var="comTotalMail">
							<div class="btn pull-left">
								<a href="#" class="editBtn"><i class="fa fa-edit"></i></a>
								<a href="#" class="validBtn hide"><i class="fa fa-check"></i></a>
							</div>
							<div class="newValue pull-left">{{$rapportDetaille['Rapport']->comTotalMail}}</div>
						</td>
					</tr>
					<tr>
						<td>Communication partielle </td>
						<td class="generer">{{$rapportDetaille['Bilan']->comPartielMail}}</td>
						<td class="editable action"  data-var="comPartielMail">
							<div class="btn pull-left">
								<a href="#" class="editBtn"><i class="fa fa-edit"></i></a>
								<a href="#" class="validBtn hide"><i class="fa fa-check"></i></a>
							</div>
							<div class="newValue pull-left">{{$rapportDetaille['Rapport']->comPartielMail}}</div>
						</td>
					</tr>
					<tr><td colspan="4"></td></tr>

					<tr>
						<td rowspan="2">Sur papier</td>
						<td>Communication totale</td>
						<td class="generer">{{$rapportDetaille['Bilan']->comTotalPapier}}</td>
						<td class="editable action"  data-var="comTotalPapier">
							<div class="btn pull-left">
								<a href="#" class="editBtn"><i class="fa fa-edit"></i></a>
								<a href="#" class="validBtn hide"><i class="fa fa-check"></i></a>
							</div>
							<div class="newValue pull-left">{{$rapportDetaille['Rapport']->comTotalPapier}}</div>
						</td>
					</tr>
					<tr>
						<td>Communication partielle</td>
						<td class="generer">{{$rapportDetaille['Bilan']->comPartielPapier}}</td>
						<td class="editable action"  data-var="comPartielPapier">
							<div class="btn pull-left">
								<a href="#" class="editBtn"><i class="fa fa-edit"></i></a>
								<a href="#" class="validBtn hide"><i class="fa fa-check"></i></a>
							</div>
							<div class="newValue pull-left">{{$rapportDetaille['Rapport']->comPartielPapier}}</div>
						</td>
					</tr>
					<tr><td colspan="4"></td></tr>
					<tr>
						<td rowspan="2"> Redirigé vers le site de l'OP</td>
						<td>Communication totale </td>
						<td class="generer">{{$rapportDetaille['Bilan']->comTotalSiteWeb}}</td>
						<td class="editable action"  data-var="comTotalSiteWeb">
							<div class="btn pull-left">
								<a href="#" class="editBtn"><i class="fa fa-edit"></i></a>
								<a href="#" class="validBtn hide"><i class="fa fa-check"></i></a>
							</div>
							<div class="newValue pull-left">{{$rapportDetaille['Rapport']->comTotalSiteWeb}}</div>
						</td>
					</tr>
					<tr>
						<td>Communication partielle</td>
						<td class="generer">{{$rapportDetaille['Bilan']->comPartielSiteWeb}}</td>
						<td class="editable action"  data-var="comPartielSiteWeb">
							<div class="btn pull-left">
								<a href="#" class="editBtn"><i class="fa fa-edit"></i></a>
								<a href="#" class="validBtn hide"><i class="fa fa-check"></i></a>
							</div>
							<div class="newValue pull-left">{{$rapportDetaille['Rapport']->comPartielSiteWeb}}</div>
						</td>
					</tr>
					<tr><td colspan="4"></td></tr>
					<tr>
						<td rowspan="2">via d'autres supports (CD, clé USB, etc.)</td>
						<td>Communication totale </td>
						<td class="generer">{{$rapportDetaille['Bilan']->comTotalAutre}}</td>
						<td class="editable action"  data-var="comTotalAutre">
							<div class="btn pull-left">
								<a href="#" class="editBtn"><i class="fa fa-edit"></i></a>
								<a href="#" class="validBtn hide"><i class="fa fa-check"></i></a>
							</div>
							<div class="newValue pull-left">{{$rapportDetaille['Rapport']->comTotalAutre}}</div>
						</td>
					</tr>	
					<tr>
						<td>Communication partielle </td>
						<td class="generer">{{$rapportDetaille['Bilan']->comPartielAutre}}</td>
						<td class="editable action"  data-var="comPartielAutre">
							<div class="btn pull-left">
								<a href="#" class="editBtn"><i class="fa fa-edit"></i></a>
								<a href="#" class="validBtn hide"><i class="fa fa-check"></i></a>
							</div>
							<div class="newValue pull-left">{{$rapportDetaille['Rapport']->comPartielAutre}}</div>
						</td>
					</tr>					
				</table>
				<table class="table table-bordered " id="OrganismeInfo">
					<caption><b>Qualité des demandeurs</b></caption>
					<thead>
						<tr>
							<th></th>
							<th>Valeur générée</th>
							<th>Valeur réelle</th>
						</tr>
					</thead>
					@foreach($rapportDetaille['Secteur'] as $value)
					<tr>
						<td>{{ $value->secteur }}</td>
						<td class="generer">{{ $value->total }}</td>
						<td class="editable action" data-var="autre">
							<div class="btn pull-left">
								<a href="#" class="editBtn"><i class="fa fa-edit"></i></a>
								<a href="#" class="validBtn hide"><i class="fa fa-check"></i></a>
							</div>
							<div class="newValue pull-left">{{ $value->total }}</div>
						</td>
					</tr>	
					@endforeach			
				</table>
				<table class="table table-bordered " id="OrganismeInfo">
					<caption>OBSERVATIONS ET COMMENTAIRES PARTICULIERS</caption>
					<tbody>
						<tr>
							<td class="editable action" data-var="commentaire" colspan="3">
								<div class="btn pull-left">
									<a href="#" class="editBtn"><i class="fa fa-edit"></i></a>
									<a href="#" class="validBtn hide"><i class="fa fa-check"></i></a>
								</div>
								<div class="newValue textarea pull-left">{{ $rapportDetaille['Rapport']->commentaire }}</div>
							</td>
						</tr>
					</tbody>
					
				</table>
			</div>
			<div class="panel-footer">
				<div class="panel-title">
					 <div class="pull-right" style="float: right;">
						<a href="{{ route('imprimerRapport', 'previsualiser') }}" target="_blank" class="btn btn-primary btn-rounded"><i class="fa fa-search-plus"></i> Prévisualiser</a>
						<a href="{{ route('imprimerRapport') }}" class="btn btn-info btn-rounded"><i class="fa fa-download"></i> Télécharger le rapport</a>
					</div>   
				</div>
			</div>
		</div>
	</div>
</div>
<br><br>
@stop


@section('css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/datepicker/0.6.5/datepicker.css">
@stop
@section('js')
	<script type="text/javascript" src="{{ asset('admin') }}/js/plugins/bootstrap/bootstrap-datepicker.js"></script>
	<script type="text/javascript">
		$(document).on("focusin","input[class=date]", function () {
	        $(this).datepicker({
	            autoclose: true,
	            format: 'yyyy-mm-dd'
	        });
	    });
		function motifProrogationFunction(f){
			var parent = f.parent().parent(),
				value = parent.find("div li").find('.newValue').text(),
				name  =  parent.find('div.data').attr('data-var'),
				id  =  parent.find('div.data').attr('data-ID');
				btnChange(parent);
				parent.find(".newValue").empty().html("<input type='text' value='"+value+"' class='form-control' name='"+name+"'><input type='hidden' value='"+id+"' class='form-control' name='id'>");
				
			return false;
		}

		function motifProrogationValide(f){
			var parent = f.parent().parent();
			btnChange(parent, 1);
			var value = parent.find(".newValue input").val();
			// sendForm($(document).find(parent).find(":input").serialize());

			console.log($(document).find(parent).find(":input").serialize());
			sendFormMotif($(document).find(parent).find(":input").serialize());
										
			parent.find(".newValue input").remove();
			parent.find(".newValue").html(value);
			return false;
		}
		// $(".addRowDiv").click(function(){
		// 	var parent = $(this).parent();
		// 	var append = "<div class='row one'>";
		// 		append += "<div class='btn col-sm-1'>";
		// 		append += '<a href="#" class="editBtn hide"><i class="fa fa-edit"></i></a>';
		// 		append += '<a href="#" class="validBtn "><i class="fa fa-check"></i></a>';
		// 		append += "</div>";
		// 		append += '<div class="col-sm-11 data" data-var="reqSatisDelais3Motfif">';
		// 		append += '<div class=" pull-left">';
		// 		append += '<ul>';
		// 		append += '<li>';
		// 		append += '<div class="newValue pull-left">';
		// 		append += '<input type="text" value="" class="form-control" name="name">';
		// 		append += "</div>";
		// 		append += '<a href="#" class="supBtn pull-left" style="color: red; margin-left: 10px" ><i class="fa fa-times"></i></a>';
		// 		append += "</li>";
		// 		append += "</ul>";
		// 		append += "</div>";
		// 		append += "</div>";
		// 		parent.append(append);
		// 		console.log(append);
		// });

		$(".supBtn").each(function(){
			$(this).click(function(){
				var parent = $(this).parent().parent().parent().parent().parent(),
				id  =  parent.find('div.data').attr('data-ID');
				Swal.fire({
				  	title: 'Confirmer',
					text: "Voulez-vous vraiment supprimer ?",
					type: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Supprimer',
					cancelButtontext: 'Annuler',
					customClass: {
					  popup: 'animated bounce'
					}
					}).then((result) => {
					if (result.value) {
					    $.get('supprimer-motif/'+id,  function(data){
					    parent.remove();
						$.notify('Suppression Effectuer avec success');
			});
					}
				});
					return false;
			});
		});



		var date = "<input type='text' class='date' placeholder='Selectionner une date'>";
		$('.editBtn').each(function(){
			$(this).click(function(){
				if($(this).parent().parent().hasClass('one')){
					return motifProrogationFunction($(this));
				}

				var parent = $(this).parent().parent().parent();
					btnChange(parent);
					parent.find('.editable').each(function(){
						var value = $.trim($(this).find(".newValue").text()),
							name  =  parent.find('.editable').data('var');
							if(parent.find('.textarea').hasClass('newValue')){
								$(this).find(".newValue").empty().html("<textarea rows='5' cols='90' class='form-control' name='"+name+"'>"+value+"</textarea>");
							}else if(parent.find('.dateInput').hasClass('newValue')){
								$(this).find(".newValue").empty().html(date);
							}else{
								$(this).find(".newValue").empty().html("<input type='text' value='"+value+"' class='form-control' name='"+name+"'>");
							}
					});
				return false;
				
			});
		});
		$('.validBtn').each(function(){
			$(this).click(function(){

				if($(this).parent().parent().hasClass('one')){
					return motifProrogationValide($(this));
				}

				var parent = $(this).parent().parent().parent();
				var valeur = parent.find(':input').val();
					generer = parent.find('.generer').text();
				if(valeur!=""){
					if(Number(generer)){
						if(!Number(valeur)){
							$.notify("Veuillez saisir un nombre", "error");
							return false;
						}else{
							btnChange(parent, 1);
							if(parent.find('.textarea').hasClass('newValue')){
								var value = parent.find(".editable .newValue textarea").val();
								sendForm($(document).find(parent).find(":input").serialize());
								parent.find(".editable .newValue textarea").remove();
							}else{
								var value = parent.find(".editable .newValue input").val();
								sendForm($(document).find(parent).find(":input").serialize());
								parent.find(".editable .newValue input").remove();
							}							
							// sendForm($(document).find(parent).find(":input").serialize());
							verifvalue(parent, generer, valeur);
							parent.find(".editable .newValue").text(value);
						}
					}else
					{
						btnChange(parent, 1);
						if(parent.find('.textarea').hasClass('newValue')){
								var value = parent.find(".editable .newValue textarea").val();
							sendForm($(document).find(parent).find(":input").serialize());
							parent.find(".editable .newValue textarea").remove();
							}else{
								var value = parent.find(".editable .newValue input").val();
							sendForm($(document).find(parent).find(":input").serialize());
							parent.find(".editable .newValue input").remove();
							}
						parent.find(".editable .newValue").text(value);
					}
					
				}else{
					$.notify("Veuillez renseigner ce champ", "error");
				}
					return false;
			});
		});

		function verifvalue(parent, generer, valeur){
			if(generer>valeur){
				var t = parent.find('td');
				t.each(function(){
					if($(this).attr('data-var')){
						t.attr('title', 'La valeur générée ne peut être supérieure à la valeur réelle');
					}
				})
				parent.find(".newValue").parent().addClass('error');
			}else{
				if(parent.find('.error')){
					var t = parent.find('td');
					t.each(function(){
						if($(this).attr('data-var')){
							t.attr('title', '');
						}
					})
					parent.find('.error').removeClass('error');
				}
			}
		}

		function btnChange(f, value=null){
			if(value==null){
				f.find(".editBtn").addClass('hide');
				f.find(".validBtn").removeClass('hide');
			}else{
				f.find(".validBtn").addClass('hide');
				f.find(".editBtn").removeClass('hide');
			}
		}
		function sendFormMotif(f){
			crf();
			$.post('modifier-rapport-motif', f, function(data){
				if(typeof data == 'string'){
					if(data=='ok'){
							$.notify("Modfication effectuée avec succès !", "success");
					}else{
						var m = JSON.parse(data);
						if(m.error=true){
							$.notify(m.message, "error");
						}else{
							$.notify("Modfication effectuée avec succès !", "success");
						}
					}
				}
			});
		}

		function sendForm(f){
			crf();
			$.post('modifier-rapport', f, function(data){
				if(typeof data == 'string'){
					if(data=='ok'){
							$.notify("Modfication effectuée avec succès !", "success");
					}else{
						var m = JSON.parse(data);
						if(m.error=true){
							$.notify(m.message, "error");
						}else{
							$.notify("Modfication effectuée avec succès !", "success");
						}
					}
				}
			});
		}

		function crf(){
			jQuery.ajaxSetup({
	          	headers: {
	            	'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
	          	}
	      	});
		}

		$(document).on('keyup', '.newValue input', function(e){
			if(e.keyCode===13){
				$(this).parent().parent().find('.validBtn').trigger('click');
			}
		});
		checkError();
		function checkError(){
			$(".generer").each(function(){
				var parent = $(this).parent(),
					generer = $(this).text(),
					valeur = parent.find(".newValue").text();
				if(generer!=""){
					if(Number(generer)){
						if(Number(valeur)){
							verifvalue(parent, generer, valeur);
						}
					}
				}
			});
		}




	</script>

@stop

