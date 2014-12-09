

<html>
	<head>
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 5712d2f36547117f114727195361bc54fd982614
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/reset.css" type="text/css" media="screen">
		<link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
		<link rel="stylesheet" href="css/grid.css" type="text/css" media="screen">	 
<<<<<<< HEAD
		<link rel="stylesheet" type="text/css" href="css/charteGraphique.css" />
		<link rel="stylesheet" type="text/css" href="../css/message_box.css">
=======
		<meta charset="iso-8859-15">
		<link rel="stylesheet" href="css/reset.css" type="text/css" media="screen">
		<link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
<<<<<<< HEAD
		<link rel="stylesheet" href="css/grid.css" type="text/css" media="screen">
=======
>>>>>>> 5712d2f36547117f114727195361bc54fd982614
		<link rel="stylesheet" type="text/css" href="css/charteGraphique.css" />
<<<<<<< HEAD
		<link rel="stylesheet" type="text/css" href="css/message_box.css">
=======
		<link rel="stylesheet" type="text/css" href="../css/message_box.css">
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 730e4c0b215a82d4ee8a389f43c63f18d5da57db
>>>>>>> be8a19c6720de3ac3bbda968b1a7dac7d78a9b53
=======

=======
		<link rel="stylesheet" href="css/grid.css" type="text/css" media="screen">	 
		<link rel="stylesheet" type="text/css" href="css/charteGraphique.css" />
		<link rel="stylesheet" type="text/css" href="../css/message_box.css">
		<link rel="stylesheet" href="css/grid.css" type="text/css" media="screen">
		<link rel="stylesheet" type="text/css" href="css/charteGraphique.css" />
		<link rel="stylesheet" type="text/css" href="../css/message_box.css">
>>>>>>> bda888a2537dcc3deb174b0c1b836b942604f09a
		<link rel="stylesheet" href="css/grid.css" type="text/css" media="screen">	 
		<link rel="stylesheet" type="text/css" href="css/charteGraphique.css" />
		<link rel="stylesheet" type="text/css" href="css/message_box.css">
<<<<<<< HEAD

=======
>>>>>>> bda888a2537dcc3deb174b0c1b836b942604f09a
>>>>>>> e0c95d05a33cc266e3c5cdfd4d8bddce2af0f74f
>>>>>>> 59bdb41b38691baedf85e94f4125a228c1ebd878
=======
>>>>>>> 5712d2f36547117f114727195361bc54fd982614
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
			
<<<<<<< HEAD
			<?php
			
			if(isset($_GET['ajax'])){
				?>
				
				<div id="ajax">
				
				<?php
					include("ajax/".$_GET['ajax']);
				?>
				
				</div>
			
			<?php
			
=======
			<?php
			
			if(isset($_GET['ajax'])){
				?>
				
				<div id="ajax">
				
				<?php
					include("ajax/".$_GET['ajax']);
				?>
				
				</div>
			
			<?php
			
>>>>>>> 5712d2f36547117f114727195361bc54fd982614
			}
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