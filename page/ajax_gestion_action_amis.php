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
		<TD> <?php echo $ligne["N_ACTION"];?></TD>
</TR>
<?php } ?>
	</table>	
