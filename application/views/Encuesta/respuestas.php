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
		<div class="" id="form">
			<h1 class="text-center">Cree sus respuestas</h1>

			<div style=" text-align:center; margin:5% auto; width:35rem; heigth:40rem;" class="list-group">

				<div>
					<input type="hidden" id="num" name="num" value="<?= $num ?>">
					<input id="respuesta" name="respuesta" type="text" class="form-control" placeholder="Ingrese su Respuesta" autocomplete="off">
				</div>
				<div class="text-center">
					<p></p>
					<button id="btnGuardar" class="btn btn-rounded btn-xl  btn-outline-info" value="guardar">Guardar</button>
				</div>
				</form>
			</div>
		</div>
		<br>
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
				<div class="card">
					<div class="card-body">
					<div class="form-group">
			<a href="<?= base_url('preguntasC/') ?>?id=<?= $f ?>" class="btn btn-rounded btn-xl  btn-outline-light">Volver</a>
		</div>
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
		</div>
	
		<!-- ============================================================= -->
		<!-- FIn del contenido -->
		<!-- ============================================================= -->
		<script>
			var baseUrl = "<?= base_url() ?>";
		</script>
		<script src="<?= base_url('assets/js/accion.js') ?>"></script>
