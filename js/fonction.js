function envoiidchef(action){
	var requete= $.ajax({
		url: "ajax/chefVersPart.php",
		type:"POST",
		data:"N_ACTION=" + escape(action),
		//cache: false, // pas de mise en cache
		success:function(){ 
		alert(requete.responseText);
		},
		error:function(){
			alert("perdu");
		}
	});
return;
}

function envoiidpart(amis, action){
	var requete= $.ajax({
		url: "ajax/partVersChef.php",
		type:"POST",
		data:"N_ACTION=" + escape(action) + "N_AMIS=" + escape(amis),
		//cache: false, // pas de mise en cache
		success:function(){ 
		
		},
		error:function(){
			alert("perdu");
		}
	});
return;
}