<?php
/* Modelo para la tabla encuestas */
class ResultadosM extends CI_Model
{
    # Método para obtener la encuesta según el usuario que este logeado.
    public function obtener($id = '')
    {
        $s = "SELECT r.Respuestas, r.Contador, p.Pregunta, p.IdEncuesta FROM respuestas r INNER JOIN preguntas p ON r.IdPregunta = p.idPregunta INNER JOIN encuestas e ON p.IdEncuesta = e.idEncuesta ";
        if ($id != '') {
            $s .= "WHERE e.idEncuesta =" . $id;
        }
        return $this->db->query($s)->result();
    }
    public function exportar($id)
    {
        $sql = "SELECT p.idPregunta, p.Pregunta FROM preguntas p WHERE p.idEncuesta = " . $id;
        return $this->db->query($sql)->result_array();
    }
    public function obtenerRespuestas($idPregunta)
    {
        $sql = "SELECT Respuestas, Contador FROM respuestas  WHERE idPregunta = " . $idPregunta;
        return $this->db->query($sql)->result_array();
    }
    # Método que nos devuelve las preguntas de la base por medio del idEncuesta.
    public function preguntas($id = '')
    {
        $sql = "SELECT * FROM preguntas WHERE PorDefecto = 2 ";
        if ($id != '') {
            $sql .= " AND IdEncuesta = " . $id;
        }
        return $this->db->query($sql)->result();
    }
    # Método que nos devulve las respuestas asignadas a cada pregunta.
    public function respuestas($id)
    {
        $sql = "SELECT * FROM respuestas  WHERE IdPregunta = " . $id ." ORDER BY Respuestas DESC";
        return $this->db->query($sql)->result();
    }
    public function export($id)
    {
        $s = "SELECT P.idPregunta, P.Pregunta, R.Respuestas, R.Contador FROM respuestas R INNER JOIN preguntas P ON R.IdPregunta = P.idPregunta INNER JOIN encuestas E ON E.idEncuesta = P.IdEncuesta WHERE E.idEncuesta = $id";

        return $this->db->query($s)->result();
    }
    public function ContEnc($ide)
    {
        $sql = "SELECT Contador FROM encuestas WHERE idEncuesta = $ide";
        return $this->db->query($sql)->row()->Contador;
    }
    public function ids($idEncuesta)
    {
        $sql = "SELECT idPregunta FROM preguntas WHERE PorDefecto = 2 AND IdEncuesta = " . $idEncuesta;
        return $this->db->query($sql)->result();
    }
    public function respuestas2($idp)
    {
        $sql = "SELECT SUM(Contador) AS Total FROM respuestas WHERE idPregunta = " . $idp;
        return $this->db->query($sql)->row()->Total;
    }
    public function demo($idEncuesta){
        $sql = "SELECT * FROM preguntas WHERE PorDefecto = 1 AND IdEncuesta = " . $idEncuesta;
        return $this->db->query($sql)->result();
    }
    public function last($idUsuario){
        $sql = "SELECT IdEncuesta  FROM encuestas WHERE idUsuario = $idUsuario ORDER BY IdEncuesta DESC LIMIT 1";
        return $this->db->query($sql)->row()->IdEncuesta;
    }

}
