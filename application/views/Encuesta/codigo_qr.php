<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>assets/images/logo3.png">
	<link href="<?= base_url() ?>assets/node_modules/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet">
</head>

<body style="background-color:silver">
	<!-- ============================================================== -->
	<!-- Start Page Content -->
	<!-- ============================================================== -->
	<header>
		<nav class="navbar navbar-light" style="background-color:#18927e;">
			<a class="navbar-brand" href="#">
				<img width="220" src="<?= base_url() ?>assets/images/logo.png" width="50" class="d-inline-block align-top" alt="">
			</a>
		</nav>
	</header><br>
	<div class="card col-md-6 offset-3" style="background-color:black">
		<p></p><br><br><br>
		<div class="text-center">
			<img class="box-center" src="<?php echo base_url() . "uploads/qr_code/" . $img ?>" />
			<p></p>
			<div class="d-flex justify-content-center">
				<a download="<?php echo $img ?>" href="<?php echo base_url() . "uploads/qr_code/" . $img ?>" title="<?php echo $img ?>" class="btn btn-primary btn-rounded ">Descargar</a>
			</div>
		</div>
		<div class="d-flex justify-left">
			<div class="col-md-2"><br>
				<a href="<?= base_url() ?>EncuestasC/" class="btn btn-rounded btn-block btn-outline-info i fas fa-arrow-circle-left"> Volver </a>
			</div>
		</div><br>
	</div>
	<!-- ============================================================== -->
	<!-- End Page Content -->
	<!-- ============================================================== -->
	<footer style="background-color:#18927e; height:100px;">
	<br>
	<div>
		<p></p>
		<h4 class="text-center"> 2019 &copy; The Next Services, SA de CV. Todos los Derechos Reservados.</h4>
		</div>
	</footer>
</body>

</html>
