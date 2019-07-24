<?php defined('BASEPATH') or exit('No direct script access allowed');

/* Autores: Bryan DImas| Elisa Melendez| Leandro Carpio
Controlador que manejara toda la lógica de las preguntas de las encuestas. */

class PreguntasC extends CI_Controller
{
	public function __construct()
	{
		$datos = array();
		parent::__construct();
		$this->load->model(['PreguntasModel', 'EncuestasModel', 'RespuestasModel']);
	}
	# Función principal de este controlador.
	public function index()
	{
		$id = $_GET['id'] ?? '';
		$this->EncuestasModel->Tipo($id, $this->session->idEncuesta); // almacena el tipo de encuesta.
		if ($id == 1 || $id == 2 || $id == 7) { //preguntas de agregar respuesta.
			$pagina = 'preguntas'; // vista 1
		} elseif ($id == 3 || $id == 4 || $id == 5 || $id == 6) { //preguntas con respuestas establecidas.
			$pagina = 'preguntasII'; //vista2
		};
		$this->session->set_userdata('formato', $id); // guardamos el tipo de formato de la encuesta en sesion.
		// obtenemos la información a trabajar en las vistas.
		$datos['preguntas'] = $this->PreguntasModel->obpreguntas($this->session->idEncuesta);
		$datos['idEncuesta'] = $this->session->idEncuesta;
		$datos['formato'] = $id;
		// cargamos la vista según el formato que venga.
		$this->load->view('layouts/head');
		$this->load->view('layouts/header');
		$this->load->view('encuesta/' . $pagina, $datos);
		$this->load->view('layouts/footer');
	}
	# Acción que envia los datos al modelo para su insercción a la base de datos.
	public function guardar()
	{
		$datos = [$_POST['pregunta'], $this->session->idEncuesta];
		$this->PreguntasModel->guardar($datos);
	}
	# Acción que envia al modelo los datos a insertar con las respuestas ya establecidas.
	public function guardar2()
	{
		$datos = [$this->input->post('pregunta'), $this->session->idEncuesta];
		$this->PreguntasModel->guardar($datos);
		// obtenemos el id insertado para asignarle su respectivas respuestas.
		$idp = $this->PreguntasModel->idpreg($this->input->post('pregunta'), $this->session->idEncuesta);
		$tipo = $this->input->post('formato');
		switch ($tipo) {
			case 3: // Si la Encuesta es de tipo de Caritas. 
				$this->RespuestasModel->establecidas('Lo odio', $idp);
				$this->RespuestasModel->establecidas('Normal', $idp);
				$this->RespuestasModel->establecidas('Me encanta', $idp);
				break;
			case 4: // Si la Encuesta es de tipo de Ponderaciones.
				$this->RespuestasModel->establecidas('1', $idp);
				$this->RespuestasModel->establecidas('2', $idp);
				$this->RespuestasModel->establecidas('3', $idp);
				$this->RespuestasModel->establecidas('4', $idp);
				$this->RespuestasModel->establecidas('5', $idp);
				break;
			case 5: // Si la Encuesta es de tipo de Manitas.
				$this->RespuestasModel->establecidas('No me gusta', $idp);
				$this->RespuestasModel->establecidas('Me gusta', $idp);
				break;
			case 6: // Si la Encuesta es de tipo de Escala.
				$this->RespuestasModel->establecidas('0', $idp);
				$this->RespuestasModel->establecidas('10', $idp);
				$this->RespuestasModel->establecidas('20', $idp);
				$this->RespuestasModel->establecidas('30', $idp);
				$this->RespuestasModel->establecidas('40', $idp);
				$this->RespuestasModel->establecidas('50', $idp);
				$this->RespuestasModel->establecidas('60', $idp);
				$this->RespuestasModel->establecidas('70', $idp);
				$this->RespuestasModel->establecidas('80', $idp);
				$this->RespuestasModel->establecidas('90', $idp);
				$this->RespuestasModel->establecidas('100', $idp);
				break;
		}
	}
	# Acción que le dice al modelo que elimine una pregunta según su id.
	public function eliminar($id)
	{
		$this->PreguntasModel->eliminar($id);
	}
	# Accion que nos regresa la vista parcial que nos permitira editar una pregunta.
	public function editar($id)
	{
		$datos['pregunta'] = $this->PreguntasModel->buscarid($id);
		$this->load->view('encuesta/editar', $datos);
	}
	// Acción de efditar de las segunda vista de preguntas.
	public function editardos($id)
	{
		$datos['pregunta'] = $this->PreguntasModel->buscarid($id);
		$this->load->view('encuesta/editardos', $datos);
	}
	# Acción que le dice al modelo que modifique un registro.
	public function actualizar()
	{
		$datos = [$this->input->post('pregunta'), $this->input->post('idp')];
		$this->PreguntasModel->actualizar($datos);
		redirect('PreguntasC/');
	}
	# Acción que envía al modelo la actualización en base a la segunda vista.
	public function actualizardos()
	{
		$datos = [$this->input->post('pregunta'), $this->input->post('idp')];
		$this->PreguntasModel->actualizar($datos);
		redirect('PreguntasC/');
	}
	# Acción que nos devuelve una vista parcial a traves de ajax.
	public function cargar()
	{
		$datos['preguntas'] = $this->PreguntasModel->obpreguntas($this->session->idEncuesta);
		$this->load->view('layouts/tabla-preguntas', $datos);
	}
	# Acción que nos devuelve una vista parcial a traves de ajax.
	public function cargar2()
	{
		$datos['preguntas'] = $this->PreguntasModel->obpreguntas($this->session->idEncuesta);
		$this->load->view('layouts/tabla.preguntasdos.php', $datos);
	}
	# Acción que nos trae la ultima vista de crearción de una encuesta.
	public function stepfin()
	{
		$this->load->view('layouts/head');
		$this->load->view('layouts/header');
		$this->load->view('encuesta/finalizar');
		$this->load->view('layouts/footer');
	}
}
