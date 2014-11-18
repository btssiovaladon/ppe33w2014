<?php

/*
Permet d'ouvrir une connexion
*/

function fun_connexion_pdo() {
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
}

/*
Permet de récupérer les participants d'un diner
*/

function fun_get_participant_by_diner($co, $id){

	$obtenir = $co->prepare("SELECT * FROM participer p INNER JOIN amis a ON p.N_AMIS = a.N_AMIS WHERE N_DINER = :id");
	$obtenir->execute(array("id" => $id));
	
	return $obtenir->fetchAll();

}

?> 