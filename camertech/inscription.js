alert('Oui');
var btn_enreg = document.getElementById('inscription');
btn_enreg.addEventListener('click', function(e){
	var bodys = document.getElementsByTagName('body');
	alert('bodys got');
	var body = bodys[0];
	alert('got body');
	var blur = document.createElement('div');
	alert('blur created');
	blur.style.position = 'fixed';
	alert('position fixed');
	blur.style.width = '100%';
	blur.style.height = '1vh';
	alert('width then vh set');
	blur.style.background-color = 'rgba(20, 20, 20, 0.5)';
	alert('bg color set');
	body.appendChild(blur);
	alert('blur added to page');
}, false);