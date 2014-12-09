<h3>
	Liste des participants pour l'action <?php echo $_GET['id']?>
</h3>
<table  border = '2'>
<tr>
	<th>Code</th>
	<th>Nom</th>
	<th>Pr&eacute;nom</th>
	<th>R&ocirc;le</th>
	<th>Supprimer de l'activit&eacute;</th>
</tr>
<?php 
$ligne1 = fun_obtenir_chef_action($co, $_GET['id']);

?>
<tr>
	<td><?php echo $ligne1['N_AMIS'];?></td>
	<td><?php echo $ligne1['NOM_AMIS'];?></td>
	<td><?php echo $ligne1['PRENOM_AMIS'];?></td>
	<td>
		<select name='role' id='role'>
			<option selected='selected'>chef</option>
			<option>participant</option>
		</select>
	</td>
	<td><a href=''>X</a></td>
</tr>
<?php $resultat = fun_obtenir_participants_action($co, $_GET['id']);
foreach($resultat as $ligne2){
?>
<tr>
	<td><?php echo $ligne2['N_AMIS'];?></td>
	<td><?php echo $ligne2['NOM_AMIS'];?></td>
	<td><?php echo $ligne2['PRENOM_AMIS'];?></td>
	<td>
		<select name='role' id='role'>
			<option>chef</option>
			<option selected='selected'>participant</option>
		</select>
	</td>
	<td><a href=''>X</a></td>
</tr>
<?php } ?>
</table>