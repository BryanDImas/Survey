<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<!-- Favicon icon -->
	<link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>assets/images/logo3.png">
	<title>Survey</title>
	<script src="https://kit.fontawesome.com/12fe8082b5.js"></script>
	<!-- <link rel="stylesheet" href="<?= base_url() ?>assets/css/styleII.css"> -->
	<link href="<?= base_url() ?>assets/css/styleII.css" rel="stylesheet" type="text/css" />
	<link href="<?= base_url() ?>assets/node_modules/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?= base_url() ?>assets/css/pages/login-register-lock.css" rel="stylesheet">

</head>

<body style="background-repeat: no-repeat; background-size:cover; background-image:url(<?= base_url() ?>assets/images/background/tec.jpg);  width:100%;">
		<div class="container">
			<nav class="navbar navbar-expand-md navbar-light p-l-0">
				<a class="navbar-brand" href="javascript:avoid(0)"><img src="<?= base_url() ?>assets/images/Logo.png"  alt="Home" width="150" height="40" /></a>
				<ul class="navbar-nav ml-auto stylish-nav">
					<!-- Logo will be here -->
					<div class="col-md-12 col-xs-2">
						<div class="login-container-box">
								<a href='#' data-toggle='dropdown' class="col-md-12   btn-lg text-uppercase m-t-2 btn btn-nue font-10 btn-rounded" >INICIAR SESION</a>
								<div class='dropdown-menu' style='padding: 12%; padding-bottom: 12%; background: #2f3d4a; width: 101%'>
									<form class="form-horizontal form-material" id="loginform" action="<?= base_url() ?>login/validar" method="post" autocomplete="off">
										<a href="javascript:void(0)" class="text-center db"><img src="<?= base_url() ?>assets/images/logo3.png" alt="Home" width="15%" /><span><img src="<?= base_url() ?>assets/images/text-logo.png" alt="Home" width="42%" /></span></a>
										<br>
										<div class="form-group">
											<div class="col-xs-12">
												<input name="usua" class="text-center form-control" type="text" placeholder="Correo">
											</div>
										</div>
										<div class="form-group">
											<div class="col-xs-12">
												<input name="clave" class="text-center form-control" type="password" placeholder="Contraseña">
											</div>
										</div>
										<div class="form-group m-t-5">
											<div class="col-xs-3 col-md-5 offset-1">
												<button class="btn btn-nue text-uppercase btn-rounded">Ingresar</button>
											</div>
											<br>
											<label class="text-success"for="">¿Olvidaste tu contraseña? Presiona<a href="<?=base_url()?>EmailC/">aqui</a></label>
											
										</div>
										<div class="form-group">
												<h6 class="text-themecolor"><?= validation_errors(); ?></h6>
										</div>
									</form>
								</div>
						</div>
					</div>
				</ul>
			</nav>
	</header>
				<!-- Contenido del area de publicidad -->
				<!-- ============================================================== -->
				<div class="container-fluid">
					<div class="col-md-12" id=""><br>
						<div class="col-md-8 offset-2" id="publicidad"></div>
					</div>
				</div><br>
				<!-- ============================================================== -->
				<!--  barra verde -->
				<!-- ============================================================== -->
				<div class="container-fluid">
					<div class="col-md-10" style="background-color:none">
						<div id="empresas"></div>
					</div>
				</div>
		</div>
			<!-- ============================================================== -->
			<!-- Fin Barra verde -->
			<!-- ============================================================== -->
			<!-- ============================================================== -->
			<!-- footer -->
			<!-- ============================================================== -->
			<footer class="" style="background-color:black; height:100px">
				<br>
				<h6 class="text-center text-themecolor" > &copy; 2019 The Next Services, SA de CV. Todos los Derechos Reservados.</h6>
			</footer>
			<!-- ============================================================== -->
			<!-- End footer -->
			<!-- ============================================================== -->
			<!-- ============================================================== -->
			<!-- End Container fluid  -->
			<!-- ============================================================== -->
		</div>
		<!-- ============================================================== -->
		<!-- End Page wrapper  -->
		<!-- ============================================================== -->
	</div>
	<!-- ============================================================== -->
	<!-- End Wrapper -->
	<!-- ============================================================== -->
	<script type="text/javascript">
		var baseUrl = "<?= base_url() ?>";
	</script>
	<script src="<?= base_url() ?>assets/js/Login.js"></script>
	<script src="<?= base_url() ?>assets/node_modules/jquery/jquery.min.js"></script>
	<!-- Bootstrap tether Core JavaScript -->
	<script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.flexisel.js"></script>
	<script src="<?= base_url() ?>assets/node_modules/bootstrap/js/popper.min.js"></script>
	<script src="<?= base_url() ?>assets/node_modules/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
