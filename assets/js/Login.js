/* Autor: Bryan DImas.
Script que nos ayuda con el contenido de la página inicial de la apliactiva.
*/
window.addEventListener('load',publicidad);

// Función que me ayuda a traer la vista que contiene la publicidad.
function publicidad(){
    var peticion = new XMLHttpRequest();
    peticion.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            document.getElementById('publi').innerHTML = this.responseText;
        }
    };
	peticion.open('GET', baseUrl + 'login/publicidad');
    peticion.send();
}

