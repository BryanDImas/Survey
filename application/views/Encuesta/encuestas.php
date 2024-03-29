    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
    	<div class="loader">
    		<div class="loader__figure"></div>
    		<p class="loader__label">Survey</p>
    	</div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
    	<!-- ============================================================== -->
    	<!-- Topbar header - style you can find in pages.scss -->
    	<!-- ============================================================== -->
    	<header class="topbar">
    		<nav class="navbar top-navbar navbar-expand-md navbar-light">
    			<!-- ==================================================================== -->
    			<!-- Logo -->
    			<!-- ==================================================================== -->
    			<div class="navbar-header">
    				<a class="navbar-brand" href="<?= base_url() ?>InicioC/">
    					<b>
    						<img src="<?= base_url() ?>assets/images/logo3.png" alt="homepage" class="dark-logo" width="50px" height="50px" />
    						<img src="<?= base_url() ?>assets/images/logo3.png" alt="homepage" class="light-logo" width="50px" height="50px" />
    					</b>
    					<!--End Logo icon -->
    					<!-- Logo text --><span>
    						<!-- dark Logo text -->
    						<img src="<?= base_url() ?>assets/images/text-logo.png" alt="homepage" class="dark-logo" width="180px" height="50px" />
    						<!-- Light Logo text -->
    						<img src="<?= base_url() ?>assets/images/text-logo.png" class="light-logo" alt="homepage" width="180px" height="50px" /></span>
    				</a>
    			</div>
    			<!-- ==================================================================== -->
    			<!-- Fin del logo -->
    			<!-- ==================================================================== -->
    			<div class="navbar-collapse">
    				<!-- ============================================================== -->
    				<!-- toggle and nav items -->
    				<!-- ============================================================== -->
    				<ul class="navbar-nav mr-auto">
    					<!-- This is  -->
    					<li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
    					<li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
    					<!-- ============================================================== -->
    					<!-- Search -->
    					<!-- ============================================================== -->
    					<li class="nav-item hidden-xs-down search-box"> <a class="nav-link hidden-sm-down waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-magnify"></i></a>
    						<form class="app-search" action="<?= base_url('EncuestasC/index/') ?>">
    							<input type="hidden" name="pag" value="1">
    							<input name="key" type="text" class="form-control" placeholder="Search & enter" id="search"> <a class="srh-btn"><i class="ti-close"></i></a> </form>
    						</form>
    					</li>
    				</ul>
    				<!-- User profile and search -->
    				<ul class="navbar-nav my-lg-0">
    					<li class="nav-item dropdown u-pro">
    						<a class="nav-link dropdown-toggle waves-effect profile-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    							<?php if ($this->session->usuario->Foto != '') { ?>
    								<img src="<?= base_url() ?><?= $this->session->usuario->Foto ?>" alt="user" class="" />
    							<?php } else { ?>
    								<img src="https://png.pngtree.com/png_detail/20181019/userpeoplelinear-iconuser-png-clipart_1859764.png" alt="user" class="" />
    							<?php } ?>
    							<span class="hidden-md-down"><?= $this->session->usuario->Usuario ?> &nbsp;<i class="fa fa-angle-down"></i></span> </a>
    						<div class="dropdown-menu dropdown-menu-right animated flipInY">
    							<ul class="dropdown-user">
    								<li class="nav-item dropdown u-pro">
    									<ul class="dropdown-user">
    										<li>
    											<div class="dw-user-box">
    												<div class="u-img">
    													<?php if ($this->session->usuario->Foto != '') { ?>
    														<img src="<?= base_url() ?><?= $this->session->usuario->Foto ?>" alt="user">
    													<?php } else { ?>
    														<img src="https://png.pngtree.com/png_detail/20181019/userpeoplelinear-iconuser-png-clipart_1859764.png" alt="user">
    													<?php } ?>
    												</div>
    												<div class="u-text">
    													<h4><?= $this->session->usuario->Usuario ?></h4>
    													<?php if ($this->session->usuario->Rol != 'Administrador') { ?>
    														<h6 class="text-muted">Empresa:<br><span class="label label-success"><?= $this->session->empresa->NombreComercial ?></span></h6>
    														<h6 class="text-muted">Suscripción: <br><span class="<?= $this->session->empresa->TipoCuenta == 'Basica' ? 'label label-info' : 'label label-warning' ?>"><?= $this->session->empresa->TipoCuenta ?></span></h6>
    													<?php } else { ?>
    														<h6 class="text-muted"><span class="label label-danger"><?= $this->session->usuario->Rol ?></span></h6>
    													<?php } ?>
    												</div>
    											</div>
    										</li>
    										<li role="separator" class="divider"></li>
    										<li><a href="<?= base_url() ?>EncuestasC/perfil/<?= $this->session->usuario->idUsuario ?>"><i class="ti-user"></i> Mi Perfil</a></li>
    										<li role="separator" class="divider"></li>
    										<li><a href="<?= base_url() ?>Login/cerrar"><i class="fa fa-power-off"></i> Cerrar Sesión</a></li>
    									</ul>
    								</li>
    							</ul>
    						</div>
    					</li>
    				</ul>
    			</div>
    		</nav>
    	</header>
    	<!-- ============================================================== -->
    	<!-- End Topbar header -->
    	<!-- ============================================================== -->
    	<!-- ============================================================== -->
    	<!-- Left Sidebar - style you can find in sidebar.scss  -->
    	<!-- ============================================================== -->
    	<aside class="left-sidebar">
    		<!-- Sidebar scroll-->
    		<div class="scroll-sidebar">
    			<!-- Sidebar navigation-->
    			<nav class="sidebar-nav">
    				<ul id="sidebarnav">
    					<?php if ($this->session->usuario->Rol == 'Administrador') { ?>
    						<li class="nav-small-cap">--- Menú Administrador</li>
    						<li> <a class="waves-effect" href="<?= base_url() ?>InicioC/"><i class="mdi mdi-home"></i><span class="hide-menu">Inicio
    									<!--<span class="label label-rounded label-danger">4</span>--></span></a>
    						<li> <a class="waves-effect" href="<?= base_url() ?>EmpresasC/"><i class="far fa-building"></i><span class="hide-menu">Empresas
    									<!--<span class="label label-rounded label-danger">4</span>--></span></a>
    						<li> <a class="waves-effect" href="<?= base_url() ?>UsuariosC/"><i class="mdi mdi-account"></i><span class="hide-menu">Usuarios
    									<!--<span class="label label-rounded label-danger">4</span>--></span></a>
    						</li><?php } ?>
    					<li class="nav-small-cap">--- Menú Principal</li>
    					<li> <a href="<?= base_url() ?>EncuestasC/" class="waves-effect"><i class="fas fa-clipboard-list"></i><span class="hide-menu">Encuestas</span></a></li>
    					<!--<span class="label label-rounded label-danger">4</span>-->
    					<li> <a href="<?= base_url() ?>ResultadosC/" class="waves-effect"><i class="mdi mdi-table"></i><span class="hide-menu">Resultados</span></a></li>
    					<li> <a class="waves-effect" href="<?= base_url() ?>ResultadosC/grafi"><i class="mdi mdi-chart-bar"></i><span class="hide-menu">Estadísticas</span></a></li>
    					<!--<span class="label label-rounded label-success">25</span>-->
    					<li> <a class="waves-effect" href="<?= base_url() ?>ResultadosC/tutorial"><i class="mdi mdi-youtube-play"></i><span class="hide-menu">Tutorial</span></a></li>
    				</ul>
    			</nav>
    			<!-- End Sidebar navigation -->
    		</div>
    		<!-- End Sidebar scroll-->
    	</aside>
    	<!-- ============================================================== -->
    	<!-- End Left Sidebar - style you can find in sidebar.scss  -->
    	<!-- ============================================================== -->
    	<!-- ============================================================== -->
    	<!-- Page wrapper  -->
    	<!-- ============================================================== -->
    	<div class="page-wrapper">
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
    						<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
    						<li class="breadcrumb-item active">Encuestas</li>
    					</ol>
    				</div>
    				<div class="col-md-7 align-self-center text-right d-none d-md-block">
    					<a href="<?= base_url() ?>EncuestasC/cargar/Crear" class="btn btn-rounded btn-outline-info"><i class="fa fa-plus-circle"></i> Nueva encuesta</a>
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
    			<div class="row" class="col-12">

    				<div class="card">
    					<div class="card-body"><br>
    						<div class="table-responsive">
    							
    								<table class=" tablesaw table-bordered table table-sm" data-tablesaw-mode="stack">
    									<thead>
    										<tr class="table-bordered">
    											<th class=" text-center" scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">Nombre de la encuesta</th>
    											<th class=" text-center" scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">Objetivo de la encuesta</th>
    											<th class=" text-center" scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">Estado</th>
    											<th class=" text-center" scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1">Fecha de creación</th>
    											<th class=" text-center" scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4">Fecha de finalización</th>
    											<th class=" text-center" scope="col" data-tablesaw-sortable-col data-tablesaw-priority="5">Mensaje de inicio</th>
    											<th class=" text-center" scope="col" data-tablesaw-sortable-col data-tablesaw-priority="6">Mensaje de finalización</th>
												<th class=" text-center" scope="col" data-tablesaw-sortable-col data-tablesaw-priority="7" colspan = "3"> Opciones </th><br>
												<th class=" text-center" scope="col" data-tablesaw-sortable-col data-tablesaw-priority="7" colspan = "2"> Difusión </th><br>
    										</tr>
    									</thead>
    									<tbody> 
    										<?php foreach ($encuestas as $encues) { ?>
    											<tr>
    												<td><?= $encues->NombreEncuesta ?></td>
    												<td><?= $encues->ObjetivoEncuesta ?></td>
    												<td><?= $encues->Estado ?></td>
    												<td><?= $encues->FechaCreacion ?></td>
    												<td><?= $encues->FechaFinalizacion ?></td>
    												<td><?= $encues->MensajeInicio ?></td>
													<td><?= $encues->MensajeFinalizacion ?></td>
													
    												<td >
														<a href="<?= base_url() ?>EncuestasC/eliminar/<?= $encues->idEncuesta ?>" class=" btn btn-sm btn-outline-danger i fas fa-trash-alt"><br>Borrar</a>
													</td> 
    												<td class=" text-center">
    													<a href="<?= base_url() ?>EncuestasC/vistaeditar/<?= $encues->idEncuesta ?>" class=" btn btn-sm btn-outline-success i fas fa-pencil-alt"><br>Editar</a>
												    </td>
													<td>
													<form action="<?= base_url() ?>EncuestasC/previsualizar/" method="post">
															<input type="hidden" name="id" value="<?= $encues->idEncuesta ?>">
    														<button type="submit" class="btn btn-sm btn-outline-nuevo i fas fa-eye"><br>Vista</button>
													</form>
													</td>
    												<td>
    													<button type="button" data-toggle="modal" data-target="#myModal<?= $encues->idEncuesta ?>" class="btn btn-sm btn-outline-primary i fas fa-link" title="Editar"><br>Link</button>
    												</td>
    												<td>
    													<form action="<?= base_url() ?>EncuestasC/generarQR/" method="post">
    														<input type="hidden" name="url" value="<?= $encues->Url ?>">
    														<button type="submit" class="btn btn-sm btn-outline-new i fas fa-qrcode"><br>QR</button>
    													</form>
    												</td>
    											</tr>
    										<?php  } ?>
    									</tbody>
    								</table>
    							
    						</div>
    					</div>
    				</div>
    				<div class="col-md-6 offset-3">
    					<?= $this->pagination->create_links() ?>
    				</div>
    				<!-- ================================================================================================ -->
    				<!-- Fin del contenido -->
    				<!-- ================================================================================================ -->
    				<!-- ========================================================================================================================== -->
    				<!-- The Modal -->
    				<!-- ========================================================================================================================== -->
    				<?php foreach ($encuestas as $encues) { ?>
    					<div class="modal" id="myModal<?= $encues->idEncuesta ?>">
    						<div class="modal-dialog modal-dialog-centered">
    							<div class="modal-content">
    								<!-- Modal Header -->
    								<div class="modal-header">
    									<h4 class="modal-title">Copia este link para acceder a tu encuesta</h4>
    									<button type="button" class="close" data-dismiss="modal">&times;</button>
    								</div>
    								<!-- Modal body -->
    								<div class="modal-body">
    									<div class="input-group mb-3" >
    										<input class="form-control" type="text" id="copyTarget<?= $encues->idEncuesta ?>" style="color:#22D9B8 !important"value="<?= base_url() ?>PrincipalC/index/?e=<?= base64_encode($encues->idEncuesta) ?>" readonly> <button class="fas fa-copy btn btn-outline-success" id="copyButton<?= $encues->idEncuesta ?>"></button>

    									</div>
    								</div>
    								<!-- Modal footer -->
    								<div class="modal-footer">
    									<input type="button" value="Aceptar" class="btn btn-rounded btn-outline-success" data-dismiss="modal">
    								</div>
    								</form>
    							</div>
    						</div>
    					</div>
    				<?php } ?>
    				<!-- ========================================================================================================================== -->
    				<!-- Fin del primer modal -->
					<!-- ========================================================================================================================== -->
					<?php foreach ($encuestas as $encues) { ?>
    				<script>
    					document.getElementById("copyButton<?= $encues->idEncuesta ?>").addEventListener("click", function() {
    						copyToClipboard(document.getElementById("copyTarget<?= $encues->idEncuesta ?>"));
    					});

    					function copyToClipboard(elem) {
    						// crea un elemento oculto de texto, si no existe.
    						var targetId = "_hiddenCopyText_";
    						var isInput = elem.tagName === "INPUT" || elem.tagName === "TEXTAREA";
    						var origSelectionStart, origSelectionEnd;
    						if (isInput) {
    							// Solo puede usar el elemento original para la selección y copiado.
    							target = elem;
    							origSelectionStart = elem.selectionStart;
    							origSelectionEnd = elem.selectionEnd;
    						} else {
    							// Se utiliza un elemento temporal para la selección y copia.
    							target = document.getElementById(targetId);
    							if (!target) {
    								var target = document.createElement("textarea");
    								target.style.position = "absolute";
    								target.style.left = "-9999px";
    								target.style.top = "0";
    								target.id = targetId;
    								document.body.appendChild(target);
    							}
    							target.textContent = elem.textContent;
    						}
    						// selecciona el contenido.
    						var currentFocus = document.activeElement;
    						target.focus();
    						target.setSelectionRange(0, target.value.length);

    						// copia la seleccion.
    						var succeed;
    						try {
    							succeed = document.execCommand("copy");
    						} catch (e) {
    							succeed = false;
    						}
    						// restaura el focus original.
    						if (currentFocus && typeof currentFocus.focus === "function") {
    							currentFocus.focus();
    						}

    						if (isInput) {
    							// restore prior selection
    							elem.setSelectionRange(origSelectionStart, origSelectionEnd);
    						} else {
    							// Limpia el contenido temporal
    							target.textContent = "";
    						}
    						return succeed;
    					}
					</script>
						<?php } ?>
