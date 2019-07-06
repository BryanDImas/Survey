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
                <li class="breadcrumb-item active">Nuevo</li>
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
                    <form action="<?= base_url() ?>UsuariosC/ingresar" method="post" class="form-control-line needs-validation" novalidate>
                        <div class="form-group has-success">
                            <p><label class="form-control-label">Nombre de la empresa:</label>
                                <select class="custom-select" name="empresa" required>
                                    <option value="" disabled selected>Seleccionar Empresa</option>
                                    <?php foreach ($empresas as $empresa) { ?>
                                        <option value="<?= $empresa->idEmpresa ?>"><?= $empresa->NombreComercial ?></option>
                                    <?php } ?>
                                </select>
                            </p>
                            <p>
                                <label class="form-control-label">Usuario:</label>
                                <input id="validationDefault01" name="responsable" type="text" class="form-control form-control-line" required>
                            </p>
                            <p>
                                <label for="validationDefault01" class="form-control-label">Correo:</label>
                                <input id="validationDefault02" name="correo" type="mail" class="form-control form-control-line email-inputmask" required />
                            </p>
                            <p>
                                <label class="form-control-label">Contraseña:</label>
                                <input name="contrasena" type="password" class="form-control form-control-line" required>
                            </p>
                            <p>
                                <label class="form-control-label">Cargo ó posición</label>
                                <input type="text" name="cargo" class="form-control form-control-line" required>
                            </p>
                            <p>
                                <label class="form-control-label">Departamento ó unidad organizacional</label>
                                <input type="text" name="unidad" class="form-control form-control-line" required>
                            </p>
                            <p>
                                <label class="form-control-label">Teléfono:</label>
                                <input name="telefono" type="tel" class="form-control form-control-line phone-inputmask" required>
                            </p>
                            <p><br>
                                <input type="submit" value="Registrar" class="btn btn-rounded btn-outline-success float-right" />
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>