<?php
/* Autor: Bryan Dimas */
defined('BASEPATH') or exit('No direct script access allowed');
# Clase que maneja la página principal de la aplicación
class UsuariosC extends CI_Controller
{
	public function __construct()
	{
		$datos = array();
		parent::__construct();
		$this->load->helper('url');
		$this->load->model(['UsuarioModel', 'EmpresasModel']);
		$this->load->library(['form_validation', 'pagination']);
		if ($this->session->usuario->Rol == 'Administrador') { } else {
			redirect('EncuestasC');
		}
	}
	# Acción que carga la vista de inicio 1 si eres Administrador  
	public function index($pag = 1)
	{
		$key = $_GET['key'] ?? ''; #Valor para buscar que se captura por la url.
		$config['base_url'] = base_url('UsuariosC/index/'); # Ruta a la cual se les agrega el numero de pagina 
		$config['uri_segment'] = 3; #posicion donde la libreria busca el numero de la pagina en la url del navegador
		$config['total_rows'] = $this->UsuarioModel->total($key); #cantidad de registros que devuelve la consulta
		$config['per_page'] = 5; # Número de registros a mostrar por pagina.
		$config['num_links'] = 1; # Número de digitos a mostrar en la paginacion si son varios numeros.
		$config['use_page_numbers'] = TRUE; #para ver el numero de la pagina en la url.
		if($pag != 1){
			$inicia = ($pag * $config['per_page'])-$config['per_page'];
		}else{
			$inicia = $pag;
		}
		$datos['usuarios'] = $this->UsuarioModel->ListarU($inicia, $config['per_page'], $key);
		$this->pagination->initialize($config); #inicializa la funcion que creara la paginacion
		# Cargamos la pagina principal
		$this->load->view('layouts/head');
		$this->load->view('Usuarios/usuarios', $datos);
		$this->load->view('layouts/footer');
	}
	# Acción que nos permite cargar la vista de registrar usuarios.
	public function registrar()
	{
		$array = [];
		$array['empresas'] = $this->EmpresasModel->listar();
		$this->load->view('layouts/head');
		$this->load->view('layouts/header');
		$this->load->view('Usuarios/registroUs', $array);
		$this->load->view('layouts/footer');
	}
	# Acción que nos ayuda a enviar los datos a usuariomodel.
	public function ingresar()
	{
		$pass = sha1($this->input->post('contrasena'));
		$datos = [
			$this->input->post('responsable'), $pass,
			$this->input->post('cargo'), $this->input->post('unidad'),
			$this->input->post('empresa'), $this->input->post('correo'),
			$this->input->post('telefono')
		];
		$this->UsuarioModel->Ingresar($datos);
		redirect('UsuariosC/');
	}
	# Acción que nos carga la vista para editar la información de un usuario.
	public function editUser($idUser)
	{
		$datos['empresas'] = $this->EmpresasModel->listar();
		$datos['user'] = $this->UsuarioModel->buscar($idUser);
		$this->load->view('layouts/head');
		$this->load->view('layouts/header');
		$this->load->view('Usuarios/editarUs', $datos);
		$this->load->view('layouts/footer');
	}
	# Acción que nos ayuda a enviar los datos a usuariomodel.
	public function editarUsuario()
	{
		$idUser = $this->input->post('idUser');
		$this->form_validation->set_rules('responsable', 'Usuario', 'required|trim', ['required' => 'El campo %s es requerido']);
		$this->form_validation->set_rules('cargo', 'Cargo', 'required|trim', ['required' => 'El campo %s es requerido']);
		$this->form_validation->set_rules('unidad', 'Departamento', 'required|trim', ['required' => 'El campo %s es requerido']);
		$this->form_validation->set_rules('empresa', 'Nombre de la empresa', 'required|trim', ['required' => 'El campo %s es requerido']);
		$this->form_validation->set_rules('correo', 'Correo', 'required|trim', ['required' => 'El campo %s es requerido']);
		$this->form_validation->set_rules('telefono', 'Telefono', 'required|trim', ['required' => 'El campo %s es requerido']);
		if ($this->form_validation->run()) {
			if($this->input->post('contrasena')== ''){
				$pass = $this->input->post('contractual');
			}else if($this->input->post('contrasena')!= ''){
				$pass = sha1($this->input->post('contrasena'));
			}
			$datos = [
				$this->input->post('responsable'), $pass,
				$this->input->post('cargo'), $this->input->post('unidad'),
				$this->input->post('empresa'), $this->input->post('correo'),
				$this->input->post('telefono'), $idUser
			];
			$this->UsuarioModel->Editar($datos);
			redirect('UsuariosC/');
		} else {
			$datos['empresas'] = $this->EmpresasModel->listar();
			$datos['user'] = $this->UsuarioModel->buscar($idUser);
			$this->load->view('layouts/head');
			$this->load->view('layouts/header');
			$this->load->view('Usuarios/editarUs', $datos);
			$this->load->view('layouts/footer');
		}
	}
	# Acción que nos permitira dar paso al modelo para eliminar un usuario.
	public function elimUser($idUser)
	{
		$this->UsuarioModel->Eliminar($idUser);
		redirect('UsuariosC/');
	}
	// Exportación de los datos en formato CSV  
	public function exportCSV()
	{
		// file name 
		$filename = 'usuarios_' . date('Y-m-d') . '.csv';
		header("Content-Description: File Transfer");
		header("Content-Disposition: attachment; filename=$filename");
		header("Content-Type: application/csv; ");
		// obtencion de datos
		$usersData = $this->UsuarioModel->exportar();
		// creación del archivo
		$file = fopen('php://output', 'w');
		$header = array("Usuario", "Correo", "Telefono", "Cargo", "Departamento", "Rol", "Estado de la cuenta", "Empresa");
		fputcsv($file, $header);
		foreach ($usersData as $line) {
			fputcsv($file, $line);
		}
		fclose($file);
		exit;
	}
	// Accion  que guarda la foto de perfil del usuario.
	public function Guardar(){
		$id = $this->input->post('idUs');
		$ruta = $this->UsuarioModel->BuscaRuta($id);
        if ($ruta != '') {
			unlink($ruta);
		}
            $archivo = $_FILES['foto'];
            $nombre = $archivo['name'];
            $logo = "assets/images/perfil/" . uniqid() . $nombre;
			move_uploaded_file($archivo['tmp_name'], $logo);
			$datos=[
				$logo, $id 
			];
			$this->UsuarioModel->Cambiar($datos);
			redirect('EncuestasC/perfil/'.$id);
	}
}
