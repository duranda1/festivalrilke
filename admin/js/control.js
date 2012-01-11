function inputLimiter(e,allow) {
	var AllowableCharacters = '';
	if (allow == 'Letters'){AllowableCharacters=' ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890-';}
	var k;
	k=document.all?parseInt(e.keyCode): parseInt(e.which);
	if (k!=13 && k!=8 && k!=0){
		if ((e.ctrlKey==false) && (e.altKey==false)) {
			return (AllowableCharacters.indexOf(String.fromCharCode(k))!=-1);
		} else {
			return true;
		}
	} else {
		return true;
	}
}
