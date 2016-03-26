<div class="titleNormal"> Les News (<b><em><?php echo $news_count; ?></em></b>) </div> <br />

<?php foreach ($news as $new) : ?>

<div class="titleNews"><b><?php echo htmlspecialchars($new->titre).'</b> , le <b>'. $new->date.'</b>'; 
if($admin) echo '
<a href='.site_url('news','delete',$new->id).' title="Supprimer"> <img style="float:right;" src ='.img_url('devtool/delete.png').' /> </a>
<a href='.site_url('news','edit',$new->id).' title="Editer"> <img style="float:right;" src ='.img_url('devtool/edit.png').' /> </a>';
?></div>
<div class="titleNewsName">Posté par : <b> <?php echo htmlspecialchars($new->auteur); ?> </b></div>
<div class="text">
	<?php echo nl2br(htmlspecialchars($new->text)); ?> 
</div>

<?php endforeach; ?>

<center> <?php echo $pagination; ?> </center>
