<?php 
	
	if(isset($_GET['suppr']) && !isset($_POST['diner'])){
			
																?>
	<form action="" method="post">
		
		<?php
		$compte = fun_compte_participant($co, $_GET['suppr']);
		if ( $compte['COMPTE'] > 0){
		
		?>
			Attention: Il y a des participants  </br>
		<?php
		}
		
		?>
		
		&Ecirc;tes vous sur de vouloir supprimer ce diner ? 
		
		<input type="submit" name="Supprimer" value="Supprimer"/>
		<a href="?page=form_tableau_diner.php"> <input type="button" name="annuler" value="Annuler"/></a>
		
		<input type="hidden" name="diner" value="<?php echo $_GET['suppr'];?>"/>
	
	</form>
	
<?php
	}
	
	if(isset($_POST['Supprimer'])){
		
				fun_delete_all_participant_diner($co, $_POST['diner']);
?>
		<script>
				alert("Suppression 1 reussie !");
		</script>
<?php
			/*fun_delete_diner_participant($co, $_GET['id'], $_POST['particip']);*/
			fun_delete_diner ($co, $_POST['diner']);
?>
		<script>
				alert("Supression 2 reussie !");
		</script>
<?php
	}
	
	$diners = fun_get_all_diner($co);
	
?>

<form method="POST" action='index.php?page=form_tableau_diner.php'>
	<select name="liste_diner">
		<?php 
			foreach($diners as $d) { 
				if (isset($_POST["liste_diner"]) && $_POST["liste_diner"] == $d["N_DINER"]) {
		?>
					<option value="<?php echo $d["N_DINER"]; ?>" selected><?php echo $d["DATE_DINER"]; ?>	
		<?php 
				}  // fin if
				else {
		?>
					<option value="<?php echo $d["N_DINER"]; ?>"><?php echo $d["DATE_DINER"]; ?>	
		<?php
				}  // else
			}
		?>
	</select>
	<input type="submit" value="Valider">
</form>

<?php if (isset($_POST["liste_diner"])){ ?>

	<table border="1" style="text-align: center;">
		<tr>
			<?php 
				foreach($diners as $d){
				if($d["N_DINER"] ==  $_POST["liste_diner"]){
			?>
			
			<td><?php echo $d["DATE_DINER"]; ?> </td>

			<!-- <td> <a href="?page=form_inscription_diner.php&id=<?php // echo $d['N_DINER']; ?>">Ajouter un participant</a> </td>
			<td> <a href="?page=form_consultation_diner.php&id=<?php // echo $d['N_DINER']; ?>">Consultation</a> </td>
			<td> <a href="?page=form_modification_diner.php?id=<?php // echo $d['N_DINER']; ?>">Modification</a> </td>
			<td> <a href="?page=form_suppression_diner.php?id=<?php // echo $d['N_DINER']; ?>">Suppression</a> </td>
			<td> <a href="?page=form_edition_diner.php?id=<?php // echo $d['N_DINER']; ?>">Edition</a> </td> -->
 
			<td> <a href="?page=form_inscription_diner.php&id=<?php echo $d['N_DINER']; ?>"><img src="images/ajouter.png"/><br/>Ajouter un participant</a> </td>
			<td> <a href="?page=form_consultation_diner.php&id=<?php echo $d['N_DINER']; ?>"><img src="images/consulter.png"/><br/>Consultation</a> </td>
			<td> <a href="?page=form_modification_diner.php&id=<?php echo $d['N_DINER']; ?>"><img width="16px" height="16px" src="images/page2-img2.png"/><br/>Modification</a> </td>
			<td> <a href="?page=form_tableau_diner.php&suppr=<?php echo $d['N_DINER'];?>" name="supprimer" value="Supprimer"/><img src="images/supprimer.png"/><br/>Suppression </a> </td>
			<td> <a href="page/form_edition_participant_diner.php?id=<?php echo $d['N_DINER']; ?>" title="Création d'un PDF"><img src="images/pdf.png"/><br/>Edition</a> </td>

			
			<?php }} ?>
		</tr>
	</table>
<?php } ?>

