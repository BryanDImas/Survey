<?php if($this->session->formato != ''){?>
<script>alert("Ya ha elegido una opcion de formato");</script>
<?php  redirect('PreguntasC/index/?id='.$this->session->formato);} ?>
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <div class="responsive-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h1 class="text-themecolor">Encuesta</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Paso 2</a></li>
                    <li class="breadcrumb-item active">Formato</li>
                </ol>
            </div>
            <div class="">
                <button class="right-side-toggle waves-effect waves-light btn-themecolor btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Contenido de la página -->
        <!-- ============================================================== -->
        <div class="flex-row">
            <div class="card">
                <p></p>
                <p>
                    <div>
                        <h3 class="offset-1">Seleccione el formato de la encuesta</h3><br>
                    </div>
                </p>
                <!-- =============================================================================================================5555=============== -->
                <!-- Primer bloque de botones -->
                <!-- ============================================================================================================================ -->
                <div class="card" style="">

                    <div class="row">
                        <div class="col-3 offset-2" style="">

                            <a href="<?= base_url('PreguntasC/') ?>?id=1" class="btn btn-block btn-outline-nuevo btn-lg" ><i class="fas fa-list"></i><br> Elección Simple</a><br>

                            <a href="<?= base_url('PreguntasC/') ?>?id=2" class="btn btn-block btn-outline-primary btn-lg" ><i class="fas fa-tasks"></i><br> Elección Múltiple</a><br>

                            <a href="<?= base_url('PreguntasC/') ?>?id=3" class="btn btn-block btn-outline-info btn-lg" ><i class="fas fa-smile"></i><br> Iconos<br></a><br>

                            <a href="<?= base_url('PreguntasC/') ?>?id=4" class="btn btn-block btn-outline-new btn-lg" ><i class="fas fa-star"></i><br> Ponderaciones</a>
                        </div>
                        <!-- ============================================================================================================================ -->
                        <!-- Segundo bloque de botones validos si tipo de suscripcion es avanzada-->
                        <!-- ============================================================================================================================ -->
                        <?php if ($this->session->empresa->TipoCuenta == 'Avanzada') { ?>
                            
                            <div class="col-3 offset-2">
                                <a href="<?= base_url('PreguntasC/') ?>?id=5" class="btn btn-block btn-outline-light btn-lg" ><i class="fas fa-thumbs-up"></i><br> Iconos</a><br>

                                <a href="<?= base_url('PreguntasC/') ?>?id=6" class="btn btn-block btn-outline-red btn-lg" ><i class="fas fa-sliders-h"></i><br> Escala</a><br>

                                <a href="<?= base_url('PreguntasC/') ?>?id=7" class="btn btn-block btn-outline-success btn-lg" ><i class="fas fa-bars"></i><br> Combobox</a>
                            </div>
                        <?php } else { ?>
                        </div>
                    </div>
                    <!-- <div class="row"> -->
                    <div class="col-5 offset-1">
                        <label for="">* Tendras más opciones si cambias tu tipo de cuenta a Avanzada</label>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<!-- ============================================================== -->
<!-- fin contenido de la página -->
<!-- ============================================================== -->
