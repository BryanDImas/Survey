<body class="fix-header single-column card-no-border">
	<header>
		<nav class="navbar navbar-light" style="background-color:#18927e; height:100px; ">
			<img src="<?= base_url() ?>assets/images/logo.png" type="image" width="200px">
			<h5>Recupera tu contraseña enviando un correo al administrador</h5>
		</nav>
	</header>


	</div>
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<div class="col-md-6">
					<div class="container well">
						<form action="<?= base_url() ?>EmailC/enviar" method="post" autocomplete="off" class="form pt-5">
							<div class="form-group has-success">
								<input type="hidden" name="destinatario" class="form-control" style="border-color:#24d2b5;" value="leandrocarpio24@gmail.com" required>
								</td>
								</tr>
								<div class="form-group">
									<label>Email:</label>
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon22"><i class="mdi mdi-email"></i></span>
										</div>
										<input type="text" name="asunto" class="form-control" placeholder="Ingresa tu correo aquí" aria-label="Email" aria-describedby="basic-addon22">
									</div>
								</div>
								<div class="form-group">
									<label>Mensaje:</label>
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon22"><i class="mdi mdi-message-text"></i></span>
										</div>
										<textarea name="mensaje" rows="3" class="form-control" style="border-color:#24d2b5;">Mi cuenta esta bloqueda necesito ayuda para reestablecerla</textarea>
									</div>
								</div>
								<td>
									<a class="btn btn-success mr-5" href="<?= base_url() ?>Login/">Regresar</a>
								</td>
								<button type="submit" class="btn btn-success" name="enviar" value="Enviar Email">Enviar Correo</button>
							</div>
					</div>
					<div class="form-group">
					<h6 class="text-themecolor"><?= $this->session->flashdata('errors') ?? validation_errors(); ?></h6>
				</div>
					</form>
					</div>
				</div><br><br><br><br><br><br><br><br>
				<footer style="background-color:#18927e; height:100px;">
					<div>
						<br><br>
						<h4 class="text-center"> 2019 &copy; The Next Services, SA de CV. Todos los Derechos Reservados.</h4>
					</div>

				</footer>

				<!-- ============================================================== -->
				<!-- End footer -->
				<!-- ============================================================== -->
			</div>
			<!-- ============================================================== -->
			<!-- End Page wrapper  -->
			<!-- ============================================================== -->
		</div>
	</div>
	<!-- ============================================================== -->
	<!-- End Wrapper -->
	<!-- ============================================================== -->
	<!-- ============================================================== -->
	<!-- All Jquery -->
	<!-- ============================================================== -->
</body>

</html>
