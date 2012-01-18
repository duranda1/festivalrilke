//Fonction qui écrit dans un cookie la langue sélectionnée en cliquant sur un bouton
// function setCookie(value) {
	// var dateDuJour = new Date();
	// var dateExpire = new Date();
// 	
	// dateExpire.setMonth(dateExpire.getMonth()+1);
// 	
// 	
	// document.cookie = "langue=" + value + ";expires=" + dateExpire.toGMTString;
// 
// }

function setCookie(value)
{
	var exdays=10;
	var exdate=new Date();
	exdate.setDate(exdate.getDate() + exdays);
	var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());
	document.cookie="langue=" + c_value;
}


//Fonction qui récupère la langue dans le cookie
function getCookie() {
	return document.cookie.substring(7, document.cookie.length);;	
}