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
        <div class="contenedor">
            <div class="card-header">
                <div class="logo-responsive">
                    <img src="<?= base_url() ?><?= $encuesta->logo ?>" alt="">
                </div>
                <div class="card-title">
                    <h2><?= $encuesta->NombreEncuesta ?></h2>
                    <h4><?= $encuesta->ObjetivoEncuesta ?></h4>
                </div>
            </div>
            <center>
            <form method="POST" action="<?= base_url('PrincipalC/capturar2/') ?>">
                <div class="card-body">
                    <?php $num = 0;
                    foreach ($encuesta->preguntas as $pregunta) { ?>
                        <p></p>
                        <h5 class="col-md-offset-1"><?= $num + 1 ?>.- <label for="respuesta"><?= $pregunta->Pregunta ?></label></h5>
                        <div class="image-responsive">
                            <p class="clasificacion clasificacion<?= $pregunta->idPregunta ?>">
                                <input id="radio1<?= $num ?>" type="radio" name="respuestas[<?= $num ?>]" value="1">
                                <label for="radio1<?= $num ?>">★</label>
                                <input id="radio2<?= $num ?>" type="radio" name="respuestas[<?= $num ?>]" value="2">
                                <label for="radio2<?= $num ?>">★</label>
                                <input id="radio3<?= $num ?>" type="radio" name="respuestas[<?= $num ?>]" value="3">
                                <label for="radio3<?= $num ?>">★</label>
                                <input id="radio4<?= $num ?>" type="radio" name="respuestas[<?= $num ?>]" value="4">
                                <label for="radio4<?= $num ?>">★</label>
                                <input id="radio5<?= $num ?>" type="radio" name="respuestas[<?= $num ?>]" value="5">
                                <label for="radio5<?= $num ?>">★</label>
                            </p>
                            <?php $num++;
                        } ?>
                    </div>
                    <input type="hidden" name="idEncuesta" value="<?= $encuesta->idEncuesta ?>">
                    <div class="boton col-md-12 text-center">
                        <input type="submit" class="btn btn-pri btn-lg" value="Listo">
                    </div>
            </form>
            </center>
        </div>
    </div>

    
    <?php $num = 1;
    foreach ($encuesta->preguntas as $pregunta) { ?>


        <script>
            $(".clasificacion<?= $pregunta->idPregunta ?>").find("input").change(function() {
                var valor = $(this).val()
                $(".clasificacion<?= $pregunta->idPregunta ?>").find("input").removeClass("activo")
                $(".clasificacion<?= $pregunta->idPregunta ?>").find("input").each(function(index) {
                    if (index + 1 <= valor) {
                        $(this).addClass("activo")
                    }

                })
            })

            $(".clasificacion<?= $pregunta->idPregunta ?>").find("label").mouseover(function() {
                var valor = $(this).prev("input").val()
                $(".clasificacion<?= $pregunta->idPregunta ?>").find("input").removeClass("activo")
                $(".clasificacion<?= $pregunta->idPregunta ?>").find("input").each(function(index) {
                    if (index + 1 <= valor) {
                        $(this).addClass("activo")
                    }

                })
            })
        </script>
        <?php $num++;
    } ?>

<footer>
        <div class="">
           <p> © 2019 Survey, The Next Services, SA de CV. Todos los derechos reservados</p><br>
       </div>
</footer>
</body>

</html>