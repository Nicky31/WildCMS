			<center>
	
<a href="<?php echo site_url('ladder','persos'); ?>"> <?php echo img('lp.png'); ?> </a>
<a href="<?php echo site_url('ladder','guilds'); ?>"> <?php echo img('lg.png'); ?> </a>
<a href="<?php echo site_url('ladder','votes'); ?>"> <?php echo img('lv.png'); ?> </a> <br /> <br />

<div class="titleNormal"> Classement personnages (<b><em><?php echo $persos_count; ?></em></b>) </div> <br />

	<div class="text">
<?php
$rang += $num_perso - 1;
?>

<table>
<tr> <td>Rang </td> <td> Race </td> <td title="Alignement">Ali.</td> <td>Nom </td> <td>Niveau</td> <td>Experience</td> </tr>

<?php foreach($persos as $perso): ?>
<tr> <td><?php echo $rang; ?></td> <td><?php echo img('ladder/'.$perso->class.'.png'); ?></td> <td><?php echo img('ladder/alignements/'.$perso->alignement.'.png'); ?></td> <td><?php echo htmlspecialchars($perso->name); ?></td> <td><?php echo htmlspecialchars($perso->level); ?></td> <td><?php echo htmlspecialchars($perso->xp); ?></td> </tr>

<?php $rang++; ?>
<?php endforeach; ?>

</table> <br /> <br />

<?php echo $pagination; ?> 

	</div>
		</center>