<<<<<<< HEAD
<table  border = '2' bordercolor = 'darkblue'>
<tr>
	<th>Code</th>
	<th>Nom</th>
	<th>Prenom</th>
	<th>Role</th>
	<th>Suprimer de l'activit&eacute;</th>
</tr>
<?php $resultat1=$co->query('SELECT amis.*, action.N_AMIS as n_chef FROM amis inner join action on amis.N_AMIS = action.N_AMIS ORDER BY amis.N_AMIS');
	$resultat2=$co->query('SELECT amis.*, participant.N_AMIS as n_participant FROM amis inner join participant on amis.N_AMIS = participant.N_AMIS ORDER BY amis.N_AMIS');
while($ligne=$resultat1->fetch()){
?>
<tr>
	<td><?php echo $ligne['N_AMIS'];?></td>
	<td><?php echo $ligne['NOM_AMIS'];?></td>
	<td><?php echo $ligne['PRENOM_AMIS'];?></td>
	<td><?php if($ligne['N_AMIS']==$ligne['n_chef']){
=======
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
>>>>>>> 5712d2f36547117f114727195361bc54fd982614
		echo 'chef';}
		else{echo "participant";}?></td>
	<td><a href=''>X</a></td>
</tr>
<?php } ?>
</table>