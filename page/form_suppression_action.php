<?php
// SI users connecté
	if(isset($_GET['num'])){
		$sql='delete from action where N_ACTION = '.$_GET['num'].';';
		$co->query($sql);
		
		if ($co->query($sql) == TRUE) {
			?><script type="text/javascript">
			alert('Suppression effectu\351e.');
			document.location.href = 'index.php';
			</script><?php
		}
		else{
			?>
			<script type="text/javascript">
			alert('Erreur suppression.');
			document.location.href = '?page=form_modification_action.php';
			</script><?php
		}
	}
	else{
		?><script>document.location.href = '?page=form_modification_action.php';</script> <?php 
	}
?>