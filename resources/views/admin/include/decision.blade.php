<div class="clearfix">
    <a href="#" class="btn btn-success  editBtn pull-left btn-lg waves-effect" >Modifier</a>
    <a href="#" class="btn btn-danger  endBtn pull-left btn-lg waves-effect" style="margin-left: 10px" >Finaliser</a>
    <a href="#" class="btn btn-info pull-right btn-lg next waves-effect"><i class="fa fa-chevron-left"></i> Précédent  </a>                               
</div>
<hr>
<table class="table table-striped">
    <tr>
        <th>Type de décision</th>
        <td>{{ $Saisine->decisioncaipdp->typeDecision }}</td>
    </tr>
    <tr>
        <th>Email de notification</th>
        <td>{{ $Saisine->demande->requerant->nom." ".$Saisine->demande->requerant->prenom }}</td>
    </tr>
    <tr>
        <th>Documents joints</th>
        <td>
            <ul class="iframeData text-center">
                
            @foreach($Saisine->decisioncaipdp->decisioncaipdpsfile as $value)
                <li>
                    <a href="#" title="Zoomer" class="ZoomerIframe"><i class="fa fa-search-plus" ></i>Zoomer</a>
                    <br>
                    <iframe src="{{ asset("/decisionFile/".$value->file) }}" width="200"></iframe> <br>
                    <span class="renameFile" data-type="decision" contenteditable="" id="{{ $value->id }}" data-default="Nommer le fichier" data-change="{{ $value->nomFichier ? 1 : 0 }}">{{ $value->nomFichier ? $value->nomFichier : "Renommer le fichier ici" }}</span> <br>
                    <a href="#" class="archived" id="{{ $value->id }}" data-archive="{{ $value->archived }}">
                    </a>
                        <a href="#" class="trashFichier" data-saisineID="{{$Saisine->id}}" id="{{$value->id}}"><i class="fa fa-trash fa-2x text-danger"></i></a>
                </li>   
            @endforeach
            </ul>
        </td>
    </tr>
    
</table>