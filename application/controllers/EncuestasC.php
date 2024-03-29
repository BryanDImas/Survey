<?php defined('BASEPATH') or exit('No direct script access allowed');

class EncuestasC extends CI_Controller
{
	public function __construct()
	{
		$dato = array();
		parent::__construct();
		$this->load->library(['form_validation', 'pagination']);
		$this->load->model(['EncuestasModel', 'PreguntasModel', 'RespuestasModel','PrincipalModel']);
		if ($this->session->usuario) { } else {
			redirect('Login');
		}
	}
# Acción que genera el codigo QR.
	public function generarQR()
	{
		$this->load->library('ciqrcode');
		$Url = $this->input->post('url');
		$params['data'] = $Url;
		$params['level'] = 'S';
		$params['size'] = 9;
		//decimos el directorio a guardar el codigo qr, en este 
		//caso una carpeta en la raíz llamada qr_code
		$nombre = uniqid() . rand(0, 999);
		$params['savename'] = FCPATH . "uploads/qr_code/qr_$nombre.png";
		//generamos el código qr
		$this->ciqrcode->generate($params);
		$data['img'] = "qr_$nombre.png";
		$this->load->view('Encuesta/codigo_qr', $data);
	}

	# Vista principal de este controlador.
	public function index($pag = 0)
	{
		$key = $_GET['key'] ?? ''; #Valor para buscar que se captura por la url.
		$config['base_url'] = base_url('EncuestasC/index/'); # Ruta a la cual se les agrega el numero de pagina 
		$config['uri_segment'] = 3; #posicion donde la libreria busca el numero de la pagina en la url del navegador
		$config['total_rows'] = $this->EncuestasModel->total2($key,$this->session->usuario->idUsuario ); #cantidad de registros que devuelve la consulta
		$config['per_page'] = 5; # Número de registros a mostrar por pagina
		$config['num_links'] = 2; # Número de digitos a mostrar en la paginacion si son varios numeros.
		$config['use_page_numbers'] = TRUE; #para ver el numero de la pagina en la url.
		$this->pagination->initialize($config);
		if ($pag != 0) {
			$inicia = ($pag * $config['per_page']) - $config['per_page'];
		} else {
			$inicia = $pag;
		}
		if (count($dato['encuestas'] = $this->EncuestasModel->obtener($inicia, $config['per_page'], $key, $this->session->usuario->idUsuario)) > 0) {
			$this->load->view('layouts/head'); # Cargamos la vista que tiene el encabezado. 
			$this->load->view('encuesta/encuestas', $dato); # cargamos la vista del contenido principal.
			$this->load->view('layouts/footer'); #cargamos la vista que contiene el pie de página.
		} else {
			echo "<script>alert('No posees encuestas, crea una')</script>";
			$this->load->view('layouts/head'); # Cargamos la vista que tiene el encabezado.
			$this->load->view('encuesta/encuestas', $dato); # cargamos la vista del contenido principal.
			$this->load->view('layouts/footer'); #cargamos la vista que contiene el pie de página.
		}
	}
	# Acción que nos permite cambiar de vistas.
	public function cargar($pagina)
	{
		$cont = $this->EncuestasModel->total2($key = '',$this->session->usuario->idUsuario);
		if ($cont > 3 && $this->session->empresa->TipoCuenta == 'Basica') {
			echo "<script>alert('Máximo de encuestas alcanzadas Si desea crear mas Cambie su suscripción a Avanzada')</script>";
			self::index();
		} else {
			$this->load->view('layouts/head'); # Cargamos la vista que tiene el encabezado. 
			$this->load->view('layouts/header'); # cargamos la vista que tiene el toolbar. 
			$this->load->view('encuesta/' . $pagina); #cargamos la vista que contiene la nueva encuesta.
			$this->load->view('layouts/footer'); #cargamos la vista que contiene el pie de página.
		}
	}
	# Acción que le dice al modelo que elimine una encuesta del registro
	public function eliminar($id)
	{
		$this->EncuestasModel->eliminar($id);
		redirect('EncuestasC/index/?pag=1');
	}
	# Acción que nos devuelve los datos del usuario para el perfil.
	public function perfil($id)
	{
		$datos = array();
		$this->load->model('UsuarioModel');
		$this->load->model('EmpresasModel');
		$this->load->model('PaisesModel');
		$datos['usuario'] = $this->UsuarioModel->Buscar($id);
		$datos['empresa'] = $this->EmpresasModel->obtenerId($this->session->usuario->idEmpresa);
		$datos['municipio'] = $this->PaisesModel->obtenerId($this->session->empresa->IdMunicipio);
		$datos['departamento'] = $this->PaisesModel->buscarD($datos['municipio']->IdDepartamento);
		$datos['pais'] = $this->PaisesModel->buscarP($datos['departamento']->idPais);
		$this->load->view('layouts/head'); # Cargamos la vista que tiene el encabezado. 
		$this->load->view('layouts/header'); # cargamos la vista que tiene el toolbar. 
		$this->load->view('layouts/perfil', $datos); #cargamos la vista que contiene el final de la encuesta.
		$this->load->view('layouts/footer'); #cargamos la vista que contiene el pie de página.
	}
	# Acción que nos permite crear una encuesta.
	public function crear()
	{
		date_default_timezone_set('America/El_Salvador');
		$datos = [
			$this->input->post('msj'), $this->input->post('nom'), $this->input->post('obj'), $this->input->post('fve'),
			$this->session->usuario->idUsuario, $this->input->post('demo'),date("Y-m-d")
		];
		$this->EncuestasModel->crear($datos);
		$array = [];
		$array = $this->session->usuario->idUsuario;
		$id = $this->EncuestasModel->obid($array);
		if ($this->input->post('check')) {
			$this->PreguntasModel->guardar(['¿Cuál es su edad?', 1, $id]);
			$this->PreguntasModel->guardar(['¿Cuál es su género?', 1, $id]);
			$this->PreguntasModel->guardar(['¿Cuál es su municipio de residencia?', 1, $id]);
		}

		$this->session->set_userdata('idEncuesta', $id);
		$this->session->set_userdata('formato', '');
		redirect('EncuestasC/cargar/Formato/');
	}

	public function code()
	{
		$this->load->view('layouts/head');
		$this->load->view('layouts/header');
		$this->load->view('phpqrcode/phpqrcode/index');
		$this->load->view('layouts/footer');
	}
	# Acción que nos devuelve las vista final de crear una encuesta.
	public function finalizar()
	{
		$dato = [
			$this->input->post('resul'), $this->input->post('msj'), $this->input->post('qr'), $this->input->post('encuesta')
		];
		$this->EncuestasModel->fin($dato);
		redirect('EncuestasC/');
	}

	public function vistaeditar($id)
	{
		$datos['encuesta'] = $this->EncuestasModel->buscarid($id);
		$this->load->view('layouts/head');
		$this->load->view('layouts/header');
		$this->load->view('Encuesta/editarEncues', $datos);
		$this->load->view('layouts/footer');
	}

	public function actualizar(){
		date_default_timezone_set('America/El_Salvador');
		if($this->input->post('esta') == 'Activo'){
			$datos = [
				$this->input->post('nom'), $this->input->post('obj'),
				$this->input->post('esta'), $this->input->post('msj'),
				$this->input->post('fecha'),$this->input->post('msjd'),
				date("Y-m-d"),
				$this->input->post('id')
			];
		}else{
			$datos = [
				$this->input->post('nom'), $this->input->post('obj'),
				$this->input->post('esta'), $this->input->post('msj'),
				$this->input->post('fecha'),$this->input->post('msjd'),
				 $this->input->post('id')
			];
		}

		
		$this->EncuestasModel->actualizar($datos);
		redirect('EncuestasC/');
	}
	 public function previsualizar(){
		$id =  $this->input->post('id'); // Recibimos el id encriptado y lo desincriptamos.
		$datos['encuesta'] = $this->PrincipalModel->encuesta($id); // Obtenemos los datos de la encuesta.
		$us = $this->PrincipalModel->usuario($datos['encuesta']->idUsuario); // Obtenemos el idUsuario de la encuesta que traemos.
		$datos['encuesta']->logo = $this->PrincipalModel->logo($us->idEmpresa); // Obtenemos el logo de la empresa al que pertenece el usuario.
		$datos['encuesta']->preguntas = $this->PrincipalModel->preguntas($id, $idp = 2); //Obtenemos las preguntas de la encuesta.
		foreach ($datos['encuesta']->preguntas as $pregunta) {
			$pregunta->respuestas = $this->PrincipalModel->respuestas($pregunta->idPregunta); //Obtenemos las respuestas de cada pregunta.
		}
		$idf = $datos['encuesta']->IdFormato;
		switch ($idf) {
			case 1: //Si es encuesta de tipo simple.
			case 2: //Si es encuesta de tipo multiple.
			case 7: // Si es encuesta de tipo combobox.
				$this->load->view('previsualizar/index', $datos);
				break;
			case 3: //Si es encuesta de tipo icono caritas.
				$this->load->View('previsualizar/caritas', $datos);
				break;
			case 4: //Si es encuesta de tipo ponderaciones.
				$this->load->View('previsualizar/ponderacion', $datos);
				break;
			case 5: //Si es encuesta de tipo icono manitas.
				$this->load->View('previsualizar/manitas', $datos);
				break;
			case 6: //Si es encuesta de tipo icono escala o rango.
				$this->load->view('previsualizar/escala', $datos);
				break;
		}
	 }
}
