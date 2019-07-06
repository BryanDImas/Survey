/* Creamos estructura para usar valores en el formulario de registro */
window.addEventListener('load', inicializar);

/* Inicializamos los estados de los input que usaremos*/
function inicializar() {
    document.getElementById('pais').addEventListener('change', cambiarDepartamentos);
    document.getElementById('departamento').addEventListener('change', cambiarMunicipio);
}

function cambiarDepartamentos() {
    var peticion = new XMLHttpRequest();
    peticion.onreadystatechange = function() {
        if (this.readyState == 4) {
            document.getElementById('departamento').innerHTML = this.responseText;

        }
    };
    var url = baseUrl + 'EmpresasC/obtdepa/' + this.value;
    peticion.open('GET', url);
    peticion.send();
}

function cambiarMunicipio() {
    var peticion = new XMLHttpRequest();
    peticion.onreadystatechange = function() {
        if (this.readyState == 4) {
            document.getElementById('municipio').innerHTML = this.responseText;
        }
    };
    var url = baseUrl + 'EmpresasC/obtmuni/' + this.value;
    peticion.open('GET', url);
    peticion.send();
}