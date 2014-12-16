<?php
include ('../include/pdo_fonction.php');
// SI users connecté
	if(isset($_GET['num'])){
		$sql='delete from action where N_ACTION = '.$_GET['num'].';';
		$co->query($sql);
		
		if ($co->query($sql) == TRUE) {
			?><script type="text/javascript">
			alert('Suppression effectu\351e.');
			document.location.href = 'form_modification_action.php';
			</script><?php
		}
		else{
			?>
			<script type="text/javascript">
			alert('Erreur suppression.');
			document.location.href = 'form_modification_action.php';
			</script><?php
		}
	}
	else{
		 header('Location: form_modification_action.php');  
	}
?>