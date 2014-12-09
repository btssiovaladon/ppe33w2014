<?php

ob_start();

include("../include/pdo_fonction.php");
include("../include/fonction.php");

$co = fun_connexion_pdo();

$commission = fun_obtenir_commission($co, $_GET['commission']);
$actions = fun_obtenir_action_commission($co, $_GET['commission']);

$write = "";

$write .= "<h2>Actions réalisées par ".$commission['NOM_COMMISSION']."</h2>";

$write .= "<table>";
	$write .= "<tr>";
		$write .= "<td>Date de l'action</td>";
		$write .= "<td>Durée de l'action</td>";
		$write .= "<td>Fonds Collectés</td>";
	$write .= "</tr>";
	

foreach($actions as $a){

	$write .= "<tr>";
		$write .= "<td>".date_us_vers_fr($a['DATE_DEB_ACTION'])."</td>";
		$write .= "<td>".$a['DUREE_ACTION']."</td>";
		$write .= "<td>".$a['FONDS_COLLECTES']."</td>";
	$write .= "</tr>";

}

$write .= "</table>";

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

?>