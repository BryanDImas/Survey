<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Survey</title>
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/rango.css">
</head>

<body>
	<form class="range-field w-75" action="<?=base_url('PrincipalC/capturar')?>" method="post">
		<?php $num = 1;
		foreach ($encuesta->preguntas as $pregunta) { ?>
			<h4 class="col-md-offset-1"><?= $num ?>.- <label for="respuesta"><?= $pregunta->Pregunta ?></label></h4>

			<div class="inputDiv">
				<div class="etiqueta"></div>
				Bueno<input type="range" min="1" max="5" autocomplete="off" class="input3" list="">Malo
			</div>
			<?php $num++;
		} ?>
		<div class="text-center">
			<input type="submit" class="btn btn-xl btn-primary" value="Listo">
		</div>
	</form>
</body>

</html>