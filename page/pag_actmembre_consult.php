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
	<td><?php if($ligne1['N_AMIS']==$ligne1['n_chef']){
		echo 'chef';}
		else{echo "participant";}?></td>
	<td><a href=''>X</a></td>
</tr>
<?php } ?>
</table>