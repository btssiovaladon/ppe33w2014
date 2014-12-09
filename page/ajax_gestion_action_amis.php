<div id="listeamis">
<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=clubamis', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}


include("../include/pdo_fonction.php");
$chef = fun_obtenir_chef_action($co, $_GET["id"]);
$participant = fun_obtenir_participants_action($co, $_GET["id"]);


?>
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
