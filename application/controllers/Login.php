<?php
/*	Autores Bryan Dimas| Elisa Montalvo | Leandro Carpio */
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller 					# Controlador del área del login. 
{
	public function __construct()
	{
		$datos = array();							# Precargamos un arreglo vacio para usarlo en cualquier lado de este controlador. 
		parent::__construct();
		$this->load->library('form_validation');	# Precargamos las librerias de Codeigniter.
		$this->load->model(['InicioModel', 'LoginModel', 'EmpresasModel', 'UsuarioModel']);			# Precargamos el modelo a utilizar del login.
	}
	# Cargamos la vista del login que es la acción principal.
	public function index()
	{
		$this->load->view('layouts/head');
		if ($this->session->usuario) {
			redirect('InicioC');
		} else {
			if (isset($_SESSION['intento']) && $_SESSION['intento'] > 1) {
				echo "<script type=\"text/javascript\">alert(\"Debe esperar 10 segundos para intentar de nuevo\");</script>";
			} else {
				$this->load->view('layouts/head');
				$this->load->view('login');
			}
		}
	}
	# Acción que verifica la validación del usuario.
	public function validar()
	{
		$this->form_validation->set_rules('usua', 'Usuario', 'required|regex_match[/[a-z]/]', ['required' => 'El campo %s es requerido', 'regex_match' => 'El campo %s no cumple el formato']);
		$this->form_validation->set_rules('clave', 'Contraseña', 'required|regex_match[/[1-9]{5,10}/]', ['required' => 'El campo %s es requerido', 'regex_match' => 'El campo %s no cumple el formato']);
		if ($this->form_validation->run()) {
			$pass = sha1($this->input->post('clave'));
			$datos[] = $this->input->post('usua');
			$datos[] = $pass;
			$res = $this->LoginModel->validar($datos);
			if (!is_null($res)) {
				$ser = $this->EmpresasModel->obtenerId($res->idEmpresa);
				$this->session->set_userdata('empresa', $ser);
				$this->session->set_userdata('usuario', $res);
				redirect('InicioC');
			} else {
				$this->session->set_tempdata('intento', $_SESSION['intento'] ? $_SESSION['intento'] + 1 : 1, 10);
				redirect('Login');
			}
		} else {
			self::index();
		}
	}
	# Acción para cerrar sesion.
	public function cerrar()
	{
		unset($_SESSION['usuario']);
		redirect('Login');
	}
	# Acción que me trae la vista que se rendizara en la página de inicio en el segmento de publicidad.
	public function publicidad()
	{
		$datos['imgs'] = $this->InicioModel->imagen();
		$this->load->view('Inicio/publicidad', $datos);
	}
	# Acción que me trae la vista que se rendizara en la página de inicio en el segmento de suscripcion.
	public function suscripcion()
	{
		$this->load->view('layouts/head');
		$this->load->view('Inicio/suscripcion');
	}
}
