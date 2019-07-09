//creamos un evento que nos permitira cargar la vista donde se muestran las respuestas.
window.addEventListener('load', function() {
    recargar();
});

//funcion que nos ayuda a cargar la vista donde se muestran las respuestas.
function recargar() {
    var idp = document.getElementById('idp');
    var peticion = new XMLHttpRequest();
    peticion.onreadystatechange = function() {
        if (this.readyState == 4) {
            document.getElementById('cuerpo').innerHTML = this.responseText;
            asignareventos();
        }
    };
    peticion.open('GET', baseUrl + 'RespuestasC/ver/' + idp.value);
    peticion.send();
}

//Creamos la funcion que nos ayudara para el desarrollo del CRUD
function asignareventos() {
    document.getElementById('btnGuardar').addEventListener('click', guardar);
    var btnelim = document.getElementsByClassName('btnelim');
    var btnedit = document.getElementsByClassName('btneditar');
    for (var i = 0; i < btnelim.length; i++) {
        btnelim[i].addEventListener('click', eliminar);
        btnedit[i].addEventListener('click', actualizar);
    }
}

//Esta funcion nos ayudara  a guardar las respuestas 
function guardar() {
    var respuesta = document.getElementById('respuesta').value;
    var num = document.getElementById('num').value;
    var idp = document.getElementById('idp').value;
    if (respuesta != '') {
        var peticion = new XMLHttpRequest();
        peticion.onreadystatechange = function() {
            if (this.readyState == 4) {
                recargar();
                document.getElementById('respuesta').value = '';
                document.getElementById('num').value++;
            }
        };
        var url = baseUrl + 'RespuestasC/guardar';
        peticion.open('POST', url);
        peticion.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        peticion.send("respuesta=" + respuesta + "&num=" + num + "&idp=" + idp);
    }
}

//Función que nos permitirá mostrar los datos de las respuestas para luego editarlos
function actualizar() {
    var peticion = new XMLHttpRequest();
    peticion.onreadystatechange = function() {
        if (this.readyState == 4) {
            document.getElementById('form').innerHTML = this.responseText;
            document.getElementById('btnGuardar').addEventListener('click', editar);
        }
    };
    var url = baseUrl + 'RespuestasC/editar/';
    peticion.open('GET', url + this.value);
    peticion.send();
}

//Esta función nos permitira editar las respuestas
function editar() {
    if (document.getElementById('btnGuardar').value == 'actualizar') {
        var respuesta = document.getElementById('respuesta').value;
        var num = document.getElementById('num').value;
        var idr = document.getElementById('idr').value;
        var peticion = new XMLHttpRequest();
        peticion.onreadystatechange = function() {
            if (this.readyState == 4) {
                recargar();
                document.getElementById('respuesta').value = '';
                document.getElementById('btnGuardar').value = 'guardar';
                document.getElementById('btnGuardar').innerHTML = 'Guardar';
                document.getElementById('title').innerHTML = 'Ingrese su respuesta';
            }
        };
        var url = baseUrl + 'RespuestasC/actualizar';
        peticion.open('POST', url);
        peticion.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        peticion.send("respuesta=" + respuesta + "&num=" + num + "&idp=" + idr);
    }
}

//Función que nos permitirá eliminar las respuestas
function eliminar() {
    var peticion = new XMLHttpRequest();
    peticion.onreadystatechange = function() {
        if (this.readyState == 4) {
            recargar();
        }
    }
    peticion.open('GET', baseUrl + 'RespuestasC/eliminar/' + this.value);
    peticion.send();
}