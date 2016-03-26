<div class="titleNormal">Gestion boutique </div>
<div class="text">

			<div class="subtitle"> Ajouter un item</div> <br />
		<form method="post">
	<center>
<table>
<tr> <td>ID :</td> <td> <input type="text" name="id" class="login2" required /></td> </tr>
<tr> <td>Prix :</td> <td> <input type="text" name="price" class="login2" required /></td> </tr>
<tr> <td>Ajouter</td> <td> <input type="submit" class="login2" /></td> </tr>
</table>
	</center>
		</form> <br />
	
		<div class="subtitle"> Liste des items</div> <br />
	<center>
<table>
<tr> <td><b>Nom</b></td> <td><b>Prix</b></td> <td><b>Supprimer</b></td> </tr>

<?php foreach($items as $item): ?>
<tr> <td><?php echo $item->Name; ?></td> <td><?php echo $item->boutique; ?></td> <td><a href="<?php echo site_url('boutique','admin',$item->ID); ?>"> <?php echo img('devtool/delete.png'); ?></a> </td> </tr>
<?php endforeach; ?>
</table>
	</center>

</div>