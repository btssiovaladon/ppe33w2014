<h2>Inscription d'un AMI au diner du ...</h2>

<?php 
	if (isset($_GET['Inscrire'])) {
	
		fun_set_inscrire_diner($co, $_GET['listeAmis'], $_GET['numdiner'], $_GET['nbinvite']);
	
	}  // fin if isset

	$tabAmi = fun_get_all_ami($co)
?>

<form method="GET" action="">
	<tr>
		<td>
			<select name="listeAmis">
				<option>Choisir...</option>
				<?php foreach($tabAmi as $ligne) { ?>
				<option><?php echo $ligne['NOM_AMIS'].'/'.$ligne['PRENOM_AMIS'];?></option>
				<?php 
					} // fin foreach
				?>
			</select>
		</td>
		<td><input type="hidden" name="numdiner" value="$_GET['N_DINER']"/></td>   // mémorise la variable N_DINER pour le formulaire
		<td><input type="text" name="nbinvite"/></td>
	</tr>
	
	<tr>
		<td><input type="submit" name="Inscrire" value="Inscription"/></td>
	</tr>
</form>
