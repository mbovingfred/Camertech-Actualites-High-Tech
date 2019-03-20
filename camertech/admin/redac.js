
// GESTION DE L'INSERTION DES NOUVELLES IMAGES
//-------------------------------------------------
function Window(title) {            //Creation de la classe popup
	this.blur = document.createElement('div');
	this.blur.setAttribute('class', 'blur');
	var section = document.getElementsByTagName('section');
    section[0].appendChild(this.blur);
	this.newWindow = document.createElement('div');
	this.newWindow.setAttribute('class', 'window');
	section[0].appendChild(this.newWindow);
	var txt = document.createTextNode(title);
	var title = document.createElement('p');
	title.appendChild(txt);
	title.setAttribute('class', 'title');
	this.newWindow.appendChild(title);	
};

//Obtention des elements html a manipuler
//----------------------------------------------
var btnImg = document.getElementById('btnImg');
var form = document.getElementById('mainForm');
var nbChamps = 1;
var nbreElements = document.getElementById('nbreElements');

//Gestion de l'evenement
btnImg.addEventListener('click', function(e){
    e.preventDefault();
    nbChamps++;
	nbreElements.value = nbChamps;
    
    var inputText = document.createElement('input');
    inputText.setAttribute('type', 'text');
    //--------------------------------------------------------
    var labTitre = document.createElement('label');
    labTitre.setAttribute('for', 'imgTitre');
    txt = document.createTextNode('Titre: ');
    labTitre.appendChild(txt);
    
    var inputTitre = document.createElement('input');
    inputTitre.setAttribute('type', 'text');
    inputTitre.setAttribute('id', 'imgTitre');
    inputTitre.setAttribute('name', 'imgTitre'+nbChamps);
    //-------------------------------------------------------
    var labLegende = document.createElement('label');
    labLegende.setAttribute('for', 'legendeImg');
    txt = document.createTextNode('Legende: ');
    labLegende.appendChild(txt);
    
    var inputLegende = document.createElement('input');
    inputLegende.setAttribute('type', 'text');
    inputLegende.setAttribute('id', 'legendeImg');
    inputLegende.setAttribute('name', 'legendeImg'+nbChamps);
    //--------------------------------------------------------
    var br = document.createElement('br');
    
	//--------------------Display------------------------
	form.insertBefore(labTitre, form.lastChild.previousSibling);
	form.insertBefore(inputTitre, form.lastChild.previousSibling);
	form.insertBefore(labLegende, form.lastChild.previousSibling);
	form.insertBefore(inputLegende, form.lastChild.previousSibling);
	form.insertBefore(br, form.lastChild.previousSibling);
	var cancel = document.createElement('button');
	txt = document.createTextNode('Annuler');
	cancel.appendChild(txt);
	var response;
	var img = document.createElement('img');
	img.setAttribute('src', '../fichiers/articles/images/31.jpg');
	img.setAttribute('title', inputTitre.value);
	img.setAttribute('alt', inputLegende);
	var input = document.createElement('input');
	input.name = "img"+nbChamps;
	input.type = "file";
	input.setAttribute('name', 'file'+nbChamps);
	form.insertBefore(input, form.lastChild.previousSibling);
	form.insertBefore(cancel, form.lastChild.previousSibling);
	form.insertBefore(img, form.lastChild.previousSibling);
	form.insertBefore(br, form.lastChild.previousSibling);
	cancel.addEventListener('click', function() {
	}, false);
}, false);

// GESTION DE L'INSERTION DES NOUVEAUX CHAMPS DE CONTENUE
//--------------------------------------------------------------

var btnTexte = document.getElementById('btnTexte');
var texte = document.getElementById('champTexte');

btnTexte.addEventListener('click', function(e){
    e.preventDefault();
    nbChamps++;
	nbreElements.value = nbChamps;
    var nvTexte = texte.cloneNode(true);
    nvTexte.firstChild.nextSibling.nextSibling.nextSibling.setAttribute('for', 'texte'+nbChamps);   //Siblage de la balise label
    nvTexte.firstChild.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling.setAttribute('name', 'texte'+nbChamps); //Siblage de l'element textarea
    nvTexte.firstChild.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling.setAttribute('id', 'texte'+nbChamps);
    form.insertBefore(nvTexte, form.lastChild.previousSibling);
}, false);