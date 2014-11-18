<h2>Inscription d'un AMI au diner du ...</h2>

<?php 
	$tabAmi = fun_get_all_ami($co)
?>

<form method="GET" action="">
	<tr>
		<td>
			<select name="listeAmis">
				<option>Choisir...</option>
				<?php foreach($tabAmi as $ligne) {?>
				<option><?php echo $ligne['NOM_AMIS'].'/'.$ligne['PRENOM_AMIS'];?></option>
				<?php 
					} // fin while
					$resultat->closeCursor();
				?>
			</select>
		</td>
		<td><input type="text" name="nbinvite"/></td>
	</tr>
	
	<tr>
		<td><input type="submit" name="Inscrire" value="Inscription"/></td>
	</tr>
</form>
