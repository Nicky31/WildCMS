<div class="titleNormal"> Boutique </div> <br /> <br />
<div class="text"> 

<?php foreach($items as $item): 
$i = -1;
?>
<div class="item">

	<h2 class="name"><?php echo $item->Name;?> <em>(<?php echo $item->boutique; ?> points)</em> </h2> <span class="level">Level <?php echo $item->Level;?></span>
	
  <center>
	<div class="cadre" style="width:80px;height:90px;">
		<object  width="80px;" height="90px;" type="application/x-shockwave-flash" data="<?php echo img_url('items/'.$item->ID.'.swf'); ?>">
		<param name="movie" value="<?php echo img_url('items/'.$item->ID.'.swf'); ?>" />
		<param name="wmode" value="transparent" />
		</object>
	</div>
  </center>
	
	<hr>
	
	<div class="cadre"><span class="title">EFFETS</span></div>
		<?php 
		foreach($item->stats as $cle => $valeur) {
			$class = ($i == -1) ? '' : 'liBright';
			
				if($valeur[0] != 0) { // Si l'item a cet effet
					if($valeur[1] == 0) {
						echo '<li class="'.$class.'">'.$valeur[0] .' '. $cle .' </li>';
						$i *= -1;
						}
					else {
						echo '<li class="'.$class.'">'.$valeur[0] .' à '. $valeur[1] .' '. $cle .' </li>';
						$i *= -1;
						}
				}
			  elseif(!is_array($valeur) && !empty($valeur))
				echo '<li>'.$valeur.'</li>';
			 } ?>
			 
			 <br />
	<?php if($allowedBuy): ?>
			 <hr />
			 
			<center> <table>
			  <form action="<?php echo site_url('boutique','buy'); ?>" method="post"> 
				<input type="hidden" name="id" value="<?php echo $item->ID; ?>" />
				
			 <tr> <td>Personnage :</td>
				  <td> 
				       <select name="perso" class="login2">
							<?php foreach($persos as $perso): ?>
								<option value="<?php echo $perso->guid; ?>"><?php echo $perso->name; ?> </option>
							<?php endforeach; ?>
				       </select> 
				  </td> 
		    </tr> <br />
				   
			 <tr> <td>Jet :</td>
				  <td>
       				   <select name="jet" class="login2">
					   <option value="20">Aléatoire</option>
					   <option value="21">Parfait (<?php echo $item->boutique * $perfectTaxItem; ?> points)</option>
				       </select> 
				   </td>
			</tr> <br />
				   
				   <tr> <td>Confirmer l'achat</td> <td> <input type="submit" class="login2" /> </td> </tr>
			  </form>	
			</table> </center>
	<?php endif; ?>
	
</div> <br />
<?php endforeach; ?>


</div> 