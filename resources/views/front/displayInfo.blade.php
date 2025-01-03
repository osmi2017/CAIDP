@inject('DateRewrite', 'App\Tools\DateRewrite')
@inject('Globals', 'App\Tools\Globals')

<div class="fixed" id="searh">
	@if(isset($search))
	@php echo $search @endphp
	@endif
</div>
<div class="row">
@if(isset($title))
{{-- @php echo $title @endphp --}}
@endif
{{-- {{ dd($Information) }} --}}
@if(isset($Information))
    @if(is_string($Information))
        @php
            $Information = json_decode($Information, true);
        @endphp
    @endif
@endif

@if(isset($Information) && count($Information)>0)
@foreach($Information as $value)
@php
$Array = is_array($value) ? $value : $value->toArray();
if($Array['information']==null && $value['document']!=null){
	$title = null;
	$class=null;
	$doc=$value['document'];
	$link = $Globals::Document_Path();
}elseif($Array['information']!=null){
	$title = 1;
	$class = "popupTitle";
	$link = null;
	// dd($title);
}

@endphp


<div class="col-lg-12 col-md-12">
	<div class="listing-item-container list-layout">
		
		@php
			$jsonData = $value['document']; // Assuming $value['document'] contains the JSON string
			if((gettype($jsonData)=="array")&&(!empty($jsonData)))
			{
				$documents = $jsonData[0]['document'] ; // Decode the JSON string into a PHP array
		
		if (!empty($documents)){
    
        
            $link1 = $documents ;   
			$link = $Globals::Document_Path();   
		
	
			}
			}
			elseif((gettype($jsonData)=="array")&&(empty($jsonData))){
			$link1 = null;   
			$link = null; 
			}
			else{			
			$documents = json_decode($jsonData, true); // Decode the JSON string into a PHP array
		
		if (!empty($documents) && is_array($documents)){
    foreach ($documents as $document){
        if (isset($document['document'])){
            $link1 = $document['document']    ;   
			$link = $Globals::Document_Path();   
		}
	}
}
};
@endphp

<a href="{{ $link.$link1 }}" @if(!is_null($link)) download="" @endif class="listing-item {{ $class }}" title="{{ $title ? $value['information'] : "" }}"  >

			<!-- Image -->
			<div class="listing-item-image">
				<h4>{{ $value['organisme']['organisme'] }}</h4>
			</div>
			
			<!-- Content -->
			<div class="listing-item-content">

				<div class="listing-item-inner">
					@if(isset($libelleArray))
					@php 
						$explodeLib = explode(" ", strtolower($value['libelle']));
						foreach ($explodeLib as $key => $val) {
							if(in_array(strtolower($explodeLib[$key]), $libelleArray)){
								$explodeLib[$key] = "<b>".ucfirst($val)."</b>";
							}
						}
						$libelle = implode(" ", $explodeLib);
					@endphp
					@endif
				@php 
					isset($libelle) ? $libelle = $libelle : $libelle = $value['libelle'] ;
					@endphp	
					<h3> 
						@php 
							echo ucfirst($libelle)  
						@endphp 
					</h3>
				<div class=" ">Publié le :  {{ $DateRewrite->dateTimeFrancais($value['created_at']) }} </div>
				</div>
			</div>
		</a>
	</div>
</div>
@php unset($libelle) @endphp
@endforeach
@else
<br>
<div class="alert alert-danger text-center">
	{{-- <i class="fa"></i> --}}
	<h2 class="text-center">
		@php
		if(isset($noFind)) 
		echo($noFind); 
		@endphp 
		 <br>  voulez-vous en faire la demande ?</h2>
	<a href="{{ route('requerant.faireDemande') }}" class="button border with-icon faireDemande" id="formDemandeAction" >Faire une demande <i class="sl sl-icon-docs"></i></a>
</div>
@endif
</div>
<div class="clearfix"></div>
{{-- <div class="row">
	<div class="col-md-12">
		<!-- Pagination -->
		@include('paginate.default', ['paginator' => $Information])
		
	</div>
</div> --}}

@if(isset($libelleArray))
@include('front.includes.question')
@endif
<br><br><br><br>

@section('js')
	<script type="text/javascript">
		$(".popupTitle").each(function(){
			$(this).click(function(){
				var title = $(this).attr('title');
				Swal.fire({
				text: title,
				showCancelButton: false,
				showConfirmButton: true,
				cancelButtonColor: '#d33',
				confirmButtontext: 'Merci',
				customClass: {
				  popup: 'animated tada'
				}
				
			})
			return false;
			});

		})
	</script>
@stop