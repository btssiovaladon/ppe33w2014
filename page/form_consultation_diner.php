<?php
	
	//Id diner : $_GET['id']
	
	$participants = fun_get_participant_by_diner($co, $_GET['id']);

?>

<table>

	<tr>
		<td>Nom</td>
		<td>Prénom</td>
		<td>Nombre d'invités</td>
		<td>Supprimer du dîner</td>
	</tr>
	
	<?php
	
	foreach($participants as $p){
	
		?>
		
		<tr>
			<td><?php echo $p['NOM_AMIS'];?></td>
			<td><?php echo $p['PRENOM_AMIS'];?></td>
			<td><?php echo $p['NOMBRE_INVITE'];?></td>
			<td><a href="">Supprimer</a></td>
		</tr>

		<?php
	
	}
	
	?>
	
</table>