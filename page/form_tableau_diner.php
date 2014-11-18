<?php
	$diners = get_all_diner($co);
?>

<form method="POST" action=''>
	<select onchange="chargerDiner();">
		<?php foreach($diners as $d){ ?>
			<option value="<?php echo $d["N_DINER"]; ?>"><?php echo $d["DATE_DINER"]; ?>	
		<?php } ?>
	</select>
	
	<?php if(isset($_POST["N_DINER"])){ ?>
	<table>
		<tr>
			<?php 
				foreach($diners as $d){
				if($d["N_DINER"] ==  $_POST["N_DINER"]){
			?>
			
			<td><?php echo $d["DATE_DINER"]; ?> </td>
			<td> <a href="form_ajout_diner.php?id=<?php echo $d['N_DINER']; ?>">Ajouter un participant</a> </td>
			<td> <a href="form_consultation_diner.php?id=<?php echo $d['N_DINER']; ?>">Consultation</a> </td>
			<td> <a href="form_modificatin_diner.php?id=<?php echo $d['N_DINER']; ?>">Modification</a> </td>
			<td> <a href="form_suppression_diner.php?id=<?php echo $d['N_DINER']; ?>">Suppression</a> </td>
			<td> <a href="form_edition_diner.php?id=<?php echo $d['N_DINER']; ?>">Edition</a> </td>
			
			<?php }} ?>
		</tr>
	</table>
	<?php } ?>
</form>

