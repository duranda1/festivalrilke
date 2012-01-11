//Fonction qui écrit dans un cookie la langue sélectionnée en cliquant sur un bouton
function setCookie(value) {
	document.cookie="langue="+value;
}

//Fonction qui récupère la langue dans le cookie
function getCookie() {
	return document.cookie.substring(7, document.cookie.length);;	
}