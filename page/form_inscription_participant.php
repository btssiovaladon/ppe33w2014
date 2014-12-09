<?php
/*try
{
    $bdd = new PDO('mysql:host=localhost;dbname=clubamis', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}*/
//include("include/pdo_fonction.php");
$chef = fun_obtenir_chef_action($co, $_GET["id"]);
$participant = fun_obtenir_participants_action($co, $_GET["id"]);
?>

<label>Tableau des amis avec leurs Rôles</label><br/>

<div>
<table border="5" id="tableauAction">
<TR>
		<TD>Nom</TD>
		<TD>Prenom</TD>
		<TD>Roles</TD>
</TR>
<TR>
		<TD> <?php echo $chef["NOM_AMIS"];?></TD>
		<TD> <?php echo $chef["PRENOM_AMIS"];?></TD>
		<TD> <?php echo "responsable";?></TD>
</TR>
<?php


while($ligne=$resultat->fetch()){
?>
<TR>
		<TD> <?php echo $participant["NOM_AMIS"];?></TD>
		<TD> <?php echo $participant["PRENOM_AMIS"];?></TD>
		<TD> <?php echo "participant";?></TD>
</TR>
<?php } ?>
	</table>	
</div>
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
<br><br>
<label><u>Rôle de l'ami</u></label>
<br>
Chef:<input type="radio" name="chef" onclick="action()">
Participant:<input type="radio" name="participant" onclick="action()">

<input type ="button" value ="Ajouter"  onclick=ajouterligne() />

 
</form>

<script type="text/javascript">
function ajouterligne()
{
var ligne =document.getElementId("tableauAction").InsertRow(-1);
var colonne0=ligne.insertCell(0);
colonne0.innerHTML=document.getElementById("Nom").
var colonne1=ligne.insertCell(1);
colonne1.innerHTML=document.getElementById("Prenom");
var colonne2=ligne.insertCell(2);
colonne2.innerHTML=document.getElementById("Roles");
}
</script>
