//Fonction qui écrit dans un cookie la langue sélectionnée en cliquant sur un bouton
function setCookie(value) {
	var dateDuJour = new Date();
	var dateExpire = new Date();
	
	dateExpire.setMonth(dateExpire.getMonth()+1);
		
	document.cookie = "langue=" + value + ";expires=" + dateExpire.toGMTString;
}

//Fonction qui récupère la langue dans le cookie
function getCookie() {
	return document.cookie.substring(7, document.cookie.length);;	
}