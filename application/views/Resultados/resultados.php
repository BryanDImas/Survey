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
	<!-- ======================================================================= -->
	<!-- Inicio del contenido de la página -->
	<!-- ======================================================================= -->
	<div class="card-group">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-12">
						<h6 class="card-subtitle">Exportar datos:</h6>
					<!-- Export Data -->
					<a class="btn btn-primary" href='<?= base_url() ?>ResultadosC/exportCSV/<?= $preguntas[0]->IdEncuesta ?? '' ?>'>Excel.csv</a>
					</div>
				</div>
			</div>
		</div>
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-12">
						<h6 class="card-subtitle">Encuesta actual:</h6>
						<h3><?= $encuesta->NombreEncuesta ?? '' ?></h3>
					</div>
				</div>
			</div>
		</div>
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-12">
						<h6 class="card-subtitle">Objetivo de la encuesta:</h6>
						<h3><?= $encuesta->ObjetivoEncuesta ?? '' ?></h3>
					</div>
				</div>
			</div>
		</div>
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-12">
					<h6 class="card-subtitle">Seleccione la encuesta que desea ver:</h6>
					<!-- Boton de las encuestas-->
					<div class="btn-group">
						<button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Encuestas</button>
						<div class="dropdown-menu">
							<?php foreach ($ids as $id) { ?>
								<a class="btn btn-outline-success dropdown-item" href="<?= base_url() ?>ResultadosC/index/<?= $id->idEncuesta ?>"><?= $id->NombreEncuesta ?></a>
							<?php } ?>
						</div>
					</div><br><br>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Card de la tabla de contenido -->
	<div class="row">
		<div class="col-md-12 align-center">
			<div class="card">
				<div class="card-body">

					<!-- ======================================================================================================================================= -->
					<!-- Tabla de respuestas -->
					<!-- ====================================================================================================================================== -->
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
											<?php foreach ($pregunta->respuestas as $respuesta) { 
												switch($encuesta->IdFormato){ 
												case 1: 
												case 2:
												case 7:
												?>
													<td><?= $respuesta->Respuestas ?></td>
													<td><?= $respuesta->Contador ?></td>
												<?php break;
												case 3: 
												case 5:?>
													<td><img src="<?=base_url()?>assets/images/icon/<?= $respuesta->Respuestas ?>.png" alt="" width="30px"></td>
													<td><?= $respuesta->Contador ?></td>
												<?php break;
												case 4: ?>
													<td><label style="color: rgb(255, 230, 0)"><?= str_repeat("★",($respuesta->Respuestas ?? 0)); ?></label></td>
													<td><?= $respuesta->Contador ?></td>												
												<?php break;
												case 6: 
													switch($respuesta->Respuestas){
														case 0:
														echo "<td>". $respuesta->Respuestas ."% Muy malo. </td>";
														break;
														case 25: 
														echo "<td>". $respuesta->Respuestas ."% Malo. </td>";
														break;
														case 50:
														echo "<td>". $respuesta->Respuestas ."% Regular. </td>";
														break;
														case 75:
														echo "<td>". $respuesta->Respuestas ."% Bueno. </td>";
														break;
														case 100: 
														echo "<td>". $respuesta->Respuestas ."% Excelente. </td>";
														break;
													}
													echo "<td>".$respuesta->Contador ."</td>"; 
												break;
										 }?>
										</tr>
									<?php }} ?>
							</tbody>
						</table>
						<!-- =========================================================================================================================================== -->
						<!-- Fin de la tabla -->
						<!-- =========================================================================================================================================== -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- ============================================================== -->
	<!-- Fin de la página de contenido -->
	<!-- ============================================================== -->