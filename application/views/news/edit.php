<div class= "titleNormal"> Editer une news </div> <br />

<form method="post">
   <center>
   
	  Titre : <input type="text" class="login2" name="title" id="title" value= "<?php echo $new[0]['titre']; ?>" required /> <br /> <br />
	  
	   News: <br />
	   <textarea name="news" style="width:300px;text-align:left;" class="login2" rows="10" cols="40" required> 
			<?php echo $new[0]['text']; ?>
	   </textarea> 
	   <br /> <br />
	   
	   <input type="submit" style="width: 60px;" class="login2" name="Poster" />
	   
	   	</center>
</form>
