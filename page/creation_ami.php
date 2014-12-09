
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="js/autoc.js"></script>

<form action="">
	<table>
	<tr><td>Nom :<input type="text" name="nom"/></td></tr>
	<tr><td>Prenom :<input type="text" name="prenom"/></td></tr>
	<tr><td>Telephone fixe :<input type="text" name="tel"/></td></tr>
	<tr><td>Telephone portable :<input type="text" name="telport"/></td></tr>
	<tr><td>Email :<input type="text" name="email"/></td></tr>
	<tr><td>Adresse :<input type="text" name="rue"/></td></tr>
	<tr><td>Ville :<input type="text" name="ville"/></td></tr>
	<tr><td>Date d'entrée :<input type="text" name="date_entée"/></td></tr>
	<tr><td>Montant versé :<input type="text" name="montant"/></td></tr>
	<tr><td>Parrain 1:
	<select id="listePers" size="1">
<<<<<<< HEAD
		<td align="left"><input type="text" id ="parrain1" name="NOM_AMIS" onkeyup="javascript:envoipersajax(this.value)"></td>	
=======
		<option align="left"><input type="text" id ="NOM_AMIS" name="NOM_AMIS" onkeyup="javascript:envoipersajax(this.value)"></option>	
>>>>>>> a2b07b156bbdbbbcbbee97acd02b86957a177406
	</select></td></tr>
	<tr><td>Parrain 2:
	<select id="listePers2" size="1">
		<td align="left"><input type="text" id ="parrain2" name="NOM_AMIS" onkeyup="javascript:envoipersajax2(this.value)"></td>	
	</select></td></tr>
	<tr><td> <input type="submit" name="submit" value="Ajouter"> </td>
	
	
	<?php 
	if(isset($_POST['submit'])){
	$requete = $co->prepare('INSERT INTO amis VALUES(:NOM_AMIS, :PRENOM_AMIS, :TEL_FIX_AMIS, :TEL_PORTABLE_AMIS, :EMAIL_AMIS, :RUE_AMIS, :VILLE_AMIS, :DATE_ENTREE_AMIS, :MT_VERSE, :PARRAIN_1, :PARRAIN_2 )');
	$requete->execute(array(
							"NOM_AMIS" => $nom,
							"PRENOM_AMIS" => $prenom,
							"TEL_FIXE_AMIS" => $tel,
							"TEL_PORTABLE_AMIS" => $telport,
							"EMAIL_AMIS" => $email,
							"RUE_AMIS" => $rue,
							"VILLE_AMIS" => $ville,
							"DATE_ENTREE_AMIS" => $date_entrée,
							"MT_VERSE" => $montant,
 							"PARRAIN_1" => $parrain1,
							"PARRAIN_2" => $parrain2));
	
	}
	?>
	<script>
			success: function () {
				alert("Insertion reussie !");
            },
				
	</script>
</form>
