<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Survey</title>
	
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/caritas.css">
	<link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>assets/images/logo3.png">
	<link href="<?= base_url() ?>assets/node_modules/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/pages/card-page.css">

</head>

<body>

	<div class="container">
		<div class="contenedor">

			<div class="card-header">
			<div class="logo-responsive">
		 	<img class="rounded-circle" src="<?= base_url() ?><?= $encuesta->logo ?>" alt="">
	</div>
				<div class="card-title">
					<h2><?= $encuesta->NombreEncuesta ?></h2>
					<h4><?= $encuesta->ObjetivoEncuesta ?></h4>
				</div>
			</div>
			<form method="POST" action="<?= base_url('PrincipalC/capturar/') ?>">
				<div class="card-body">

					<?php $num = 1;
					foreach ($encuesta->preguntas as $pregunta) { ?>
						<div class="form-group">
							<p></p>
							<h4 class="col-md-offset-1"><?= $num ?>.- <label for="respuesta"><?= $pregunta->Pregunta ?></label></h4>
							<?php switch ($encuesta->IdFormato) {
								case 1: ?>
								<?php foreach ($pregunta->respuestas as $res) { ?>
									<label><input type="radio" name="respuestas[<?= $pregunta->idPregunta ?>]" value="<?= $res['IdRespuestas'] ?>"> <?= $res['Respuestas'] ?></label>
								<?php  } ?>
								<?php break;
							case 2: ?>
								<?php foreach ($pregunta->respuestas as $res) { ?>
									<label><input type="checkbox" name="respuestas[]" value="<?= $res['IdRespuestas'] ?>"> <?= $res['Respuestas'] ?></label>
								<?php  } ?>
								<?php break; ?>
							<?php case 7: ?>
								<select name="respuestas[<?= $pregunta->idPregunta ?>]" id="">
									<?php foreach ($pregunta->respuestas as $res) { ?>
										<option value="<?= $res['IdRespuestas'] ?>"><?= $res['Respuestas'] ?></option>
									<?php  } ?>
									<?php break;
							} ?>
							</select>
						</div>
						<?php $num++;
					} ?>
				</div>
				<input type="hidden" name="idencuesta" value="<?= $encuesta->idEncuesta ?>">
				<div class="boton col-md-12 text-center">
					<input type="submit" class="btn btn-pri btn-lg" value="Listo">
				</div>
			</form>
		</div>
	</div>
	</div>
	<footer>
	<div>
			<span class="">&copy; 2019 Survey, The Next Services, SA de CV. Todos los Derechos Reservados.</span>
		</div>
	</footer>
</body>

</html>