<div class="titleNormal"> Le Staff </div> <br /> <br /> 
<center>

<table>
<tr> <td>Pseudo </td> <td>Rôle</td> <td>Contact</td> </tr>

<?php foreach($staffs as $staff): ?>
<tr> <td><?php echo htmlspecialchars($staff->pseudo); ?> </td> <td><?php echo htmlspecialchars($staff->rôle); ?></td> <td><?php echo htmlspecialchars($staff->contact); ?></td> </tr>

<?php endforeach; ?>

</table>

</center>