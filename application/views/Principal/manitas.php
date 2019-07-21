<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Survey</title>
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/manitas.css">
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
                <div class="col-md-12 text-center">
                    <input type="submit" class="btn btn-primary btn-lg" value="Listo">
                </div>
            </form>
            <div class="card-footer text-muted">
                <?= $encuesta->ObjetivoEncuesta ?>
            </div>
        </div>
    </div>
    </form>
</body>

</html>