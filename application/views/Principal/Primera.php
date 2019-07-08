<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Survey</title>
    <link href="<?= base_url() ?>assets/node_modules/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>assets/images/logo3.png">
</head>

<body class="Container" style="background-color:silver">
    <header class="col-md-12" style="background-color:black; height:100px; color:white;">
        <h3><?= $encuesta->NombreEncuesta ?></h3>
        <h4 class="float-right"><?= $encuesta->ObjetivoEncuesta ?></h4>
    </header>
    <div class="col-xs-12 col-sm-6 col-md-8 offset-1" style="background-color:none">
        <h1><?php echo nl2br($encuesta->MensajeInicio); ?></h1>
        <p></p>
        <h3>Para mejorar nuestra experiencia, por favor rellene estas sencillas preguntas.</h3>
        <p>
        <h6><?= $encuesta->preguntas[0]->Pregunta?></h6>
        <input type="number" name="edad" min="15" max="100">
        </p>
        <p>
        <h6><?= $encuesta->preguntas[1]->Pregunta?></h6>
        <input type="radio" value="Femenino">Femenino
        <input type="radio" value="Masculino">Masculino
        <input type="radio" value="Otro">Otro
        </p>
        <p>
        <h6><?= $encuesta->preguntas[2]->Pregunta?></h6>
        <select name="ciudad" id="">
            <?php foreach($ciudad as $c){?>
            <option value="<?=$c->Municipio?>"><?= $c->Municipio?></option>
            <?php } ?>
        </select>
        </p>
        <a href="<?= base_url('PrincipalC/iniciar/')?><?=$encuesta->idEncuesta?>" class="btn btn-rounded btn-outline-info float-right">Iniciar</a>
    </div>
    <footer></footer>
</body>

</html>