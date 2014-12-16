<?php
if(isset($_POST["valider"])){
fun_modif_amis($co, $_POST['F_NOAMIS'], $_POST['F_NAMIS'], $_POST['F_FONC'], $_POST['F_PAMIS'], $_POST['F_TELF'], $_POST['F_TELP'], $_POST['F_EMAIL'], $_POST['F_RUE'], $_POST['F_VILLE'], $_POST['F_DATE'], $_POST['F_MT'], $_POST['F_PARRAIN1'], $_POST['F_PARRAIN2']);
//header("Location: index.php?page=form_afficher_amis.php");
//réactualise la page
}
$ligne =fun_afficher_ami ($co, $_GET['N_AMIS']);
	?>
<form method="POST" action="">
<fieldset>
		<label>No Ami : </label><input type="text" readonly="readonly" name="F_NOAMIS" value="<?php echo $ligne["N_AMIS"];?>"/> <BR /> 
		<label>No Fonction : </label><input type="text" name="F_FONC" value="<?php echo $ligne["N_FONCTION"];?>"/> <BR />
		<label>Nom : </label><input type="text" name="F_NAMIS" value="<?php echo $ligne["NOM_AMIS"];?>"/> <BR />
		<label>Prenom : </label><input type="text" name="F_PAMIS" value="<?php echo $ligne["PRENOM_AMIS"];?>"/> <BR />
		<label>Tel Fixe : </label><input type="text" name="F_TELF" value="<?php echo $ligne["TEL_FIX_AMIS"];?>"/> <BR />
		<label>Tel Mobile : </label><input type="text" name="F_TELP" value="<?php echo $ligne["TEL_PORTABLE_AMIS"];?>"/> <BR />
		<label>Email : </label><input type="text" name="F_EMAIL" value="<?php echo $ligne["EMAIL_AMIS"];?>"/> <BR /> 
		<label>Rue : </label><input type="text" name="F_RUE" value="<?php echo $ligne["RUE_AMIS"];?>"/> <BR />
		<label>Ville : </label><input type="text" name="F_VILLE" value="<?php echo $ligne["VILLE_AMIS"];?>"/> <BR />
		<label>Date d'entree : </label><input type="text" name="F_DATE" value="<?php echo $ligne["DATE_ENTREE_AMIS"];?>"/> <BR />
		<label>Montant verse : </label><input type="text" name="F_MT" value="<?php echo $ligne["MT_VERSE"];?>"/> <BR />
		<label>Parrain1 : </label><input type="text" name="F_PARRAIN1" value="<?php echo $ligne["PARRAIN_1"];?>"/> <BR />
		<label>Parrain2 : </label><input type="text" name="F_PARRAIN2" value="<?php echo $ligne["PARRAIN_2"];?>"/> <BR />

<input type="submit" name="valider" value="valider">
<a href="index.php?page=form_afficher_amis.php"> Retour </a>
</fieldset>
</form>