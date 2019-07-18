<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Survey</title>
    <link href="<?= base_url('assets/css/ponderacion.css') ?>" rel="stylesheet" type="text/css">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>assets/images/logo3.png">
    <link href="<?= base_url() ?>assets/node_modules/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/js/ponderacion.js') ?>"></script>
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/pages/cardpage.css">
</head>

<body>
    <div class="container">
        <div class="card card-inverse text-center">
            <div class="card-header">
            <h4 class="card-title"><?= $encuesta->NombreEncuesta ?></h4>
            <h5> <?= $encuesta->ObjetivoEncuesta ?></h5>
            </div>
            <form method="POST" action="<?= base_url('PrincipalC/capturar/') ?>">
                <div class="card-body">
                   
                    <?php $num = 1;
                    foreach ($encuesta->preguntas as $pregunta) { ?>
                        <p></p>
                        <h4 class="col-md-offset-1"><?= $num ?>.- <label for="respuesta"><?= $pregunta->Pregunta ?></label></h4>
                        <p class="clasificacion clasificacion<?= $num ?>">
                            <input id="radio1" type="radio" name="estrellas" value="1">
                            <label for="radio1">★</label>
                            <input id="radio2" type="radio" name="estrellas" value="2">
                            <label for="radio2">★</label>
                            <input id="radio3" type="radio" name="estrellas" value="3">
                            <label for="radio3">★</label>
                            <input id="radio4" type="radio" name="estrellas" value="4">
                            <label for="radio4">★</label>
                            <input id="radio5" type="radio" name="estrellas" value="5">
                            <label for="radio5">★</label>
                        </p>
                        <?php $num++;
                    } ?>
                </div>
                <input type="hidden" name="idencuesta" value="<?= $encuesta->idEncuesta ?>">
                <div class="col-md-12 text-center">
                    <input type="submit" class="btn btn-pon btn-lg" value="Listo">
                </div><br><br>
            </form>
            <div class="card-footer text-muted">
            © 2019 Survey, The Next Services, SA de CV. Todos los derechos reservados
            </div>
        </div>
    </div>
    <?php $num = 1;
    foreach ($encuesta->preguntas as $pregunta) { ?>
        <script>
            $(".clasificacion<?= $num ?>").find("input").change(function() {
                var valor = $(this).val()
                $(".clasificacion<?= $num ?>").find("input").removeClass("activo")
                $(".clasificacion<?= $num ?>").find("input").each(function(index) {
                    if (index + 1 <= valor) {
                        $(this).addClass("activo")
                    }

                })
            })

            $(".clasificacion<?= $num ?>").find("label").mouseover(function() {
                var valor = $(this).prev("input").val()
                $(".clasificacion<?= $num ?>").find("input").removeClass("activo")
                $(".clasificacion<?= $num ?>").find("input").each(function(index) {
                    if (index + 1 <= valor) {
                        $(this).addClass("activo")
                    }

                })
            })
        </script>
        <?php $num++;
    } ?>
</body>

</html>