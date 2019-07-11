<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<!-- Favicon icon -->
	<link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>assets/images/logo3.png">
	<title>Survey</title>
	<link href="<?= base_url() ?>assets/node_modules/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/styleII.css">
	<link href="<?= base_url() ?>assets/css/pages/login-register-lock.css" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</head>

<body>
	<!-- ============================================================== -->
	<!-- Topbar header - style you can find in pages.scss -->
	<!-- ============================================================== -->
	<header class="topheader" id="top" style="background-color:black;">
		<div class="fix-width">
			<nav class="navbar navbar-expand-md navbar-light p-l-0">
				<a class="navbar-brand" href="#"><img src="<?= base_url() ?>assets/images/Logo.png" alt="Home" width="120" height="50" /></a>
				<ul class="navbar-nav ml-auto stylish-nav">
					<!-- Logo will be here -->
					<div class="col-md-12">
						<div class="login-box">
							<div class="container">
								<a href='#' data-toggle='dropdown' class="top_bar_left clearfix  btn-sm text-uppercase m-t-4 btn btn-nue font-10" style="width:86%;">INICIAR SESION</a>
								<div class='dropdown-menu' style='padding: 4%; padding-bottom: 2%; background: black; width: 80%'>
									<form class="form-horizontal form-material" id="loginform" action="<?= base_url() ?>login/validar" method="post" autocomplete="off">
										<a href="javascript:void(0)" class="text-center db"><img src="<?= base_url() ?>assets/images/logo3.png" alt="Home" width="10%" /><span><img src="<?= base_url() ?>assets/images/text-logo.png" alt="Home" width="40%" /></span></a>
										<div class="form-group m-t-40">
											<div class="col-xs-12">
												<input name="usua" class="text-center form-control" type="text" placeholder="Usuario">
											</div>
										</div>
										<div class="form-group">
											<div class="col-xs-12">
												<input name="clave" class="text-center form-control" type="password" placeholder="Contraseña">
											</div>
										</div>
										<div class="form-group text-center m-t-20">
											<div class="col-xs-4">
												<button class="btn btn-nue btn-block text-uppercase btn-rounded">Ingresar</button>
											</div>
										</div>
										<div class="form-group">
											<div class="col-sm-12 text-center alert">
												<?= validation_errors(); ?>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</ul>
			</nav>
	</header>
	<!-- ============================================================== -->
	<!-- Page wrapper  -->
	<!-- ============================================================== -->
	<div id="main-wrapper">
		<div class="page-wrapper">
			<!-- ============================================================== -->
			<!-- Container fluid  -->
			<!-- ============================================================== -->
			<section class="container-fluid" style="background-repeat: no-repeat; background-size:cover; background-image:url(<?= base_url() ?>assets/images/background/tec.jpg);  width:100%;"><br>
				<!-- ============================================================== -->
				<!-- Contenido del area de publicidad -->
				<!-- ============================================================== -->
				<div class="container-fluid" style="position:relative; padding-top:150px">
					<div class="col-md-12" id=""><br><br><br>
						<div style="top:150" id="publicidad"></div>
					</div>
				</div>
				<!-- ============================================================== -->
				<!--  barra verde -->
				<!-- ============================================================== -->
				<div class="row">
					<div class="row">
						<div class="col-md-12" style="background-color:none">
							<div class="fix-width" id="empresas"></div>
						</div>
					</div>
				</div>
			</section>
			<!-- ============================================================== -->
			<!-- Fin Barra verde -->
			<!-- ============================================================== -->
			<!-- ============================================================== -->
			<!-- footer -->
			<!-- ============================================================== -->
			<footer class="" style="background-color:black; height:50px">
			<br>
			<h4 class="text-center">2019 The Next Services</h4>
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
	<script src="<?= base_url() ?>assets/node_modules/bootstrap/js/popper.min.js"></script>
	<script src="<?= base_url() ?>assets/node_modules/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>