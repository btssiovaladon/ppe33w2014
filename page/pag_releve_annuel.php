<?php 
	
    include ("../include/fonction.php"); 
	include ("../include/pdo_fonction.php"); 
	
    //Permet de definir la connexion PDO
    $co = fun_connexion_pdo();
	$amis = fun_select_releve($co); 

	$ligne = $amis->fetch();
	?> 
	<a href="index.php?page=pag_releve_annuel_pdf.php"> Imprimer </a>
	<?php 
	while($ligne)
	{
		$id = $ligne['N_AMIS'];
		$cumulR=0;
		$cumulT=0;
		?>
		<h2> Relevé annuel : <?php echo $ligne['NOM_AMIS']. " " .$ligne['PRENOM_AMIS']; ?> </h2>
		<h3> <?php echo $ligne['EMAIL_AMIS']; ?> </h3>

		<table border="1">
			<tr> 
				<td>REPAS</td>
				<td>NOMBRE D'INVITE</td>
				<td>PRIX DU REPAS</td>
				<td>TOTAL</td>
			</tr>
			<?php
			while($ligne && $id == $ligne['N_AMIS'])
			{
            ?>
				<tr>
					<td> <?php echo date_us_vers_fr($ligne['DATE_DINER']); ?> </td> <!-- DATE REPAS-->
					<td> <?php echo $ligne['NOMBRE_INVITE']; ?> </td> <!-- NB INVITE-->
					<td> <?php echo $ligne['PRIX_REPAS']." euros"; ?> </td> <!-- PRIX-->
					<td> <?php echo $ligne['TOTAL']." euros"; ?> </td> <!-- TOTAL-->
				</tr>
			<?php
			$cumulR=$cumulR+$ligne['TOTAL'];
			$ligne = $amis->fetch();
			}
			?>
			</table>
			
		<br/>
		
		<table border="1">
				<tr>
					<td>TOTAL REPAS </td>
					<td> <?php echo $cumulR." euros";?> </td> <!-- MONTANT REPAS-->
				</tr>
				<tr>
					<td>COTISATION</td>
					<td> <?php $mt=fun_select_coti($co); $coti=$mt->fetch(); echo $coti['MT_COTISATION']." euros"; ?> </td> <!-- MONTANT COTISATION-->
				</tr>
				<tr>
					<td> TOTAL TCC </td>
					<td> <?php echo $cumulR+$coti['MT_COTISATION']." euros"; ?></td> 
				</tr>
		</table>
		<br/>
		<br/>
		<br/>
	<?php
	} 
	?>