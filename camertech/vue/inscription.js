btn_enreg = document.getElementById('inscription');
btn_enreg.addEventListener('click', function(e){
	var bodys = document.getElementsByTagName('body');
	var body = bodys[0];
	var blur = document.createElement('div');
	blur.style.position = 'fixed';
	blur.style.left = "0px";
	blur.style.top = "0px";
	blur.style.width = '100%';
	blur.style.height = '100vh';
	blur.style.backgroundColor = 'rgba(20, 20, 20, 0.8)';
	body.appendChild(blur);

	var h1 = document.createElement('h1');
	var txt = document.createTextNode("Formulaire d'inscription");
	h1.appendChild(txt);

	var form_wrap = document.createElement('div');
	form_wrap.style.margin = "auto";
	form_wrap.style.textAlign = "center";
	form_wrap.margin = "auto";
	form_wrap.style.width = "400px";
	form_wrap.style.height = "250px";
	form_wrap.style.backgroundColor = "white";
	form_wrap.style.padding = "30px";

	var form = document.createElement('form');
	form.method = "post";
	form.action = "index.php?page=treatments/inscription"

	var champ_email = document.createElement('input');
	champ_email.type = "email";
	champ_email.style.width = "60%";
	champ_email.style.border = "2px solid rgb(115, 173, 33)";
	champ_email.id = "email";
	champ_email.name = "email";
	champ_email.required = true;
	champ_email.setAttribute('placeholder', "Entrez votre addresse email")
	var label_email = document.createElement('label');
	label_email.setAttribute('for', "email");
	txt = document.createTextNode("Addresse Email : ");
	label_email.appendChild(txt);

	var champ_mtp = document.createElement('input');
	champ_mtp.type = "password";
	champ_mtp.style.width = "60%";
	champ_mtp.style.border = "2px solid rgb(115, 173, 33)";
	champ_mtp.id = "mtp";
	champ_mtp.name = "mtp";
	champ_mtp.required = true;
	champ_mtp.setAttribute('placeholder', "Entrez votre mot de passe")
	var label_mtp = document.createElement('label');
	label_mtp.setAttribute('for', "mtp");
	txt = document.createTextNode("Mot de Passe : ");
	label_mtp.appendChild(txt);

	var enreg = document.createElement('input');
	enreg.type = "submit";
	enreg.value = "S'enregistrer";

	var annuler = document.createElement('input');
	annuler.type = "button";
	annuler.value = "Annuler";
	annuler.addEventListener('click', function (e) {
		blur.parentNode.removeChild(blur);
	}, false)

	form.appendChild(h1);
	form.appendChild(document.createElement('br'));
	form.appendChild(document.createElement('br'));
	form.appendChild(label_email);
	form.appendChild(champ_email);
	form.appendChild(document.createElement('br'));
	form.appendChild(document.createElement('br'));
	form.appendChild(label_mtp);
	form.appendChild(champ_mtp);
	form.appendChild(document.createElement('br'));
	form.appendChild(document.createElement('br'));
	form.appendChild(enreg);
	form.appendChild(annuler);

	form_wrap.appendChild(form);
	blur.appendChild(form_wrap);
}, false);