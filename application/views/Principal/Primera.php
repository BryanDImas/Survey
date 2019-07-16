<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Survey</title>
    <link href="<?= base_url() ?>assets/node_modules/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>assets/images/logo3.png">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/primera.css">
</head>

<body>
    <div class="container">

        <header>
            <div class="img-responsive">
                <img src="<?= base_url() ?><?= $encuesta->logo ?>" alt="">
            </div>
            <h3><?= $encuesta->NombreEncuesta ?></h3>
            <h4><?= $encuesta->ObjetivoEncuesta ?></h4>
        </header><br>
        <div class="mensaje">
            <h3 class=""><?php echo nl2br($encuesta->MensajeInicio); ?></h3>
            <br><br>
            <?php if ($encuesta->preguntas != '') { ?>
                <p> Nos gustaría saber más información sobre usted. Por favor conteste estas cortas preguntas:</p>
                <br>
                <h6><?= $encuesta->preguntas[0]->Pregunta ?></h6>
                <input type="number" name="edad" min="15" max="100">
                <br><br><br>
                <h6><?= $encuesta->preguntas[1]->Pregunta ?></h6>
                <input type="radio" value="Femenino"> Femenino
                <input type="radio" value="Masculino">Masculino
                <br><br>
                <p>
                    <h6><?= $encuesta->preguntas[2]->Pregunta ?></h6>
                    <select name="ciudad" id="">
                        <?php foreach ($ciudad as $c) { ?>
                            <option value="<?= $c->Municipio ?>"><?= $c->Municipio ?></option>
                        <?php } ?>
                    </select>
                </p><br>
                

            <?php } ?>
            <div class="boton">
                <a href="<?= base_url('PrincipalC/iniciar/') ?>?a=<?= base64_encode($encuesta->idEncuesta) ?>" class="btn btn-pri btn-rounder btn-lg float-right">Iniciar</a>
            </div>
        </div>
        <footer></footer>
    </div>
</body>

</html>