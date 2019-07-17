<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Survey</title>
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/ponderacion.css">
	<link href="<?= base_url() ?>assets/node_modules/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/pages/card-page.css">

</head>

<body>
	<div class="container-fluid">
		<div class="card text-center">
			<div class="card-header">
				Survey
			</div>
			<form method="POST" action="<?= base_url('PrincipalC/capturar/') ?>">
				<div class="card-body">
					<h4 class="card-title"><?= $encuesta->NombreEncuesta ?></h4>
					<?php $num = 1;
					foreach ($encuesta->preguntas as $pregunta) { ?>
						<p></p>
						<h4 class="col-md-offset-1"><?= $num ?>.- <label for="respuesta"><?= $pregunta->Pregunta ?></label></h4>
                            <p class="clasificacion">
                            <input id="radio1" type="radio" name="respuestas" value="1">
                            <label for="radio1"><img src="<?=base_url('assets/images/icon/triste.png')?>" height="75"></label>
                            <input id="radio2" type="radio" name="respuestas" value="2">
                            <label for="radio2"><img src="<?=base_url('assets/images/icon/confundido.png')?>" height="75"></label>
                            <input id="radio3" type="radio" name="respuestas" value="3">
                            <label for="radio3"><img src="<?=base_url('assets/images/icon/feliz.png')?>" height="75"></label>
                            </p>
						<?php $num++;
					} ?>
				</div>
				<input type="hidden" name="idencuesta" value="<?= $encuesta->idEncuesta ?>">
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