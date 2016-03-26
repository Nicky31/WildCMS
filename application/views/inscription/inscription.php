<center>
<div class="titleNormal"> Inscription </div> <br />

<form method="post">
		
	<table>
		<tr><td>Nom de compte *</td><td><input type="text" name="account" class="login2" pattern="^[a-zA-Z0-9-]{6,15}$" placeholder = "Nom de compte" required /></td></tr>
		<tr><td>Mot de passe **</td><td><input type="password" name="password" class="login2" pattern="^.{5,49}$" placeholder = "Mot de passe" required /></td></tr>
		<tr><td>Retapez-le **</td><td><input type="password" name="passwordConfirm" class="login2" pattern="^.{5,49}$" placeholder = "Mot de passe"  required /></td></tr>
		<tr><td>Pseudo ***</td><td><input type="text" name="pseudo" class="login2" pattern="^[a-zA-Z-]{3,15}$" placeholder="Votre pseudo" required /></td></tr>
		<tr><td>Adresse email</td><td><input type="text" name="email" class="login2" pattern="^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$" placeholder="E-mail" required /></td></tr>
		<tr><td>Question secrète ****</td><td><input type="text" name="question" class="login2" pattern="^.{3,35}$" placeholder="Question secrète" required /></td></tr>
		<tr><td>Réponse secrète *****</td><td><input type="text" name="response" class="login2" pattern="^.{3,20}$" placeholder="Réponse secrète" required /></td></tr>
		<tr><td> </td> <td><input type="submit" class="login2" /></td></tr> 
	</table>
		
</form> <br /> <br />

<em>
* Lettres, chiffres et tirets, 6 a 15 caractère <br />
** 5 a 49 caractères <br />
*** Lettres et tirets, 3 a 15 caractères <br />
**** 3 a 35 caractères <br />
***** 3 a 20 caractères
</em>


</center>