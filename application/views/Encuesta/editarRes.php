<!-- ============================================================== -->
<!--  Contenido del form de editar respuestas -->
<!-- ============================================================== -->
<h1 class="text-center" id="title">Edite su respuesta</h1>
<div>
    <input type="hidden" name="idr" id="idr" value="<?= $respuesta->IdRespuestas ?>">
    <input id="respuesta" name="respuesta" type="text" class="form-control" value="<?= $respuesta->Respuestas ?>">
</div>
<div class="text-center">
    <p></p>
    <button id="btnGuardar" class="btn btn-rounded btn-xl  btn-outline-light" value="actualizar">Editar</button>
</div>
<!-- ============================================================== -->
<!--  Fin Contenido del form -->
<!-- ============================================================== -->
