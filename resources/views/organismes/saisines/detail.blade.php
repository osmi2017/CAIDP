@inject("Globals", "App\Tools\Globals")
@inject("DateRewrite","App\Tools\DateRewrite")
@inject("PrivillegeBtn", "App\PrivillegeBtn")
@extends('layouts.admin')

@section('content')
<style type="text/css">
	/*.iframe a, .iframe iframe{
		display: inline-block;
		float: left;
	}*/
	.iframe a{
		margin-right: 20px !important;
		;
	}
	.label-info{
		background: green;
	}
	.label-warning{
		background: orange;
	}
	.label-danger{
		background: red;
	}
	ul.iframeData li{
		display: inline-block;
		margin-right: 15px;
	}
</style>

<div class="row">
	<div class="col-sm-8">
		<div class="panel panel-info">
			<div class="panel-heading">
				<div class="panel-title">Détail saisine</div>
			</div>
			<div class="panel-body">
			<table class="table table-bordered">
				<tr>
					<td colspan="2" class="text-center">
						<h3 style="color: blue;font-weight: 600">
							{{ $Saisine->motif }}

						</h3>
							<h5>{{ $Saisine->demande->libelle }}</h5>
						<h4>Etat de la Demande {{ $Globals->State($Saisine->etat, count($Saisine->facilitation)>0 ? true : null , count($Saisine->contentieu) >0 ? true : null) }}</h4>
					</td>
				</tr>
				
				<tr>
					<th>Numéro de la saisine</th>
					<td style="color: orange; font-weight: 700">{{ $Saisine->numSaisine }}</td>

				</tr>
				<tr>
					<th>Numéro de la demande</th>
					<td style="color: red; font-weight: 700">{{ $Saisine->demande->numDemande }}
						<a href="{{ url('demande/ajouter-une-demande/'.$Saisine->demande->id) }}">Voir la demande</a>
					</td>

				</tr>
				
				<tr>
					<th>Organisme concerné</th>
					<td>{{ $organisme->organisme }}</td>

				</tr>
				<tr>
					<th>Date de soumission</th>
					 <td> {{ $DateRewrite->dateTimeFrancais($Saisine->created_at) }} </td>
				</tr>
				<tr>
					<th> Courier de saisine</th>
					<td colspan="" class="text-center">
						@if($Saisine->autosaisine==1)
						<div class="iframe">
							<iframe src="{{ asset($Globals->Saisine_Path().$Globals->genererDecisonPDF($Saisine->motif, $Saisine->created_at, $Saisine->id.'.pdf'))}}"></iframe>
							<br>
							<a class="button default grownup"><i class="fa fa-search"></i> Agrandir</a>
							<a class="button" download="" href="{{ $Globals->Saisine_Path().$Globals->genererDecisonPDF($Saisine->motif, $Saisine->created_at, $Saisine->id.'.pdf')}}"><i class="fa fa-download"></i> Télécharger</a>
						</div>
						@else
						<p>
							{!! $Saisine->description !!}
						</p>
						@endif
					</td>
				</tr>
				<tr>
					<th>Saisine enregistrée par</th>
					<td>
						{{ $Globals->auteurSaisine($Saisine->auteurSaisine, $Saisine->demande->requerant->nom." ".$Saisine->demande->requerant->prenom, $Saisine->demande->organisme->organisme) }}
					</td>
				</tr>
				<tr>
					<th>Auteur de la saisine</th>
					<td>
					{{ $Globals->CheckAutosaisine($Saisine->autosave, $Saisine->savebycaidp, $Saisine->savebyorganisme ) }}
					</td>
				</tr>

				
			</table>
			</div>
		</div>
	</div>
	{{-- {{ dd($Saisine->decisioncaipdp->decisioncaipdpsfile) }} --}}
	<div class="col-sm-4">
		<div class="panel panel-info">
			<div class="panel-heading">
				<div class="panel-title">Réponse de la CAIDP</div>
			</div>
			<div class="panel-body">
			
				@if($Saisine->facilitation->count()>0)
				
				<h1>facilitations:</h1>
				<ul class="iframeData">
				
				@foreach($Saisine->facilitation as $facilitation)	
				<li> {{ $facilitation-> actionFacilitation }}  <button class="openModal btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="openModal({{ $facilitation }},{{ $docFacilitations }})">Voir</button><br><br></li>
				

				@endforeach
				</ul>
                @endif
				
				@if($Saisine->contentieu->count()>0)
				
				<h1>contentieus:</h1>
				<ul class="iframeData">
				
				@foreach($Saisine->contentieu as $contentieu)	
				<li> {{ $contentieu-> actionContentieu }}  <button class="openModal btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="openModal1({{ $contentieu }},{{ $doccontentieus  }},{{ auth()->id() }})">Voir</button></li>
				

				@endforeach
				</ul>
                @endif
				
			</div>
			<div class="modal fade bd-example-modal-xl" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
       <div class="modal-body">
      <label for ="date">Date:</label>
        <div id="date" class="form-control"></div>
        <label for ="actionFacilitation">Action:</label>
        <div id="actionFacilitation" class="form-control"></div>
        <label for ="suite">Suite:</label>
        <div class="form-control" id="suite"></div>
        <li>
            <a href="#" title="Zoomer" class="ZoomerIframe"><i class="fa fa-search-plus" ></i>Zoomer</a>
            <br>
            <a id="doc" src="" width="200"></a> <br>
            
        </li>
        
                    <div id="contentieu_reponse">
                    <div class="row" id="msg">
                    <div class="col-md-12 offset-md-3 chat" id="chat">
					
        @if($messages)
		
        @foreach($messages as $message)

            @if($message->user_id == auth()->user()->id)
                <div class="message-bubble sender">
                <span class="label2">{{ $message->created_at }}</span>
                    {{ $message->message }}
                    <span class="label1">Vous</span>
                </div>
               
            @else
                <div class="message-bubble receiver">
                <span class="label2">{{ $message->created_at }}</span>
                    {{ $message->message }}
                    <span class="label1">CAIDP</span>
                </div>
                
            @endif
        @endforeach
        @endif
    </div>
</div>

                    <form id="messageForm">
                    <input id="user_id"/>
                    <input id="contentieu_id"/>
					<input id="caidp_id" value="0"/>
                    <label for ="reponse">Tapez le message ici:</label>
                    <textarea class="form-control" id="reponse" rows="3"></textarea><br>
                    <button type="submit" id="envoyer_reponse" class="btn btn-success float-right">Envoyer reponse</button>
                    </form>
                   </div>	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" >Fermer</button>
        
        
      </div>
    </div>
  </div>
</div>
			<div class="panel-body">
			@if($Saisine->decisioncaipdp && $Saisine->decisioncaipdp->etat==1 &&  count($Saisine->decisioncaipdp->decisioncaipdpsfile)>0)
				<ul class="iframeData">
				@foreach($Saisine->decisioncaipdp->decisioncaipdpsfile as $value)
				<li>
							@if($value->nomFichier)
							{{ $value->nomFichier }} <br>
							@endif
					<iframe src="{{ asset("/decisionFile/".$value->file) }}"></iframe>
							<br>
							<a class="button default grownup" href="#"><i class="fa fa-search"></i> Agrandir</a>
							<a class="button" download="" href="{{ asset('decisionFile/'.$value->file) }}"><i class="fa fa-download"></i> Télécharger</a>

				</li>
				<br>
				<hr>
				@endforeach
				</ul>


			@else
				<h2 class="text-center">Aucune réponse disponible </h2>	
			@endif
			</div>
		</div>
	</div>
</div>

<br><br><br>
<br><br><br>
<br><br><br>

@stop



@section('overlay')
<div class="overLay">
	<div class="fermerOverLay"> <i class="fa fa-times"></i> Fermer </i></div>
	<div class="contentOverLay"></div>
</div>
@stop

    <script>
       function openModal(facilitation, docfacilitation){
               //alert(facilitation.actionFacilitation );
			   document.getElementById("actionFacilitation").innerText=facilitation.actionFacilitation ;
			   document.getElementById("suite").innerHTML=facilitation.suite ;
			   document.getElementById("date").innerHTML=facilitation.dateFacilitation ;
			   var image = document.getElementById('doc');
			   //console.log(docfacilitation[0].document);
			   var assetUrl = "{{ asset('/docfacilitation/') }}" + '/' + docfacilitation[0].document	;
			   image.src = assetUrl;
			   document.getElementById("contentieu_reponse").style.display = "none";
			   document.getElementById("envoyer_reponse").style.display = "bone";
	   } 

	   function openModal1(contentieu, docontentieu, id){
               //alert(facilitation.actionFacilitation );
			   
			   document.getElementById("actionFacilitation").innerText=contentieu.actionContentieu ;
			   document.getElementById("suite").innerHTML=contentieu.argument;
			   document.getElementById("date").innerHTML=contentieu.dateContentieux ;
			   var image = document.getElementById('doc');
			   var assetUrl = "{{ asset('/docContentieu/') }}" + '/' + docontentieu[0].document	;
			   image.src = assetUrl;
               document.getElementById("contentieu_reponse").style.display = "initial";
			   document.getElementById("envoyer_reponse").style.display = "initial";
			   document.getElementById("user_id").value= id;
			   document.getElementById("contentieu_id").value= contentieu.id;
			   
	   } 
    </script>
