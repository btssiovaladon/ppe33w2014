<?php 
	ob_start();
	
	include("../include/pdo_fonction.php");
	include("../include/fonction.php");	
	
    $co = fun_connexion_pdo();
	$amis = fun_select_releve($co); 
	$write = "";
	$ligne = $amis->fetch();
	
	while($ligne)
	{
		$id = $ligne['N_AMIS'];
		$cumulR=0;
		$cumulT=0;
		$write .="<page>";
		$write .= "<h2> Relevé annuel : ".$ligne['NOM_AMIS']." ".$ligne['PRENOM_AMIS']."</h2>";
		$write .= "<h3>".$ligne['EMAIL_AMIS']."</h3>";
		$write .= "<table border='1'>";
		$write .= "<tr>";
				$write .= "<td>REPAS</td>";
				$write .= "<td>NOMBRE D'INVITE</td>";
				$write .= "<td>PRIX DU REPAS</td>";
				$write .= "<td>TOTAL</td>";
		$write .= "</tr>";
			
			while($ligne && $id == $ligne['N_AMIS'])
			{
			$write .= "<tr>";
					$write .= "<td>".date_us_vers_fr($ligne['DATE_DINER'])."</td>";
					$write .= "<td>".$ligne['NOMBRE_INVITE']."</td>";
					$write .= "<td>".$ligne['PRIX_REPAS']." euros"."</td>";
					$write .= "<td>".$ligne['TOTAL']." euros"."</td>";
			$write .= "</tr>";
			$cumulR=$cumulR+$ligne['TOTAL'];
			$ligne = $amis->fetch();
			}
			
			$write .= "</table>";
			$write .= "<br/>";
			$write .= "<table border='1'>";
				$write .= "<tr>";
					$write .= "<td>TOTAL REPAS </td>";
					$write .= "<td>".$cumulR." euros"."</td>";
				$write .= "</tr>";
				$write .= "<tr>";
					$write .= "<td>COTISATION</td>";
					$mt=fun_select_coti($co); 
					$coti=$mt->fetch();
					$write .= "<td>".$coti['MT_COTISATION']." euros"."</td>";
				$write .="</tr>";
				$write .= "<tr>";
					$write .= "<td> TOTAL TCC </td>";
					$write .= "<td>".($cumulR+$coti['MT_COTISATION'])." euros"."</td>";
				$write .= "</tr>";
		$write .= "</table>";
		$write .= "</page>";
		$ligne = $amis->fetch();
	} 
	
echo utf8_encode($write);
$contenu = ob_get_clean();

include("../include/html2pdf/html2pdf_v4.03/html2pdf.class.php");
try{
	$html2pdf = new HTML2PDF('P', 'A4', 'fr');
	$html2pdf->setDefaultFont('Arial');
	$html2pdf->writeHTML($contenu);
	$html2pdf->Output('releve_diner.pdf');
}
catch(HTML2PDF_exception $e){
	 $e;
	exit;
}
?>