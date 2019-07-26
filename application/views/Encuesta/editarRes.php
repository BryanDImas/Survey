<!-- ============================================================== -->
<!--  Contenido del form de editar respuestas -->
<!-- ============================================================== -->
<h1 class="text-center" id="title">Edite su respuesta</h1>
<div style=" text-align:center; margin:3% auto; width:35rem; heigth:40rem;" class="list-group" id="form">
    <div class="has-success">
        <input type="hidden" name="idr" id="idr" value="<?= $respuesta->IdRespuestas ?>">
        <input id="respuesta" name="respuesta" type="text" class="form-control form-control-line" value="<?= $respuesta->Respuestas ?>">
    </div>
</div>
<div class="text-center">
    <p></p>
    <a href="<?= base_url('preguntasC/') ?>?id=<?= $_GET['f'] ?>" class="btn btn-rounded btn-xl  btn-outline-light"> Volver </a>&nbsp &nbsp
    <button id="btnGuardar" class="btn btn-rounded btn-xl  btn-outline-light" value="actualizar">Editar</button>
</div>
<!-- ============================================================== -->
<!--  Fin Contenido del form -->
<!-- ============================================================== -->
