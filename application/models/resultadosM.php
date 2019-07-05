<?php
/* Modelo para la tabla encuestas */
class ResultadosM extends CI_Model
{
    # Método para obtener la encuesta según el usuario que este logeado.
    public function obtener($id = '')
    {
$s = "SELECT r.Respuestas, r.Contador, p.Pregunta, p.IdEncuesta FROM respuestas r INNER JOIN preguntas p ON r.IdPregunta = p.idPregunta INNER JOIN encuestas e ON p.IdEncuesta = e.idEncuesta ";
if($id != ''){
    $s.= "WHERE e.idEncuesta =".$id;
}
        return $this->db->query($s)->result();
	}
	
	public function exportar($id){
        $sql = "SELECT p.idPregunta, p.Pregunta FROM preguntas p WHERE p.idEncuesta = ".$id;
        return $this->db->query($sql)->result_array();
    }

    public function obtenerRespuestas($idPregunta) {
        $sql = "SELECT Respuestas, Contador FROM respuestas r WHERE r.idPregunta = ".$idPregunta;
        return $this->db->query($sql)->result_array();
    }
}
