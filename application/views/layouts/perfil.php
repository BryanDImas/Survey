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
	<div class="row-fluid" style="position: relative;">
		<div class="col-xs-5 ">
			<div class="card">
				<div style="">
					<h3 class="text-themecolor">Información de la empresa</h3>
<!-- 					<hr style="width:275%;"> -->
				</div>
				<div class=""><img src="<?= base_url('assets/images/background/tec3.jpg') ?>" width="100%" height="150"></div>
				<div class="card-body">
					<div class="container bootstrap snippet">
						<div class="row">
							<!-- ====================================================================================================================== -->
							<!--Perfil-->
							<!-- ====================================================================================================================== -->
							<div class="col-sm-4">
								<div class="text-center" style="left: 5px; top: -150px;">
								<?php if($usuario->Foto != ''){?>
									<img width="250px" src="<?= base_url()?><?= $usuario->Foto?>" class="avatar img-rounded img-thumbnail img-reponsive">
								<?php }else{?>
									<img width="250px" src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-rounded img-thumbnail">
								<?php } ?>
								<p></p>
								<button data-toggle="modal" data-target="#myModal" class="btn btn-rounded btn-outline-info">Cambiar foto</button>
							</div>
								<p></p>

								<div class="">
								<ul class="">
									<div class="panel-heading"><i class="fa fa-envelope fa-1x"> Correo </i></div>
									<div class="panel-body"><a href="mailto:<?= $usuario->Correo ?>"><?= $usuario->Correo ?></a></div>
										<li class="list-group-item text-muted"><h6> Información Personal </h6><i class="fa fa-dashboard fa-1x"></i></li>
										<li class="list-group-item text"><h6 class=""><strong class="text-themecolor">Cargo: </strong><?= $usuario->Cargo ?></h6></li>
										<li class="list-group-item text"><h6 class=""><strong class="text-themecolor">Departamento: </strong><?= $usuario->Departamento ?></h6></li>
										<li class="list-group-item text"><h6 class=""><strong class="text-themecolor">Telefono: </strong><?= $usuario->Numero ?></h6></li>
									</ul>
								</div>
							</div>
							<!--/col-3-->
							<div class="col-sx-8">
								<div class="tab-content">
									<div class="tab-pane active" id="home">
										<div class="form-group">
											<div class="col-xs-6"><br><br>
												<label><h4 class="text-themecolor">Nombre Comercial:</h4></label><br>
												<label><h6><?= $empresa->NombreComercial ?></h6></label>
											</div>
												<div class="col-xs-6">
													<label><h4 class="text-themecolor">Dirección Empresarial:</h4></label><br>
													<label><h6><?= $empresa->DireccionFisica ?></h6></label>
												</div>
												<div class="col-xs-6">
													<label><h4 class="text-themecolor">Correo Empresarial:</h4></label><br>
													<label><h6><?= $empresa->Correo ?></h6></label>
												</div>
												<div class="col-xs-6">
														<label><h4 class="text-themecolor">Teléfono Empresarial:</h4></label><br>
														<label><h6><?= $empresa->Telefono ?></h6></label>
												</div>
												<div class="col-xs-6">
													<label><h4 class="text-themecolor">Sector Económico:</h4></label><br>
													<label><h6><?= $empresa->SectorEconomico ?></h6></label>
												</div>
												<div class="col-xs-6">
													<label><h4 class="text-themecolor">Descripción de la empresa:</h4></label><br>
													<label><h6><?= $empresa->DescripcionEmpresa ?></h6></label>
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
	  <!-- ========================================================================================================================== -->
  <!-- Inicio segundo modal -->
  <!-- ========================================================================================================================== -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Elije tu foto de perfil</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          <div class="input-group mb-3">
            <form action="<?= base_url() ?>UsuariosC/Guardar" method="post" enctype="multipart/form-data">
              <div class="custom-file">
				  <input type="hidden" name="idUs"value="<?= $usuario->idUsuario?>">
                <input name="foto" type="file" class="custom-file-input" required>
                <label class="custom-file-label form-control">Subir foto</label>
              </div>
          </div>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <input type="submit" class="btn btn-rounded btn-outline-success" value="Guardar Cambios">
        </div>
        </form>
      </div>
    </div>
  </div>

  <!-- ========================================================================================================================== -->
  <!-- Fin segundo modal -->
  <!-- ========================================================================================================================== -->

	<!-- ============================================================== -->
	<!-- End Container fluid  -->
	<!-- ============================================================== -->
	<script type="text/javascript">
		document.getElementById('photo').addEventListener('click', function() {

		});
	</script>
