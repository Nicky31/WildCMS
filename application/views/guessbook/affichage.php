			<div class="titleNormal"> Livre d'Or (<b><em><?php echo $coms_count; ?></em></b>) </div> <br />

<?php foreach ($commentaires as $commentaire) : ?>

<div class="titleNews">Le <b><?php echo htmlspecialchars($commentaire->date).'</b>'; 
if($admin) echo '
<a href='.site_url('guessbook','delete',$commentaire->id).' title="Supprimer"> <img style="float:right;" src ='.img_url('devtool/delete.png').' /> </a>';
?></div>
<div class="titleNewsName">Posté par : <b> <?php echo htmlspecialchars($commentaire->pseudo); ?> </b></div>

<div class="text">
	<?php echo nl2br(htmlspecialchars($commentaire->text)); ?> 
</div>

<?php endforeach; ?>

<center> <?php echo $pagination; ?> </center>

<?php if($online): ?>
<div class="text"> <hr> 
   <form action="<?php echo site_url('guessbook','add'); ?>" method="post">
   
<center>	<div class="subtitle">Poster un commentaire:</div> <br />
	<textarea name="commentaire" style="width:300px;" class="login2" rows="10" cols="40" required>  </textarea> 
	   <br /> <br />
	   
     <input type="submit" style="width: 60px;" class="login2" name="Poster" />
</center>	 
   </form>


</div>

<?php endif; ?>


