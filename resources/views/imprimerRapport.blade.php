<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
{{-- <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/bootstrap/bootstrap.min.css') }}"> --}}

<style type="text/css">
	.main{
		/*font-size: 24px !important;*/
	}
.bold{
font-weight: bold;
}
.table {
border-collapse: collapse !important;
}
.table td,
.table th {
background-color: #fff !important;
text-align: left !important;
}
.table-bordered th,
.table-bordered td {
border: 1px solid #ddd !important;
}
.table {
  width: 100%;
  max-width: 100%;
  margin-bottom: 1rem;
  background-color: transparent;
}

.table th,
.table td {
  padding: 0.5rem;
  vertical-align: top;
  border-top: 1px solid #e9ecef;
}

.table thead th {
  vertical-align: bottom;
  border-bottom: 2px solid #e9ecef;
}

.table tbody + tbody {
  border-top: 2px solid #e9ecef;
}

.table .table {
  background-color: #fff;
}
.text-center, td.text-center, th.text-center{
	text-align: center !important;
}

h1, h2, h3, h4, h5, h6 {
  margin-top: 0;
  margin-bottom: .5rem;
}
h1, h2, h3, h4, h5, h6,
.h1, .h2, .h3, .h4, .h5, .h6 {
  margin-bottom: 0.5rem;
  font-family: inherit;
  font-weight: 500;
  line-height: 1.1;
  color: inherit;
}

h1, .h1 {
  font-size: 1.5rem;
}

h2, .h2 {
  font-size: 2rem;
}

h3, .h3 {
  font-size: 1.2rem;
}

h4, .h4 {
  font-size: 1rem;
}

h5, .h5 {
  font-size: 1.25rem;
}

h6, .h6 {
  font-size: 1rem;
}
td.subtitle{
	background: olive !important;
	color: white;
	text-align: center !important;
	font-weight: bold !important;
}
.page-break {
    page-break-after: always;
}
.intitule{
	margin-top: 500px;
	background: orange;
	padding: 25px;
	color: white;
	font-size: 52px !important;
	font-weight: bold;
	/*border: solid 10px #999;*/
	box-shadow: 20px 20px 10px  #000;
}
img{
	width: 300px;
}
.left{
	float: left;
}
.right{
	float: right;
}
#organismeName{
	text-align: center;
}
#header{
	position: absolute;
}
#footer{
	bottom: 0px !important;
	position: absolute;
	text-align: center !important;
	width: 100%;
	margin: auto;
	padding: auto;
	font-size: 23px !important; 
}
</style>



<div class="text-center main" style="background: white">

<div id="header">
	<div class="left">
		@if($logo)
	    	<img src="{{ public_path('images/').$logo }}" alt="Logo"> <br>
		@endif
		<span id="organismeName">{{ $Rapport->organisme }}</span>
	</div>
	<div class="right text-center">
		<b>République de Côte d'Ivoire <br>
			Union - Discipline - Travail <br>
			--------------------
		</b>
	</div>
</div>
<div class="intitule text-center">
	{{ $Rapport->intitule }}
</div>
<div id="footer" class="text-center">
	<span id="">{{ $Rapport->organisme }}</span> <br>
	{{ $User['organisme']->siege }} - Tel : {{ $User['organisme']->contact }} 
		@php 
			$autrecontact = json_decode($User['organisme']->autrecontact, true); 
		@endphp
		@if($autrecontact['contact']!=null)
			@foreach($autrecontact['contact'] as  $value)
			{{ "/ ".$value }}
			@endforeach
		@endif
	- Email : {{ $User['organisme']->email }} 
		@if($autrecontact['email']!=null)
			@foreach($autrecontact['email'] as $value)
			{{ "/ ".$value }}
			@endforeach
		@endif
</div>
<div class="page-break"></div>



<h1 class="bold"><u>Première Partie</u></h1>
<h3 class="bold">L’institution ou l’organisme</h3>
<table class="table table-bordered">
	<tr>
		<td>1. Nom de l’institution ou de l’organisme</td>
		<td>{{ $Rapport->organisme }}</td>
	</tr>
	<tr>
		<td>2. Nom du responsable de l’organisme ou de la personne ayant la plus haute autorité</td>
		<td>{{ $Rapport->respoOrga }}</td>
	</tr>
	<tr>
		<td>3. Nom, fonction et contact du responsable de l’information</td>
		<td>{{ $Rapport->respoInfo }}</td>
	</tr>
</table>

<h1 class="bold"><u>Deuxième Partie</u></h1>
<h3 class="bold">L’institution ou l’organisme</h3>
<h4 style="color: red" class="bold"><u>Période visée par le présent rapport : 01 Janvier {{ date("Y") }} Au 31 Décembre {{ date("Y") }} </u></h4>

<table class="table table-bordered">
	<thead>
		<tr>
			<th class="text-center">INTITULE</th>
			<th  class="text-center" colspan="3">RÉPONSES</th>
		</tr>
	</thead>
	<tbody>
		<tr class="subtitle">
			<td colspan="4" class="subtitle text-center">1. Demandes traitées</td>
		</tr>
		<tr>
			<td></td>
			<td>Dans un délai maximum de 15 jours</td>
			<td>Dans un délai maximum de 30 jours</td>
			<td>Hors délai (15 ou 30 jours) et motifs de la prorogation de délai</td>
		</tr>
		<tr>
			<td>
				1.1 Nombre de requêtes satisfaites totalement (tous les documents demandés ont été communiqués sans exceptions ou retentions)
			</td>
			<td>{{ $Rapport->reqSatisDelais1 }}</td>
			<td>{{ $Rapport->reqSatisDelais2 }}</td>
			<td>
				<ul>					
					{{ $Rapport->reqSatisDelais3 }}<br>
					@foreach($Motifrapport as $key => $value)
					{{-- @if($key == 'reqSatisDelais3Motfif') --}}
					<li>{{ $value->reqSatisDelais3Motfif }}</li>
					{{-- @endif --}}
					@endforeach
				</ul>
			</td>

		</tr>
		<tr>
			<td>
				1.2 Nombre de requêtes satisfaites partiellement (seule une partie des documents demandés a été communiquée)
			</td>
			<td>{{ $Rapport->reqPartSafDelais1 }}</td>
			<td>{{ $Rapport->reqPartSafDelais2 }}</td>
			<td>
				<ul>					
					{{ $Rapport->reqSatisDelais3 }}<br>
					@foreach($Motifrapport as $key => $value)
					{{-- @if($key == 'reqPartSafDelais3Motif') --}}
					<li>{{ $value->reqPartSafDelais3Motif }}</li>
					{{-- @endif --}}
					@endforeach
				</ul>
			</td>

		</tr>
		<tr>
			<td>
				1.3 Nombre de requêtes non satisfaites et Motifs invoqués
			</td>
			<td colspan="3">
				{{ $Rapport->nbreReqNonSatisf }} <br>
				{{ $Rapport->MotifReqNonSatisf }}
			</td>

		</tr>
		<tr class="subtitle">
			<td colspan="4" class="subtitle text-center">2. Documents publiés</td>
		</tr>
		<tr>
			<td>2.1 Nombre de documents publiés</td>
			<td colspan="3">{{ $Rapport->nbreDocuPub }}</td>
		</tr>
		<tr>
			<td>2.2 Mode de publication (Site web/ tableau d’informations, etc)</td>
			<td colspan="3">{{ $Rapport->modPub }}</td>
		</tr>
		
		
	</tbody>
</table>
{{-- <div class="page-break"></div> --}}
<div class="text-center bold"><u>MODALITÉS D’ACCÈS AUX INFORMATIONS ET DOCUMENTS</u></div>
<br>
<table class="table table-bordered">
	<tr>
		<td rowspan="2"></td>
		<td colspan="5"  class="text-center">Identifier le nombre</td>
	</tr>
	<tr>
		<td>Consultation gratuite sur place</td>
		<td>Courrier électronique</td>
		<td>Papier</td>
		<td>Redirection vers le site web de l’OP</td>
		<td>Autres (Clé-USB-CD-ROM...)</td>
	</tr>
	<tr>
		<td>1. Communication totale</td>
		<td>{{ $Rapport->comTotalSurPlace }}</td>
		<td>{{ $Rapport->comTotalMail }}</td>
		<td>{{ $Rapport->comTotalPapier }}</td>
		<td>{{ $Rapport->comTotalSiteWeb }}</td>
		<td>{{ $Rapport->comTotalAutre }}</td>
	</tr>
	<tr>
		<td>2. Communication partielle</td>
		<td>{{ $Rapport->comPartielSurPlace }}</td>
		<td>{{ $Rapport->comPartielMail }}</td>
		<td>{{ $Rapport->comPartielPapier }}</td>
		<td>{{ $Rapport->comPartielSiteWeb }}</td>
		<td>{{ $Rapport->comPartielAutre }}</td>
	</tr>
	<tr>
		<td>Total</td>
		<td>{{ $Rapport->comTotalSurPlace + $Rapport->comPartielSurPlace }}</td>
		<td>{{ $Rapport->comTotalMail + $Rapport->comPartielMail }}</td>
		<td>{{ $Rapport->comTotalPapier + $Rapport->comPartielPapier }}</td>
		<td>{{ $Rapport->comTotalSiteWeb + $Rapport->comPartielSiteWeb }}</td>
		<td>{{ $Rapport->comTotalAutre + $Rapport->comPartielAutre }}</td>
	</tr>
	
</table>


<div class="text-center bold"><u>OBSERVATIONS ET COMMENTAIRES PARTICULIERS</u></div>
<br>
<div style="text-align: justify !important; text-indent: 100px">
	{{ $Rapport->commentaire }}
</div>
<br><br><br>
<div style="float: right;">
	Fait à {{ $Rapport->lieu ?$Rapport->lieu : "Abidjan" }} le {{ $date }} <br><br>

	Le resposable de l'Information
</div>

<br>

</div>

</body>
</html>