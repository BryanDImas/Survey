<?php
# Autor: Bryan Dimas
# Controlador que  maneja la lógica de la encuesta final.
class PrincipalC extends CI_Controller
{
	public function __construct()
	{
		$datos = array();
		parent::__construct();
		$this->load->model('PrincipalModel');
		$this->load->library('form_validation');
	}
	# Acción que nos trae la primera vista de las encuestas.
	public function index()
	{
		$id = base64_decode($_GET['e']); //Desencriptamos el id que nos pasan por la url.
		$datos['encuesta'] = $this->PrincipalModel->encuesta($id); //Traemos la informacion de la encuesta.
		//Comprobamos si la encuesta esta Activa y su fecha de vencimiento no ha caducado.
		if (date('Y-m-d') >= $datos['encuesta']->FechaFinalizacion || $datos['encuesta']->Estado != 'Activo') {
			$this->load->view('errors/error100'); // cargamos la vista de error.
		} else {
			// Cargamos la encuesta.
			$us = $this->PrincipalModel->usuario($datos['encuesta']->idUsuario);
			$datos['encuesta']->logo = $this->PrincipalModel->logo($us->idEmpresa); //traemos el logo de la empresa.
			if ($datos['encuesta']->Demograficos == 'Si') {
				$datos['encuesta']->preguntas = $this->PrincipalModel->preguntas($id, $idp = 1); //traemos las preguntas demograficas si la encuesta las posee.
			} else {
				$datos['encuesta']->preguntas = ''; // Si no posee datos demograficos lo igualamos a cadena vacia.
			}
			$datos['ciudad'] = $this->PrincipalModel->ciudad(); //traemos los municipios del modelo.
			$this->load->view('Principal/Primera', $datos); // cargamos la vista.
		}
	}
	# Acción que cambia la vista a la de encuesta que mo posee valores demograficos.
	public function capturar()
	{
		$id = $this->input->post('idencuesta');
		$respuesta = $this->input->post('respuestas[]');
		foreach ($respuesta as $clave => $valor) {
			$this->PrincipalModel->actCont($this->PrincipalModel->obtenerContadorPorIdRespuesta($valor) + 1, $valor);
		}
		$datos['encuesta'] = $this->PrincipalModel->encuesta($id);
		$us = $this->PrincipalModel->usuario($datos['encuesta']->idUsuario); // Obtenemos el idUsuario de la encuesta que traemos.
		$datos['encuesta']->logo = $this->PrincipalModel->logo($us->idEmpresa);
		$this->PrincipalModel->ContEnc($datos['encuesta']->Contador + 1, $datos['encuesta']->idEncuesta);
		$this->load->view('Principal/Fin', $datos); //redirigimos a la ultima vista de la encuesta.
	}
	# acción que nos envia a la encuesta luego de capturar valores demograficos
	public function CapDemo()
	{
 		$this->form_validation->set_rules('edad', 'Edad', 'required', ['required' => 'El campo %s es requerido']);
		$this->form_validation->set_rules('genero', 'Genero', 'required', ['required' => 'El campo %s es requerido']);
		$this->form_validation->set_rules('ciudad', 'Ciudad', 'required', ['required' => 'El campo %s es requerido']); 

		 if ($this->form_validation->run()) {
			$datos = [$this->input->post('edad'), $this->input->post('genero'), $this->input->post('ciudad')]; //Capturamos los datos del formulario
			$idEncuesta = base64_decode($this->input->post('idEncuesta'));
			$ids = $this->PrincipalModel->ids($idEncuesta);
			for ($i = 0; $i < count($ids); $i++) {
				$ids[$i]->respuestas = $this->PrincipalModel->respuestas2($ids[$i]->idPregunta);
				if (count($ids[$i]->respuestas) < 1) { # Si está sin respuestas la pregunta
					$this->PrincipalModel->IngrRes($datos[$i], $ids[$i]->idPregunta);
				} else {
					$contador = 0;
					foreach ($ids[$i]->respuestas as $respuesta) {
						if ($respuesta->Respuestas == $datos[$i]) {
							$this->PrincipalModel->actCont(++$respuesta->Contador, $respuesta->IdRespuestas); # Actualizamos el contador
						} else {
							$contador++;
						}
					}
					if ($contador < 0) {
						$this->PrincipalModel->IngrRes($datos[$i], $ids[$i]->idPregunta);
					}
				}
			}
			redirect('PrincipalC/iniciar/?a='. $this->input->post('idEncuesta'));	    	
		}else{
			$this->session->set_flashdata('errors', validation_errors());
		   redirect('PrincipalC/index/?e='.  $this->input->post('idEncuesta'));	
		} 
	}
	# Acción que construye la estructura de la encuesta.
	public function iniciar()
	{
		$id =  base64_decode($_GET['a']); // Recibimos el id encriptado y lo desincriptamos.
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
				$this->load->view('Principal/index', $datos);
				break;
			case 3: //Si es encuesta de tipo icono caritas.
				$this->load->View('Principal/caritas', $datos);
				break;
			case 4: //Si es encuesta de tipo ponderaciones.
				$this->load->View('Principal/ponderacion', $datos);
				break;
			case 5: //Si es encuesta de tipo icono manitas.
				$this->load->View('Principal/manitas', $datos);
				break;
			case 6: //Si es encuesta de tipo icono escala o rango.
				$this->load->view('Principal/escala', $datos);
				break;
		}
	}
	public function capturar2()
	{
		$datos = $this->input->post('respuestas[]'); //Capturamos los datos del formulario
		$idEncuesta = $this->input->post('idEncuesta');
		$ids = $this->PrincipalModel->ids2($idEncuesta);
		/*         echo "<pre>"; print_r($datos); */
		for ($i = 0; $i < count($ids); $i++) {
			$ids[$i]->respuestas = $this->PrincipalModel->respuestas2($ids[$i]->idPregunta);
			if (count($ids[$i]->respuestas) < 1) { # Si está sin respuestas la pregunta
				$this->PrincipalModel->IngrRes($datos[$i], $ids[$i]->idPregunta);
			} else {
				foreach ($ids[$i]->respuestas as $respuesta) {
					$contador = 0;
					if ($respuesta->Respuestas == $datos[$i]) {
						/* echo "entro a actualizar cont"; */
						$this->PrincipalModel->actCont(++$respuesta->Contador, $respuesta->IdRespuestas); # Actualizamos el contador
					} else {
						/* echo "entro al contdor"; */
						$contador++;
						/*  echo $contador; */
					}
				}
				if ($contador > 0) {
					/* echo "entro a ingresar nuevas"; */
					$this->PrincipalModel->IngrRes($datos[$i], $ids[$i]->idPregunta);
				}
			}
		}
		/* echo "<pre>"; print_r($ids);  */
		$datos['encuesta'] = $this->PrincipalModel->encuesta($idEncuesta);
		$us = $this->PrincipalModel->usuario($datos['encuesta']->idUsuario); // Obtenemos el idUsuario de la encuesta que traemos.
		$datos['encuesta']->logo = $this->PrincipalModel->logo($us->idEmpresa);
		$this->PrincipalModel->ContEnc($datos['encuesta']->Contador + 1, $datos['encuesta']->idEncuesta);
		$this->load->view('Principal/Fin', $datos); //redirigimos a la ultima vista de la encuesta.
	}
}
