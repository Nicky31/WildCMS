<div class = "titleNormal"> Informations </div> <br /> <br />

	<center>
<div class="text">
<?php echo $intro; ?><br /> <br />

<hr> <br />

<table>
<tr><td> Type </td> <td><?php echo $type; ?> </td></tr>
<tr><td> Rate PvM </td> <td><?php echo $pvm; ?> </td></tr>
<tr><td> Rate drops </td> <td><?php echo $drop; ?> </td></tr>
<tr><td> Rate Kamas </td> <td><?php echo $kamas; ?> </td></tr>
<tr><td> Rate pts d'Honneur </td> <td><?php echo $honor; ?> </td></tr>
</table> <br /> <br />

<table>
<tr><td> Nombre de comptes </td> <td><?php echo $accounts; ?> </td> <td> </td> </tr>
<tr><td> Nombre de Persos </td> <td><?php echo $persos; ?> </td> <td> </td> </tr>
<tr><td> Nombre de Neutres </td> <td><?php echo $neutres; ?> </td> <td> <?php echo round($neutres / $persos,2) * 100; ?> % </td></tr>
<tr><td> Nombre d'Anges </td> <td><?php echo $anges; ?> </td> <td> <?php echo round($anges / $persos,2) * 100; ?> % </td> </tr>
<tr><td> Nombre de Demons </td> <td><?php echo $demons; ?> </td> <td> <?php echo round($demons / $persos,2) * 100; ?> % </td> </tr>
</table> <br /> <br />

<table>
<tr><td> Nombre de Fecas </td> <td><?php echo $fecas; ?> </td> <td> <?php echo round($fecas / $persos,2) * 100; ?> % </td> </tr>
<tr><td> Nombre d'Osamodas </td> <td><?php echo $osas; ?> </td> <td> <?php echo round($osas / $persos,2) * 100; ?> % </td>  </tr>
<tr><td> Nombre d'Enutrofs </td> <td><?php echo $enus; ?> </td> <td> <?php echo round($enus / $persos,2) * 100; ?> % </td></tr>
<tr><td> Nombre de Srams </td> <td><?php echo $srams; ?> </td> <td> <?php echo round($srams / $persos,2) * 100; ?> % </td> </tr>
<tr><td> Nombre de Xelors </td> <td><?php echo $xelors; ?> </td> <td> <?php echo round($xelors / $persos,2) * 100; ?> % </td> </tr>
<tr><td> Nombre d'Ecaflips </td> <td><?php echo $ecas; ?> </td> <td> <?php echo round($ecas / $persos,2) * 100; ?> % </td> </tr>
<tr><td> Nombre d'Eniripsas </td> <td><?php echo $enis; ?> </td> <td> <?php echo round($enis / $persos,2) * 100; ?> % </td> </tr>
<tr><td> Nombre de Iops </td> <td><?php echo $iops; ?> </td> <td> <?php echo round($iops / $persos,2) * 100; ?> % </td> </tr>
<tr><td> Nombre de Crâs </td> <td><?php echo $cras; ?> </td> <td> <?php echo round($cras / $persos,2) * 100; ?> % </td> </tr>
<tr><td> Nombre de Sadidas </td> <td><?php echo $sadis; ?> </td> <td> <?php echo round($sadis / $persos,2) * 100; ?> % </td> </tr>
<tr><td> Nombre de Sacrieurs </td> <td><?php echo $sacris; ?> </td> <td> <?php echo round($sacris / $persos,2) * 100; ?> % </td> </tr>
<tr><td> Nombre de Pandawas </td> <td><?php echo $pandas; ?> </td> <td> <?php echo round($pandas / $persos,2) * 100; ?> % </td> </tr>
</table>




</div>
	</center> 