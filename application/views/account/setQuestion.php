<center>
<div class="titleNormal"> Modifier ma question </div> <br />

<form method="post">

<u>Question secrète :</u> <?php echo $infos[0]['question']; ?> <br /> <br />
<input type="text" class="login2" name="response" placeholder="Réponse secrète" required /> <br /> <br />

<u>Nouvelle Question: *</u> <br /> <br />
<input type="text" class="login2" name="newQuestion" placeholder="Question secrète" pattern="^.{3,35}$" required /> <br /> <br />

<u>Nouvelle Réponse: **</u> <br /> <br />
<input type="text" class="login2" name="newResponse" placeholder="Réponse secrète" pattern="^.{3,20}$" required /> <br /> <br />

  <input type="submit" style="width: 60px;" class="login2" name="Poster" /> <br /> <br />
</form>

<em>
* Entre 3 et 35 caractères <br />
** Entre 3 et 20 caractères 
</em>

</center>