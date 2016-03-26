<center>
<div class="titleNormal"> Modifier mon Mot de passe </div> <br />

<form method="post">

<u>Question secrète :</u> <?php echo $infos[0]['question']; ?> <br /> <br />
<input type="text" class="login2" name="response" placeholder="Réponse secrète" required /> <br /> <br />

<u>Nouveau mot de passe: *</u> <br /> <br />
<input type="password" class="login2" name="newPass" placeholder="Mot de passe" pattern="^.{5,49}$" required /> <br /> <br />

<u>Retapez-le:</u> <br /> <br />
<input type="password" class="login2" name="newPass2" placeholder="Confirmation du mot de passe" pattern="^.{5,49}$" required /> <br /> <br />

  <input type="submit" style="width: 60px;" class="login2" name="Poster" /> <br> <br>
</form>

<em>
* 5 a 49 caractères
</em>

</center>