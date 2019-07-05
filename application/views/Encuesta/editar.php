<!-- ============================================================== -->
<!--  Contenido del form de editar preguntas -->
<!-- ============================================================== -->
<h6 class="text-center" id="title">Edite su pregunta</h6>
<div>
	<input type="hidden" name="form" id="form" value="">
    <input type="hidden" id="num" name="num" value="<?= $pregunta->Numero ?>">
    <input type="hidden" name="idp" id="idp" value="<?= $pregunta->idPregunta ?>">
    <input id="pregunta" name="pregunta" type="text" class="form-control" value="<?= $pregunta->Pregunta ?>" autocomplete="on">
</div>
<div class="text-center">
    <p></p>
    <button id="btnGuardar" class="btn btn-rounded btn-xl  btn-outline-light" value="actualizar">Editar</button>
</div>
<!-- ============================================================== -->
<!--  Fin Contenido del form -->
<!-- ============================================================== -->
