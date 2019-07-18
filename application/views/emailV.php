<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body >

	<div class="container-fluid">
		<header>
			<nav class="navbar navbar-light" style="background-color:#18927e; height:100px; ">
				<h5>Recupera tu contraseña enviando un correo al administrador</h5>
			</nav>
		</header>

		<div class="card">
			<div class="container">
				<form action="<?= base_url() ?>emailC/enviar" method="post" autocomplete="on">
					<table>
						<div class="form-group has-success">
							<tr>
								<td>
									<label for="destinatario">Destinatario: </label>
								</td>
								<td>
									<input type="email" name="destinatario" class="form-control" style="border-color:#24d2b5;" required>
								</td>
							</tr>
							<tr>
								<td>
									<div class="form-group">
										<label for="asunto">Asunto: </label>
								</td>
								<td>
									<input type="text" name="asunto" class="form-control" style="border-color:#24d2b5;" required>
								</td>
							</tr>

							<tr>
								<td>
									<label for="mensaje">Mensaje: </label>
								</td>
								<td>
									<textarea name="mensaje" cols="22" rows="8" class="form-control" style="border-color:#24d2b5;" required>Mi cuesta esta bloqueda necesito ayuda para reestablecerla</textarea>
								</td>
							</tr>
							<tr>
								<td>
									<input class="btn btn-info" type="submit" name="enviar" value="Enviar Email">
								</td>
								<td>
								<a class="btn btn-success" href="<?= base_url() ?>InicioC/">Regresar</a>
								</td>
							</tr>
						</div>
						</table>	
				</form>
			</div>
		<footer style="background-color:#18927e; height:100px;">
			<div>
				<br>
				<h4 class="text-center"> 2019 &copy; The Next Services, SA de CV. Todos los Derechos Reservados.</h4>
			</div>
		</footer>
		</div>
</body>

</html>
