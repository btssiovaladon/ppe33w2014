<h2>Inscription d'un AMI au diner du ...</h2>

<?php 
	// requete..
?>

<form method="GET" action="">
	<tr>
		<td>
			<select name="listeAmis">
				<option>Choisir...</option>
				<?php while($resultat=$ligne->fetch()) {?>
				<option><?php echo $ligne['Nom'].'/'.$ligne['Prenom'];?></option>
				<?php 
					} // fin while
					$resultat->closeCursor();
				?>
			</select>
		</td>
		<td><input type="text" name="nbinvite"/></td>
	</tr>
	
	<tr>
		<td><input type="submit" name="Submit" value="Inscrire"/></td>
	</tr>
</form>
