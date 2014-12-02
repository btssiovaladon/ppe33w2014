<?php
if(isset($_GET['N_AMIS'])){
fun_suppr_amis($co,$_GET['N_AMIS']);
//requête : on supprime de la table Arbitre la ligne où les variables correspondent
header("Location: index.php?page=form_afficher_amis.php");
//une fois la suppression faite, on actualise la page
}
$resultat =fun_afficher_amis ($co);
?>
<!--requête : on sélectionne toutes les informations se trouvant dans la table clubamis et on les place dans la variable résultat -->
<table border="1"> //affichage du tableau
         <tr> <!-- Ligne 1 -->
		<td>No Ami</td> <!-- L1C1-->
		<td>No Fonction</td> <!-- L1C2-->
	    <td>Nom</td> <!-- L1C3-->
		<td>Prenom</td> <!-- L1C4-->
		<td>Tel Fixe</td> <!-- L1C5-->
	    <td>Tel mobile</td> <!-- L1C6-->
		<td>Email</td> <!-- L1C7-->
		<td>Rue</td> <!-- L1C8-->
	    <td>Ville</td> <!-- L1C9-->
		<td>Date d'entree</td> <!-- L1C10-->
	    <td>Montant verse</td> <!-- L1C11-->
		<td>Parrain1</td> <!-- L1C12-->
	    <td>Parrain2</td> <!-- L1C13-->
        </tr>
<?php foreach ($resultat as $ligne)
	{
	?>
<!-- tant qu'il y a une ligne, on affiche la variable "résultat" -->
        <tr> <!-- Ligne 2 -->
		<td> <?php echo $ligne["N_AMIS"];?> </td> <!-- L2C1  -->
		<td> <?php echo $ligne["N_FONCTION"];?> </td> <!-- L2C2  -->
		<td> <?php echo $ligne["NOM_AMIS"];?> </td> <!-- L2C3  -->
		<td> <?php echo $ligne["PRENOM_AMIS"];?> </td> <!-- L2C3  -->
		<td> <?php echo $ligne["TEL_FIX_AMIS"];?> </td> <!-- L2C3  -->
		<td> <?php echo $ligne["TEL_PORTABLE_AMIS"];?> </td> <!-- L2C3  -->
		<td> <?php echo $ligne["EMAIL_AMIS"];?> </td> <!-- L2C3  -->
		<td> <?php echo $ligne["RUE_AMIS"];?> </td> <!-- L2C3  -->
		<td> <?php echo $ligne["VILLE_AMIS"];?> </td> <!-- L2C3  -->
		<td> <?php echo $ligne["DATE_ENTREE_AMIS"];?> </td> <!-- L2C3  -->
		<td> <?php echo $ligne["MT_VERSE"];?> </td> <!-- L2C3  -->
		<td> <?php echo $ligne["PARRAIN_1"];?> </td> <!-- L2C3  -->
		<td> <?php echo $ligne["PARRAIN_2"];?> </td> <!-- L2C3  -->
<!-- Affichage des champs de la table dans les différentes colonnes -->
<td> <a href="index.php?page=form_modif_ami.php&N_AMIS=<?php echo $ligne["N_AMIS"];?>"> Modifier </a> </td> 
<td> <a onclick="return(confirm('Etes vous sur de vouloir supprimer cette personne ?'))" href="index.php?page=form_afficher_amis.php&N_AMIS=<?php echo $ligne["N_AMIS"];?>"> Suprimer </a> </td> 
	</tr>
	<?php
	}
?>
<!-- dès qu'il n'y a plus de ligne, on ferme la variable resultat -->
</table>