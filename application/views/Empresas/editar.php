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
				<li class="breadcrumb-item"><a href="javascript:void(0)">Administrar</a></li>
				<li class="breadcrumb-item active">Edición</li>
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
	<!-- Start Page Content -->
	<!-- ============================================================== -->
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<!-- Formulario de editar de empresas-->
					<form action="<?= base_url() ?>EmpresasC/actualizar" method="post" class="form-control-line" enctype="multipart/form-data">
						<input type="hidden" name="id" value="<?= $empresa->idEmpresa ?>">
						<input type="hidden" name="ruta" value="<?= $empresa->LogoEmpresa ?>">
						<div class="row">
							<div class="card col-sm-6">
								<div class="card">
									<div class="form-group has-success">
										<p>
											<label class="form-control-label">Empresa:</label>
											<input name="nombre" type="text" class="form-control form-control-line" placeholder="Nombre Comercial" value="<?= $empresa->NombreComercial ?>" required>
										</p>
										<p>
											<label class="form-control-label">Razón social:</label>
											<input name="razsoc" type="text" class="form-control form-control-line" value="<?= $empresa->RazonSocial ?>" required />
										</p>
										<p>
											<label class="form-control-label">Correo:</label>
											<input name="correo" type="mail" class="form-control form-control-line email-inputmask" value="<?= $empresa->Correo ?>" required />
										</p>
										<p>
											<label class="form-control-label">Teléfono institucional:</label>
											<input name="telefono" type="tel" class="form-control form-control-line phone-inputmask" placeholder="9999-9999" value="<?= $empresa->Telefono ?>" required>
										</p>
										<p>
											<label class="form-control-label">Dirección:</label>
											<input name="direccion" type="text" class="form-control form-control-line" value="<?= $empresa->DireccionFisica ?>" required />
										</p>
										<p>
											<label class="form-control-label">Pais:</label>
											<select class="custom-select" id="pais">
												<option value="0">--Seleccione país--</option>
												<?php foreach ($paises as $p) { ?>
													<option value="<?= $p->idPais ?>" <?= $p->idPais == $pais->idPais ? 'selected' : '' ?>><?= $p->Nombre ?></option>
												<?php } ?>
											</select>
										</p>
										<p>
											<label class="form-control-label">Departamento:</label>
											<select class="custom-select" id="departamento">
												<option value="<?= $departamento->IdDepartamento ?>"><?= $departamento->Departamento ?></option>
												<option value="0">--Seleccionar departamento--</option>
											</select>
										</p>
										<p>
											<label class="form-control-label">Municipio:</label>
											<select name="municipio" class="custom-select" id="municipio">
												<option value="<?= $municipio->IdMunicipio ?>"><?= $municipio->Municipio ?></option>
												<option>--Seleccionar municipio--</option>
											</select>
										</p>
										<p>
											<label class="form-control-label">NIT:</label>
											<input name="nit" type="text" class="form-control form-control-line nit-inputmask" placeholder="####-######-###-#" value="<?= $empresa->Nit ?>" required />
										</p>
										<p>
											<label class="form-control-label">IVA:</label>
											<input name="iva" type="text" class="form-control form-control-line iva-inputmask" placeholder="#####-#" value="<?= $empresa->Iva ?>" required />
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
											<input name="fundacion" type="date" class="form-control form-control-line has-success" value="<?= $empresa->FechaFundacion ?>" />
										</p>
										<p>
											<label class="form-control-label">Descripción:</label>
											<input name="descripcion" type="text" class="form-control form-control-line has-success" placeholder="Rubro de la empresa" value="<?= $empresa->DescripcionEmpresa ?>" required />
										</p>
										<p>
										</p>
										<p>
											<label class="form-control-label">Sector económico:</label>
											<select name="sector" class="custom-select">
												<option value=""><?= $empresa->SectorEconomico ?></option>
												<Optgroup label="--Seleccione sector económico--">
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
												</Optgroup>
											</select>
										</p>
										<p>
											<label class="form-control-label">Propietario de la empresa:</label>
											<input name="propietario" type="text" class="form-control form-control-line" value="<?= $empresa->PropietarioEmpresa ?>" />
										</p>
										<p>
											<label class="form-control-label">Representante legal:</label>
											<input name="representante" type="text" class="form-control form-control-line" value="<?= $empresa->RepresentanteLegal ?>" />
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
											<input name="contacto" type="text" class="form-control form-control-line" value="<?= $empresa->ContactoEmpresa ?>" required />
										</p>
										<p>
											<label class="form-control-label">Cargo en la empresa:</label>
											<input name="cargo" type="text" class="form-control form-control-line" value="<?= $empresa->CargoEmpresarial ?>" required />
										</p>
										<p>
											<label class="form-control-label">Teléfono de contacto:</label>
											<input name="tel" type="tel" class="form-control form-control-line phone-inputmask" placeholder="9999-9999" value="<?= $empresa->TelefonoContacto ?>" required />
										</p>
										<p>
											<label class="form-control-label">Correo de contacto:</label>
											<input name="mail" type="mail" class="form-control form-control-line email-inputmask" value="<?= $empresa->CorreoContacto ?>" required />
										</p>
									</div>
									<?= validation_errors(); ?>
									<p>
										<input type="submit" value="Guardar" class="btn btn-rounded btn-outline-success float-right" />
									</p>
									<br>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
<!-- ============================================================================================================== -->	
<!-- FIn del contenido -->
<!-- ============================================================================================================== -->
<script>
		var baseUrl = "<?= base_url() ?>";
	</script>
	<script src="<?= base_url() ?>assets/js/depa.js"></script>