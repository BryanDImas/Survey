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
	<div class="container">
		<div class="contenedor">
			<div class="card-header">
				<div class="logo-responsive">
					<img src="<?= base_url() ?><?= $encuesta->logo ?>" alt="">
				</div>
				<h3 style="color:#1b4f32; text-align:right;">* Vista preliminar.</h3>
				<div class="card-title">
					<h2><?= $encuesta->NombreEncuesta ?></h2>
					<h4><?= $encuesta->ObjetivoEncuesta ?></h4>
				</div>
			</div>
			<form method="POST" action="<?= base_url('PrincipalC/capturar/') ?>">
				<div class="card-body">

					<?php $num = 0;
					foreach ($encuesta->preguntas as $pregunta) { ?>
						<p></p>
						<h5 class="col-md-offset-1"><?= $num + 1 ?>.- <label for="respuesta"><?= $pregunta->Pregunta ?></label></h5>
						<div class="image-responsive card-deck">
							<div class="col-md-2 col-xs-1 offset-3">
								<label for="radio1<?= $pregunta->Pregunta ?>"><img src="<?= base_url('assets/images/icon/triste.png') ?>"></label><br>
								<input id="radio1<?= $pregunta->Pregunta ?>" type="radio" name="respuestas[<?= $num ?>]" value="<?= $pregunta->respuestas[0]['IdRespuestas']?>">
							</div>
							<div class="col-md-2 col-xs-1">
								<label for="radio2<?= $pregunta->Pregunta ?>"><img src="<?= base_url('assets/images/icon/confundido.png') ?>"></label><br>
								<input id="radio2<?= $pregunta->Pregunta ?>" type="radio" name="respuestas[<?= $num ?>]" value="<?= $pregunta->respuestas[1]['IdRespuestas']?>">
							</div>
							<div class="col-md-2 col-xs-1">
								<label for="radio3<?= $pregunta->Pregunta ?>"><img src="<?= base_url('assets/images/icon/feliz.png') ?>"></label><br>
								<input id="radio3<?= $pregunta->Pregunta ?>" type="radio" name="respuestas[<?= $num ?>]" value="<?= $pregunta->respuestas[2]['IdRespuestas']?>">
							</div>
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


	<footer>
		<div>
			<span class="">&copy; 2019 Survey, The Next Services, SA de CV. Todos los Derechos Reservados.</span>
		</div>
	</footer>
</body>

</html>