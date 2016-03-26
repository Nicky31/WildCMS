			<center>
			
<a href="<?php echo site_url('ladder','persos'); ?>"> <?php echo img('lp.png'); ?> </a>
<a href="<?php echo site_url('ladder','guilds'); ?>"> <?php echo img('lg.png'); ?> </a>
<a href="<?php echo site_url('ladder','votes'); ?>"> <?php echo img('lv.png'); ?> </a> <br /> <br />

<div class="titleNormal"> Classement Guildes (<b><em><?php echo $guilds_count; ?></em></b>) </div> <br />

	<div class="text">
<?php
$rang += $num_guild - 1;
?>

<table>
<tr> <td>Rang </td> <td>Emblème</td> <td> Nom </td> <td>Niveau</td> <td>Experience </td> </tr>

<?php foreach($guilds as $guild): ?>
<tr> <td><?php echo $rang; ?></td>
<td>
<object id="logo_guilde_container" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="65" height="65" >
											<param name="movie" value="<?php echo img_url('swf/DofusGuildes.swf'); ?>" />
											<param name="play" value="true" />
											<param name="flashvars" value="bcgSrc=<?php echo $guild->embleme['bgSrc']; ?>&bcgColor=<?php echo $guild->embleme['bgColor']; ?>&frtSrc=<?php echo $guild->embleme['logoSrc']; ?>&frtColor=<?php echo $guild->embleme['logoColor']; ?>" />
											<param name="loop" value="true" />
											<param name="quality" value="high" />
											<param name="wmode" value="transparent" />
												<!--[if !IE]>-->
												<object id="logo_guilde_container" type="application/x-shockwave-flash" data="<?php echo img_url('swf/DofusGuildes.swf'); ?>" width="65" height="65">
													<param name="play" value="true" />
													<param name="flashvars" value="bcgSrc=<?php echo $guild->embleme['bgSrc']; ?>&bcgColor=<?php echo $guild->embleme['bgColor']; ?>&frtSrc=<?php echo $guild->embleme['logoSrc']; ?>&frtColor=<?php echo $guild->embleme['logoColor']; ?>" />
													<param name="loop" value="true" />
													<param name="quality" value="high" />
													<param name="wmode" value="transparent" />
												<!--<![endif]-->
													<a href="http://www.adobe.com/go/getflashplayer">
														<img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" />
													</a>
												<!--[if !IE]>-->
												</object>
											<!--<![endif]-->
										</object>

</td>
 <td><?php echo $guild->name; ?></td> <td><?php echo $guild->lvl; ?></td> <td><?php echo htmlspecialchars($guild->xp); ?></td> </tr>

<?php $rang++; ?>
<?php endforeach; ?>

</table> <br /> <br />

<?php echo $pagination; ?> 

	</div>
		</center>