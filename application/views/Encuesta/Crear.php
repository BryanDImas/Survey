<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="row page-titles">

		<div class="col-md-5 align-self-center margin">
			<h1 class="text-themecolor">Encuestas</h1>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0)">Paso 1</a></li>
				<li class="breadcrumb-item active">Inicialización</li>
			</ol>
		</div>
		<div class="">
			<button class="right-side-toggle waves-effect waves-light  btn-themecolor btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
		</div>
	</div>
	<!-- ============================================================== -->
	<!-- End Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<!-- ============================================================== -->
	<!-- Container fluid  -->
	<!-- ============================================================== -->
		<form action="<?= base_url('EncuestasC/crear') ?>" method="POST" class="form-horizontal mt-8" autocomplete="off">
			<div class="card">
				<div class="col-xs-11 col-sm-10 col-md-12">
					<h2>Crear encuesta</h2>
					<div class="form-group">
						<label>Mensaje de Inicio:</label>
						<div class="small">
							<span>*El mensaje de inicio es una introducción que aparecera al inicio de la encuesta. Puede incluir el nombre de la compañia, las instrucciones para completar la encuesta o un mensaje de bienvenida.</span>
						</div>
						<textarea name="msj" class="form-control" rows="5" style="border-color:#24d2b5; align-text:center;" placeholder="">¡Gracias por su visita!. Su opinión es muy importante, por favor conteste la siguiente encuesta, sus comentarios nos ayudarán a mejorar. </textarea>
					</div>
					<div class="form-group">
						<label>Nombre de la encuesta: </label>
						<input type="text" class="form-control" name="nom" style="border-color:#24d2b5;" placeholder="Escriba un nombre para su encuesta ejemplo: Encuesta de satisfaccion del cliente" required>
					</div>
					<div class="form-group">
						<label for="example">Objetivo de la encuesta: </label>
						<input type="text" name="obj" class="form-control" style="border-color:#24d2b5;" placeholder="Escriba aqui lo que quiere conocer al realizar esta encuesta ejemplo: Medir la satisfacción de los clientes respecto a un producto"required>
					</div>
					<div class="form-group">
						<label>Vigencia</label>
						<div class="input-group">
							<input type="date" class="form-control" name="fve" id="fechaReserva" min="2019-01-01" style="border-color:#24d2b5;">
						</div>
					</div>
					<div class="form-group">
						<b>Agregar datos demográficos?</b> &nbsp  &nbsp
						<input type="checkbox" name="check" id="check" value="1" onchange="javascript:showContent()" style="border-color:#24d2b5;" />
					</div>
					<p></p>
					<input type="hidden" name="demo" id="demo" value="No">
					<div id="content" style="display: none;">
					<div class="card-body">
						<h4>Se agregaran las siguientes preguntas.</h4>
						<div class="form-group">
							<label for="">¿Cuál es su edad? &nbsp  &nbsp</label>
							<span  style="color:#24d2b5;font-size:25px;line-height:25px; font-family:monospace;"> &#10003; </span> 
						</div>
						<div class="form-group">
							<label for="">¿Cuál es su género? &nbsp  &nbsp </label>
							<span  style="color:#24d2b5;font-size:25px;line-height:25px; font-family:monospace;"> &#10003; </span> 
						</div>
						<div class="form-group">
							<label  for="example">¿Cuál es su municipio de residencia? &nbsp  &nbsp</label>
                            <span  style="color:#24d2b5;font-size:25px;line-height:25px; font-family:monospace;"> &#10003; </span> 
						</div><br><br>
						<!-- ================================================================================= -->
					</div>
					</div>
				</div>
			</div>
			<input type="submit" value="Siguiente" class="btn btn-rounded btn-outline-success float-right">
		</form>
	<!-- ======================================================================================================= -->
	<!-- Fin del contenido -->
	<!-- ======================================================================================================= -->
	<script>
		var baseUrl = "<?= base_url() ?>";
	</script>
	<script type="text/javascript">
		function showContent() {
			element = document.getElementById("content");
			check = document.getElementById("check");
			if (check.checked) {
				document.getElementById("demo").value = 'Si';
				element.style.display = 'block';
			} else {
				document.getElementById("demo").value = 'No';
				element.style.display = 'none';
			}
		};
		var fecha = new Date();
		var anio = fecha.getFullYear();
		var dia = fecha.getDate();
		var _mes = fecha.getMonth(); //viene con valores de 0 al 11
		_mes = _mes + 1; //ahora lo tienes de 1 al 12
		if (_mes < 10) //ahora le agregas un 0 para el formato date
		{
			var mes = "0" + _mes;
		} else {
			var mes = _mes.toString;
		}
		document.getElementById("fechaReserva").min = anio + '-' + mes + '-' + dia;
	</script>
	<div class="form-group">
		<a href="<?= base_url('EncuestasC/') ?>" class="btn btn-rounded btn-xl  btn-outline-info">Volver</a>
	</div>






