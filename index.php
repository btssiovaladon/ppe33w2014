<html>
	<head>
		<meta charset="iso-8859-15">
		<link rel="stylesheet" type="text/css" href="css/charteGraphique.css" />
		<link rel="stylesheet" type="text/css" href="css/message_box.css">
		<title>Le club des AMIS</title>
	</head>
	<body>
			<?php include ("include/pdo_fonction.php"); 
			
			//Permet de definir la connexion PDO
			$co = fun_connexion_pdo();?>
		<div id="entete">
			<?php include ("include/inc_entete.php"); ?>
		</div>
		
		<center><div id="corps">
			<?php
			include ("include/inc_menu.php");
			?>
			<br/>
			<?php
			if(!isset($_GET["page"]))
			{
				include ("include/inc_accueil.php");
			}
			else
			{
				include ("page/".$_GET["page"]);
			}
			?>
		</div></center>
		<br/>
		<div id="pied">
			<?php
			include ("include/inc_pied.php");
			?>
		</div>
	</body>
</html>