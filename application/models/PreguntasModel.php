<?php
/* Autores: Elisa melendez | Bryan DImas */

class PreguntasModel extends CI_Model
{
    # Método que trae informacion desde la base de datos de la tabla preguntas.
    public function obpreguntas($id)
    {
        $sql = "SELECT * FROM preguntas WHERE PorDefecto = 2 AND IdEncuesta = " .$id ;
        return $this->db->query($sql)->result();
    }
    # Método que nos permite guardar las preguntas a la base de datos.
    public function guardar($datos)
    {
        $sql = "INSERT INTO preguntas (Pregunta, ";
        if(count($datos)>2){
            $sql.=" PorDefecto,IdEncuesta) VALUES ( ?,?,? )";
        }else{
            $sql.=" IdEncuesta) VALUES (?,? )";
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
# Función que nos ayuda a cambiar un registo de la Tabla
    public function actualizar($a)
    {
        $s="UPDATE preguntas SET Pregunta = ?  WHERE idPregunta = ?";
        return $this->db->query($s, $a);
    }
#Método que nos devuelve el id de la pregunta ingresada.
    public function idpreg($pregunta, $idEncuesta){
        $sql = "SELECT idPregunta FROM preguntas WHERE Pregunta = $pregunta AND PorDefecto = 2 AND IdEncuesta = $idEncuesta";
        return $this->db->query($sql)->row()->idPregunta;
    }
}
