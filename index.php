<?php

if(isset($_GET['ajax'])){

	include("ajax/".$_GET['ajax']);

}
else{

	?>
	<html>
		<head>
			<meta charset="utf-8">
			<link rel="stylesheet" href="css/reset.css" type="text/css" media="screen">
			<link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
			<link rel="stylesheet" href="css/grid.css" type="text/css" media="screen">	 
			<link rel="stylesheet" type="text/css" href="css/charteGraphique.css" />
			<link rel="stylesheet" type="text/css" href="../css/message_box.css">
			<title>Le club des AMIS</title>
		</head>

		<body id="page1">
				
				<?php include ("include/pdo_fonction.php"); 
				
				//Permet de definir la connexion PDO
				$co = fun_connexion_pdo();?>
			<div id="entete">
					
				<?php include ("include/inc_entete.php"); ?>
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
<?php
}
?>