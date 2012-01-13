var nbrFichiers = 0;
    
function init()
{
    //Cr�ation d'un premier input
    creerInput();
}

//Fonction renvoyant le nom d'un fichier � partir de son chemin complet
function getFileName(fileName)
{
  if (fileName != "") {
    if (fileName.match(/^(\\\\|.:)/)) {
      var temp = new Array();
      temp = fileName.split("\\");
      var len = temp.length;
      fileName = temp[len-1];
    } else {
      temp = fileName.split("/");
      var len = temp.length;
      if(len>0)
        fileName = temp[len-1];
    }
  }  
  return fileName;
}

function creerInput()
{
    //Cr�ation de l'�l�ment input
    var input = document.createElement("input");
    input.type = "file";
    input.className = "btn";
    input.accept = "image/*";
    
    //Lorsqu'un fichier est choisi, on ajoute son nom � la liste
    input.onchange = function() { 
        ajouterFichier(this);
    }
    
    //Ajout de l'input au document
    $("input").appendChild(input);
}

function ajouterFichier(input)
{
    if(nbrFichiers == 0)
        $("fichiers").removeChild($("fichiers").firstChild);
        
    //Cr�ation de la ligne dans la liste des fichiers � uploader
    var fichier = document.createElement("p");
    
    //Image de suppression
    var image = document.createElement("img");
    image.src = "images/suppr.gif";
    image.alt = "supprimer";
    Element.setStyle(image, {border: "0px", verticalAlign: "top"});
    
    //Lien pour supprimer
    var lnk = document.createElement("a");
    lnk.href= "#";
    lnk.onclick = function () {
        supprimerFichier(fichier, input);
    }
    //Ajout de l'image dans la balise de lien
    lnk.appendChild(image);
    
    //Ajout du lien � la ligne de la liste
    fichier.appendChild(lnk);
    
    //Ajout du nom du fichier
    fichier.appendChild(document.createTextNode(" " + getFileName(input.value)));
    Element.setStyle(fichier, {margin: "0", padding: "0"});
    
    //Ajout de l'item � la liste
    $("fichiers").appendChild(fichier);
    nbrFichiers++;
    
    //Affectation de l'attribut name de l'input
    input.name = getFileName(input.value);
    
    new Effect.Highlight(fichier, {startcolor: "#7fd9ff", endcolor: "#FFFFFF"});
    
    //Cr�ation d'un nouvel input pour un nouveau fichier
    Element.hide(input);
    creerInput();
}

function supprimerFichier(item, input)
{
    //Suppression de l'item dans la liste des fichiers � uploader
    new Effect.Fade(item, {afterFinish: function () { finSuppr(item); } });                
    
    //Suppression de l'input pour que le fichier supprim� ne soit pas envoy� par le formulaire
    $("input").removeChild(input);
}

function finSuppr(item)
{
    $("fichiers").removeChild(item); 

    nbrFichiers--;
    if(nbrFichiers == 0)
        $("fichiers").appendChild(document.createTextNode("Aucun fichier � uploader"));
}