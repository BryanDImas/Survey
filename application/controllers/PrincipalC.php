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
    public function index($id)
    {
        $datos['encuesta'] = $this->PrincipalModel->encuesta($id);
        if($datos['encuesta']->Demograficos == 'Si'){
            $datos['encuesta']->preguntas = $this->PrincipalModel->preguntas($id, $idp = 1);
        }
        $this->load->view('Principal/Primera',$datos);
            $datos['encuesta']->preguntas = $this->PrincipalModel->preguntas($id, $idp = 2);
        }
/*         foreach ($datos['encuesta']->preguntas as $pregunta) {
            $pregunta->respuestas = $this->PrincipalModel->respuestas($pregunta->idPregunta);
        };
        echo "<pre>";
        print_r($datos);die;
        $idf = $datos['encuesta']->IdFormato;
        if ($idf == 1 || $idf == 2 || $idf == 7) {
            $this->load->view('Principal/index', $datos);
        } */
    # Acción que captura las respuestas de la encuesta y las manda al modelo.
    public function capturar()
    {
        $datos = $this->input->post('respuestas');
        $this->PrincipalModel->actualizar($datos);
        var_dump($datos);
    }
}
