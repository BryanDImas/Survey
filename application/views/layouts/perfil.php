<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h1 class="text-themecolor">Perfil</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Ver</a></li>
                <li class="breadcrumb-item active">Información</li>
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
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="container bootstrap snippet">
                        <div class="row">
                            <div class="col-sm-4">
                                <!-- ====================================================================================================================== -->
                                <!--Perfil-->
                                <!-- ====================================================================================================================== -->
                                <div class="text-center">
                                    <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail"><p></p>
                                    <input name="foto" type="file" title = "Buscar un archivo para agregar" data-bfi-disabled data-filename-placement = "inside"><button class="btn btn-rounded btn-outline-success btn-sm" id="photo">Cambiar foto</button>
                                </div>
                                <br>
                                <div class="panel panel-default">
                                    <div class="panel-heading"><i class="fa fa-envelope fa-1x"> Correo </i></div>
                                    <div class="panel-body"><a href="mailto:<?= $usuario->Correo ?>"><?= $usuario->Correo ?></a></div>
                                </div><br>
                                <ul class="list-group">
                                    <li class="list-group-item text-muted text-themecolor"> Información Personal <i class="fa fa-dashboard fa-1x"></i></li>
                                    <li class="list-group-item text"><span class="pull-left"><strong>Cargo: </strong><?= $usuario->Cargo?></span></li>
                                    <li class="list-group-item text"><span class="pull-left"><strong>Departamento: </strong><?= $usuario->Departamento?></span></li>
                                    <li class="list-group-item text"><span class="pull-left"><strong>Telefono: </strong><?= $usuario->Numero?></span></li>
                                </ul>
                            </div>
                            <!--/col-3-->
                            <div class="col-sm-8">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="home">
                                        <div class="form-group">
                                            <h3>Empresa</h3><hr>
                                            <br>
                                            <div class="col-xs-6">
                                                <label for="first_name"><h4 class="text-themecolor">Nombre Comercial:</h4></label><br>
                                                <label for=""><h6><?= $empresa->NombreComercial ?></h6></label>
                                            </div>
                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <label for="last_name"><h4 class="text-themecolor">Dirección Empresarial:</h4></label><br>
                                                <label for=""><h6><?= $empresa->DireccionFisica ?></h6></label>
                                            </div>
                                            <div class="form-group">
                                            <div class="col-xs-6">
                                                <label for="last_name"><h4 class="text-themecolor">Correo Empresarial:</h4></label><br>
                                                <label for=""><h6><?= $empresa->Correo ?></h6></label>
                                            </div>
                                            <div class="form-group">
                                            <div class="col-xs-6">
                                                <label for="last_name"><h4 class="text-themecolor">Teléfono Empresarial:</h4></label><br>
                                                <label for=""><h6><?= $empresa->Telefono ?></h6></label>
                                            </div>
                                            <div class="form-group">
                                            <div class="col-xs-6">
                                                <label for="last_name"><h4 class="text-themecolor">Sector Economico:</h4></label><br>
                                                <label for=""><h6><?= $empresa->SectorEconomico ?></h6></label>
                                            </div>
                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <label for="last_name"><h4 class="text-themecolor">Descripcion de la empresa:</h4></label><br>
                                                <label for=""><h6><?= $empresa->DescripcionEmpresa ?></h6></label>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
<script type="text/javascript">
    document.getElementById('photo').addEventListener('click',function(){

    });
</script>