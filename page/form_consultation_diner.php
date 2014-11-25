<?php
	
	//Id diner : $_GET['id']
	
	$pageActu = "?page=".$_GET['page']."&id=".$_GET['id'];
	
	if(isset($_GET['modifier'])){
	
		fun_update_diner_participant($co, $_GET['id'], $_GET['modif'], $_POST['nbInvite'.$_GET['modif']]);
	
	}
	else if(isset($_GET['suppr'])){
		
		?>
		
		<form action="<?php echo $pageActu;?>" method="post">
		
			Êtes vous sur de vouloir supprimer ce participant du diner ?
			
			<input type="submit" name="supprimer" value="Supprimer"/>
			<a href="<?php echo $pageActu;?>"><input type="button" name="annuler" value="Annuler"/></a>
			
			<input type="hidden" name="particip" value="<?php echo $_GET['suppr'];?>"/>
		
		</form>
		
		<?php
	
	}
	else if(isset($_POST['supprimer'])){
	
		fun_delete_diner_participant($co, $_GET['id'], $_POST['particip']);
	
	}
	else if(isset($_POST['modifier'])){
	
		$part = fun_get_participant_by_diner($co, $_GET['id']);
		
		foreach($part as $pa){

			$val = $_POST['nbInvite'.$pa['N_AMIS']];
			
			if($val != $pa['NOMBRE_INVITE']){
			
				fun_update_diner_participant($co, $_GET['id'], $pa['N_AMIS'], $val);
			
			}

		}		
	
	}
	
	$participants = fun_get_participant_by_diner($co, $_GET['id']);
	
?>
<form action="" method="post">
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
				<td><input type="text" name="<?php echo "nbInvite".$p['N_AMIS'];?>" value="<?php echo $p['NOMBRE_INVITE'];?>"/></td>
				<td><a href="<?php echo $pageActu."&suppr=".$p['N_AMIS'];?>"><input type="button" name="supprimer" value="Supprimer"/></a></td>
			</tr>

			<?php
		
		}
		
		?>
		
	</table>
	
	<input type="submit" name="modifier" value="Modifier"/>
	
</form>