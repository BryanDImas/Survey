<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Survey</title>
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/caritas.css">
	<!-- Favicon icon -->
	<link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>assets/images/logo3.png">
	<link href="<?= base_url() ?>assets/node_modules/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/pages/card-page.css">

</head>

<body>
	<div class="container-fluid">
		<div class="card text-center">
			<div class="card-header">
				Survey
			</div>
			<form method="POST" action="<?= base_url('PrincipalC/capturar2/') ?>">
				<div class="card-body">
					<h4 class="card-title"><?= $encuesta->NombreEncuesta ?></h4>
					<?php $num = 0;
					foreach ($encuesta->preguntas as $pregunta) { ?>
						<p></p>
						<h4 class="col-md-offset-1"><?= $num+1 ?>.- <label for="respuesta"><?= $pregunta->Pregunta ?></label></h4>
						<div class="card-deck">
							<div class="col-md-2 col-xs-1 offset-3">
								<label for="radio1<?= $pregunta->Pregunta ?>"><img src="<?= base_url('assets/images/icon/triste.png') ?>"></label><br>
								<input id="radio1<?= $pregunta->Pregunta ?>" type="radio" name="respuestas[<?= $num?>]" value="1">
							</div>
							<div class="col-md-2 col-xs-1">
								<label for="radio2<?= $pregunta->Pregunta ?>"><img src="<?= base_url('assets/images/icon/confundido.png') ?>"></label><br>
								<input id="radio2<?= $pregunta->Pregunta ?>" type="radio" name="respuestas[<?= $num?>]" value="2">
							</div>
							<div class="col-md-2 col-xs-1">
								<label for="radio3<?= $pregunta->Pregunta ?>"><img src="<?= base_url('assets/images/icon/feliz.png') ?>"></label><br>
								<input id="radio3<?= $pregunta->Pregunta ?>" type="radio" name="respuestas[<?= $num?>]" value="3">
							</div>
						</div>
						<?php $num++;
					} ?>
				</div>
				<input type="hidden" name="idEncuesta" value="<?= $encuesta->idEncuesta ?>">
				<div class="col-md-12 text-center">
					<input type="submit" class="btn btn-primary btn-lg" value="Listo">
				</div>
			</form>
			<div class="card-footer text-muted">
				<?= $encuesta->ObjetivoEncuesta ?>
				<span class="float-right">2019 NextServices</span>
			</div>
		</div>
	</div>
	</form>
</body>

</html>