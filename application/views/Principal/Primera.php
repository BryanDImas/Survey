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

<body style="background:#F4F6F6">
	<div class="container-fluid" style="background:none">
		<div class="container" style="background:white;box-shadow: 5px -5px 0 2px #444 inset;" >
			<header class="col-12">
				<div class="row">
					<div class="img-responsive">
						<img src="<?= base_url() ?><?= $encuesta->logo ?>" alt="">
					</div>
					<div class="offset-8">
						<h3><?= $encuesta->NombreEncuesta ?></h3>
						<h4><?= $encuesta->ObjetivoEncuesta ?></h4>
					</div>
				</div>
			</header><br>
			<div class="mensaje">
				<h3 class=""><?php echo nl2br($encuesta->MensajeInicio); ?></h3>
				<br><br>
				<?php if ($encuesta->preguntas != '') { ?>
					<p> Nos gustaría saber más información sobre usted. Por favor conteste estas cortas preguntas:</p>
					<br>
					<form class="form-group" action="<?= base_url('PrincipalC/CapDemo') ?>" method="post">
						<div class="col-md-8 offset-2">
							<h6><?= $encuesta->preguntas[0]->Pregunta ?></h6><br>
							<input class="form-control" type="number" name="edad" min="15" max="100">
						</div>
						<br><br><br>
						<div class="form-check col-md-8 offset-2">
							<h6><?= $encuesta->preguntas[1]->Pregunta ?></h6><br>
							<div class="form-check-inline">
								<label><input name="genero" class="form-check-input" type="radio" value="Femenino"> Femenino</label>
								<label><input name="genero" class="form-check-input" type="radio" value="Masculino">Masculino</label>
								<label><input name="genero" class="form-check-input" type="radio" value="Otro">Otro</label>
							</div>
						</div>
						<br><br>
						<p>
							<div class="form-group col-md-8 offset-2" sss>
								<h6><?= $encuesta->preguntas[2]->Pregunta ?></h6><br>
								<select name="ciudad" id="" class="custom-select">
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
	<center>
		<footer class="img-responsive">
			<img src="<?= base_url() ?>assets/images/Logo.png" alt="survey">
		</footer>
		</center>
</body>

</html>