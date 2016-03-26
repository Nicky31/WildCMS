<center>
<div class="titleNormal"> Mon Compte </div>

<table>
<tr> <td>Nom de compte </td> <td> <?php echo $infos[0]['account']; ?></td> <td><?php echo '<a href='.site_url('account','setAccount').'>'.img('devtool/setting.png').'</a>';?></td> </tr>
<tr> <td>Pseudo </td> <td><?php echo $infos[0]['pseudo']; ?></td> <td><?php echo '<a href='.site_url('account','setPseudo').'>'.img('devtool/setting.png').'</a>';?></td> </tr>
<tr> <td>Mot de passe </td> <td> *********</td> <td><?php echo '<a href='.site_url('account','setPassword').'>'.img('devtool/setting.png').'</a>';?></td> </tr>
<tr> <td>E-mail </td> <td><?php echo $infos[0]['email']; ?></td> <td><?php echo '<a href='.site_url('account','setEmail').'>'.img('devtool/setting.png').'</a>';?></td></tr>
<tr> <td>Question secrète</td> <td><?php echo $infos[0]['question']; ?></td><td><?php echo '<a href='.site_url('account','setQuestion').'>'.img('devtool/setting.png').'</a>';?></td> </tr>
<tr> <td>Nombre de points</td> <td><?php echo $infos[0]['points']; ?></td> <td> </td></tr>
</table>

</center>