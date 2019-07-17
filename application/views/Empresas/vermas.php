<div class="container-fluid">
	<div class="container">
		<div class="row page-titles">
			<div class="col-md-5 align-self-center">
				<h1 class="text-themecolor">Empresas</h1>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="javascript:void(0)">Detalle</a></li>
					<li class="breadcrumb-item active">Empresa</li>
				</ol>
			</div>
			<div class="">
				<button class="right-side-toggle waves-effect waves-light  btn-themecolor btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
			</div>
		</div>
	</div>
	<!-- ================================================================================================= -->
	<!--  Contenido de la pagina  -->
	<!-- ================================================================================================= -->
	<tbody>
		<div class="card">
			<div class="container-fluid">
				<div class="row user-menu-container">
					<div class="row">
						<div class="col-md-8">
							<div class="user-pad">
								<h5><b><label class="text-themecolor">Nombre de la empresa: </b>
									<td> <?= $empre->NombreComercial ?></label>
								</h5>
								<hr class="text-themecolor">
								<h5><b><label class="text-themecolor">Razon Social:</b>
									<td><?= $empre->RazonSocial ?></td></label>
								</h5>
								<hr class="text-themecolor">
								<h5><b><label class="text-themecolor">Dirección:</b>
									<td><?= $empre->DireccionFisica ?></td></label>
								</h5>
								<hr class="text-themecolor">
								<h5><b><label class="text-themecolor">Muicipio:</b>
									<td><?= $municipio->Municipio ?></td></label>
								</h5>
								<hr class="text-themecolor">
								<h5><b><label class="text-themecolor">Descripción:</b>
									<td><?= $empre->DescripcionEmpresa ?></td></label>
								</h5>
								<hr class="text-themecolor">
								<h5><b><label class="text-themecolor">Sector Económico:</b>
									<td><?= $empre->SectorEconomico ?></td></label>
								</h5>
								<hr class="text-themecolor">
								<h5><b><label class="text-themecolor">Fecha de fundación:</b>
									<td><?= $empre->FechaFundacion ?></td></label>
								</h5>
								<hr class="text-themecolor">
								<h5><b><label class="text-themecolor">Correo:</b>
									<td><?= $empre->Correo ?></label>
								</h5>
								<hr class="text-themecolor">
								<h5><b><label class="text-themecolor">Telefóno:</b>
									<td><?= $empre->Telefono ?></td></label>
								</h5>
							</div>
						</div>
					</div>
					<div class="row user-menu-container">
						<div class="">
							<div class="col-md-9">
								<div class="user-pad">
									<h5><b><label class="text-themecolor">Iva:</b>
										<td><?= $empre->Iva ?></td></label>
									</h5>
									<hr class="text-themecolor">
									<h5><b><label class="text-themecolor">Nit:</b>
										<td><?= $empre->Nit ?></td></label>
									</h5>
									<hr class="text-themecolor">
									<h5><b><label class="text-themecolor">Contacto de empresa:</b>
										<td><?= $empre->ContactoEmpresa ?></td></label>
									</h5>
									<hr class="text-themecolor">
									<h5><b><label class="text-themecolor">Correo de contacto:</b>
										<td><?= $empre->CorreoContacto ?></td></label>
									</h5>
									<hr class="text-themecolor">
									<h5><b><label class="text-themecolor">Cargo Empresarial:</b>
										<td><?= $empre->CargoEmpresarial ?></td></label>
									</h5>
									<hr class="text-themecolor">
									<h5><b><label class="text-themecolor">Propietario de empresa:</b>
										<td><?= $empre->PropietarioEmpresa ?></td></label>
									</h5>
									<hr class="text-themecolor">
									<h5><b><label class="text-themecolor">Representante Legal:</b>
										<td><?= $empre->RepresentanteLegal ?></td></label>
									</h5>
									<hr class="text-themecolor">
									<h5><b><label class="text-themecolor">Tipo de cuenta:</b>
										<td><?= $empre->TipoCuenta ?></td></label>
									</h5>
								</div>
							</div>
						</div>
						<div class="col-sm-5 no-pad">
							<div class="img-fluid">
								<img width="300px" src="<?= base_url($empre->LogoEmpresa) ?>" class="img-rounded img-thumbnail">
							</div>
							<hr class="text-themecolor">
							<div>
								<a href="<?= base_url() ?>EmpresasC/vista/<?= $empre->idEmpresa ?>" class=" btn btn-rounded btn-block btn-outline-success i fas fa-pencil-alt"> Editar </a>
							</div><br>
							<div>
								<a href="<?= base_url() ?>EmpresasC/eliminar/<?= $empre->idEmpresa ?>" class="btn btn-rounded btn-block btn-outline-danger i fa fa-trash-alt"> Borrar</a>
							</div><br>
							<div>
								<a href="<?= base_url() ?>EmpresasC/" class="btn btn-rounded btn-block btn-outline-info i fas fa-arrow-circle-left"> Regresar </a>
							</div><br>
						</div>
					</div>
				</div>
				<br>
			</div>
		</div>
