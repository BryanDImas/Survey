<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Survey</title>
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/fin.css">
    <link href="<?= base_url() ?>assets/node_modules/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>assets/images/logo3.png">
    <!-- page css -->
    <link href="<?= base_url() ?>assets/css/pages/error-pages.css" rel="stylesheet">

</head>

<body>
    <div class="container">
        <div class="contenedor">
            <div class="card-header">
                <div class="card-title">
                <div class="logo-responsive">
					<img class="rounded-circle" src="<?= base_url() ?><?= $encuesta->logo?>" alt="">
				</div>
                    <h2><?= $encuesta->NombreEncuesta ?></h2>
                    <h4><?= $encuesta->ObjetivoEncuesta ?></h4>
                </div>
            </div>
            <div class="mensaje">
                <h1>La encuesta ha sido completada exitosamente. </h1>
                <p class="text-info"> &#128515</p><br>
                <h2><?= $encuesta->MensajeFinalizacion ?></h2>
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