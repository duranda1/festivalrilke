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

function getCookie()
{
    if(document.cookie.length>0)
    {
    	var name = "langue";
        start=document.cookie.indexOf(name+"=");
        pos = start+name.length+1;
        if(start!=0)
        {
                start=document.cookie.indexOf("; "+name+"=");
                pos = start+name.length+2;
        }
        if(start!=-1)
        { 
                start=pos;
                end=document.cookie.indexOf(";",start);
                if(end==-1)
                {
                        end=document.cookie.length;
                }
                return unescape(document.cookie.substring(start,end));
        } 
    }
    return '';
}