<?php

ob_start();

include("../include/pdo_fonction.php");
include("../include/fonction.php");

$co = fun_connexion_pdo();


$diner = fun_get_diner ($co, $_GET["id"]);
$participant = fun_get_info_participant_diner ($co, $_GET["id"]);

$write = "";

$write .= "<body style='text-align:center;'>";

$write .= "<h2 style='text-decoration:underline;'>Participants et leurs invit&eacute;s au diner n&#176; ".$diner["N_DINER"].":</h2>";

$write .= "<table border='1' style='margin:auto;'>";
	$write .= "<tr>";
		$write .= "<td>Num&eacute;ro de l'amis</td>";
		$write .= "<td>Nom</td>";
		$write .= "<td>Pr&eacute;nom</td>";
		$write .= "<td>Nombre d' invit&eacute;s</td>";
	$write .= "</tr>";
	

foreach($participant as $p){

	$write .= "<tr>";
		$write .= "<td>".$p["N_AMIS"]."</td>";
		$write .= "<td>".$p["NOM_AMIS"]."</td>";
		$write .= "<td>".$p["PRENOM_AMIS"]."</td>";
		$write .= "<td>".$p["NOMBRE_INVITE"]."</td>";
	$write .= "</tr>";

}

$write .= "</table>";
$write .= "</body>";

echo utf8_encode($write);

$contenu = ob_get_clean();

include("../include/html2pdf/html2pdf_v4.03/html2pdf.class.php");

try{

	$html2pdf = new HTML2PDF('P', 'A4', 'fr');
	$html2pdf->setDefaultFont('Arial');
	$html2pdf->writeHTML($contenu);
	$html2pdf->Output('edition_commission_action.pdf');

}
catch(HTML2PDF_exception $e){
	
	echo $e;
	exit;

}

		// requête
		//$sql = mysql_query("SELECT * FROM diner AS d INNER JOIN participer as p ON d.N_DINER = p.N_DINER WHERE d.N_DINER = ".$id['N_DINER']);

?>
		


