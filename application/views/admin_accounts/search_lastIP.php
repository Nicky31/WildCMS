<div class="titleNormal"> Résultats de la recherche de l'IP <b><?php echo $search; ?></b> : </div> <br />

		<center>
	<table>
<tr> <td>Nom de compte</td> <td> Pseudo</td> <td>Dernière connection</td> </tr>

<?php foreach($accounts as $account): ?>

<tr> <td><b><?php echo url($account->account,'admin_accounts','displayAccount',$account->guid); ?></b> </td> <td><?php echo $account->pseudo;?> </td>  <td><?php echo $account->lastConnectionDate;?> </td> </tr>

<?php endforeach; ?>

	</table> <br />
			<a href="<?php echo site_url('admin_accounts');?>" title="Retourner à la liste des comptes"> <?php echo img('devtool/return.png'); ?> </a>
		</center>