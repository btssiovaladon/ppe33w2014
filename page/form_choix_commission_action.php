<?php

	$com = fun_get_all_commissions ($co);

?>

<form action="page/edition_commission_action.php" target="_blank" method="get">

	<select name="commission">
		<?php
			foreach($com as $c){
				?>
				<option value="<?php echo $c['N_COMMISSION'];?>"><?php echo $c['NOM_COMMISSION'];?></option>
				<?php
			}
		?>
	</select>
	
	<input type="submit" name="Afficher"/>

</form>