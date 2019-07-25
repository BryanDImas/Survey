<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Survey</title>
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/rango.css">
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
				<form method="POST" action="<?= base_url('PrincipalC/capturar2/') ?>">
					<div class="card-body">

						<?php $num = 1;
						foreach ($encuesta->preguntas as $pregunta) { ?>
							
							<h5 class="col-md-offset-1"><?= $num ?>.- <label for="respuesta"><?= $pregunta->Pregunta ?></label></h5>
							<p>
								<h5>Malo <input name="respuestas[]" type="range" id="toPrice" step="25" value="" oninput="document.getElementById('tPrice<?= $num ?>').innerHTML = this.value + '%';" /> Bueno</h5>
								<h2><label id="tPrice<?= $num ?>"></label></h2>
							</p>
							<?php $num++;
						} ?>
					</div>
					<input type="hidden" name="idEncuesta" value="<?= $encuesta->idEncuesta ?>">
					<div class="boton col-md-11 text center">
						<input type="submit" class="btn btn-pri btn-lg" value="Listo">
					</div>
				</form>

				<div>

				</div>
		
	
		</form><br>
	
		</div>
	</div>
	<footer>
		<div>
			<span >&copy; 2019 Survey, The Next Services, SA de CV. Todos los Derechos Reservados.</span>
		</div>

	</footer>

</body>

</html>