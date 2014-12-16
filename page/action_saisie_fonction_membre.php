<?php 
 session_start(); // à mettre tout en haut du fichier .php, cette fonction propre à PHP servira à maintenir la $_SESSION 
 include("../include/pdo_fonction.php");
 if(isset($_POST['connexion'])) 
 { 
 	$connexion=fun_connexion_pdo();
	fun_Saisie_fonction_membre($connexion,$_POST['cIdMembre'],$_POST['fonctionM']);
 } 
 	 
 header('Location: ../index.php');

 ?>