<?php	
	function str_to_noaccent($str) {
	    $url = $str;
	    $url = preg_replace('#Ç#', 'C', $url);
	    $url = preg_replace('#ç#', 'c', $url);
	    $url = preg_replace('#è|é|ê|ë#', 'e', $url);
	    $url = preg_replace('#È|É|Ê|Ë#', 'E', $url);
	    $url = preg_replace('#à|á|â|ã|ä|å#', 'a', $url);
	    $url = preg_replace('#@|À|Á|Â|Ã|Ä|Å#', 'A', $url);
	    $url = preg_replace('#ì|í|î|ï#', 'i', $url);
	    $url = preg_replace('#Ì|Í|Î|Ï#', 'I', $url);
	    $url = preg_replace('#ð|ò|ó|ô|õ|ö#', 'o', $url);
	    $url = preg_replace('#Ò|Ó|Ô|Õ|Ö#', 'O', $url);
	    $url = preg_replace('#ù|ú|û|ü#', 'u', $url);
	    $url = preg_replace('#Ù|Ú|Û|Ü#', 'U', $url);
	    $url = preg_replace('#ý|ÿ#', 'y', $url);
	    $url = preg_replace('#Ý#', 'Y', $url);
	     
	    return ($url);
	}

	function afficheDate($lang="fr"){
		$jours=array(1=>"Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi","Dimanche");
		$days=array(1=>"Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday");
		$mois=array(1=>"Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Aout","Septembre","Octobre","Novembre","Decembre");
		$months=array(1=>"January","February","March","April","May","June","July","August","September","October","November","December");

		$indexDay=date("N");
		$indexMonth=date("n");
		$dayNumZr=date("d");
		$dayNum=date("j");
		$year=date("Y");

		if($lang=="fr"){
			return $jours[$indexDay]." ".$dayNum." ".$mois[$indexMonth]." ".$year;
		}else{
			return $days[$indexDay].", ".$months[$indexMonth]." ".$dayNumZr.", ".$year;
		}
	}

	function heure() {
		date_default_timezone_set('Europe/Paris');
		$hr = Date("H:i");
		echo $hr;
	}

	function jours($str) {
		$jours = array("Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi","Dimanche");
		$jourseng = array("Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday");
		$index = array_search($str, $jourseng);
		return $jours[$index];
	}

	function mois($str) {
		$mois= array("Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Aout","Septembre","Octobre","Novembre","Decembre");
		$moiseng= array("January","February","March","April","May","June","July","August","September","October","November","December");
		$index = array_search($str, $moiseng);
		return $mois[$index];
	}
?>