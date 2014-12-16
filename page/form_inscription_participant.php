<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src = "js/autoc.js"></script>;
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
$participants = fun_obtenir_participants_action($co, $_GET["id"]);
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


foreach($participants as $ligne){
?>
<TR>
		<TD> <?php echo $ligne["NOM_AMIS"];?></TD>
		<TD> <?php echo $ligne["PRENOM_AMIS"];?></TD>
		<TD> <?php echo "participant";?></TD>
</TR>
<?php } ?>
	</table>	
</div>
</div>
	
<br>
<form method="post" action="">
 
<tr><td>Liste des personnes :
	<select id="listePers" size="1">
		<option align="left"><input type="text" id ="NOM_AMIS" name="NOM_AMIS" onkeyup="javascript:envoipersajax(this.value)"></option>	
	</select></td></tr>
<br><br>

<input type ="button" value ="Ajouter"  onclick="ajouterligne()" />

 
</form>

<script type="text/javascript">
function ajouterligne()
{
var ligne =document.getElementById("tableauAction").insertRow(-1);
var colonne0=ligne.insertCell(0);
colonne0.innerHTML="claude";
var colonne1=ligne.insertCell(1);
colonne1.innerHTML="re-claude";
var colonne2=ligne.insertCell(2);
colonne2.innerHTML="participant";
}
</script>
