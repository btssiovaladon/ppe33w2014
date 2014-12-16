<?php
session_start();
include("../include/pdo_fonction.php");
if (!isset($_POST['Valider']))
{
?>
<html>
	<head>
		<meta charset="iso-8859-15">
		<script type="text/javascript" src="../js/jquery-1.11.1.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.1.47/jquery.form-validator.min.js"></script>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script type="text/javascript" src="../js/autoc2.js"></script>
		<script type="text/javascript">
			function updated(element)
			{
			    var idx=element.selectedIndex;
			    var val=element.options[idx].value;
			    var content=element.options[idx].innerHTML;
			    document.getElementById("cIdMembre").value=val;
			    document.getElementById("membre").value=content;
			    //alert(val + " " + content);
			 }
		</script>
		<title>Le club des AMIS</title>
	</head>

	<body id="page1">
		<center>
			<h1>Saisir d'un membre</h1>
			<!--envoipersajax(nom)-->
			<form id="Form2" action="form_saisie_membre.php" method="post">
				<table>
					<tr>
						<input type="hidden" id ="cIdMembre" name="cIdMembre"/>
						<td><label for="membre">Nom du membre : </label></td>
						<td><input type="text" id ="membre" name="membre" onkeyup="envoipersajax(this.value)" required /></td>
						<td><input type="submit" name="Valider" value="Valider" /></td>
					</tr>

					<tr>
						<td></td>
						<td><select id="listePers" size="" onclick="updated(this)"> </select></td>
					</tr>
				</table>				
			</form>		
		</center>

<?php
}
if (isset($_POST['Valider']))
{
?>
<html>
	<head>
		<meta charset="iso-8859-15">
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.1.47/jquery.form-validator.min.js"></script>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script type="text/javascript" src="../js/autoc2.js"></script>
		<title>Le club des AMIS</title>
	</head>

	<body id="page1">
		<center>
			<h1>Saisie d'un membre</h1>
			<form id="commentForm" action="action_saisie_fonction_membre.php" method="post">
				<table>
					<tr>
						<td><label for="cmembre">Nom du membre : </label></td>
						<input type="hidden" id="cIdMembre" name="cIdMembre" value="<?php echo $_POST['cIdMembre'];?>"/>
						<td><?php echo $_POST['membre'];?></td>
					</tr>

					<tr>
						<td><label for="cfonc">Fonction  : </label></td>
						<td>
							<select name="fonctionM" widht='20'>
							<?php 
								$connexion=fun_connexion_pdo();
								//$resultat=$connexion->query("SELECT * FROM fonction");
								$resultat=fun_obtenir_fonction_membre($connexion);
							 	while($ligne=$resultat->fetch())
							 	{
							?>	
							    <option value="<?php echo $ligne['N_FONCTION'];?>"><?php echo $ligne['NOM_FONCTION'] ;?></option>
							<?php
								}
							?>
							</select>
						</td>
						<td><input type="submit" name="enregistrer" value="Enregistrer" /></td>
						<td><a href="form_saisie_membre.php" ><input type="button" name="annuler" value="Annuler" /></a></td>
					</tr>
				</table>
			</form>
		</center>
<?php
}
?>

		<br/>
		<div id="pied">
			<?php
			include ("../include/inc_pied.php");
			?>
		</div>

	</body>
</html>