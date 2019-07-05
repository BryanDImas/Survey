<?php defined('BASEPATH') or exit('No direct script access allowed');
# Autor: bryan Dimas.
Class PrincipalModel extends CI_Model{
    public function encuesta($id){
        $sql = "SELECT * FROM encuestas WHERE idEncuesta = ".$id;
        return $this->db->query($sql)->row();
    }
    public function preguntas($id){
        $sql = "SELECT * FROM preguntas WHERE IdEncuesta = ".$id;
        return $this->db->query($sql)->result();
    }
    public function respuestas($idp){
        $sql = "SELECT * FROM respuestas WHERE idPregunta = ".$idp;
        return $this->db->query($sql)->result_array(); 
    }
    public function actualizar($array){
/*         $sql ="UPDATE respuestas SET Contador = Contador+1 WHERE IdPregunta in [?] AND IdRespuestas  in [?]";
        $this->db->query($sql, $array); */
    }
}