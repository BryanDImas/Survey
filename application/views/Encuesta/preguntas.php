<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">

        <div class="col-md-5 align-self-center margin">
            <h1 class="text-themecolor">Encuestas</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Paso 3</a></li>
                <li class="breadcrumb-item active">Creación de Preguntas</li>
            </ol>
        </div>
        <div class="">
            <button class="right-side-toggle waves-effect waves-light  btn-themecolor btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!--  Contenido de la página -->
    <!-- ============================================================== -->
    <div class="card">
        <div class="card-body">
            

            <!-- <input type="hidden" name="form" id="form" value=""> -->
            <div style=" text-align:center; margin:3% auto; width:35rem; heigth:40rem;" class="list-group" id="form">
            <h5 class="text-center">Cree su pregunta</h5>
                <div class="form-group has-success">
                    <input id="pregunta" name="pregunta" type="text" class="form-control" placeholder="Ingrese aquí su pregunta" autocomplete="off">
                </div>
                <div class="text-center">
                    <p></p>
                    <button id="btnGuardar" class="btn btn-rounded btn-xl  btn-outline-info" value="guardar">Guardar</button>
                </div>
            </div>
            <br>
            <div class="container-fluid">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th> # </th>
                            <th> Pregunta</th>
                            <th colspan="6">Opciones</th>
                        </tr>
                    </thead>
                    <tbody id="algo"></tbody>
                </table>
            </div>
        </div>
        <div class="form-group">
            <a href="<?= base_url('PreguntasC/stepfin/') ?>?e=<?= $idEncuesta ?>" class="btn btn-outline-success btn-rounded float-right">Continuar</a>
        </div>
        <!-- ============================================================== -->
        <!--  Fin Contenido de la página -->
        <!-- ============================================================== -->
        <script>
            var baseUrl = "<?= base_url() ?>";
        </script>
        <script src="<?= base_url('assets/js/acciones.js') ?>"></script>