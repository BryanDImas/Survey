<div class="container-fluid">
<header>
		<nav class="navbar navbar-light" style="background-color:#18927e;">
		<h6>Recupera tu contraseña enviando un correo al administrador</h6>
		</nav>
	</header>
<div class="card">
	<form action="<?= base_url()?>emailC/enviar" method="post" autocomplete="off">
	<table>
		<tr>
			<td>
				<label for="destinatario">Destinatario: </label>
			</td>
			<td>
				<input type="email" name="destinatario" required>
			</td>
		</tr>
		<tr>
			<td>
				<label for="asunto">Asunto: </label>
			</td>
			<td>
				<input type="text" name="asunto" required>
			</td>
		</tr>
		<tr>
			<td>
				<label for="mensaje">Mensaje: </label>
			</td>
			<td>
				<textarea name="mensaje"  cols="22" rows="8" required></textarea>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<input class="btn btn-info" type="submit" name="enviar" value="Enviar Email">
			</td>
		</tr>
	</table>
</form>
</div>
