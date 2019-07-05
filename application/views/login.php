<!-- Contenido de la página de inicio -->
<div class="login-register login-sidebar" style="background-image:url(<?= base_url() ?>assets/images/background/tec.jpg); width:100%;">
	<!-- Separación de los bloques de contenido y login -->
	<div class="row">
		<div class="col-sm-8">
			<div class="container-fluid">
			<img src="<?= base_url() ?>assets/images/logo3.png" alt="Home" width="50px" /><span><img src="<?= base_url() ?>assets/images/text-logo.png" alt="Home" width="150px" /></span>
		   </div>
			<div class="col-xs-12 col-sm-6 col-md-8" id="publi"></div>
		</div>
		<!-- Contenido del login -->
		<!--<div class="col-sm-4"> -->
		<div class="login-box">
			<div class="container-fluid">
				<a href='#'data-toggle='dropdown' class="btn btn-outline-primary btn-xs" style="color:white; width:300px;">INICIAR SESION</a>
				<div class='dropdown-menu' style='padding: 10px; padding-bottom: 0px; background: black; width: 300px;'>
					<form class="form-horizontal form-material" id="loginform" action="<?= base_url() ?>login/validar" method="post" autocomplete="off">
						<a href="javascript:void(0)" class="text-center db"><img src="<?= base_url() ?>assets/images/logo3.png" alt="Home" width="50px" /><span><img src="<?= base_url() ?>assets/images/text-logo.png" alt="Home" width="150px" /></span></a>
						<div class="form-group m-t-40">
							<div class="col-xs-12">
								<input name="usua" class="form-control" type="text" placeholder="Usuario">
							</div>
						</div>
						<div class="form-group">
							<div class="col-xs-12">
								<input name="clave" class="form-control" type="password" placeholder="Contraseña">
							</div>
						</div>
						<div class="form-group text-center m-t-20">
							<div class="col-xs-6">
								<button class="btn btn-primary  btn-block text-uppercase btn-rounded">Ingresar</button>
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
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
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