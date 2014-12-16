<?php

$req=$co->prepare("select N_AMIS from action where N_ACTION= :id");
$req->execute(array('id'=>$_POST['N_ACTION']));
$retourne=$req->fetch();
if($retourne)
{
	$req2=$co->prepare("insert into participant values(:ami,:action)");
	$req2->execute(array('ami'=>$retourne['N_AMIS'];'action'=>$_POST['N_ACTION']));
	$cree=$req2->fetch();
	$req3=$co->prepare("update action set N_AMIS = NULL WHERE N_ACTION = :action");
	$req3->execute(array('action'=>$_POST['N_ACTION']));
	$supprime = $req3->fetch();
}
else
{
	echo "L'action n'existe pas";
}

?>

