<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">
function envoipersajax(nom)
	{
	var requete= $.ajax({
	url: "getparrain.php",
	type:"POST",
	data:"NOM_AMIS=" + escape(nom),
	//cache: false, // pas de mise en cache
	success:function(){ 
		// si la requête est un succès
		var selectPers=document.getElementById("afficher_amis");
		if(requete.responseText=='')
		{
		selectPers.length=0;
		//document.getElementById("prix").innerHTML='';
		}
		else
		{
		var personne,i,nb,pers;
		personne=requete.responseText.split('/');

		nb=personne.length;
		// nb contient le nombre de lignes du tabl
		
		selectPers.length=nb;
		for (i=0; i<nb; i++)
		{
		pers=personne[i].split('*'); //
		selectPers.options[i].value=pers[0]; //
		selectPers.options[i].text=pers[1]+ " " +pers[2];
		}
		selectPers.options[0].selected='selected';
		}
	},
	error:function(){
		alert("perdu");
	}
	});
	return;
	}
</script>

<?php
	//INCLUDE
	include ('../include/pdo_fonction.php');

	$co = fun_connexion_pdo();

	//REQUETES
	$afficher_amis = $co->query('SELECT * FROM amis');
	$adresse_mail = $co->query('SELECT EMAIL_AMIS FROM AMIS WHERE EMAIL_AMIS= /** Lamis qui est connecté **/');
?>

<!-- FORM SAISIE MONTANT -->
	<form name="form_saisie_montant" action="#" method="post">
		<select name="afficher_amis" id="afficher_amis" size="1">
			<option align="left">
				<input type="text" id ="NOM_AMIS" name="NOM_AMIS" onkeyup="javascript:envoipersajax(this.value)">
			</option>
		</select>
		<input type="text" name="valeur_montant" id="valeur_montant"placeholder="Saisir le montant" size="47"/>
		<input type="submit" name="btn_valider" id="btn_valider"/>
	</form>
<!-- -->

<!-- CONTROLE ET ENVOIE -->
<?php
	if(isset($_POST['btn_valider'])){
		$montant = $_POST['valeur_montant'];
		if(empty($_POST['valeur_montant'])){
			echo '<div class="error">Veuillez renseigner le champs.</div>';
		}
		else if(filter_var($montant, FILTER_VALIDATE_FLOAT) == false){ 
	    	echo '<div class="error">Saisie du montant incorecte.</div>';

	    	$to      = $adresse_mail;
    		$subject = 'Information sur le montant que vous avez saisi';
    		$message = 'Bonjour le Club Amis vous informe que le montant que vous avez saisi auparavent est incorrect';
     		mail($to, $subject, $message);

		}
		else
		{
			$requete = $co->prepare('INSERT INTO amis (MT_VERSE) VALUES(:valeur_montant) WHERE N_AMIS = /** Lamis qui est connecté **/');
			$requete->execute(array(
							"valeur_montant" => $montant));

			echo '<div class="success">Opération réussie.</div>';
		}
	}
?>
<!-- -->