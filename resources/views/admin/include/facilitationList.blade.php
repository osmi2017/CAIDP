<table class="table table-striped saisineTable">
	<thead>
		<th>Date</th>
		<th>Action</th>
        <th>Contenu</th>
		<th>Action</th>
	</thead>
	<tbody>
		@if($Saisine && $Saisine->facilitation)
		@foreach($Saisine->facilitation as $value)
		<tr>
			<td class="td_dateFacilitation">{{ $value->dateFacilitation }}</td>
            <td class="td_actionFacilitation">{{ $value->actionFacilitation }}</td>
			<td class="td_suite" data-suite="{!! $value->suite !!}">
				<p  style="text-align: justify;">{!! $value->suite !!}</p>
				<br><br>
				@if($value->docfacilitation)
						<ul class="iframeData">
					@foreach($value->docfacilitation as $val)
						<li>
							<a href="#" title="Zoomer" class="ZoomerIframe"><i class="fa fa-search-plus" ></i>Zoomer</a>
							<br>
							<iframe src="{{ asset("/docfacilitation/".$val->document) }}" width="200"></iframe> <br>
							<span class="renameFile" data-type=facilitation contenteditable="" id="{{ $val->id }}" data-default="Nommer le fichier" data-change="{{ $val->nomFichier ? 1 : 0 }}">{{ $val->nomFichier ? $val->nomFichier : "Renommer le fichier ici" }}</span>
						</li>	
					@endforeach
						</ul>
				@endif
			</td>
			<th>
            <a href="#" class="editFacilitation" id="{{ $value->id }}"> <i class="fa fa-edit"></i></a>
            <a href="#" class="deleteFacilitation text-danger" id="{{ $value->id }}"> <i class="fa fa-trash"></i></a>
            </th>
		</tr>
		@endforeach
		@endif
	</tbody>
</table>
<div  class="text-center addFacilitationBtn {{ !$Saisine ? "hide" : "" }} "><a class="btn btn-info btn-lg" href="#" title="Ajouter une facilitation"><i class="material-icons">note_add</i> Ajouter une facilitation</a></div>