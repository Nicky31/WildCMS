<center>
<div class="titleNormal"> Modifier mon e-mail </div> <br />

<form method="post">

<u>Question secrète :</u> <?php echo $infos[0]['question']; ?> <br /> <br />
<input type="text" class="login2" name="response" placeholder="Réponse secrète" required /> <br /> <br />

<u>Nouvel e-mail:</u> <br /> <br />
<input type="text" class="login2" name="newEmail" placeholder="E-mail" pattern="^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$" required /> <br /> <br />

  <input type="submit" style="width: 60px;" class="login2" name="Poster" />
</form>

</center>