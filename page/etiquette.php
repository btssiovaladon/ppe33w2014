<?php
define('FPDF_FONTPATH', 'font/');
require_once('include/label/PDF_Label.php');

/*-------------------------------------------------
To create the object, 2 possibilities:
either pass a custom format via an array
or use a built-in AVERY name
-------------------------------------------------*/

// Example of custom format; we start at the second column
//$pdf = new PDF_Label(array('name'=>'perso1', 'paper-size'=>'A4', 'marginLeft'=>1, 'marginTop'=>1, 'NX'=>2, 'NY'=>7, 'SpaceX'=>0, 'SpaceY'=>0, 'width'=>99.1, 'height'=>38.1, 'metric'=>'mm', 'font-size'=>14), 1, 2);
// Standard format
$pdf = new PDF_Label('L7163', 'mm', 1, 2);

$pdf->Open();
$pdf->AddPage();

$resultat = fun_afficher_amis_action($co, $_GET['id']);

// Print labels
foreach ($resultat as $ligne){
    $pdf->Add_Label(sprintf("%s %s\n%s\n%s", $ligne["NOM_AMIS"], $ligne["PRENOM_AMIS"], $ligne["RUE_AMIS"], $ligne["VILLE_AMIS"]));
}
$pdf->Output();
?>