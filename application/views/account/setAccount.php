<center>
<div class="titleNormal"> Modifier mon nom de compte </div> <br />

<form method="post">

<u>Question secrète :</u> <?php echo $infos[0]['question']; ?> <br /> <br />
<input type="text" class="login2" name="response" placeholder="Réponse secrète" required /> <br /> <br />

<u>Nouveau nom de compte: *</u> <br /> <br />
<input type="text" class="login2" name="newAccount" placeholder="Nom de compte" pattern="^[a-zA-Z0-9-]{6,15}$" required /> <br /> <br />

  <input type="submit" style="width: 60px;" class="login2" name="Poster" /> <br /> <br />
</form>

<em>
* Caractères autorisés: lettres,chiffres, tirets. <br />
6 a 15 caractères
</em>

</center>