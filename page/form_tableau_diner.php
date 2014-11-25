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
	<table border="1">
		<tr>
			<?php 
				foreach($diners as $d){
				if($d["N_DINER"] ==  $_POST["liste_diner"]){
			?>
			
			<td><?php echo $d["DATE_DINER"]; ?> </td>
			<td> <a href="index.php?page=form_inscription_diner.php?id=<?php echo $d['N_DINER']; ?>">Ajouter un participant</a> </td>
			<td> <a href="form_consultation_diner.php?id=<?php echo $d['N_DINER']; ?>">Consultation</a> </td>
			<td> <a href="form_modificatin_diner.php?id=<?php echo $d['N_DINER']; ?>">Modification</a> </td>
			<td> <a href="form_suppression_diner.php?id=<?php echo $d['N_DINER']; ?>">Suppression</a> </td>
			<td> <a href="form_edition_diner.php?id=<?php echo $d['N_DINER']; ?>">Edition</a> </td>
			
			<?php }} ?>
		</tr>
	</table>
<?php } ?>

