<hr>
<ul class="iframeData text-center">
@foreach($Saisine->decisioncaipdp->decisioncaipdpsfile as $value)
    <li>
        <a href="#" title="Zoomer" class="ZoomerIframe"><i class="fa fa-search-plus" ></i>Zoomer</a>
        <br>
        <iframe src="{{ asset("/decisionFile/".$value->file) }}" width="200"></iframe> <br>
        <span class="renameFile" data-type="decision" contenteditable="" id="{{ $value->id }}" data-default="Nommer le fichier" data-change="{{ $value->nomFichier ? 1 : 0 }}">{{ $value->nomFichier ? $value->nomFichier : "Renommer le fichier ici" }}</span> <br>
        <a href="#" class="archived" id="{{ $value->id }}" data-archive="{{ $value->archived }}">
        </a>
            <a href="#" class="trashFile text-danger" id="{{ $value->id }}" data-saisineID="{{ $Saisine->id }}"><i class="fa fa-trash fa-2x" title="Supprimer"></i></a>
    </li>   
@endforeach
</ul>