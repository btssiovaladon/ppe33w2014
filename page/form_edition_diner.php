<?php

// la classe de fonctions
require('include/fpdf.php');


	// connexion base de donn�es
	$db_server = "localhost";
	$db_user = "root";
	$db_pass = "";
	$db_name = "clubamis";
	function connect($db_server, $db_user, $db_pass, $db) {
		if (!($link=mysql_connect($db_server,$db_user,$db_pass))) {
			exit();
		}
		if (!(mysql_select_db($db,$link))) {
			exit();
		}
		return $link;
	}

$connexion=connect($db_server,$db_user,$db_pass,$db_name);

// classe �tendue pour cr�er en-t�te et pied de page
class PDF extends FPDF
{
		// en-t�te
		function Header()
		{
			//Police Arial gras 15
			$this->SetFont('Arial','B',14);
			//D�calage � droite
			$this->Cell(80);
			//Titre
			$this->Cell(30,10,'Mon joli fichier PDF',0,0,'C');
			//Saut de ligne
			$this->Ln(20);
		}

		// pied de page
		function Footer()
		{
			//Positionnement � 1,5 cm du bas
			$this->SetY(-15);
			//Police Arial italique 8
			$this->SetFont('Arial','I',8);
			//Num�ro de page
			$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
		}
}
// cr�ation du pdf
$pdf=new PDF();
$pdf->SetAuthor('Un grand �crivain');
$pdf->SetTitle('Mon joli fichier');
$pdf->SetSubject('Un exemple de cr�ation de fichier PDF');
$pdf->SetCreator('fpdf_cybermonde_org');
$pdf->AliasNBPages();
$pdf->AddPage();

		// requ�te
		$sql = mysql_query("SELECT * FROM diner AS d INNER JOIN participer as p ON d.N_DINER = p.N_DINER WHERE d.N_DINER = ".$id['N_DINER'],$connexion);

// on boucle  
    while ($row = mysql_fetch_array($sql)) {
        $n_diner = $row["d.N_DINER"];
        $n_amis = $row["N_AMIS"];
        $nombre_invite = $row["NOMBRE_INVITE"];
        // titre en gras
        $pdf->SetFont('Arial','B',10);
        $pdf->Write(5,$titre);
        $pdf->Ln();
        // description
        $pdf->SetFont('Arial','',10);
        $pdf->Write(3,$description);
        $pdf->Ln();
        $pdf->Ln();
    }
	
// sortie du fichier
$pdf->Output('monfichier.pdf', 'I');
?>
