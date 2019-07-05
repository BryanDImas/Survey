<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h1 class="text-themecolor">Encuestas</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Paso Final</a></li>
                <li class="breadcrumb-item active">Finalización de encuesta</li>
            </ol>
        </div>
        <div class="">
            <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Inicio del contenido -->
    <!-- ============================================================== -->
    <div class="card">
        <div class="col-12" style="padding-left:1%">
            <form id="myForm" action="<?= base_url('EncuestasC/finalizar') ?>" method="post">           
                <div>
                    <p>
                        <h5>¿Desea publicar los resultados de la encuesta al finalizar?</h5>
                        <br><label class="" style="color:silver;">*Si desea publicar los resultados al finalizar la encuesta, seleccione mostrar resultados, de lo contrario escriba un mensaje de finalización, el cuál sera mostrado al terminar.</label>
                    </p>
                    <input type="hidden" name="resul" id="resul" value="No">
                    <input type="hidden" name="encuesta" value=<?= $_GET['e']?>>
                    <div class="custom-control custom-switch" style="color:#24d2b5;">
                        <input type="checkbox" class="custom-control-input" id="customSwitch1" value="1" onchange="javascript:showContent()">
                        <label class="custom-control-label" for="customSwitch1">Mostrar resultados</label>
                    </div><br>
                    <div class="form-group">
                        <p>
                            <h5>Escriba un mensaje de finalización en el cuadro de texto.</h5>
                        </p>
                        <textarea name="msj" class="form-control themecolor" rows="4" style="border-color:#24d2b5; text-align:center; margin:1% auto;" placeholder="">Muchas Gracias por contestar la encuesta</textarea>
                    </div>
                </div>
        </div>
    </div>
    <input type="submit" id="btn-submit" class="btn btn-rounded btn-outline-info float-right" value="Finalizar">
    </form>
    <!-- ============================================================== -->
    <!-- Fin del Contenido -->
    <!-- ============================================================== -->
    <script src="<?= base_url() ?>assets/node_modules/sweetalert/sweetalert.min.js"></script>

    <script type="text/javascript">
        function showContent() {
            element = document.getElementById("resul");
            check = document.getElementById("customSwitch1");
            if (check.checked) {
                element.value = 'Si';
            } else {
                element.value = 'No';
            }
        };
    </script>