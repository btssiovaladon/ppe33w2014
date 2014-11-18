<?php

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

/**
	-> Permet de récupérer l'ensemble des dîners
	-> Retourne un tableau avec tous les enregistrements  
 */
function fun_get_all_diner ($co) {
	$requete = $co->query('SELECT * FROM diner');
	return $requete->fetchAll();
}

/**
	-> Permet de récupérer un dîner selon un Num
	-> Retourne un tableau avec l'enregistrement correspondant
 */
function fun_get_diner ($co, $num) {
	$requete = $co->prepare('SELECT * FROM diner WHERE N_DINER=:num');
	$requete->execute( array("num" => $num) );
	return $requete->fetch();
}


/**
	-> Permet de récupérer l'ensemble des amis
	-> Retourne un tableau avec tous les enregistrements  
 */
function fun_get_all_ami ($co) {
	$requete = $co->query('SELECT * FROM amis');
	return $requete->fetchAll();
}

/**
	-> Permet d'inscrire un ami et ses convives
	-> pour un diner voulu dans "participer" 
 */
function fun_set_inscrire_diner ($co, $numAmi, $numDiner, $nbInvite) {
	$requete = $co->query('INSERT INTO participer VALUES(:NumAmi, :NumDiner, :NbInvite)');
	$requete->execute(array(
							"NumAmi" => $numAmi,
							"NumDiner" => $numDiner,
							"NbInvite" => $nbInvite ));
}
?> 