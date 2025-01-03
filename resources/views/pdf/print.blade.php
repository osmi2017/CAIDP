<script type="text/javascript">
	// window.print();
	$(document).ready(function(){
		alert();
	});
</script>
@php

$imprimer = session('imprimer');
$nombreImage = substr_count($imprimer, '<img src="');
if($nombreImage==0){
	$ImprimerFinal = $imprimer;
	// dd($ImprimerFinal);
}else{

	$img = explode('<img src="', $imprimer);
	$imprimer1 =  findImage("/images/", $img[1], 150, 'left');	
	$ImprimerFinal = $img[0].$imprimer1['link'].$imprimer1['supImg'];
	
	if($nombreImage==2){
		$img2 = explode('<img src="', $img[2]);
		$imprimer2 =  findImage("/signatures/", $img[2], 200, 'right');
		$ImprimerFinal = $ImprimerFinal.$imprimer2['link'].$imprimer2['supImg'];
	}
}
echo $ImprimerFinal;	


function findImage($imgPath, $string, $width, $float){
	$src = explode($imgPath, $string);
	$logo = explode('"', $src[1]);
	$supImg = explode("/>", $src[1]);
	unset($supImg[0]);
	$supImg = implode("/>", $supImg);
	$link = "<img src=".public_path().$imgPath.$logo[0]." style='float:".$float."; width:".$width."' ><br><br>";
	return compact('link', 'supImg');
}

@endphp