<?php
/* Autores: Bryan DImas| Elisa Melendez1 Leandro Carpio
Controlador que manejara toda la lógica de las respuestas de las encuestas. */

defined('BASEPATH') or exit('No direct script access allowed');
# Controlador que maneja la lógica de las respuestas de la encuesta.
class RespuestasC extends CI_Controller
{
    public function __construct()
    {
        $datos = array();
        parent::__construct();
        $this->load->model(['RespuestasModel', 'PreguntasModel']);
    }
    public function Index()
    {
        $id = $_GET['id'];
        $this->load->view('layouts/head');
        $this->load->view('layouts/header');
        $datos['pregunta'] = $this->PreguntasModel->buscarid($id);
        $datos['respuestas'] = $this->RespuestasModel->obrespuestas($id);
        $this->load->view('encuesta/respuestas', $datos); #cargamos la vista que contiene el formato de encuesta multiple.
        $this->load->view('layouts/footer');
    }
    //permite guardar las respuestas que ingresen los usuarios
    public function guardar()
    {
        $num = $this->input->post('num');
        $datos = [
            $num + 1,
            $_POST['respuesta'],
            $_POST['idp']
        ];
        $this->RespuestasModel->guardar($datos);
    }
    //esta función nos permite editar las respuestas 
    public function editar($id)
    {
        $datos['respuesta'] = $this->RespuestasModel->buscarid($id);
        $this->load->view('encuesta/editarRes', $datos);
    }
    //Nos permite actualizar los datos que se editaron 
    public function actualizar()
    {
        $num = $this->input->post('num');
        $datos = [
            $num,
            $_POST['respuesta'],
            $_POST['idp']
        ];
        $this->RespuestasModel->actualizar($datos);
        redirect('respuestasC/');
    }
    # Acción que le dice al modelo que elimine una respuestas según si id.
    public function eliminar($id)
    {
        $this->RespuestasModel->eliminar($id);
    }
    // Acci+on que nos devuelve la vista parcial de respuestas.
    public function ver($id)
    {
        $datos['respuestas'] = $this->RespuestasModel->obrespuestas($id);
        $this->load->view('layouts/tabla-respuestas', $datos);
    }
}
