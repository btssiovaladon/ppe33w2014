<?php
$num = 1;
$resultats = $co->prepare("SELECT N_ACTION, N_AMIS, DATE_DEB_ACTION, DUREE_ACTION, FONDS_COLLECTES FROM action WHERE N_ACTION=:num;");
$resultats->execute(array(':num' => $num));
if(isset($_POST['Modifier'])){
	$result = $co->prepare("UPDATE `action` SET `N_ACTION`=:action,`N_AMIS`=:amis,`DATE_DEB_ACTION`=:debaction,`DUREE_ACTION`=:duree,`FONDS_COLLECTES`=:fonds WHERE N_ACTION=1;");
	$result->execute(array(':action' => $_POST['action'], 
							':amis' => $_POST['amis'], 
							':debaction' => $_POST['date'], 
							':duree' => $_POST['duree'], 
							':fonds' => $_POST['fond']
								));
	
	echo "<script>alert('Modification effectu\351e.');</script>";
}


echo '<form action="" method="POST">';
echo '<table><tr>';
while( $resultat = $resultats->fetch() )
{  ?>
	<td></td><td><input type="hidden" name="action" value="<?php echo $resultat['N_ACTION']; ?>"></td>
	</tr><tr>
	<td>Num&eacute;ro amis : </td><td><input type="text" name="amis" value="<?php echo $resultat['N_AMIS']; ?>"></td>
	</tr><tr>
	<td>Date d&eacute;but des actions : </td><td><input type="text" name="date" value="<?php echo $resultat['DATE_DEB_ACTION']; ?>"></td>
	</tr><tr>
	<td>Dur&eacute;e des action : </td><td><input type="text" name="duree" value="<?php echo $resultat['DUREE_ACTION']; ?>"></td>
	</tr><tr>
	<td>Fonds collect&eacute;s : </td><td><input type="text" name="fond" value="<?php echo $resultat['FONDS_COLLECTES']; ?>"></td>
	</tr><tr>
	<td> </td><td><input type="submit" name="Modifier" ></td>
	
	<?php
}
echo '</tr></table>';
echo '</form>';
$resultats->closeCursor();

