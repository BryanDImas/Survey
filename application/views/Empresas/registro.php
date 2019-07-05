<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Empresas</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Registro</a></li>
                <li class="breadcrumb-item active">Empresas</li>
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
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!-- Formulario de registro de empresas-->
                    <form action="<?= base_url() ?>EmpresasC/ingresar" method="post" class="form-control-line themecolor" enctype="multipart/form-data" autocomplete="off">
                        <div class="row">
                            <div class="card col-sm-6">
                                <div class="card">
                                    <div class="form-group has-success">
                                        <p>
                                            <label class="form-control-label">Empresa:</label>
                                            <input name="nombre" type="text" class="form-control form-control-line" placeholder="Nombre Comercial" required>
                                        </p>
                                        <p>
                                            <label class="form-control-label">Razón social:</label>
                                            <input name="razsoc" type="text" class="form-control form-control-line" required />
                                        </p>
                                        <p>
                                            <label class="form-control-label">Correo:</label>
                                            <input name="correo" type="mail" class="form-control form-control-line email-inputmask" required />
                                        </p>
                                        <p>
                                            <label class="form-control-label">Teléfono institucional:</label>
                                            <input name="telefono" type="tel" class="form-control form-control-line phone-inputmask" placeholder="9999-9999" required>
                                        </p>
                                        <p>
                                            <label class="form-control-label">Dirección:</label>
                                            <input name="direccion" type="text" class="form-control form-control-line" required />
                                        </p>
                                        <p>
                                            <label class="form-control-label">Pais:</label>
                                            <select class="custom-select" id="pais">
                                                <option value="0">--Seleccione país--</option>
                                                <?php foreach ($paises as $pais) { ?>
                                                    <option value="<?= $pais->idPais ?>"><?= $pais->Nombre ?></option>
                                                <?php } ?>
                                            </select>
                                        </p>
                                        <p>
                                            <label class="form-control-label">Departamento:</label>
                                            <select class="custom-select" id="departamento">
                                                <option value="0">--Seleccionar departamento--</option>
                                            </select>
                                        </p>
                                        <p>
                                            <label class="form-control-label">Municipio:</label>
                                            <select name="municipio" class="custom-select" id="municipio">
                                                <option>--Seleccionar municipio--</option>
                                            </select>
                                        </p>
                                        <p>
                                            <label class="form-control-label">NIT:</label>
                                            <input name="nit" type="text" class="form-control form-control-line nit-inputmask" placeholder="####-######-###-#" required />
                                        </p>
                                        <p>
                                            <label class="form-control-label">IVA:</label>
                                            <input name="iva" type="text" class="form-control form-control-line iva-inputmask" placeholder="#####-#" required />
                                        </p>
                                        <p>
                                            <label class="form-control-label">Logo de la Empresa</label>
                                            <div class="input-group mb-3">
                                                <div class="custom-file">
                                                    <input name="logo" type="file" class="custom-file-input">
                                                    <label class="custom-file-label form-control" for="inputGroupFile01">Seleccionar Archivo</label>
                                                </div>
                                            </div>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="form-group has-success">
                                        <p>
                                            <label class="form-control-label">Fecha de fundación:</label>
                                            <input name="fundacion" type="date" class="form-control form-control-line has-success" />
                                        </p>
                                        <p>
                                            <label class="form-control-label">Descripción:</label>
                                            <input name="descripcion" type="text" class="form-control form-control-line has-success" placeholder="Rubro de la empresa" required />
                                        </p>
                                        <p>
                                        </p>
                                        <p>
                                            <label class="form-control-label">Sector económico:</label>
                                            <select name="sector" class="custom-select">
                                                <option>--Seleccione sector económico--</option>
                                                <option>Agricultura</option>
                                                <option>Ganadería</option>
                                                <option>Pesca</option>
                                                <option>Selvicultura</option>
                                                <option>Minería</option>
                                                <option>Industria</option>
                                                <option>Comercio</option>
                                                <option>Transporte</option>
                                                <option>Financiero</option>
                                                <option>Social</option>
                                                <option>Servicios</option>
                                            </select>
                                        </p>
                                        <p>
                                            <label class="form-control-label">Propietario de la empresa:</label>
                                            <input name="propietario" type="text" class="form-control form-control-line" required />
                                        </p>
                                        <p>
                                            <label class="form-control-label">Representante legal:</label>
                                            <input name="representante" type="text" class="form-control form-control-line" required />
                                        </p>
                                        <p>
                                            <label class="form-control-label">Tipo de suscripción:</label>
                                            <select name="suscripcion" class="custom-select">
                                                <option value="Basica">Básica</option>
                                                <option value="Avanzada">Avanzada</option>
                                            </select>
                                        </p>
                                        <p>
                                            <label class="form-control-label">Contacto de la empresa:</label>
                                            <input name="contacto" type="text" class="form-control form-control-line" required />
                                        </p>
                                        <p>
                                            <label class="form-control-label">Cargo en la empresa:</label>
                                            <input name="cargo" type="text" class="form-control form-control-line" required />
                                        </p>
                                        <p>
                                            <label class="form-control-label">Teléfono de contacto:</label>
                                            <input name="tel" type="tel" class="form-control form-control-line phone-inputmask" placeholder="9999-9999" required />
                                        </p>
                                        <p>
                                            <label class="form-control-label">Correo de contacto:</label>
                                            <input name="mail" type="mail" class="form-control form-control-line email-inputmask" required />
                                        </p>
                                    </div>
                                    <?= validation_errors(); ?>
                                    <p>
                                        <input type="submit" value="Registrar" class="btn btn-rounded btn-outline-success float-right" />
                                    </p>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->

    <script>
        var baseUrl = "<?= base_url() ?>";
    </script>
    <script src="<?= base_url() ?>assets/js/depa.js"></script>