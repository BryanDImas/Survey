<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h1 class="text-themecolor">Estadisticas</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Resultados</a></li>
                <li class="breadcrumb-item active">Estadisticas</li>
            </ol>
        </div>
        <div class="">
            <button class="right-side-toggle waves-effect waves-light  btn-themecolor btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
        </div>
    </div>
    <!-- Boton de las encuestas-->
    <div class="btn-group float-right">
        <button class="btn dropdown-toggle btn-rounded btn-outline-success" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Encuestas</button>
        <div class="dropdown-menu">
            <?php foreach ($ids as $id) { ?>
                <a class="btn btn-outline-success dropdown-item" href="<?= base_url() ?>ResultadosC/grafi/<?= $id->idEncuesta ?>"><?= $id->NombreEncuesta ?></a>
            <?php } ?>
        </div>
    </div><br><br><br>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->

    <!-- Info box -->
    <!-- ============================================================== -->
    <div class="card">
        <div class="col-12">
            <br>
            <div>
                <h3 class="text-center">Encuesta: <small><?= $encuesta->NombreEncuesta ?? ''?></small></h3>
            </div>

            <div class="row m-t-30">
                <!-- Column -->
                <div class="col-md-6 col-lg-3 col-xlg-3">
                    <div class="card">
                        <div class="box bg-info text-center">
                            <h1 class="font-light text-white"><?= $encuesta->Contador ?? 0 ?></h1>
                            <h6 class="text-white">Encuestas <br> contestadas</h6>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <div class="col-md-6 col-lg-3 col-xlg-3">
                    <div class="card">
                        <div class="box bg-primary text-center">
                            <h1 class="font-light text-white"><?= $encuesta->totalRes ?? 0 ?></h1>
                            <h6 class="text-white">Preguntas <br> contestadas</h6>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <div class="col-md-6 col-lg-3 col-xlg-3">
                    <div class="card">
                        <div class="box bg-success text-center">
                            <h1 class="font-light text-white"><?= $encuesta->Demo[1]->respuestas[0]->Contador ?? 0 ?></h1>
                            <h6 class="text-white">Datos demograficos: <br> Hombres</h6>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <div class="col-md-6 col-lg-3 col-xlg-3">
                    <div class="card">
                        <div class="box bg-dark text-center">
                            <h1 class="font-light text-white"><?= $encuesta->Demo[1]->respuestas[1]->Contador ?? 0 ?></h1>
                            <h6 class="text-white">Datos demograficos: <br> Mujeres</h6>
                        </div>
                    </div>
                </div>
                <!-- Column -->
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Info box -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Over Visitor, Our income , slaes different and  sales prediction -->
    <!-- ============================================================== -->

    <div class="row">
        <?php $num = 0;
        foreach ($preguntas as $pregunta) { ?>
            <!-- Column -->
            <div class="col-lg-6 col-md-6">
                <!-- column -->
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><?= $num + 1; ?>.- <?= $pregunta->Pregunta ?></h4>

                        <div>
                            <canvas id="chart2<?= $pregunta->idPregunta ?>" height="150"></canvas>
                        </div>
                    </div>
                </div>
                <!-- column -->
            </div>
            <?php $num++;
        } ?>
        <!-- Column -->
    </div>
    <!-- column -->
    <!-- ============================================================== -->
    <!-- Sales Chart and browser state-->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!-- Chart JS -->
    <script src="<?= base_url() ?>assets/node_modules/Chart.js/chartjs.init.js"></script>
    <script src="<?= base_url() ?>assets/node_modules/Chart.js/Chart.min.js"></script>
    <?php $n = 0;
    foreach ($preguntas as $pregunta) { ?>
        <script>
            /*<!-- ============================================================== -->*/
            /*<!-- Bar Chart -->*/
            /*<!-- ============================================================== -->*/
            new Chart(document.getElementById("chart2<?= $pregunta->idPregunta ?>"), {
                "type": "bar",
                "data": {
                    "labels": [<?php
                                foreach ($pregunta->respuestas as $respuesta) {
                                    echo "'" . $respuesta->Respuestas . "',";
                                } ?>],
                    "datasets": [{
                        "label": "Respuesta",
                        "data": [<?php
                                    foreach ($pregunta->respuestas as $respuesta) {
                                        echo  $respuesta->Contador . ",";
                                    } ?>],
                        "fill": false,
                        "backgroundColor": ["rgba(255, 99, 132, 0.2)", "rgba(255, 159, 64, 0.2)", "rgba(255, 205, 86, 0.2)", "rgba(75, 192, 192, 0.2)", "rgba(54, 162, 235, 0.2)", "rgba(153, 102, 255, 0.2)", "rgba(201, 203, 207, 0.2)","rgba(255, 99, 100, 0.2)"],
                        "borderColor": ["rgb(239, 83, 80)", "rgb(255, 159, 64)", "rgb(255, 178, 43)", "rgb(86, 192, 216)", "rgb(57, 139, 247)", "rgb(153, 102, 255)", "rgb(201, 203, 207)"],
                        "borderWidth": 1
                    }]
                },
                "options": {
                    "scales": {
                        "yAxes": [{
                            "ticks": {
                                "beginAtZero": true
                                
                            }
                        }]
                    }
                }
            });
        </script>
        <?php $n++;
    } ?>
