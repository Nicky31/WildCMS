<div class="titleNormal"> Editer l'Equipe </div> <br /> <br />
<center>

				<div class="subtitle"> Supprimer un membre du Staff </div> <br />
	<table>
<tr> <td>Pseudo </td> <td>Supprimer</td> </tr>

<?php foreach($staffs as $staff): ?>
<tr> <td><?php echo htmlspecialchars($staff->pseudo); ?> </td> <td><a href="<?php echo site_url('staff','delete',$staff->id); ?>"> <?php echo img('devtool/delete.png'); ?></a></td> </tr>

<?php endforeach; ?>
	</table> <br /> <br />
	
				<div class="subtitle"> Ajouter un membre du Staff </div> <br />
				
				<form method="post" action="<?php echo site_url('staff','add'); ?> ">
			 <table>
				 <tr> <td>Pseudo </td> <td> <input type="text" name="pseudo" placeholder="Votre Pseudo" class="login2" required /> </td> </tr>
				 <tr> <td>Rôle</td> <td> <input type="text" name="rôle" placeholder="Votre fonction / grade" class="login2" required /> </td> </tr>
				 <tr> <td>Contact </td> <td> <input type="text" name="contact" placeholder="Moyen de contact" class="login2" required /> </td> </tr>
				 <tr> <td> </td> <td><input type="submit" class="login2" value="Ajouter" /> </td> </tr>
		     </table>	
				</form>
				


</center>