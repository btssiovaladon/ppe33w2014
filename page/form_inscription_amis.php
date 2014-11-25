<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=clubamis', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}


$resultat=$bdd->query('SELECT NOM_AMIS,PRENOM_AMIS,NOM_FONCTION FROM amis as a INNER JOIN fonction as f on a.N_FONCTION=f.N_FONCTION')

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
		<TD> <?php echo $ligne["NOM_AMIS"];?></TD>
		<TD> <?php echo $ligne["PRENOM_AMIS"];?></TD>
		<TD> <?php echo $ligne["NOM_FONCTION"];?></TD>
</TR>
<?php } ?>
	</table>	
<br>
<form method="post" action="">
 
       <label for="ami">Sélectionner un ami</label><br />
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
 
</form>
