

<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=clubamis', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}


$resultat=$bdd->query('SELECT nom_amis,prenom_amis,nom_fonction FROM amis as a INNER JOIN fonction as f on a.n_fonction=f.n_fonction')

?>
<table border="5">
<TR>
		<TD>Nom</TD>
		<TD>Prenom</TD>
		<TD>Roles</TD>
</TR>
<?php

while($ligne=$resultat->fetch()){
?>
<TR>
		<TD> <?php echo $ligne["nom_amis"];?></TD>
		<TD> <?php echo $ligne["prenom_amis"];?></TD>
		<TD> <?php echo $ligne["nom_fonction"];?></TD>
</TR>
<?php } ?>
	</table>	

<form method="post" action="">
 
       <label for="ami">Sélectionner un ami</label><br />
       <select name="ami" id="ami">
<?php

 
 
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