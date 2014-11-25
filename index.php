<html>
	<head>
		<meta charset="iso-8859-15">
		<link rel="stylesheet" href="css/reset.css" type="text/css" media="screen">
		<link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
<<<<<<< HEAD
		<link rel="stylesheet" href="css/grid.css" type="text/css" media="screen">
		<link rel="stylesheet" type="text/css" href="css/charteGraphique.css" />
		<link rel="stylesheet" type="text/css" href="../css/message_box.css">
=======
		<link rel="stylesheet" href="css/grid.css" type="text/css" media="screen">	 

		<link rel="stylesheet" type="text/css" href="css/charteGraphique.css" />
		<link rel="stylesheet" type="text/css" href="css/message_box.css">
>>>>>>> 262d37857420bd03beffb4b8baefb019e0d9cebf
		<title>Le club des AMIS</title>
	</head>

	<body id="page1">
			
			<?php include ("include/pdo_fonction.php"); 
			
			//Permet de definir la connexion PDO
			$co = fun_connexion_pdo();?>
		<div id="entete">
			<?php include ("include/inc_entete.php"); ?>
		
		
		<center><div id="corps">
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