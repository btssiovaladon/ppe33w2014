<?php
	$afficher_amis = $co->query('SELECT * FROM amis');
?>

<form name="form_saisie_montant" action="index.php?page=form_saisie_montant.php" method="post">
	<select>
		<?php foreach ($afficher_amis as $ligne) { ?>
			<option value="<?php echo $ligne['N_AMIS']; ?>">
				<?php echo $ligne['NOM_AMIS']. " " .$ligne['PRENOM_AMIS']; ?>
			</option>
		<?php } ?>
		
	</select>
	<input type="text" name="valeur_montant" id="valeur_montant"placeholder="Saisir le montant" size="47"/>
	<input type="submit" name="btn_valider" id="btn_valider"/>
</form> 

<?php
	if(isset($_POST['btn_valider'])){
		$montant = $_POST['valeur_montant'];
		if(empty($_POST['valeur_montant'])){
			echo '<div class="error">Veuillez renseigner le champs.</div>';
		}
		else if(filter_var($montant, FILTER_VALIDATE_FLOAT) == false){ 
	    	echo '<div class="error">Saisie du montant incorecte.</div>';
		}
		else
		{
			$requete = $co->prepare('INSERT INTO amis (MT_VERSE) VALUES(:valeur_montant)');
			$requete->execute(array(
							"valeur_montant" => $montant));

			echo '<div class="success">Opération réussie.</div>';
		}
	}
?>