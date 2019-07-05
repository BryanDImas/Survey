<?php
/* Modelo para la tabla encuestas */
class ResultadosM extends CI_Model
{
    # Método para obtener la encuesta según el usuario que este logeado.
    public function obtener($id = '')
    {
$s = "SELECT r.Respuestas, r.Contador, p.Pregunta FROM respuestas r INNER JOIN preguntas p ON r.IdPregunta = p.idPregunta INNER JOIN encuestas e ON p.IdEncuesta = e.idEncuesta ";
if($id != ''){
    $s.= "WHERE e.idEncuesta =".$id;
}
        return $this->db->query($s)->result();
	}
	
	public function exportar(){
        $sql = "SELECT r.Respuestas, p.Pregunta FROM  INNER JOIN  ON  WHERE ";
        return $this->db->query($sql)->result_array();
    }
}
