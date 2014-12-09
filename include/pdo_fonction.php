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

function fun_get_all_commissions ($co) {
	$requete = $co->query('SELECT * FROM commission');
	return $requete->fetchAll();
}

function fun_inscrire_commission ($co, $commission, $ami, $fonction) {
	$test=fun_get_inscription_commission($co,$commission,$ami);
	if(empty($test)){
	$requete = $co->prepare('INSERT INTO gerer VALUES(:idC, :idA, :fonction)');
	$requete->execute(array(
							"idC" => $commission,
							"idA" => $ami,
							"fonction" => $fonction ));
	echo "<script>alert('Inscription réussie :)')</script>";
	}
	else echo "<script>alert('Inscription déja existante !')</script>";
}

function fun_get_ami ($co, $ami) {
	$requete = $co->prepare('SELECT * FROM amis WHERE N_AMIS=:num');
	$requete->execute( array("num" => $ami) );
	return $requete->fetch();
}

function fun_get_inscription_commission($co,$commission,$ami) {
	$requete = $co->prepare("SELECT * FROM gerer WHERE N_COMMISSION=:idC AND N_AMIS=:idA");
	$requete->execute(array("idC" => $commission,
							"idA" => $ami));
	return $requete->fetchAll();
}

function fun_get_all_fonctions($co) {
	$requete = $co->query('SELECT * FROM fonction');
	return $requete->fetchAll();
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
	-> Permet d'obtenir l'identité du participant
	-> et ses invités pour un diner choisit ($id)
	-> Retourne un tableau avec les enregistrements correspondant
 */
 function fun_get_info_participant_diner ($co, $id) {
	$requete = $co->prepare("SELECT A.N_AMIS, NOM_AMIS, PRENOM_AMIS, NOMBRE_INVITE FROM AMIS AS A INNER JOIN PARTICIPER AS P ON A.N_AMIS = P.N_AMIS WHERE P.N_DINER = :id");
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
function fun_inscrire_diner ($co, $numAmi, $numDiner, $nbInvite) {
	$requete = $co->prepare('INSERT INTO participer VALUES(:NumAmi, :NumDiner, :NbInvite)');
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
	$requete = $co->prepare("INSERT INTO parametre (MT_COTISATION) VALUES(:montant)");
	$requete->execute(array("montant" => $valeur));	
}
/**
	-> GESTION AMIS
*/
function fun_suppr_amis ($co, $valeur) {
	$resultat = $co->prepare('DELETE FROM amis WHERE N_AMIS = :numForm');
	$resultat -> execute (array ('numForm' =>$valeur));
}

function fun_afficher_amis ($co) {
	$resultat = $co->query('SELECT * FROM amis');
	return $resultat->fetchAll();
}

function fun_modif_amis ($co, $val1,$val2,$val3,$val4,$val5,$val6,$val7,$val8,$val9,$val10,$val11,$val12,$val13) {
$resultat = $co->prepare('UPDATE amis SET N_FONCTION =:F_FONC, NOM_AMIS =:F_NAMIS,
	PRENOM_AMIS =:F_PAMIS, TEL_FIX_AMIS =:F_TELF, TEL_PORTABLE_AMIS =:F_TELF, 
	EMAIL_AMIS =:F_EMAIL, RUE_AMIS =:F_RUE, 
	VILLE_AMIS=:F_VILLE, DATE_ENTREE_AMIS=:F_DATE, 
	MT_VERSE =:F_MT, PARRAIN_1 = :F_PARRAIN1, PARRAIN_2 = :F_PARRAIN2 
	WHERE N_AMIS = :F_NOAMIS');
$resultat -> execute (array (
	'F_NOAMIS' =>$val1,
	'F_FONC' =>$val2,
	'F_NAMIS' =>$val3,
	'F_PAMIS' =>$val4,
	'F_TELF' =>$val5,
	'F_TELP' =>$val6,
	'F_EMAIL' =>$val7,
	'F_RUE' =>$val8,
	'F_VILLE' =>$val9,
	'F_DATE' =>$val10,
	'F_MT' =>$val11,
	'F_PARRAIN1' =>$val12,
	'F_PARRAIN2' =>$val13
));
}

function fun_afficher_ami ($co, $valeur) {
$resultat = $co->prepare('SELECT * FROM AMIS WHERE N_AMIS =:NAMIS');
$resultat -> execute (array ('NAMIS' =>$valeur));
return $resultat->fetch();
}

/**
	-> FIN GESTION AMIS
*/



/**
	-> FIN GESTION AMIS
*/

function fun_obtenir_action_commission($co, $commission){

	$resultat = 
	$co->prepare("SELECT * FROM action a
					INNER JOIN amis am ON a.N_AMIS = am.N_AMIS
					INNER JOIN gerer ge ON ge.N_AMIS = am.N_AMIS
					INNER JOIN commission c ON ge.N_COMMISSION = c.N_COMMISSION
					WHERE c.N_COMMISSION = :com");
	$resultat->execute(array('com' => $commission));
	
	return $resultat->fetchAll();

}

function fun_obtenir_commission($co, $commission){

	$resultat = $co->prepare("SELECT * FROM commission WHERE N_COMMISSION = :com");
	$resultat->execute(array("com" => $commission));
	
	return $resultat->fetch();

}

function fun_obtenir_chef_action($co, $act){
	$resultat = $co -> prepare('SELECT amis.*, action.N_AMIS as n_chef FROM amis inner join action on amis.N_AMIS = action.N_AMIS WHERE action.N_ACTION = :id');
	$resultat -> execute(array('id' => $act));

	return $resultat->fetch();
}

function fun_obtenir_participants_action($co, $act){
	$resultat = $co -> prepare('SELECT amis.*, participant.N_AMIS as n_participant FROM amis inner join participant on amis.N_AMIS = participant.N_AMIS WHERE participant.N_ACTION = :id');
	$resultat -> execute(array('id' => $act));

	return $resultat->fetchAll();
}

function fun_supprimer_participant_action($co,$act,$mem){
	$resultat = $co -> prepare('DELETE FROM PARTICIPANT WHERE N_AMIS = :mem AND N_ACTION = :act');
	$resultat -> execute(array('mem'=>$mem, 'act'=>$act));
}

?> 