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
		selectPers.size=nb;
			for (i=0; i<nb; i++)
			{
			pers=personne[i].split('*'); //
			selectPers.options[i].value=pers[0]; //
			selectPers.options[i].text=pers[1]+ " " +pers[2];
			}
		//selectPers.options[0].selected='selected';
		}
	},
	error:function(){
		alert("perdu");
	}
	});
	return ;
	}