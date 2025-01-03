<?php 
namespace App\Tools;

use DateTime;

Class DateRewrite{


	public function dateFrancais($date){
		//dd($date);
		if($date){
		$date = explode("-", $date);
		return $date[2]." ".$this->mois($date[1])." ".$date[0];
		}
		else{
			return "";
		}
	}

	public function dateTimeFrancais($date){
		$dateTimeFrancais = explode(" ",$date);
		$date = explode("-", $dateTimeFrancais[0]);
		return $date[2]." ".$this->mois($date[1])." ".$date[0];
	}

	public function mois($mois){
		if($mois=="01"){
			return "Janvier";
		}elseif($mois=="02"){
			return "Février";
		}elseif($mois=="03"){
			return "Mars";
		}elseif($mois=="04"){
			return "Avril";
		}elseif($mois=="05"){
			return "Mai";
		}elseif($mois=="06"){
			return "Juin";
		}elseif($mois=="07"){
			return "Juillet";
		}elseif($mois=="08"){
			return "Août";
		}elseif($mois=="09"){
			return "Septembre";
		}elseif($mois=="10"){
			return "Octobre";
		}elseif($mois=="11"){
			return "Novembre";
		}elseif($mois=="12"){
			return "Décembre";
		}
	}

	public function differenteDate($dateDebut, $dateFin){
		$dateDebut = new DateTime($dateDebut);
		$dateFin = new DateTime($dateFin);
		$interval = $dateDebut->diff($dateFin);
		$diff =  $interval->format('%r%a');
		return $diff;
	}

	public function isWeekend($date){
		return (date('N', strtotime($date)) >= 6);
	}

	public function diffWeekend($dateDebut){
		$date = new DateTime($dateDebut);
		$jourWeek = 0;
		$diff = substr($diff, 1,1);
		for ($i=1; $i <= $diff; $i++) { 
			$date->modify('+1 day');
			$dateJour = $date->format('Y-m-d');
			echo $dateJour."<br>";
			if($this->isWeekend($dateJour)){
				$jourWeek = $jourWeek + 1;
			}
		}
		$nombreDeJour = $this->differenteDate() - $jourWeek;
		return $nombreDeJour;
	}

	public function newDate($date, $jour){
		return date('Y-m-d', strtotime($date) + (24 * 3600 * $jour));
	}

	public function calculeDelaiRequis($dateDebut, $dateFin, $delai=null){
		// dd($this->differenteDate($dateDebut, $dateFin));
		return $this->differenteDate($dateDebut, $dateFin);
		// if($this->differenteDate($dateDebut, $dateFin)<=$delai){
		// 	return true;
		// }else{
		// 	return false;
		// }
	}

	
}



