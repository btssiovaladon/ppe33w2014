<?php
include ('../include/pdo_fonction.php')
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

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
	<tr><td>Liste des personnes :
	<select id="listePers" size="1">
		<td align="left"><input type="text" id ="NOM_AMIS" name="NOM_AMIS" onkeyup="javascript:envoipersajax(this.value)"></td>	
	</select></td></tr>
	
	<?php 
	?>
</form>
<script type='text/javascript'>
function envoipersajax(nom)
	{
	var requete= $.ajax({
	url: "getparrain.php",
	type:"POST",
	data:"NOM_AMIS=" + escape(nom),
	//cache: false, // pas de mise en cache
	success:function(){ 
		// si la requête est un succès
		var selectPers=document.getElementById("listePers");
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