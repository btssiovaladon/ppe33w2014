<script src="js/fonction.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<?php if(isset($_GET['membre'])){
fun_supprimer_participant_action($co,$_GET['id'],$_GET['membre']);
header('location: ?page=pag_actmembre_consult.php&id='.$_GET['id']);
}
?>
<h3>
	Liste des participants pour l'action <?php echo $_GET['id'];?>
</h3>

<?php $id = $_GET['id'];?>
<table  border = '2'>
<tr>
	<th>Code</th>
	<th>Nom</th>
	<th>Pr&eacute;nom</th>
	<th>R&ocirc;le</th>
	<th>Supprimer de l'activit&eacute;</th>
</tr>
<?php 
$ligne1 = fun_obtenir_chef_action($co, $id);
?>
<tr>
	<td><?php echo $ligne1['N_AMIS'];?></td>
	<td><?php echo $ligne1['NOM_AMIS'];?></td>
	<td><?php echo $ligne1['PRENOM_AMIS'];?></td>
	<td>
		<select name='role' id='role' onchange="javascript:envoiidchef(<?php echo $id; ?>)">
			<option selected='selected'>chef</option>
			<option>participant</option>
		</select>
	</td>
	<td></td>
</tr>
<?php $resultat = fun_obtenir_participants_action($co, $id);
		foreach($resultat as $ligne2){
?>
<tr>
	<td><?php echo $ligne2['N_AMIS'];?></td>
	<td><?php echo $ligne2['NOM_AMIS'];?></td>
	<td><?php echo $ligne2['PRENOM_AMIS'];?></td>
	<td>
		<select name='role' id='role' onchange="javascript:envoiidpart(<?php echo $ligne2['N_AMIS']; ?>,<?php echo $id; ?>)">
			<option>chef</option>
			<option selected='selected'>participant</option>
		</select>
	</td>
	<td><a href="?page=pag_actmembre_consult.php&id=<?php echo $id;?>&membre=<?php echo $ligne2['N_AMIS'];?>">X</a></td>
</tr>
<?php
}
?>
</table>