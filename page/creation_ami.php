
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="js/autoc.js"></script>

<form action="">
	<table>
	<input type="hidden" name="num"/>
	<input type="hidden" name="page" value="creation_ami.php"/>
	<tr><td>Nom :<input type="text" name="nom"/></td></tr>
	<tr><td>Prenom :<input type="text" name="prenom"/></td></tr>
	<tr><td>Telephone fixe :<input type="text" name="tel"/></td></tr>
	<tr><td>Telephone portable :<input type="text" name="telport"/></td></tr>
	<tr><td>Email :<input type="text" name="email"/></td></tr>
	<tr><td>Adresse :<input type="text" name="rue"/></td></tr>
	<tr><td>Ville :<input type="text" name="ville"/></td></tr>
	<tr><td>Date d'entrée :<input type="text" name="date_entree"/></td></tr>
	<tr><td>Montant versé :<input type="text" name="montant"/></td></tr>
	<tr><td>Parrain 1:
	<select id="listePers" name="listePers" size="1">
		<td align="left"><input type="text" id ="parrain1" name="NOM_AMIS" onkeyup="javascript:envoipersajax(this.value)"></td>	
	</select></td></tr>
	<tr><td>Parrain 2:
	<select id="listePers2" name="listePers2" size="1">
		<td align="left"><input type="text" id ="parrain2" name="NOM_AMIS" onkeyup="javascript:envoipersajax2(this.value)"></td>	
	</select></td></tr>
	<tr><td> <input type="submit" name="submit" value="Ajouter"> </td>
	</form>
	
	<?php 
	
	
	if(isset($_GET['submit'])){
	$requete = $co->prepare('INSERT INTO amis VALUES(:N_AMIS, null, :NOM_AMIS, :PRENOM_AMIS, :TEL_FIX_AMIS, :TEL_PORTABLE_AMIS, :EMAIL_AMIS, :RUE_AMIS, :VILLE_AMIS, :DATE_ENTREE_AMIS, :MT_VERSE, :PARRAIN_1, :PARRAIN_2 )');
	$requete->execute(array(
							"N_AMIS" => $_GET["num"],
							"NOM_AMIS" => $_GET["nom"],
							"PRENOM_AMIS" => $_GET["prenom"],
							"TEL_FIX_AMIS" => $_GET["tel"],
							"TEL_PORTABLE_AMIS" => $_GET["telport"],
							"EMAIL_AMIS" => $_GET["email"],
							"RUE_AMIS" => $_GET["rue"],
							"VILLE_AMIS" => $_GET["ville"],
							"DATE_ENTREE_AMIS" => $_GET["date_entree"],
							"MT_VERSE" => $_GET["montant"],
 							"PARRAIN_1" => $_GET["listePers"],
							"PARRAIN_2" => $_GET["listePers2"]));
								}
	?>
	<script>
			success: function () {
				alert("Insertion reussie !");
            }
				
	</script>
