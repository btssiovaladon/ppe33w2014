<form method="POST" action='index.php?page=form_ajout_diner.php'>
	<table>
		<tr>
			<td> Date du dîner: </td>
			<td> <input type="date" name="date"/> </td>
		</tr>		
		<tr>
			<td> Lieu du dîner: </td>
			<td> <input type="text" name="lieu"/> </td>
		</tr>		
		<tr>
			<td> Rue du dîner: </td>
			<td> <input type="text" name="rue"/> </td>
		</tr>		
		<tr>
			<td> Ville du dîner: </td>
			<td> <input type="text" name="ville"/> </td>
		</tr>		
		<tr>
			<td> Prix du repas: </td>
			<td> <input type="text" name="prix"/> </td>
		</tr>
		<tr>
			<td> <input type="submit" name="submit" value="Ajouter"> </td>
		</tr>
	</table>
</form>

<?php
	if(isset($_POST["submit"])) {
		
	fun_insert_diner($co, $_POST["date"], $_POST["lieu"], $_POST["rue"], $_POST["ville"], $_POST["prix"]);
	
?>
	<script>
				alert("Insertion reussie !");
		</script>
<?php
	}
?>

