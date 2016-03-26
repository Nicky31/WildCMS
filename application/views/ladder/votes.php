			<center>
<a href="<?php echo site_url('ladder','persos'); ?>"> <?php echo img('lp.png'); ?> </a>
<a href="<?php echo site_url('ladder','guilds'); ?>"> <?php echo img('lg.png'); ?> </a>
<a href="<?php echo site_url('ladder','votes'); ?>"> <?php echo img('lv.png'); ?> </a> <br /> <br />

<div class="titleNormal"> Classement Voteurs (<b><em><?php echo $votes_count; ?></em></b>) </div> <br />
	<div class="text">

<?php
$rang += $num_voter - 1;
?>

<table>
<tr> <td>Rang </td> <td> Pseudo </td> <td>Votes</td></tr>

<?php foreach($votes as $vote): ?>
<tr> <td><?php echo $rang; ?></td> <td><?php echo $vote->pseudo; ?></td> <td><?php echo $vote->vote; ?></td> </tr>

<?php $rang++; ?>
<?php endforeach; ?>

</table> <br /> <br />

<?php echo $pagination; ?> 

	</div>
		</center>