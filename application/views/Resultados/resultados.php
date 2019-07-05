<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
	<div class="container">
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
</div>
<!--Tabla resultados -->
<div class="row" class="col-12">
<div class="col-md-9 align-center">
	<div class="card">
		<div class="card-body">
		    <!-- Export Data -->
			<a href='<?= base_url() ?>index.php/resultadosC/exportCSV'>Exportar CSV</a><br><br>
			<table class="table table-hover table-bordered text-center">
				<thead>
					<tr>
						<th>Pregunta</th>
						<th>Respuesta</th>
						<th colspan="2">Resultado</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($resultados as $resul) { ?>
						<tr>
							<td><?= $resul->Pregunta ?></td>
							<td><?= $resul->Respuestas ?></td>
							<td><?= $resul->Contador ?></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
</div>
<!-- ============================================================== -->
<!-- End Info box -->
<!-- ============================================================== -->

<!-- ============================================================== -->
<!-- End Page Content -->
<!-- ============================================================== -->
