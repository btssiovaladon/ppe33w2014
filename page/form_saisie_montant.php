<?php
	//INCLUDE
	include ('../include/pdo_fonction.php');

	$co = fun_connexion_pdo();

	//REQUETES
	$afficher_amis = $co->query('SELECT * FROM amis');
	$adresse_mail = $co->query('SELECT EMAIL_AMIS FROM AMIS WHERE EMAIL_AMIS= /** Lamis qui est connecté **/');
?>

<!-- FORM SAISIE MONTANT -->
	<form name="form_saisie_montant" action="#" method="post">
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
<!-- -->

<!-- CONTROLE ET ENVOIE -->
<?php
	if(isset($_POST['btn_valider'])){
		$montant = $_POST['valeur_montant'];
		if(empty($_POST['valeur_montant'])){
			echo '<div class="error">Veuillez renseigner le champs.</div>';
		}
		else if(filter_var($montant, FILTER_VALIDATE_FLOAT) == false){ 
	    	echo '<div class="error">Saisie du montant incorecte.</div>';

	    	$to      = $adresse_mail;
    		$subject = 'Information sur le montant que vous avez saisi';
    		$message = 'Bonjour le Club Amis vous informe que le montant que vous avez saisi auparavent est incorrect';
     		mail($to, $subject, $message);

		}
		else
		{
			$requete = $co->prepare('INSERT INTO amis (MT_VERSE) VALUES(:valeur_montant) WHERE N_AMIS = /** L'amis qui est connecté **/');
			$requete->execute(array(
							"valeur_montant" => $montant));

			echo '<div class="success">Opération réussie.</div>';
		}
	}
?>
<!-- -->