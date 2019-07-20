<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
	<div class="container-fluid">
		<div class="row page-titles">
			<div class="col-md-5 align-self-center">
				<h1 class="text-themecolor">Encuestas</h1>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="javascript:void(0)">Editar</a></li>
					<li class="breadcrumb-item active">Encuestas</li>
				</ol>
			</div>
			<div class="">
				<button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
			</div>
			<div class="container">
				<div class="card col-md-12">
					<br>
					<form action="<?= base_url('EncuestasC/actualizar') ?>" method="POST" class="form-horizontal mt-8" autocomplete="off">
						<input type="hidden" name="id" value="<?= $encuesta->idEncuesta ?>" />
						<input	type="hidden" value="<?= date('y-m-d')?>" />
						<div class="form-group">
							<label>Nombre de la encuesta: </label>
							<input type="text" class="form-control" name="nom" style="border-color:#24d2b5;" value="<?= $encuesta->NombreEncuesta ?>">
						</div>
						<div class="form-group">
							<label for="example">Objetivo de la encuesta: </label>
							<input type="text" name="obj" class="form-control" style="border-color:#24d2b5;" value="<?= $encuesta->ObjetivoEncuesta ?>">
						</div>
						<div class="form-group">
							<label>mensaje de inicio.</label>
							<textarea name="msj" class="form-control" rows="5" style="border-color:#24d2b5;"><?= $encuesta->MensajeInicio ?></textarea>
						</div>
						<div class="form-group">
							<label>mensaje de Finalización.</label>
							<textarea name="msjd" class="form-control" rows="5" style="border-color:#24d2b5;"><?= $encuesta->MensajeFinalizacion ?></textarea>
						</div>
						<div class="form-group">
							<label for="example">Estado: </label>
							<select name="esta" class="custom-select" style="border-color:#24d2b5;">
								<option value="Activo" <?= $encuesta->Estado == 'Activo' ? 'selected' : '' ?>>Activo</option>
								<option value="Inactivo" <?= $encuesta->Estado == 'Inactivo' ? 'selected' : ''  ?>>Inactivo</option>
							</select>
						</div>
						<div class="text-center">
							<p></p>
							<button id="btnGuardar" class="btn btn-rounded btn-xl  btn-outline-light" value="actualizar">Editar</button>
						</div>
						<br>
					</form>
				</div>
			</div>
