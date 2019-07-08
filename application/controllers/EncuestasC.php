<?php defined('BASEPATH') or exit('No direct script access allowed');

class EncuestasC extends CI_Controller
{
	public function __construct()
	{
		$dato = array();
		parent::__construct();
		$this->load->library(['form_validation', 'pagination']);
		$this->load->model(['EncuestasModel', 'Preguntasmodel', 'Respuestasmodel']);
		if ($this->session->usuario) { } else {
			redirect('Login');
		}
	}

	public function generarQR ($Url)
	{
		$this->load->library('ciqrcode');

		$params['data'] = $Url;
        $params['level'] = 'H';
        $params['size'] = 9;

        //decimos el directorio a guardar el codigo qr, en este 
        //caso una carpeta en la raíz llamada qr_code
        $params['savename'] = FCPATH . "uploads/qr_code/qr_$Url.png";
        //generamos el código qr
        $this->ciqrcode->generate($params);

		$data['img'] = "qr_$Url.png";
		
		echo "<img src='" . base_url() . "uploads/qr_code/" . $data['img'] . "' />";
	}

	# Vista principal de este controlador.
	public function index($pag = 0)
	{
		$key = $_GET['key'] ?? ''; #Valor para buscar que se captura por la url.
		$config['base_url'] = base_url('EncuestasC/index/'); # Ruta a la cual se les agrega el numero de pagina 
		$config['uri_segment'] = 3; #posicion donde la libreria busca el numero de la pagina en la url del navegador
		$config['total_rows'] = $this->EncuestasModel->total($key); #cantidad de registros que devuelve la consulta
		$config['per_page'] = 5; # Número de registros a mostrar por pagina
		$config['num_links'] = 4; # Número de digitos a mostrar en la paginacion si son varios numeros.
		$config['use_page_numbers'] = TRUE; #para ver el numero de la pagina en la url.
		$this->pagination->initialize($config);
		if (count($dato['encuestas'] = $this->EncuestasModel->obtener($pag, $config['per_page'], $key, $this->session->usuario->idUsuario)) > 0) {
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
		$this->load->view('layouts/head'); # Cargamos la vista que tiene el encabezado. 
		$this->load->view('layouts/header'); # cargamos la vista que tiene el toolbar. 
		$this->load->view('encuesta/' . $pagina); #cargamos la vista que contiene la nueva encuesta.
		$this->load->view('layouts/footer'); #cargamos la vista que contiene el pie de página.
	}
	# Acción que le dice al modelo que elimine una encuesta del registro
	public function eliminar($id)
	{
		$this->EncuestasModel->eliminar($id);
		self::index();
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
		$datos = [
			$this->input->post('msj'), $this->input->post('nom'), $this->input->post('obj'), $this->input->post('fve'),
			$this->session->usuario->idUsuario, $this->input->post('demo')
		];
		$this->EncuestasModel->crear($datos);
		$array = [];
		$array = [$this->input->post('nom'), $this->session->usuario->idUsuario];
		$id = $this->EncuestasModel->obid($array);

		if ($this->input->post('check')) {
			$this->Preguntasmodel->guardar([1, '¿Cuál es su edad?',1, $id]);
			$this->Preguntasmodel->guardar([2, '¿Cuál es su género?',1, $id]);
			$this->Preguntasmodel->guardar([3, '¿Cuál es su ciudad de residencia?',1, $id]);
		}

		$this->session->set_userdata('idEncuesta', $id);
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
			$this->input->post('resul'), $this->input->post('msj'), $this->input->post('encuesta')
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

	public function actualizar()
	{
		$datos = [
			$this->input->post('nom'), $this->input->post('obj'),
			$this->input->post('esta'), $this->input->post('msj'),
			$this->input->post('msjd'), $this->input->post('id')
		];
		$this->EncuestasModel->actualizar($datos);
		redirect('EncuestasC/');
	}
}
