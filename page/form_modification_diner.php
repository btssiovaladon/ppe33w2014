
<?php 

if(isset($_POST["Submit"])){
	
		fun_modif_diner($co, $_POST['date'], $_POST['lieu'], $_POST['rue'], $_POST['ville'], $_POST['prix']); 
		
		?>
		
		<script>
				alert("Modification reussie !");
		</script>

<?php 
}
 $ligne = fun_get_diner ($co, $_GET['id']);

?>

<form method="POST" action=''> 

	<table>
		<tr>
			<td> Date du dîner: </td>
			<td> <input type="date" name="date" value="<?php echo $ligne["DATE_DINER"];?>"/></td>
		</tr>		
		<tr>
			<td> Lieu du dîner: </td>
			<td> <input type="text" name="lieu" value="<?php echo $ligne["LIEU_DINER"];?>"/></td>
		</tr>		
		<tr>
			<td> Rue du dîner: </td>
			<td> <input type="text" name="rue" value="<?php echo $ligne["RUE_DINER"];?>"/></td>
		</tr>		
		<tr>
			<td> Ville du dîner: </td>
			<td> <input type="text" name="ville" value="<?php echo $ligne["VILLE_DINER"];?>"/></td>
		</tr>		
		<tr>
			<td> Prix du repas: </td>
			<td> <input type="text" name="prix" value="<?php echo $ligne["PRIX_REPAS"];?>"/></td>
		</tr>
		<tr> 	
			<td> <input type="submit" name="Submit" value="Modifier"/> </td>
		</tr>
	</table>
</form>

