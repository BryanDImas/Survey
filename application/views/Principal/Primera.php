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
        <pre>
        <?php print_r($encuesta);?>
        <a href="<?= base_url('PrincipalC/iniciar/')?><?=$encuesta->idEncuesta?>" class="btn btn-rounded btn-outline-info float-right">Iniciar</a>
    </div>
    <footer></footer>
</body>

</html>