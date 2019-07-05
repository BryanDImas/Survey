<?php
# Controlador que maneja la lógica de la página inicial del proyecto.
# Autor: Bryan Dimas. 
defined('BASEPATH') or exit('No direct script access allowed');
class InicioC extends CI_Controller
{
    public function __construct()
    {
        $datos = array();
        parent::__construct();
        $this->load->model('InicioModel');
        if ($this->session->usuario->Rol == 'Administrador') { } else {
            redirect('EncuestasC/');
        }
    }
    # Acción que carga la vista principal del mantemiento de esta sección.
    public function index()
    {
        $datos['img'] = $this->InicioModel->obtener();
        $this->load->view('layouts/head');
        $this->load->view('layouts/header');
        $this->load->view('Inicio/index', $datos);
        $this->load->view('layouts/footer');
    }
    # Acción que guarda la imagen, para enviar los datos al modelo.
    public function guardar()
    {
        $archivo = $_FILES['publicidad'];
        $nombre = $archivo['name'];
        $img = "assets/images/publicidad/" . uniqid() . $nombre;
        move_uploaded_file($archivo['tmp_name'], $img);
        $id =  $this->session->usuario->idUsuario;
        $datos = [
            $img, $id
        ];
        $this->InicioModel->Guardar($datos);
        redirect('InicioC/');
    }
    # Acción que ayudara al modelo a eliminar registro
    public function eliminar($id)
    {
        $ruta = $this->InicioModel->buscar($id);
        unlink($ruta->Imagen);
        $this->InicioModel->eliminacion($id);
        redirect('InicioC/');
    }
    # Acción que nos ayuda a cambiar la imagen por medio del modal.
    public function Editar()
    {
        unlink($this->input->post('ruta'));
        $archivo = $_FILES['publicidad'];
        $nombre = $archivo['name'];
        $img = "assets/images/publicidad/" . uniqid() . $nombre;
        move_uploaded_file($archivo['tmp_name'], $img);
        $idUser =  $this->session->usuario->idUsuario;
        $idImg = $this->input->post('id');
        $datos = [
            $img, $idUser, $idImg
        ];
        $this->InicioModel->Actualizar($datos);
        redirect('InicioC/');
    }
}
