<div class="titleNormal"> Informations sur le compte <b><?php echo $infos[0]['account']; ?> </b> </div> <br />

<?php
if($infos[0]['banned']) // S'il est banni
	$etat = "<b><font color='red'>Hors ligne</font></b>";
elseif($infos[0]['logged']) // S'il est loggé
	$etat = "<b><font color='green'>En ligne</font></b>";
else // Sinon s'il est hors ligne
	$etat = "<b><font color='red'>Hors ligne</font></b>";
	
$infos[0]['lastConnectionDate'] = (!empty($infos[0]['lastConnectionDate'])) ? $infos[0]['lastConnectionDate'] : "<b><font color='red'>Jamais connecté</font></b>";
?>

  <center>
	
	<table>
	
		<tr> <td>Nom de compte </td> <td> <?php echo $infos[0]['account']; ?></td></tr>
		<tr> <td>Pseudo </td> <td><?php echo $infos[0]['pseudo']; ?></td> </tr>
		<tr> <td>E-mail </td> <td><?php echo $infos[0]['email']; ?></td> </tr>
		<tr> <td>Dernière connection</td> <td><?php echo $infos[0]['lastConnectionDate']; ?></td> </tr>
		<tr> <td title="Dernière adresse IP connue">Adresse IP</td> <td><?php echo $infos[0]['lastIP']; ?></td> </tr>
		<tr> <td>Nombre de points</td> <td><?php echo $infos[0]['points']; ?></td> </tr>
		<tr> <td>Etat</td> <td><?php echo $etat; ?></td> </tr>
		
   </table> <br />
		 <a href="<?php echo site_url('admin_accounts');?>" title="Retourner à la liste des comptes"> <?php echo img('devtool/return.png'); ?> </a>
  </center>
	