<?php 
 //session_start(); // à mettre tout en haut du fichier .php, cette fonction propre à PHP servira à maintenir la $_SESSION 
 include("../include/pdo_fonction.php");
 if(isset($_POST['connexion'])) 
 { // si le bouton "Connexion" est appuyé // on vérifie que le champ "Pseudo" n'est pas vide // empty vérifie à la fois si le champ est vide et si le champ existe belle et bien (is set) 
 	if(empty($_POST['login'])) 
 	{ 
 		echo "Le champ Pseudo est vide."; 
 	} 
 	else 
 	{ // on vérifie maintenant si le champ "Mot de passe" n'est pas vide" 
 		if(empty($_POST['password'])) 
 		{ 
 			echo "Le champ Mot de passe est vide."; 
 		} 

 		else 
 		{ // les champs sont bien posté et pas vide, on sécurise les données entrées par le membre:
 		 	$connexion=fun_connexion_pdo(); 
 			//$Login = htmlentities($_POST['login'], ENT_QUOTES); // le htmlentities() passera les guillement en entités HTML, ce qui empéchera les iinjections SQL 
 			//$Password = htmlentities($_POST['password'], ENT_QUOTES); // on fait maintenant la requête dans la base de données pour rechercher si ces données existe et correspondent: 
 			$Requete = $connexion->prepare("SELECT * FROM utilisateur WHERE login =:Login AND password =:Password"); // si il y a un résultat, mysql_num_rows() nous donnera alors 1 // si mysql_num_rows() retourne 0 c'est qu'il a trouvé aucun résultat
 			$Requete->execute(array(
 									':Login'=>$_POST['login'],
 									':Password'=>$_POST['password']));
 			$ligne = $Requete->fetch();
 			if($ligne == 0) 
 			{ 
 				echo "Le pseudo ou le mot de passe est incorrect, le compte n'a pas été trouvé."; 
 			} 
 			else 
 			{ 
 				// la session peut être appelée différement et son contenu aussi peut être autre chose que le pseudo echo "Vous êtes à présent connecté !"; 
 				$_SESSION['login'] = $ligne['login']; 
 			} 
 		}
 	}

 } 
 	 
 header('Location: ../index.php');       
 ?> 