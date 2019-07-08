<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h1 class="text-themecolor">Usuarios</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Registro</a></li>
                <li class="breadcrumb-item active">Edición</li>
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
                    <!-- Formulario para ingresar el responsable de la empresa -->
                    <form action="<?= base_url() ?>UsuariosC/editarUsuario" method="post" class="form-control-line">
                        <div class="form-group has-success">
                            <p><label class="form-control-label">Nombre de la empresa:</label>
                                <select class="custom-select" searchable="Search here.." name="empresa">
                                    <!-- <option value="" disabled selected>Seleccionar Empresa</option> -->
                                    <?php foreach ($empresas as $empresa) { ?>
                                        <option value="<?= $empresa->idEmpresa ?>" <?= $empresa->idEmpresa == $user->idEmpresa ? 'selected' : '' ?>><?= $empresa->NombreComercial ?></option>
                                    <?php } ?>
                                </select>
                                <input type="hidden" name="idUser" value="<?= $user->idUsuario ?>">
                            </p>
                            <p>
                                <label class="form-control-label">Usuario:</label>
                                <input name="responsable" type="text" class="form-control form-control-line" value="<?= $user->Usuario ?>" required>
                            </p>
                            <label class="form-control-label">Correo:</label>
                            <input name="correo" type="mail" class="form-control form-control-line email-inputmask" value="<?= $user->Correo ?>" />
                            </p>
                            <p>
                                <label class="form-control-label">Contraseña:</label>
                                <input name="contrasena" type="password" class="form-control form-control-line" value="<?= $user->Clave ?>">
                            </p>
                            <p>
                                <label class="form-control-label">Cargo ó posición</label>
                                <input type="text" name="cargo" class="form-control form-control-line" value="<?= $user->Cargo ?>">
                            </p>
                            <p>
                                <label class="form-control-label">Departamento ó unidad organizacional</label>
                                <input type="text" name="unidad" class="form-control form-control-line" value="<?= $user->Departamento ?>">
                            </p>
                            <p>
                                <label class="form-control-label">Teléfono:</label>
                                <input name="telefono" id="phone-mask" type="tel" class="form-control form-control-line phone-inputmask" value="<?= $user->Numero ?>">
                            </p>
                            <p><br>
                                <div class="col-md-7 align-self-center text-right d-none d-md-block">
                                    <input type="submit" value="Guardar" class="btn btn-rounded btn-outline-success float-right" />
                                </div>
                            </p>

                        </div>
                    </form>
                </div>
                <div><?= validation_errors() ?></div>
            </div>
        </div>
    </div>