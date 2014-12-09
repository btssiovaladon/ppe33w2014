<?php 
ob_start();
$write = "";

$write .= "TEST";
echo "coucou";
$contenu = ob_get_clean();
include("../include/html2pdf/html2pdf_v4.03/html2pdf.class.php");
try{
	$html2pdf = new HTML2PDF('P', 'A4', 'fr');
	$html2pdf->setDefaultFont('Arial');
	$html2pdf->writeHTML($write);
	$html2pdf->Output('releve_diner.pdf');
}
catch(HTML2PDF_exception $e){
	 $e;
	exit;
}
?>