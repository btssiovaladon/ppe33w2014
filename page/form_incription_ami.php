
<form method="post" action="">
 
       <label for="ami">Sélectionner un ami</label><br />
       <select name="ami" id="ami">
<?php
try
{
        $bdd = new PDO('mysql:host=localhost;dbname=clubamis', 'root', '');
}
catch(Exception $e)
{
            die('Erreur : '.$e->getMessage());
}
 
 
$reponse = $bdd->query('SELECT * FROM amis');
 
while ($donnees = $reponse->fetch())
{
?>
           <option value=" <?php echo $donnees['NOM_AMIS']; ?>"> <?php echo $donnees['PRENOM_AMIS']; ?></option>
<?php
}
 
$reponse->closeCursor();
 
?>
</select>
 
</form>
