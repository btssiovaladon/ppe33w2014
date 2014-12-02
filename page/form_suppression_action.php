<?php
include ('../include/pdo_fonction.php');
$co = fun_connexion_pdo();
$num=1;
if($num){
	$sql='delete from action where N_ACTION = '.$num.';';
	$co->query($sql);
	
	if ($co->query($sql) == TRUE) {
		echo "Record deleted successfully";
	}
}

?>

