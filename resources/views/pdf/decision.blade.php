{{-- <img src='{{ public_path().'/images/armoirie-ci-large_1910212127.jpg' }}'> --}}
@php


// dd($decison);
	$imprimer = $decison;
$nombreImage = substr_count($imprimer, '<img src="');
if($nombreImage==0){
	$ImprimerFinal = $imprimer;
}else{
	$img = explode('<img src="', $imprimer);
	$imprimer1 =  findImage($img[1]);	
	$ImprimerFinal = $img[0].$imprimer1['link'].$imprimer1['supImg'];
	// dd($img);
	
	if($nombreImage==2){
		$img2 = explode('<img src="', $img[2]);
		$imprimer2 =  findImage($img[2]);
		$ImprimerFinal = $ImprimerFinal.$imprimer2['link'].$imprimer2['supImg'];
	}
}
echo $ImprimerFinal;	


function findImage($string){
	$imgPath = "/images/";
	$imgPath2 = "/signatures/";
	$src = explode($imgPath, $string);
	if(count($src)<=1){
		$src = explode($imgPath2, $string);
		$width= 200;
		$float= "right";
	// dd($imgPath2);
		$imgPath = $imgPath2;
	}else{
		$width= 150;
		$float= "left";
	}
	$logo = explode('"', $src[1]);
	$supImg = explode("/>", $src[1]);
	unset($supImg[0]);
	$supImg = implode("/>", $supImg);
	$link = "<img src='".public_path().$imgPath.$logo[0]."' style='float:".$float."; width:".$width."' ><br><br>";
	return compact('link', 'supImg');
}

// $imgPath = "/signatures/";
// $logo[0] = "signature_1911260623.png";
// $width = "200";
// $float = "left";
// $link = "<img src='".public_path().$imgPath.$logo[0]."' style='float:".$float."; width:".$width."' ><br><br>";
// echo $link;
@endphp