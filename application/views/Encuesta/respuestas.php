<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="container-fluid">
		<?php $f = $_GET['f'];
		$id = $_GET['id'];
		$num = count($respuestas); ?>
		<div class="card">
			<div class="card-body" id="form">
				<h5 class="text-center">Cree sus respuestas</h5>

				<div style=" text-align:center; margin:3% auto; width:35rem;" class="list-group">

					<div class="form-group has-success">
						<input type="hidden" id="num" name="num" value="<?= $num ?>">
						<input id="respuesta" name="respuesta" type="text" class="form-control form-control-line" placeholder="Ingrese su aquí su respuesta" autocomplete="off">
					</div>
					<div class="text-center">
						<p></p>
						<a href="<?= base_url('preguntasC/') ?>?id=<?= $f ?>" class="btn btn-rounded btn-xl  btn-outline-light"> Volver </a>&nbsp &nbsp
						<button id="btnGuardar" class="btn btn-rounded btn-xl  btn-outline-info" value="guardar">Guardar</button>
					</div>
				</div>
			</div>

			<div class="">
				<button class="right-side-toggle waves-effect waves-light  btn-themecolor btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
			</div>
			<!-- ============================================================== -->
			<!-- End Bread crumb and right sidebar toggle -->
			<!-- ============================================================== -->
			<!-- ============================================================== -->
			<!-- Start Page Content -->
			<!-- ============================================================== -->
			<input type="hidden" name="idp" id="idp" value="<?= $id ?>">
			<div class="row">
				<div class="col-12">
					        <div class="container-fluid">
					<table class="table table-hover table-bordered text-center">
						<thead>
							<tr>
								<th colspan="4">
									<h4><?= $pregunta->Pregunta ?></h4>
								</th>
							</tr>
							<tr>
								<td>#</td>
								<td>Respuesta</td>
								<td colspan="2">Opciones</td>
							</tr>
						</thead>
						<tbody id="cuerpo">

						</tbody>
					</table>
				</div>
			</div>
		</div>

		<!-- ============================================================= -->
		<!-- FIn del contenido -->
		<!-- ============================================================= -->
		<script>
			var baseUrl = "<?= base_url() ?>";
		</script>
		<script src="<?= base_url('assets/js/accion.js') ?>"></script>