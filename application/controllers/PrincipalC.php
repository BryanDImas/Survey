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
    }
    # Acción que nos trae la primera vista de las encuestas.
    public function index()
    {
        $id = base64_decode($_GET['e']); //Desencriptamos el id que nos pasan por la url.
        $datos['encuesta'] = $this->PrincipalModel->encuesta($id); //Traemos la informacion de la encuesta.
        /* echo "<pre>";print_r($datos);die; */
        if (date('Y-m-d') >= $datos['encuesta']->FechaFinalizacion || $datos['encuesta']->Estado != 'Activo') {
            $this->load->view('errors/error100');
        } else {
            $us = $this->PrincipalModel->usuario($datos['encuesta']->idUsuario);
            $datos['encuesta']->logo = $this->PrincipalModel->logo($us->idEmpresa); //traemos el logo de la empresa.
            if ($datos['encuesta']->Demograficos == 'Si') { //traemos las preguntas demograficas si la encuesta las posee.
                $datos['encuesta']->preguntas = $this->PrincipalModel->preguntas($id, $idp = 1);
            } else {
                $datos['encuesta']->preguntas = '';
            }
            $datos['ciudad'] = $this->PrincipalModel->ciudad();
            $this->load->view('Principal/Primera', $datos);
        }
/*         echo "<pre>";
        print_r($datos);
        print_r(date('Y-m-d'));
        die; */
    }
    # Acción que captura las respuestas de la encuesta y las manda al modelo.
    public function capturar()
    {
        /*  $datos = $this->input->post('respuestas');
        $this->PrincipalModel->actualizar($datos);
        var_dump($datos); */
        $id = $this->input->post('idencuesta');
        $datos['encuesta'] = $this->PrincipalModel->encuesta($id);
        $this->load->view('Principal/Fin', $datos);
    }
    # acción que nos envia a la encuesta luego de capturar valores demograficos
    public function CapDemo()
    {
        $datos = [
            $this->input->post('edad'), $this->input->post('genero'), $this->input->post('ciudad')
        ];
        $idEncuesta = $this->input->post('idEncuesta');
        $idEncuesta = base64_decode($idEncuesta);
        $ids = $this->PrincipalModel->ids($idEncuesta);
        for ($i=0; $i <= count($ids) ; $i++) {
            
        }
        echo "<pre>";print_r($datos);
        die;
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
}
