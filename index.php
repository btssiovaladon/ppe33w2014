<?php
include ("include/pdo_fonction.php"); 
include ("include/fonction.php"); 
$co = fun_connexion_pdo();

if(isset($_GET['ajax'])){

	include("ajax/".$_GET['ajax']);

}
else if(isset($_GET['pdf'])){
	
	include("page/".$_GET['pdf']);

}
else{

	?>
	<html>
		<head>
			<meta charset="iso-8859-15">
			<link rel="stylesheet" href="css/reset.css" type="text/css" media="screen">
			<link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
			<link rel="stylesheet" href="css/grid.css" type="text/css" media="screen">	 
			<link rel="stylesheet" type="text/css" href="css/charteGraphique.css" />
			<link rel="stylesheet" type="text/css" href="../css/message_box.css">
			<title>Le club des AMIS</title>
		</head>

		<body id="page1">
				
			<div id="entete">
				<?php include ("include/inc_entete.php"); ?>
			</div>
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