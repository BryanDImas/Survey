<!-- ============================================================== -->
<!--  Contenido de la página -->
<!-- ============================================================== -->
<div class="">
	<button class="right-side-toggle waves-effect waves-light btn-themecolor btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
</div>
<div class="card-body" id="form">
	<h3 class="text-themecolor">Creación de preguntas</h3>
		<?php $num = count($preguntas); ?>
		<h6 class="text-center"></h6>
		<input type="hidden" name="form" id="form"  >
		<div>
			<input type="hidden" id="num" name="num" value="<?= $num ?>">
			<input id="pregunta" name="pregunta" type="text" class="form-control" placeholder="Ingrese su pregunta" autocomplete="off">
		</div>
		<div class="text-center">
			<p></p>
			<button id="btnGuardar" class="btn btn-rounded btn-xl  btn-outline-light" value="agregar">Guardar</button>
		</div>
	</div>
	<br>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th> # </th>
				<th> Pregunta</th>
				<th colspan="3">Opciones</th>
			</tr>
		</thead>
		<tbody id="centro">

		</tbody>
	</table>

	<div class="form-group">
		<a href="<?= base_url('PreguntasC/stepfin/') ?>?e=<?= $idEncuesta ?>" class="btn btn-outline-success btn-rounded float-right">Continuar</a>
	</div>

	<!-- ============================================================== -->
	<!--  Fin Contenido de la página -->
	<!-- ============================================================== -->
	<script>
		var baseUrl = "<?= base_url() ?>";
	</script>
	<script src="<?= base_url('assets/js/acccionesd.js') ?>"></script>
