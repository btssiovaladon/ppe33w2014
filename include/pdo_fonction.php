<?php
	try {
		$db = "mysql:host=localhost;dbname=clubamis";
		$utilisateur = "root";
		$mdp = "";
		$connexion = new PDO($db, $utilisateur, $mdp); 
		return $connexion;
	}  // try
	catch (PDOException $e) {
		print("Erreur=".$e->getMessage());
	} // fin catch
?>