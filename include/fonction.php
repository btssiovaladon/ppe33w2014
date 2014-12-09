<?php 

function date_us_vers_fr($date){

	$d = explode("-", $date);
	return $d[2]."/".$d[1]."/".$d[0];

}

?> 