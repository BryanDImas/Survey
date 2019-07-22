<?php defined('BASEPATH') or exit('No direct script access allowed');
# Autores: Bryan Dimas | Elisa Melendez | Leandro Carpio
# Controlador de los resultados de la encuestas.
class ResultadosC extends CI_Controller
{
	public function __construct()
	{
		$datos = array();
		parent::__construct();
		$this->load->model(['ResultadosM', 'EncuestasModel']);
		if ($this->session->usuario) { } else {
			redirect('Login');
		}
	}
	// Acción principal.
	public function index($ide = '')
	{
		$datos['ids'] = $this->EncuestasModel->ids($this->session->usuario->idUsuario);
		if ($ide == '') {
			$ide = $datos['ids'][0]->idEncuesta;
		}
		$this->session->set_userdata('idEncuesta', $ide);
		$datos['encuesta'] = $this->EncuestasModel->buscarid($ide);
		$datos['preguntas'] = $this->ResultadosM->preguntas($ide);
		foreach ($datos['preguntas'] as $preguntas) {
			$preguntas->respuestas = $this->ResultadosM->respuestas($preguntas->idPregunta);
		}
		$this->load->view('layouts/head'); # Cargamos la vista que tiene el encabezado. 
		$this->load->view('layouts/header'); # cargamos la vista que tiene el toolbar. 
		$this->load->view('resultados/resultados', $datos);
		$this->load->view('layouts/footer'); #cargamos la vista que contiene el pie de página.
	}
	// Acción que nos devuelve la vista de las estadisticas.
	public function grafi($ide = '')
	{
		$datos['ids'] = $this->EncuestasModel->ids($this->session->usuario->idUsuario);
		if ($ide == '') {
			$ide = $datos['ids'][0]->idEncuesta;
		}
		$this->session->set_userdata('idEncuesta', $ide);
		if ($this->session->empresa->TipoCuenta == 'Basica') {
			echo "<script>alert('Para tener acceso a esta área comuniquese con el administrador y cambie su cuenta a Avanzada');</script>";
			self::index($this->session->idEncuesta);
		} else {
			$datos['encuesta'] = $this->EncuestasModel->buscarid($ide);
			$ids = $this->ResultadosM->ids($ide);
			$total = 0;
			for ($i = 0; $i < count($ids); $i++) {
				$cont = $this->ResultadosM->respuestas2($ids[$i]->idPregunta);
				$ids[$i]->respuestas = $cont;
				$total += $ids[$i]->respuestas;
			}
			$datos['encuesta']->totalRes = $total;
			$datos['encuesta']->Demo = $this->ResultadosM->demo($ide);
			foreach ($datos['encuesta']->Demo as $p) {
				$p->respuestas = $this->ResultadosM->respuestas($p->idPregunta);
			}
			$datos['preguntas'] = $this->ResultadosM->preguntas($ide);
			foreach ($datos['preguntas'] as $pregunta) {
				$pregunta->respuestas = $this->ResultadosM->respuestas($pregunta->idPregunta);
			}
			$this->load->view('layouts/head'); # Cargamos la vista que tiene el encabezado. 
			$this->load->view('layouts/header'); # cargamos la vista que tiene el toolbar. 
			$this->load->view('resultados/estadisticas', $datos); #cargamos la vista que contiene los resultados.
			$this->load->view('layouts/footer'); #cargamos la vista que contiene el pie de página.
		}
	}
	//Acción que nos devuelve la vista del tutorial.
	public function tutorial()
	{
		$this->load->view('layouts/head'); # Cargamos la vista que tiene el encabezado. 
		$this->load->view('layouts/header'); # cargamos la vista que tiene el toolbar. 
		$this->load->view('resultados/tutorial'); #cargamos la vista que contiene los resultados.
		$this->load->view('layouts/footer'); #cargamos la vista que contiene el pie de página.

	}

	// Exportación de los datos en formato CSV  
	public function exportCSV($id)
	{
		// file name 
		$filename = 'resultados_' . date('Y-m-d') . '.csv';
		header("Content-Description: File Transfer");
		header("Content-Disposition: attachment; filename=$filename");
		header("Content-Type: application/csv; ");
		$usersData = $this->ResultadosM->exportar($id); #obtenemos las preguntas.
		for ($i = 0; $i < count($usersData); $i++) {
			$usersData[$i]['respuestas'] = $this->ResultadosM->obtenerRespuestas($usersData[$i]['idPregunta']); #obtenemos las respuestas segun la pregunta
			$usersData[$i]['respuestasCSV'] = ''; # declaramos la posicion del arreglo a utilizar.
			$usersData[$i]['contadorCSV'] = ''; # declaramos la posicion del arreglo a utilizar.
			for ($j = 0; $j < count($usersData[$i]['respuestas']); $j++) {
				$usersData[$i]['respuestasCSV'] .= $usersData[$i]['respuestas'][$j]['Respuestas'] . '|'; # concatenamos las respuestas en una sola linea separados por |
				$usersData[$i]['contadorCSV'] .= $usersData[$i]['respuestas'][$j]['Contador'] . '|'; # concatenamos los contadores en una sola linea separados por |
			}
			$usersData[$i]['respuestasCSV'] = substr($usersData[$i]['respuestasCSV'], 0, strlen($usersData[$i]['respuestasCSV']) - 1); #Eliminamos el | del final del arreglo
			$usersData[$i]['contadorCSV'] = substr($usersData[$i]['contadorCSV'], 0, strlen($usersData[$i]['contadorCSV']) - 1); #Eliminamos el | del final del arreglo
		}
		// creación del archivo
		$file = fopen('php://output', 'w');
		fprintf($file, chr(0xEF) . chr(0xBB) . chr(0xBF)); # Funcion que nos permite intrepretar caracterews de UTF8
		$header = array("Pregunta", "Respuestas", "Total");
		fputcsv($file, $header);
		foreach ($usersData as $line) {
			$formato = array($line['Pregunta'], $line['respuestasCSV'], $line['contadorCSV']);
			fputcsv($file, $formato);
		}
		fclose($file);
		exit;
	}
}
