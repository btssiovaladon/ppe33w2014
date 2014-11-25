
<link rel="stylesheet" type="text/css" href="../css/message_box.css">

<center>
	<h1>Saisie d'une cotisation</h1>
	<form name="form_saisie_cotisation" action="form_saisie_cotisation.php" method="post">
		<input type="text" name="valeur_cotisation" id="valeur_cotisation"placeholder="Saisir le montant de la cotisation" size="47"/>
		<input type="submit" name="btn_valider" id="btn_valider"/>
	</form> 
</center>
<?php
if(isset($_POST['btn_valider'])){
	$cotisation = $_POST['valeur_cotisation'];
	if(empty($_POST['valeur_cotisation'])){
		echo '<div class="error">Veuillez renseigner le champs.</div>';
	}
	else if(filter_var($cotisation, FILTER_VALIDATE_FLOAT) == false){ 
    	echo '<div class="error">Saisie de la cotisation incorecte.</div>';
	}
	else
	{
		fun_insert_cotisation($co, $_POST['valeur_cotisation']);
		echo '<div class="success">Opération réussie.</div>';
	}
}

?>