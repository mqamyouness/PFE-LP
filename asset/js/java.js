
	
function removve(x){
	var ml="#panierright"+x;
	$(ml).remove();
$.ajax({url: "removepanier.php?x="+x, success: function(result){
		eval(result);
    }});
}

function update(x,y){
	var ml="#qty"+y;
	var nadaprix="#nadaprix"+y;
	var mqq="#nadaq"+y;
	 var valxx=$(ml).val();
	 var valxxc=$(nadaprix).html();
	  valxxc=valxxc*valxx;
	    $(mqq).html(valxxc);
 
$.ajax({url: "update.php?produit="+x+"&q="+valxx, success: function(result){
		eval(result);
    }});
}
	
	
			