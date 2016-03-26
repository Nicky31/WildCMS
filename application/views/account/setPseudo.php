<center>
<div class="titleNormal"> Modifier mon pseudo </div> <br />

<form method="post">

<u>Question secrète :</u> <?php echo $infos[0]['question']; ?> <br /> <br />
<input type="text" class="login2" name="response" placeholder="Réponse secrète" required /> <br /> <br />

<u>Nouveau pseudo: *</u> <br /> <br />
<input type="text" class="login2" name="newPseudo" placeholder="Pseudo" pattern="^[a-zA-Z-]{3,15}$" required /> <br /> <br />

  <input type="submit" style="width: 60px;" class="login2" name="Poster" /> <br /> <br />
</form>

<em>
* Caractères autorisés : lettres et tiret ( - ) . <br />
3 a 15 caractères  </em>
</center>