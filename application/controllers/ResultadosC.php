<?php defined('BASEPATH') or exit('No direct script access allowed');
# Autores: Bryan Dimas | Elisa Melendez | Leandro Carpio
# Controlador de los resultados de la encuestas.
class ResultadosC extends CI_Controller
{
	public function __construct()
	{
		$datos = array();
		parent::__construct();
		$this->load->model('ResultadosM');
		if ($this->session->usuario) { } else {
			redirect('Login');
		}
	}
	// Acción principal.
	public function index()
	{
		$datos['resultados'] = $this->ResultadosM->obtener($this->session->idEncuesta);
		$this->load->view('layouts/head'); # Cargamos la vista que tiene el encabezado. 
		$this->load->view('layouts/header'); # cargamos la vista que tiene el toolbar. 
		$this->load->view('resultados/resultados', $datos);
		$this->load->view('layouts/footer'); #cargamos la vista que contiene el pie de página.
	}
	// Acción que nos devuelve la vista de las estadisticas.
	public function grafi()
	{
		if($this->session->empresa->TipoCuenta == 'Basica'){
			echo "<script>alert('Para tener acceso a esta área comuniquese con el administrador y cambie su cuenta a Avanzada');</script>";
		}else{
		$this->load->view('layouts/head'); # Cargamos la vista que tiene el encabezado. 
		$this->load->view('layouts/header'); # cargamos la vista que tiene el toolbar. 
		$this->load->view('resultados/estadisticas'); #cargamos la vista que contiene los resultados.
		$this->load->view('layouts/footer'); #cargamos la vista que contiene el pie de página.
		}
		/* redirect('ResultadosC/'); */   
		self::index();
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
			$usersData = $this->ResultadosM->exportar($id);


			for($i = 0; $i < count($usersData); $i++) {
				$usersData[$i]['respuestas'] = $this->ResultadosM->obtenerRespuestas($usersData[$i]['idPregunta']);
			}
			// file name 
			$filename = 'resultados_' . date('Y-m-d') . '.csv';
			header("Content-Description: File Transfer");
			header("Content-Disposition: attachment; filename=$filename");
			header("Content-Type: application/csv; ");
			// obtencion de datos
			$usersData = $this->ResultadosM->exportar($id);

		/* 	print_r($usersData); die; */
			// creación del archivo
			$file = fopen('php://output', 'w');
			$header = array("Pregunta", "Respuestas", "total");
			fputcsv($file, $header);
			foreach ($usersData as $line) {
				fputcsv($file, $line);
			}
			fclose($file);
			exit;
		}
}
