<?php
function getStats($stuff,$bonus,$item) // Utilisable SOIT pour traiter un stuff, SOIT pour le bonus d'un stuff SOIT pour 1 item (armurereie,boutique)
{
$i = 0;
$stats = array(
'vitalité' => array(0,0), // vitalité[0] = effets minimum & vitalité[1] = effets max ([0] à [1] effets )
'sagesse' => array(0,0),
'force' => array(0,0),
'intelligence' => array(0,0),
'chance' => array(0,0),
'agilité' => array(0,0),
'pa' => array(0,0),
'pm' => array(0,0),
'initiative' => array(0,0),
'prospection' => array(0,0),
'portée' => array(0,0),
'invocations' => array(0,0),
'cc' => array(0,0),
'ec' => array(0,0),
'+dommages' => array(0,0),
'%dommages' => array(0,0),
'esquivePA' => array(0,0),
'esquivePM' => array(0,0),
'soins' => array(0,0),
'resisTerre' => array(0,0),
'resisEau' => array(0,0),
'resisAir' => array(0,0),
'resisFeu' => array(0,0),
'resisNeutre' => array(0,0),
'renvoiDmg' => array(0,0),
'dmgPièges' => array(0,0),
'%Pièges' => array(0,0),
'pods' => array(0,0),
'Inconnu' => null
);		

If(!empty($stuff)) // Si c'est le stuff qu'on doit traiter
{		
	foreach($stuff as $cle1 => $valeur1) // $stuff['typeObjet'][template|stats]
	{

	 if(!empty($valeur1[1])) // si les stats sont renseignés
	 
	  {
		$fullStats = explode(',',$valeur1[1]);
			for($i=0;$i < sizeof($fullStats);$i++)
			  {
			  $effets = explode('#',$fullStats[$i]);
				$stats = getElement($effets,$stats);
			  }
	  }
	}
}

Elseif(!empty($bonus)) // Si c'est les bonus qu'on doit traiter
{
	for($n=0;$n < sizeof($bonus);$n++)
	{
	  If(!empty($bonus[$n]))
	  {
	  
		$fullStats = explode(',',$bonus[$n]);
			for($i=0;$i < sizeof($fullStats);$i++)
			  {
			  $effets = explode(':',$fullStats[$i]);
			  $effets[0] = dechex($effets[0]);
			  $effets[1] = dechex($effets[1]);
				$stats = getElement($effets,$stats);
				
			  }
	  }
	}

}

Elseif(!empty($item))
{
$fullStats = explode(',',$item);

			for($i=0;$i < sizeof($fullStats);$i++)
			  {
			  $effets = explode('#',$fullStats[$i]);
				$stats = getElement($effets,$stats);
			  }


}

return $stats;
	}

function getElement($effets,$stats = null)
{ 

if(!empty($effets[0])) // si les effets sont bien renseignés
{
$effets[0] = hexdec($effets[0]);  // Converti en décimal l'hexadécimal du type d'effet
$effets[1] = hexdec($effets[1]);
$effets[2] = hexdec($effets[2]);

	Switch($effets[0])
	  {
		case 110: //+vie
		$stats['vitalité'][0] += $effets[1];
		$stats['vitalité'][1] += ($effets[2] != 0) ? $effets['2'] : 0;
		break;
		case 111: // +Pa
		$stats['pa'][0] += $effets[1];
		$stats['pa'][1] += ($effets[2] != 0) ? $effets['2'] : 0;
		break;
		case 112: //+dmg
		$stats['+dommages'][0] += $effets[1];
		$stats['+dommages'][1] += ($effets[2] != 0) ? $effets['2'] : 0;
		break;
		case 115: // +cc
		$stats['cc'][0] += $effets[1];
		$stats['cc'][1] += ($effets[2] != 0) ? $effets['2'] : 0;
		break; 
		case 116: // -po
		$stats['portée'][0] -= $effets[1];
		$stats['portée'][1] -= ($effets[2] != 0) ? $effets['2'] : 0;
		case 117: // +Po
		$stats['portée'][0] +=$effets[1];
		$stats['portée'][1] += ($effets[2] != 0) ? $effets['2'] : 0;
		break;
		case 118: //+Force
		$stats['force'][0] += $effets[1];
		$stats['force'][1] += ($effets[2] != 0) ? $effets['2'] : 0;
		break;
		case 119: //+Agilité
		$stats['agilité'][0] += $effets[1];
		$stats['agilité'][1] += ($effets[2] != 0) ? $effets['2'] : 0;
		break;
		case 122: //+ec
		$stats['ec'][0] += $effets[1];
		$stats['ec'][1] += ($effets[2] != 0) ? $effets['2'] : 0;
		break;
		case 123: // +chance
		$stats['chance'][0] += $effets[1];
		$stats['chance'][1] += ($effets[2] != 0) ? $effets['2'] : 0;
		break;
		case 124: // +sagesse
		$stats['sagesse'][0] += $effets[1];
		$stats['sagesse'][1] += ($effets[2] != 0) ? $effets['2'] : 0;
		break;
		case 125: // +vita
		$stats['vitalité'][0] += $effets[1];
		$stats['vitalité'][1] += ($effets[2] != 0) ? $effets['2'] : 0;
		break;
		case 126: // +intel
		$stats['intelligence'][0] += $effets[1];
		$stats['intelligence'][1] += ($effets[2] != 0) ? $effets['2'] : 0;
		break;
		case 128: // +pm
		$stats['pm'][0] += $effets[1];
		$stats['pm'][1] += ($effets[2] != 0) ? $effets['2'] : 0;
		break;
		case 138: //%dmg
		$stats['%dommages'][0] += $effets[1];
		$stats['%dommages'][1] += ($effets[2] != 0) ? $effets['2'] : 0;
		break;
		case 152: //-chance
		$stats['chance'][0] -= $effets[1];
		$stats['chance'][1] -= ($effets[2] != 0) ? $effets['2'] : 0;
		break;
		case 153: //-vita
		$stats['vitalité'][0] -= $effets[1];
		$stats['vitalité'][1] -= ($effets[2] != 0) ? $effets['2'] : 0;
		break;
		case 154: //-agilité
		$stats['agilité'][0] -= $effets[1];
		$stats['agilité'][1] -= ($effets[2] != 0) ? $effets['2'] : 0;
		break;
		case 155: //-intelligence
		$stats['intelligence'][0] -= $effets[1];
		$stats['intelligence'][1] -= ($effets[2] != 0) ? $effets['2'] : 0;
		break;
		case 156: //-sagesse
		$stats['sagesse'][0] -= $effets[1];
		$stats['sagesse'][1] -= ($effets[2] != 0) ? $effets['2'] : 0;
		break;
		case 157: //-force
		$stats['force'][0] -= $effets[1];
		$stats['force'][1] -= ($effets[2] != 0) ? $effets['2'] : 0;
		break;
		case 158: //+Pods
		$stats['pods'][0] += $effets[1];
		$stats['pods'][1] += ($effets[2] != 0) ? $effets['2'] : 0;
		break;
		case 159: //-Pods
		$stats['pods'][0] -= $effets[1];
		$stats['pods'][1] -= ($effets[2] != 0) ? $effets['2'] : 0;
		break;
		case 160: //+esquivePA
		$stats['esquivePA'][0] += $effets[1];
		$stats['esquivePA'][1] += ($effets[2] != 0) ? $effets['2'] : 0;
		break;
		case 161: //+esquive PM
		$stats['esquivePM'][0] += $effets[1];
		$stats['esquivePM'][1] += ($effets[2] != 0) ? $effets['2'] : 0;
		break;
		case 162: //-esquivePA
		$stats['esquivePA'][0] -= $effets[1];
		$stats['esquivePA'][1] -= ($effets[2] != 0) ? $effets['2'] : 0;
		break;
		case 163: //-esquivePM
		$stats['esquivePM'][0] -= $effets[1];
		$stats['esquivePM'][1] -= ($effets[2] != 0) ? $effets['2'] : 0;
		break;
		case 168: //-PA
		$stats['pa'][0] -= $effets[1];
		$stats['pa'][1] -= ($effets[2] != 0) ? $effets['2'] : 0;
		break;
		case 169: //-PM
		$stats['pm'][0] -= $effets[1];
		$stats['pm'][1] -= ($effets[2] != 0) ? $effets['2'] : 0;
		break;
		case 171: //-CC
		$stats['cc'][0] -= $effets[1];
		$stats['cc'][1] -= ($effets[2] != 0) ? $effets['2'] : 0;
		break;
		case 174: //+initiative
		$stats['initiative'][0] += $effets[1];
		$stats['initiative'][1] += ($effets[2] != 0) ? $effets['2'] : 0;
		break;
		case 175: //-initiative
		$stats['initiative'][0] -= $effets[1];
		$stats['initiative'][1] -= ($effets[2] != 0) ? $effets['2'] : 0;
		break;
		case 176: //+prospection
		$stats['prospection'][0] += $effets[1];
		$stats['prospection'][1] += ($effets[2] != 0) ? $effets['2'] : 0;
		break;
		case 177: //-prospection
		$stats['prospection'][0] -= $effets[1];
		$stats['prospection'][1] -= ($effets[2] != 0) ? $effets['2'] : 0;
		break;
		case 178: //+soins
		$stats['soins'][0] += $effets[1];
		$stats['soins'][1] += ($effets[2] != 0) ? $effets['2'] : 0;
		break;
		case 178: //-soins
		$stats['soins'][0] -= $effets[1];
		$stats['soins'][1] -= ($effets[2] != 0) ? $effets['2'] : 0;
		break;
		case 182: //+invocs
		$stats['invocations'][0] += $effets[1];
		$stats['invocations'][1] += ($effets[2] != 0) ? $effets['2'] : 0;
		break;
		case 210: //+resisTerre
		$stats['resisTerre'][0] += $effets[1];
		$stats['resisTerre'][1] += ($effets[2] != 0) ? $effets['2'] : 0;
		break;
		case 211: //+resisEau
		$stats['resisEau'][0] += $effets[1];
		$stats['resisEau'][1] += ($effets[2] != 0) ? $effets['2'] : 0;
		break;
		case 212: //+resisAgi
		$stats['resisAir'][0] += $effets[1];
		$stats['resisAir'][1] += ($effets[2] != 0) ? $effets['2'] : 0;
		break;
		case 213: //+resisFeu
		$stats['resisFeu'][0] += $effets[1];
		$stats['resisFeu'][1] += ($effets[2] != 0) ? $effets['2'] : 0;
		break;
		case 214: //+resisNeutre
		$stats['resisNeutre'][0] += $effets[1];
		$stats['resisNeutre'][1] += ($effets[2] != 0) ? $effets['2'] : 0;
		break;
		case 215: //-resisTerre
		$stats['resisTerre'][0] -= $effets[1];
		$stats['resisTerre'][1] -= ($effets[2] != 0) ? $effets['2'] : 0;
		break;
		case 216: //-resisEau
		$stats['resisEau'][0] -= $effets[1];
		$stats['resisEau'][1] -= ($effets[2] != 0) ? $effets['2'] : 0;
		break;
		case 217: //-resisAir
		$stats['resisAir'][0] -= $effets[1];
		$stats['resisAir'][1] -= ($effets[2] != 0) ? $effets['2'] : 0;
		break;
		case 218: //-resisFeu
		$stats['resisFeu'][0] -= $effets[1];
		$stats['resisFeu'][1] -= ($effets[2] != 0) ? $effets['2'] : 0;
		break;
		case 219: //-resisNeutre
		$stats['resisNeutre'][0] -= $effets[1];
		$stats['resisNeutre'][1] -= ($effets[2] != 0) ? $effets['2'] : 0;
		break;
		case 220: //+renvoiDmg
		$stats['renvoiDmg'][0] += $effets[1];
		$stats['renvoiDmg'][1] += ($effets[2] != 0) ? $effets['2'] : 0;
		break;
		case 225: //+dmgPièges
		$stats['dmgPièges'][0] += $effets[1];
		$stats['dmgPièges'][1] += ($effets[2] != 0) ? $effets['2'] : 0;
		break;
		case 226: //+%Pièges
		$stats['%Pièges'][0] += $effets[1];
		$stats['%Pièges'][1] += ($effets[2] != 0) ? $effets['2'] : 0;
		default:
		$stats['Inconnu'] .= $effets[1].' à '. $effets[2].';';
		break;
		
	  }
return $stats;	  
} else $stats['Inconnu'] .= 'Objet utilisable';

 
}