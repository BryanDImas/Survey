<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Survey</title>
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/primera.css">
	<link href="<?= base_url() ?>assets/node_modules/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>assets/images/logo3.png">
</head>

<body>

	<div class="container">
		<div class="contenedor">
			<div id="header" class="col-12">
				<div class="logo-responsive">
					<img class="rounded-circle" src="<?= base_url() ?><?= $encuesta->logo ?>" alt="">
				</div>
				<h2><?= $encuesta->NombreEncuesta ?></h2>
				<h4><?= $encuesta->ObjetivoEncuesta ?></h4>
<!-- 				<?php date_default_timezone_set('America/El_Salvador'); echo date("Y-m-d h:m:s")?> -->
			</div>
			<div class="mensaje">
				<h3 class=""><?php echo nl2br($encuesta->MensajeInicio); ?></h3>
				<br><br>
				<?php if ($encuesta->preguntas != '') { ?>
					<p> Nos gustaría saber más información sobre usted. Por favor conteste estas cortas preguntas:</p>
					<br>
					<form class="form-group" action="<?= base_url('PrincipalC/CapDemo') ?>" method="post">
						<div class="col-md-8 offset-2">
							<h6><?= $encuesta->preguntas[0]->Pregunta ?></h6><br>
							<select name="edad"  class="custom-select" style="width:250px;">
							<option>-- Selecione su edad</option>
							
								<option value="">de 18 a 28 años</option>
								<option value="">de 28 a 38 años</option>
								<option value="">de 38 a 48 años</option>
								<option value="">de 48 a 58 años</option>
								<option value="">de 58 años o mas</option>
								
							</select>
						</div>
						<br><br><br>
						<div class="form-check col-md-8 offset-2">
							<h6><?= $encuesta->preguntas[1]->Pregunta ?></h6><br>
							<div class="form-check">
								<label><input name="genero" class="form-check-input" type="radio" value="Femenino"> Femenino</label><br>
								<label><input name="genero" class="form-check-input offset-1" type="radio" value="Masculino"> Masculino</label><br>
								 
							</div>
						</div>
						<br><br>
						<p>
							<div class="form-group col-md-8 offset-2" sss>
								<h6><?= $encuesta->preguntas[2]->Pregunta ?></h6><br>
								<select name="ciudad" id="" class="custom-select" style="width:150px;">
									<?php foreach ($ciudad as $c) { ?>
										<option value="<?= $c->Municipio ?>"><?= $c->Municipio ?></option>
									<?php } ?>
								</select>
						</p><br>
				</div>
				<input type="hidden" name="idEncuesta" value="<?= base64_encode($encuesta->idEncuesta) ?>">
				<div class="boton">
					<input type="submit" value="Iniciar" class="btn btn-pri btn-rounder btn-lg float-right">
				</div>
				</form>
			<?php } else { ?>
				<div class="boton">
					<a href="<?= base_url('PrincipalC/iniciar/') ?>?a=<?= base64_encode($encuesta->idEncuesta) ?>" class="btn btn-pri btn-rounder btn-lg float-right">Iniciar</a>
				</div>
			<?php } ?>
		</div>
	</div>
	<footer class="">
		&copy; 2019 Survey, The Next Services, SA de CV. Todos los Derechos Reservados.
	</footer><br><br>

</body>


</html>
