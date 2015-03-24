<h2>Inscription d'un AMI au diner du ...</h2>
<br/>

<?php
	$tabAmi = fun_get_all_ami($co)
?>

<form method="POST" action="index.php?page=form_inscription_diner.php">
	<table border="0">
		<tr>
			<td>
				<select name="liste_amis">
					<option>Choisir...</option>
					<?php foreach($tabAmi as $ligne) { ?>
					<option value="<?php echo $ligne['N_AMIS'];?>"><?php echo $ligne['NOM_AMIS'].' / '.$ligne['PRENOM_AMIS'];?></option>
					<?php 
						} // fin foreach
					?>
				</select>
			</td>
			<td><input type="hidden" name="num_diner" value="<?php echo $_GET['id'];?>"/></td>   <!-- mémorise la variable N_DINER pour le formulaire -->
			
			<td><input type="text" placeholder=" ...nombre d'invit&eacute;s" name="nb_invite"/></td>
		
			<td> <input type="submit" name="Submit" value="Inscription"/> </td>
		</tr>
	</table>
</form>

<?php 
	if (isset($_POST['Submit'])) {
		echo "<hr> Variables :".$_POST['liste_amis']." / ".$_POST['num_diner']." / ".$_POST['nb_invite'];
		
		fun_inscrire_diner($co, $_POST['liste_amis'], $_POST['num_diner'], $_POST['nb_invite']);
		
?>

	<script>
				alert("Inscription reussie !");
	</script>

<?php	
	}  // fin if isset

?>