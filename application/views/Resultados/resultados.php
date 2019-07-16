<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h1 class="text-themecolor">Resultados</h1>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0)">Resultados</a></li>
				<li class="breadcrumb-item active">Tabulación</li>
			</ol>
		</div>
		<div class="">
			<button class="right-side-toggle waves-effect waves-light  btn-themecolor btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
		</div>
	</div>
	<div class="card-group">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-12">
						<h6 class="card-subtitle">Encuesta:</h6>
						<h3><?= $encuesta->NombreEncuesta ?></h3>
					</div>
				</div>
			</div>
		</div>
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-12">
						<h6 class="card-subtitle">Objetivo de la encuesta:</h6>
						<h3><?= $encuesta->ObjetivoEncuesta ?></h3>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--Tabla resultados -->
	<div class="row">
		<div class="col-md-12 align-center">
			<div class="card">
				<div class="card-body">
					<!-- Export Data -->
					<a href='<?= base_url() ?>ResultadosC/exportCSV/<?= $preguntas[0]->IdEncuesta ?>'>Exportar CSV</a><br><br>
					<div class="table-responsive table-sm">
						<table class="table  table-bordered text-center">
							<thead class="table-bordered">
								<tr>
									<th>Pregunta</th>
									<th>Respuesta</th>
									<th colspan="2">Resultado</th>
								</tr>
							</thead>
							<tbody>
								<?php
								foreach ($preguntas as $pregunta) {
									$n = count($pregunta->respuestas); ?>
									<tr>
										<td rowspan="<?= $n ?>" style="vertical-align:middle"><?= $pregunta->Pregunta ?></td>
										<?php foreach ($pregunta->respuestas as $respuesta) { ?>
											<td><?= $respuesta->Respuestas ?></td>
											<td><?= $respuesta->Contador ?></td>
										</tr>
									<?php }
								} ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- ============================================================== -->
	<!-- End Page Content -->
	<!-- ============================================================== -->