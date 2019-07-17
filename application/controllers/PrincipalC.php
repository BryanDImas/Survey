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
    # Acción que nos devuelve la vista principal de este controlador
    public function index()
    {
        $id = base64_decode($_GET['e']);
       /*  print_r($id); die; */
        $datos['encuesta'] = $this->PrincipalModel->encuesta($id);
        $us = $this->PrincipalModel->usuario($datos['encuesta']->idUsuario);
        $datos['encuesta']->logo = $this->PrincipalModel->logo($us->idEmpresa);
        if($datos['encuesta']->Demograficos == 'Si'){
            $datos['encuesta']->preguntas = $this->PrincipalModel->preguntas($id, $idp = 1);
        }else{
            $datos['encuesta']->preguntas = '';
        }
        $datos['ciudad'] = $this->PrincipalModel->ciudad();
        $this->load->view('Principal/Primera',$datos);    
        
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
    public function CapDemo(){
        $datos = [
            $this->input->post('edad'),$this->input->post('genero'),$this->input->post('ciudad')
        ];
        $this->PrincipalModel->
        print_r($datos); die;
    }
    public function iniciar()
    {
        $id =  base64_decode($_GET['a']);
        $datos['encuesta'] = $this->PrincipalModel->encuesta($id);
        $us = $this->PrincipalModel->usuario($datos['encuesta']->idUsuario);
        $datos['encuesta']->logo = $this->PrincipalModel->logo($us->idEmpresa);
        $datos['encuesta']->preguntas = $this->PrincipalModel->preguntas($id, $idp = 2);
        foreach ($datos['encuesta']->preguntas as $pregunta) {
            $pregunta->respuestas = $this->PrincipalModel->respuestas($pregunta->idPregunta);
        }
        $idf = $datos['encuesta']->IdFormato;
        switch($idf){
            case 1:
            case 2:
            case 7:
            $this->load->view('Principal/index', $datos);
            break;
            case 3:
            $this->load->View('Principal/caritas',$datos);
            break;
            case 4:
            $this->load->View('Principal/ponderacion',$datos);
            break;
            case 5:
            $this->load->View('Principal/manitas',$datos);
            break;
            case 6:
            $this->load->view('Principal/escala', $datos);
            break;
        }

    }
    public function hola(){
        $this->load->view('Principal/manitas');
    }

}
