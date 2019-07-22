<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Survey</title>
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>assets/images/logo3.png">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/manitas.css">
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
                <h2 class="card-title">
                    <h2><?= $encuesta->NombreEncuesta ?></h2>
                    <h4><?= $encuesta->ObjetivoEncuesta ?></h4>
            </div>
            <form method="POST" action="<?= base_url('PrincipalC/capturar2/') ?>">
                <div class="card-body">

                    <?php $num = 0;
                    foreach ($encuesta->preguntas as $pregunta) { ?>
                        <p></p>
                        <h4 class="col-md-offset-1"><?= $num + 1 ?>.- <label for="respuesta"><?= $pregunta->Pregunta ?></label></h4>
                        <div class="card-deck">
                            <div class=" col-md-2 col-xs-2 offset-4">
                                <label for="radio1<?= $pregunta->idPregunta ?>"><img src="<?= base_url('assets/images/icon/abajo.png') ?>" height="75"></label><br>
                                <input id="radio1<?= $pregunta->idPregunta ?>" type="radio" name="respuestas[<?= $num ?>]" value="No me gusta">
                            </div>
                            <div class=" col-md-2 col-xs-2">
                                <label for="radio2<?= $pregunta->idPregunta ?>"><img src="<?= base_url('assets/images/icon/arriba.png') ?>" height="75"></label><br>
                                <input id="radio2<?= $pregunta->idPregunta ?>" type="radio" name="respuestas[<?= $num ?>]" value="Me gusta">
                            </div>
                        </div>
                        <?php $num++;
                    } ?>
                </div>
                <input type="hidden" name="idEncuesta" value="<?= $encuesta->idEncuesta ?>">
                <div class="col-md-2 text-center">
                    <input type="submit" class="btn btn-pri btn-lg" value="Listo">
                </div>
                <p></p> <br><br>
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