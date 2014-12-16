<?php

$req=$co->query("select * from amis where NOM_AMIS like '".
$_POST['NOM_AMIS']."%'"."ORDER by NOM_AMIS,PRENOM_AMIS");


$pers=$req->fetch(PDO::FETCH_ASSOC);
if ($pers)
{
	$resultat=$pers['N_AMIS'].'*'.$pers['NOM_AMIS'].'*'.
	$pers['PRENOM_AMIS'];
	$pers=$req->fetch(PDO::FETCH_ASSOC);
}
else
{
	$resultat='';
}
while($pers)
{
	$resultat=$resultat.'/'.$pers['N_AMIS'].'*'.
	$pers['NOM_AMIS'].'*'.$pers['PRENOM_AMIS'];

	$pers=$req->fetch(PDO::FETCH_ASSOC);
}
//mysql_close(
echo $resultat; 
//le tableau résultat va être renvoyé en retour à la méthode

?>

