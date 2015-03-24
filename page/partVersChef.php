<?php

$req=$co->prepare("select * from participant where N_ACTION= :action AND N_AMIS= :ami");
$req->execute(array('action'=>$_POST['N_ACTION'],'ami'=>$_POST['N_AMIS']));

$retourne=$req->fetch();
if($retourne)
{
	$req3=$co->prepare("update action set N_AMIS = :ami WHERE N_ACTION = :action");
	$req3->execute(array('ami'=>$retourne['N_AMIS'],'action'=>$retourne['N_ACTION']));
	$req2=$co->prepare("delete from participant where N_AMIS = :ami AND N_ACTION = :action");
	$req2->execute(array('ami'=>$retourne['N_AMIS'],'action'=>$retourne['N_ACTION']));
}
else
{
	echo "L'action n'existe pas";
}

?>

