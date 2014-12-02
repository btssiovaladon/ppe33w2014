<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=clubamis', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}


$resultat=$bdd->query('SELECT NOM_AMIS,PRENOM_AMIS,N_ACTION FROM amis as a INNER JOIN ACTION as ac on a.N_AMIS=ac.N_AMIS')

?>
<label>Tableau des amis avec leurs Rôles</label><br/>
<div id="listeamis">
???
</div>
	
<br>
<form method="post" action="">
 
       <label for="ami">Sélectionner un ami</label><br/>
       <select name="ami" id="ami">
	   
<?php

$reponse = $bdd->query('SELECT * FROM amis');
 
while ($donnees = $reponse->fetch())
{
?>
     <option value="1"><?php echo $donnees['NOM_AMIS']. ' ' .$donnees['PRENOM_AMIS']; ?> </option>
<?php
}
 
$reponse->closeCursor();
 
?>
</select>
<button>Ajouter</button>

 
</form>
