<?php
	//INCLUDE
	include ('../include/pdo_fonction.php');

	$co = fun_connexion_pdo();

	//REQUETES
	$commission = $co->query('SELECT * FROM commission');
	$afficher_amis = $co->query('SELECT N_AMIS,NOM_amis,PRENOM_amis FROM amis');
?>

<!-- CONTROLE ET ENVOIE -->
<?php 

	if(isset($_POST['btn_valider'])){
		$commission = $_POST['commission'];
		if(empty($_POST['commission'])){
			echo '<div class="error">Veuillez renseigner une commission.</div>';
		}
		$president = $_POST['president'];
		if(empty($_POST['president'])){
			echo '<div class="error">Veuillez renseigner un président.</div>';
		}
		$secretaire = $_POST['secretaire'];
		if(empty($_POST['secretaire'])){
			echo '<div class="error">Veuillez renseigner un secretaire.</div>';
		}
		$coordinateur = $_POST['coordinateur'];
		if(empty($_POST['coordinateur'])){
			echo '<div class="error">Veuillez renseigner un coordinateur.</div>';
		}
		
		else
		{
			$requete = $co->prepare('INSERT INTO `gerer`(`N_COMMISSION`, `N_AMIS`, `N_FONCTION`) VALUES (:commission,:president,1)');
			$requete->execute(array(
							"commission" => $commission,
							"president" => $president));
			
			$requete = $co->prepare('INSERT INTO `gerer`(`N_COMMISSION`, `N_AMIS`, `N_FONCTION`) VALUES (:commission,:secretaire,2)');
			$requete->execute(array(
							"commission" => $commission,
							"secretaire" => $secretaire));
							
			$requete = $co->prepare('INSERT INTO `gerer`(`N_COMMISSION`, `N_AMIS`, `N_FONCTION`) VALUES (:commission,:coordinateur,3)');
			$requete->execute(array(
							"commission" => $commission,
							"coordinateur" => $coordinateur));
							
			echo '<div class="success">Opération réussie.</div>';
		}
	}
?>
<!-- -->

<!-- FORM SAISIE BUREAU commission -->
	<form name="form_saisie_bureau_commission" action="#" method="post">
		<select name="commission">
			<?php foreach ($commission as $ligne) { ?>
				<option value="<?php echo $ligne['N_COMMISSION']; ?>">
					<?php echo $ligne['NOM_COMMISSION']; ?>
				</option>
			<?php } ?>
		</select>
		<br />

				Président de commission :
				<select name="president">
					<?php foreach ($afficher_amis as $ligne) { ?>
					<option value="<?php echo $ligne['N_AMIS']; ?>">
						<?php echo $ligne['NOM_amis']. " " .$ligne['PRENOM_amis']; ?>
					</option>
					<?php } ?>
				</select>
				<br />
				Secrétaire :
				<select name="secretaire">
				<?php	$afficher_amis = $co->query('SELECT N_AMIS,NOM_amis,PRENOM_amis FROM amis'); ?>
					<?php foreach ($afficher_amis as $ligne1) { ?>
					<option value="<?php echo $ligne1['N_AMIS']; ?>">
						<?php echo $ligne1['NOM_amis']. " " .$ligne1['PRENOM_amis']; ?>
					</option>
					<?php } ?>
				</select>
				<br />
				Coordinateur :
				<select name="coordinateur">
				<?php	$afficher_amis = $co->query('SELECT N_AMIS,NOM_amis,PRENOM_amis FROM amis'); ?>
					<?php foreach ($afficher_amis as $ligne2) { ?>
					<option value="<?php echo $ligne2['N_AMIS']; ?>">
						<?php echo $ligne2['NOM_amis']. " " .$ligne2['PRENOM_amis']; ?>
					</option>
					<?php } ?>
				</select>
				
			
		
		
		<input type="submit" name="btn_valider" id="btn_valider"/>
	</form>
<!-- -->
