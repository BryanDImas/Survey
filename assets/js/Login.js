/* Autor: Bryan DImas.
Script que nos ayuda con el contenido de la página inicial de la apliactiva.
*/
window.addEventListener('load', function(){
    publicidad();
    empresas();
});

// Función que me ayuda a traer la vista que contiene la publicidad.
function publicidad() {
    var peticion = new XMLHttpRequest();
    peticion.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('publicidad').innerHTML = this.responseText;
        }
    };
    peticion.open('GET', baseUrl + 'Login/publicidad');
    peticion.send();
}
function empresas() {
    var peticion = new XMLHttpRequest();
    peticion.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('empresas').innerHTML = this.responseText;
        }
    };
    peticion.open('GET', baseUrl + 'Login/empresas');
    peticion.send();
}