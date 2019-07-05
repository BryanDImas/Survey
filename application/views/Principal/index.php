<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Survey</title>
	<link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>assets/images/logo3.png">
	<link href="<?= base_url() ?>assets/node_modules/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet">
</head>

<body style="background-color:#212529">
	<header></header>
	<pre>
		<?php print_r($_GET) ?>
	</pre>
	<div class="container">
		<div class="col-12">
			<form class="form-horizontal" method="POST" action="<?= base_url('principalC/capturar/') ?>">
				<fieldset>
					<br>
					<h1 class="text-center header"><?= $encuesta->NombreEncuesta ?></h1>
					<!-- ======================================================================================================================= -->
					<!-- Área del formulario -->
					<!-- ======================================================================================================================= -->
					<?php $num = 1;
					foreach ($encuesta->preguntas as $pregunta) { ?>
						<div class="form-group">
							<h4 class="col-md-offset-1"><?= $num ?>.- <label for="respuesta"><?= $pregunta->Pregunta ?></label></h4>
							<div class="">
								<div class="radio">
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

										<select name="respuestas[]" id="">
											<?php foreach ($pregunta->respuestas as $res) { ?>
												<option value="<?= $res['IdRespuestas'] ?>"><?= $res['Respuestas'] ?></option>
											<?php  } ?>
											<?php break;
									} ?>
									</select>
								</div>
							</div>
							<?php $num++;
						} ?>
					</div>


					<div class="form-group">
						<div class="col-md-12 text-center">
							<input type="submit" class="btn btn-primary btn-lg" value="Listo">
						</div>
					</div>
				</fieldset>
			</form>
		</div>
	</div>
	</div>
	</div>
	<!-- ======================================================================================================= -->
	<footer></footer>
</body>

</html>