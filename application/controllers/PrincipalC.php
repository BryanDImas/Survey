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
    public function iniciar()
    {
        $id =  base64_decode($_GET['a']);
        $datos['encuesta'] = $this->PrincipalModel->encuesta($id);
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
            case 6:
            $this->load->view('Principal/escala', $datos);
            break;
            case 4:
            $this->load->View('Principal/ponderacion',$datos);
            break;
        }
    }

}
