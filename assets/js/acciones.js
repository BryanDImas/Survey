/* Cargo dos eventos despues de cargar la pagina */
window.addEventListener('load', function() {
    recargar();
});
/* Asigna los eventos para las funciones a usar en el crdu de preguntas */
function asignareventos() {
    document.getElementById('btnGuardar').addEventListener('click', guardar);
    var btnelim = document.getElementsByClassName('btnelim');
    var btnedit = document.getElementsByClassName('btneditar');
    for (var i = 0; i < btnelim.length; i++) {
        btnelim[i].addEventListener('click', eliminar);
        btnedit[i].addEventListener('click', actualizar);
    }
}
/* Funcion que nos ayuda a guardar las preguntas de una en una */
function guardar() {
    var pregunta = document.getElementById('pregunta').value;
	var num = document.getElementById('num').value;
	
	if (pregunta != '') {
		var peticion = new XMLHttpRequest();
		peticion.onreadystatechange = function() {
			if (this.readyState == 4) {
				recargar();
				document.getElementById('pregunta').value = '';
				document.getElementById('num').value++;
			}
		};
		var url = baseUrl + 'preguntasC/guardar';
		peticion.open('POST', url);
		peticion.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		peticion.send("pregunta=" + pregunta + "&num=" + num);
	}
}
/* Funcion que nos ayudara a editar una pregunta*/
function actualizar() {
    var peticion = new XMLHttpRequest();
    peticion.onreadystatechange = function() {
        if (this.readyState == 4) {
            document.getElementById('form').innerHTML = this.responseText;
            document.getElementById('btnGuardar').addEventListener('click', editar);
        }
    };
    var url = baseUrl + 'preguntasC/editar/';
    peticion.open('GET', url + this.value);
    peticion.send();
}
/* Funcion que nos ayuda a eliminar una pregunta */
function eliminar() {
    var peticion = new XMLHttpRequest();
    peticion.onreadystatechange = function() {
        if (this.readyState == 4) {
            recargar();
        }
    }
    peticion.open('GET', baseUrl + 'preguntasC/eliminar/' + this.value);
    peticion.send();
}
/* Funcion que recarga el area que nos muestra las preguntas ya creadas */
function recargar() {
    var element = document.getElementById('form');
    var peticion = new XMLHttpRequest();
    peticion.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('algo').innerHTML = this.responseText;
            asignareventos();
        }
    };
    var Url = baseUrl + 'preguntasC/cargar/';
    peticion.open('GET', Url);
    peticion.send();
}
/* Funcion que edita manda los datos al controlador para editarlos.*/
function editar() {
	if(document.getElementById('btnGuardar').value == 'actualizar'){
    var pregunta = document.getElementById('pregunta').value;
    var num = document.getElementById('num').value;
    var idp = document.getElementById('idp').value;
    var peticion = new XMLHttpRequest();
    peticion.onreadystatechange = function() {
        if (this.readyState == 4) {
            recargar();
            document.getElementById('pregunta').value = '';
            document.getElementById('btnGuardar').value = 'guardar';
            document.getElementById('btnGuardar').innerHTML = 'Guardar';
            document.getElementById('title').innerHTML = 'Ingrese su pregunta';
        }
    };
    var url = baseUrl + 'preguntasC/actualizar';
    peticion.open('POST', url);
    peticion.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    peticion.send("pregunta=" + pregunta + "&num=" + num + "&idp=" + idp);
}}
