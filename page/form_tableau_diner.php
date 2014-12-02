<?php
	$diners = fun_get_all_diner($co);
?>

<form method="POST" action='index.php?page=form_tableau_diner.php'>
	<select name="liste_diner">
		<?php foreach($diners as $d){ ?>
			<option value="<?php echo $d["N_DINER"]; ?>"><?php echo $d["DATE_DINER"]; ?>	
		<?php } ?>
	</select>
	<input type="submit" value="Valider">
</form>

<?php if(isset($_POST["liste_diner"])){?>
	<table border="1" style="text-align: center;">
		<tr>
			<?php 
				foreach($diners as $d){
				if($d["N_DINER"] ==  $_POST["liste_diner"]){
			?>
			
			<td><?php echo $d["DATE_DINER"]; ?> </td>
			<td> <a href="?page=form_inscription_diner.php&id=<?php echo $d['N_DINER']; ?>"><img src="images/ajouter.png"/><br/>Ajouter un participant</a> </td>
			<td> <a href="?page=form_consultation_diner.php&id=<?php echo $d['N_DINER']; ?>"><img src="images/consulter.png"/><br/>Consultation</a> </td>
			<td> <a href="?page=form_modification_diner.php?id=<?php echo $d['N_DINER']; ?>"><img width="16px" height="16px" src="images/page2-img2.png"/><br/>Modification</a> </td>
			<td> <a href="?page=form_suppression_diner.php?id=<?php echo $d['N_DINER']; ?>"><img src="images/supprimer.png"/><br/>Suppression</a> </td>
			<td> <a href="page/form_edition_participant_diner.php?id=<?php echo $d['N_DINER']; ?>" title="Création d'un PDF"><img src="images/pdf.png"/><br/>Edition</a> </td>
			
			<?php }} ?>
		</tr>
	</table>
<?php } ?>

