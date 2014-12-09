<?php
session_start();
if (!isset($_POST['Valider']))
{
?>
<html>
	<head>
		<meta charset="iso-8859-15">
		<link rel="stylesheet" href="css/reset.css" type="text/css" media="screen">
		<link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
		<link rel="stylesheet" href="css/grid.css" type="text/css" media="screen">	 
		<link rel="stylesheet" type="text/css" href="css/charteGraphique.css" />
		<link rel="stylesheet" type="text/css" href="css/message_box.css">
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.1.47/jquery.form-validator.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/autocompletion.css"/>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script type="text/javascript" src="../js/jquery.autocomplete.min.js"></script>
		<script>
			$(document).ready(function() {
			    $('#cmembre').autocomplete({
			        serviceUrl: 'action_autocompletion.php',
			        dataType: 'json'
			    });
			});
		</script>
		<title>Le club des AMIS</title>
	</head>

	<body>
		<center>
			<h1>Saisie d'un membre</h1>
			<form id="commentForm" action="form_saisie_membre.php" method="post">
				<table>
					<td><label for="cmembre">Entrer un membre : </label></td>

					<td><input type="text" id="cmembre" name="query" required /></td>
					<td><input type="submit" name="Valider" value="Valider" /></td>
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
		<link rel="stylesheet" href="css/reset.css" type="text/css" media="screen">
		<link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
		<link rel="stylesheet" href="css/grid.css" type="text/css" media="screen">	 
		<link rel="stylesheet" type="text/css" href="css/charteGraphique.css" />
		<link rel="stylesheet" type="text/css" href="css/message_box.css">
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.1.47/jquery.form-validator.min.js"></script>
		<title>Le club des AMIS</title>
	</head>

	<body id="page1">
		<center>
			<h1>Saisie d'un membre</h1>
			<form id="commentForm" action="form_saisie_membre.php" method="post">
				<table>
					<tr>
						<td><label for="cmembre">Nom du membre : </label></td>
						<td><input type="text" id="cmembre" name="prenom" value="<?php echo $_POST['query'];?>"/></td>

					</tr>

					<tr>
						<td><label for="cfonc">Fonction  : </label></td>
						<td><input type="text" id="cfonc" name="idFonc" required /></td>
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