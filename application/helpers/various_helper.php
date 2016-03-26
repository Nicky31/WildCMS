<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('return_time'))
{
	function return_time($sec) // Transforme un nbre de secs en H / m / s
	{
	    if($sec <= 60) // s'il n'y a qu'une minute ou moins
			return $sec." secondes";
		elseif($sec <= 3600) // S'il n'y à qu'une heure ou moins
			return floor($sec / 60).' minutes, '. $sec % 60 .' secondes';
		else
		 {
			$hours = floor($sec / 3600);
			$minuts = floor(($sec % 3600) / 60);
			$secs = $sec % 60;
		  return $hours .' heures , '. $minuts .' minutes et '. $secs .' secondes.';
		 }
	}
}
