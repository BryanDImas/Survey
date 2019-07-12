<?php defined('BASEPATH') or exit('No direct script access allowed');
# Controlador que maneja toda la lógica de la tabla empresas.
class EmpresasC extends CI_Controller
{
    public function __construct()
    {
        $datos = array();
        parent::__construct();
        $this->load->model(['EmpresasModel', 'PaisesModel']);
        $this->load->library(['form_validation', 'pagination']);
        if ($this->session->usuario->Rol == 'Administrador') { } else {
            redirect('EncuestasC');
        }
    }
    # Acción que nos muestra la vista principal de empresas.
    public function index($pag = 0)
    {
        $key = $_GET['key'] ?? ''; #Valor para buscar que se captura por la url.
        $config['base_url'] = base_url('EmpresasC/index/'); # Ruta a la cual se les agrega el numero de pagina 
        $config['uri_segment'] = 3; #posicion donde la libreria busca el numero de la pagina en la url del navegador
        $config['total_rows'] = $this->EmpresasModel->total($key); #cantidad de registros que devuelve la consulta
        $config['per_page'] = 5; # Número de registros a mostrar por pagina
        $config['num_links'] = 2; # Número de digitos a mostrar en la paginacion si son varios numeros.
        /* $config['use_page_numbers'] = TRUE; #para ver el numero de la pagina en la url. */
		if($pag != 0){
			$inicia = ($pag * $config['per_page'])-$config['per_page'];
		}else{
			$inicia = $pag;
		}
        $datos['empresas'] = $this->EmpresasModel->obtener($inicia, $config['per_page'], $key);
        $this->pagination->initialize($config); #inicializa la funcion que creara la paginacion
        $this->load->view('layouts/head');
        $this->load->view('Empresas/empresas', $datos);
        $this->load->view('layouts/footer');
    }
    # Redirige hacia la vista del registro de Empresas.
    public function registrar()
    {
        $datos['paises'] = $this->PaisesModel->obtener();
        $this->load->view('layouts/head');
        $this->load->view('layouts/header');
        $this->load->view('Empresas/registro', $datos);
        $this->load->view('layouts/footer');
    }
    # Acción que nos ayuda a traer los departamentos aun segmento del formulario registro de empresa.
    public function obtdepa($id)
    {
        $datos['departamentos'] = $this->PaisesModel->obtdepa($id);
        $this->load->view('layouts/select1', $datos);
    }

    # Acción que nos ayuda a traer los municipios aun segmento del formulario registro de empresa.
    public function obtmuni($id)
    {
        $datos['municipios'] = $this->PaisesModel->obtmuni($id);
        $this->load->view('layouts/select2', $datos);
    }
    # Redirige hacia la vista del registro de usuario.
    public function ingresar()
    {
        /*Lógica para capturar el logo de la empresa en el registro */
        if ($this->form_validation->run()) {
            $archivo = $_FILES['logo'];
            $nombre = $archivo['name'];
            $logo = "assets/images/logos/" . uniqid() . $nombre;
            move_uploaded_file($archivo['tmp_name'], $logo);
            /* Captura de datos del formulario registro empresa */
            $datos = [
                $this->input->post('nombre'), $this->input->post('razsoc'),
                $this->input->post('direccion'), $this->input->post('municipio'),
                $this->input->post('descripcion'), $this->input->post('sector'),
                $this->input->post('fundacion'), $this->input->post('correo'),
                $this->input->post('telefono'), $this->input->post('iva'),
                $this->input->post('nit'), $this->input->post('contacto'),
                $this->input->post('tel'), $this->input->post('mail'),
                $this->input->post('cargo'), $this->input->post('propietario'),
                $this->input->post('representante'), $this->input->post('suscripcion'),
                $logo
            ];
            $this->EmpresasModel->registrarEmpresa($datos);
            $array = [];
            $array['empresas'] = $this->EmpresasModel->obtener();
            $this->load->view('layouts/head');
            redirect('empresasC/', $array);
        } else {
            $datos['paises'] = $this->PaisesModel->obtener();
            $this->load->view('layouts/head');
            $this->load->view('Administrador/empresas', $datos);
        }
    }
    # Acción que nos ayuda a decirle al modelo que elimine una empresa de la base de datos.    
    public function eliminar($id)
    {
        $this->EmpresasModel->eliminar($id);
        redirect('empresasC/');
    }

    public function vista($id)
    {
        $datos = array();
        $datos['empresa'] = $this->EmpresasModel->buscarporId($id);
        $datos['municipio'] = $this->PaisesModel->obtenerId($datos['empresa']->IdMunicipio);
        $datos['paises'] = $this->PaisesModel->obtener();
        $datos['departamento'] = $this->PaisesModel->buscarD($datos['municipio']->IdDepartamento);
        $datos['pais'] = $this->PaisesModel->buscarP($datos['departamento']->idPais);

        $this->load->view('layouts/head');
        $this->load->view('layouts/header');
        $this->load->view('Empresas/editar', $datos);
        $this->load->view('layouts/footer');
    }

    public function vermas($id)
    {
        $datos = array();
        $datos['empre'] = $this->EmpresasModel->obtenerId($id);
        $datos['municipio'] = $this->PaisesModel->obtenerId($datos['empre']->IdMunicipio);
        $this->load->view('layouts/head');
        $this->load->view('layouts/header');
        $this->load->view('Empresas/vermas', $datos);
        $this->load->view('layouts/footer');
    }

    public function actualizar()
    {
        $ruta = $this->input->post('ruta');
        if ($ruta != '') {
            unlink($ruta);
            $archivo = $_FILES['logo'];
            $nombre = $archivo['name'];
            $logo = "assets/images/logos/" . uniqid() . $nombre;
            move_uploaded_file($archivo['tmp_name'], $logo);
        }
        $datos = [
            $this->input->post('nombre'), $this->input->post('razsoc'),
            $this->input->post('direccion'), $this->input->post('municipio'),
            $this->input->post('descripcion'), $this->input->post('sector'),
            $this->input->post('fundacion'), $this->input->post('correo'),
            $this->input->post('telefono'), $this->input->post('iva'),
            $this->input->post('nit'), $this->input->post('contacto'),
            $this->input->post('tel'), $this->input->post('mail'),
            $this->input->post('cargo'), $this->input->post('propietario'),
            $this->input->post('representante'), $this->input->post('suscripcion'),
            $logo, $this->input->post('id')
        ];
        $this->EmpresasModel->actualizar($datos);
        redirect('/empresasC');
    }
}
