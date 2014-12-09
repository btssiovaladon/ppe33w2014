<center>
	<h1>Saisie d'une cotisation</h1>
<<<<<<< HEAD
<<<<<<< HEAD
	<form name="form_saisie_cotisation" action="?page=form_saisie_cotisation.php" method="post">
=======
	<form name="form_saisie_cotisation" action="index.php?page=form_saisie_cotisation.php" method="post">
>>>>>>> 59bdb41b38691baedf85e94f4125a228c1ebd878
=======
	<form name="form_saisie_cotisation" action="index.php?page=form_saisie_cotisation.php" method="post">
>>>>>>> 5712d2f36547117f114727195361bc54fd982614
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