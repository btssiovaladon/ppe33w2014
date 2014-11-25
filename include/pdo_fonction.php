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

function fun_get_all_comissions ($co) {
	$requete = $co->query('SELECT * FROM commission');
	return $requete->fetchAll();
}

function fun_inscrire_comission ($co, $comission, $ami) {
	$fonction = fun_get_fonction_ami($co,$ami);
	$requete = $co->query('INSERT INTO gerer VALUES(:idC, :idA, :fonction)');
	$requete->execute(array(
							"idC" => $comission,
							"idA" => $ami,
							"fonction" => $fonction ));
}

function fun_get_ami ($co, $ami) {
$requete = $co->prepare('SELECT * FROM amis WHERE N_AMI=:num');
	$requete->execute( array("num" => $ami) );
	return $requete->fetch();
}

function fun_get_fonction_ami ($co, $ami) {
$requete=fun_get_ami($co,$ami);
return $requete[0];
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
	-> Permet de récupérer les participants à un id
	-> Retoyrnne un tableau avec les enregistrements correspondant
 */
 
 function fun_get_participant_by_diner($co, $id){
 
	$requete = $co->prepare("SELECT * FROM participer p INNER JOIN diner d On p.N_DINER = d.N_DINER INNER JOIN amis a ON p.N_AMIS = a.N_AMIS WHERE p.N_DINER = :id");
	$requete->execute(array("id" => $id));
	return $requete->fetchAll();
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
	-> Permet de mettre à jour le nombre d'invités d'un diner
	
 */
 
function fun_update_diner_participant($co, $diner, $participant, $invites){

	$requete = $co->prepare("UPDATE participer SET NOMBRE_INVITE = :nb WHERE N_AMIS = :ami AND N_DINER = :diner");
	$requete->execute(array("nb" => $invites, "ami" => $participant, "diner" => $diner));

}

function fun_delete_diner_participant($co, $diner, $participant){

	$requete = $co->prepare("DELETE FROM participer WHERE N_AMIS = :ami AND N_DINER = :diner");
	$requete->execute(array("ami" => $participant, "diner" => $diner));

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

/**
	-> Permet d'ajouter un diner
*/

function fun_insert_diner ($co, $date, $lieu, $rue, $ville, $prix) {
	$requete = $co->prepare("INSERT INTO diner(DATE_DINER, LIEU_DINER, RUE_DINER, VILLE_DINER, PRIX_REPAS) VALUES(:date, :lieu, :rue, :ville, :prix)");
	$requete->execute(array("date" => $date,
							"lieu" => $lieu,
							"rue" => $rue,
							"ville" => $ville,
							"prix" => $prix));	
}

function fun_insert_cotisation ($co, $valeur) {
	$requete = $co->prepare("INSERT INTO parametre VALUES(:montant)");
	$requete->execute(array("montant" => $valeur));	
}

?> 