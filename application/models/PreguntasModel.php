<?php
/* Autores: Elisa melendez | Bryan DImas */

class PreguntasModel extends CI_Model
{
    # Método que trae informacion desde la base de datos de la tabla preguntas.
    public function obpreguntas($id)
    {
        $sql = "SELECT * FROM preguntas WHERE IdEncuesta = " .$id;
        return $this->db->query($sql)->result();
    }
    # Método que nos permite guardar las preguntas a la base de datos.
    public function guardar($datos)
    {
        $sql = "INSERT INTO preguntas (Numero, Pregunta, ";
        if(count($datos)>3){
            $sql.=" PorDefecto,IdEncuesta) VALUES ( ?,?,?,? )";
        }else{
            $sql.=" IdEncuesta) VALUES (?,?,? )";
        }
        $this->db->query($sql, $datos);
    }
    # Método que nos permite borrar las preguntas de la encuesta en la base de datos.
        public function  eliminar($id)
    {
        $this->db->query("DELETE FROM preguntas WHERE idPregunta = $id");
    }
    # Método que nos retorna un registro para su edición.
    public function buscarid($id)
    {
        $sql = "SELECT * FROM preguntas WHERE idPregunta =".$id;
               return $this->db->query($sql)->row();
    }
# Función que nos ayuda a cambiar un registo de la  babla
    public function actualizar($a)
    {
        $s="UPDATE preguntas SET Numero = ?, Pregunta = ?  WHERE idPregunta = ?";
        return $this->db->query($s, $a);
    }
}
