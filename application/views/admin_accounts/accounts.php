								<div class="titleNormal"> Gestion des comptees (<b><em><?php echo $accounts_count; ?></em></b>) </div> 
																<br />

		<div class="text">
		
		<center>
			<form method="post" action="<?php echo site_url('admin_accounts','search'); ?>">
				<table>
					<tr><td title=" Recherche un/des compte(s) à l'aide d'un des éléments proposés"> Rechercher un(e) : </td> <td> 
					   <select name="item" class="login2">
						   <option value="account">Nom de Compte</option>
						   <option value="pseudo">Pseudo</option>
						   <option value="lastIP">Adresse IP</option>
					   </select> :
					</td> </tr>
					
					<tr> <td> <input type="text" class="login2" name="search" required></td> <td> <input  class="login2" type="submit" /> </td> </tr>
				</table>
			</form> <br />
		</center>
			

				
	<table>
<tr> <td>Nom de compte</td> <!--<td>E-mail</td>--> <td>Dernière connection </td> <td>Pseudo</td>  <!--<td>Etat </td> <td>Dé/Bannir</td> --> </tr>

<?php foreach ($accounts as $account) : ?>
<tr> <td><b><?php echo url($account->account,'admin_accounts','displayAccount',$account->guid); ?></b></td>  <td><?php echo $account->lastConnectionDate; ?></td> <td><?php echo $account->pseudo; ?></td> </tr>


<?php endforeach; ?>

	</table> 
		</div>

		<br /> <br />
		
	<center>
<?php echo $pagination; ?> <br /> <br />

			<form method="post" action="<?php echo site_url('admin_accounts','clearAccounts'); ?>">
				<table>
					<tr><td> Supprimer les comptes : </td> <td> 
					   <select name="type" class="login2">
						   <option value="never_connected">jamais connectés</option>
						   <option value="inactives">Inactifs depuis</option>
					   </select> :
					</td> </tr>
					
					<tr> <td> <input type="text" class="login2" name="date" title="Tous les comptes dont la dernière connection est avant cette date seront supprimés" placeholder="JJ/MM/AAAA"> </td> <td> <input  class="login2" type="submit" /> </td> </tr>
				</table>
			</form> <br />
			
	</center>
