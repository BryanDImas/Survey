<?php defined('BASEPATH') or exit('No direct script access allowed');

/* Autores: Bryan DImas| Elisa Melendez| Leandro Carpio
Controlador que manejara toda la lógica de las preguntas de las encuestas. */

class PreguntasC extends CI_Controller
{
	public function __construct()
	{
		$datos = array();
		parent::__construct();
		$this->load->model(['PreguntasModel', 'EncuestasModel','RespuestasModel']);
	}
	# Función principal de este controlador.
	public function index()
	{
		$id = $_GET['id'] ?? '';
		$this->EncuestasModel->Tipo($id, $this->session->idEncuesta);
		if ($id == 1 || $id == 2 || $id == 7) {
			$pagina = 'preguntas';
		} elseif ($id == 3 || $id == 4 || $id == 5 || $id == 6) {
			$pagina = 'preguntasII';
		};
		$a = [];
		$a = [$id, $this->session->idEncuesta];
		$this->EncuestasModel->formato($a);
		$this->session->set_userdata('formato', $id);
		$datos['preguntas'] = $this->PreguntasModel->obpreguntas($this->session->idEncuesta);
		$datos['idEncuesta'] = $this->session->idEncuesta;
		$datos['formato'] = $id;
		$this->load->view('layouts/head');
		$this->load->view('layouts/header');
		$this->load->view('encuesta/' . $pagina, $datos);
		$this->load->view('layouts/footer');
	}
	# Acción que envia los datos al modelo para su insercción a la base de datos.
	public function guardar()
	{
		$datos = [$_POST['pregunta'],$this->session->idEncuesta];
		$this->PreguntasModel->guardar($datos);
	}
	public function guardar2()
	{
		$datos = [$_POST['pregunta'],$this->session->idEncuesta];
		$this->PreguntasModel->guardar($datos);
		$idp = $this->PreguntasModel->idpreg($datos);
		$tipo = $this->input->post('formato');
		switch($tipo){
			case 3: // Si la Encuesta es de tipo de Caritas. 
			$this->RespuestasModel->guardar('Lo odio',$idp);
			$this->RespuestasModel->guardar('Normal',$idp);
			$this->RespuestasModel->guardar('Me encanta',$idp);
			break;
			case 4: // Si la Encuesta es de tipo de Ponderaciones.
			$this->RespuestasModel->guardar('1',$idp);
			$this->RespuestasModel->guardar('2',$idp);
			$this->RespuestasModel->guardar('3',$idp);
			$this->RespuestasModel->guardar('4',$idp);
			$this->RespuestasModel->guardar('5',$idp);
			break;
			case 5: // Si la Encuesta es de tipo de Manitas.
			$this->RespuestasModel->guardar('No me gusta',$idp);
			$this->RespuestasModel->guardar('Me gusta',$idp);
			break;
			case 6: // Si la Encuesta es de tipo de Escala.
			$this->RespuestasModel->guardar('10%',$idp);
			$this->RespuestasModel->guardar('20%',$idp);
			$this->RespuestasModel->guardar('30%',$idp);
			$this->RespuestasModel->guardar('40%',$idp);
			$this->RespuestasModel->guardar('50%',$idp);
			$this->RespuestasModel->guardar('60%',$idp);
			$this->RespuestasModel->guardar('70%',$idp);
			$this->RespuestasModel->guardar('80%',$idp);
			$this->RespuestasModel->guardar('90%',$idp);
			$this->RespuestasModel->guardar('100%',$idp);
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

	public function editardos($id)
	{
		$datos['pregunta'] = $this->PreguntasModel->buscarid($id);
		$this->load->view('encuesta/editardos', $datos);
	}
	# Acción que le dice al modelo que modifique un registro.
	public function actualizar()
	{
		$datos = [
			$this->input->post('pregunta'),
			$this->input->post('idp')
		];
		$this->PreguntasModel->actualizar($datos);
		redirect('PreguntasC/');
	}

	public function actualizardos()
	{
		$datos = [
			$this->input->post('pregunta'),
			$this->input->post('idp')
		];
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

	public function stepfin2()
	{
		$this->load->view('layouts/head');
		$this->load->view('encuesta/finalizar');
	}
}
