<?php 
# Autor: bryan Dimas.
Class PrincipalModel extends CI_Model{
    public function encuesta($id){
        $sql = "SELECT * FROM encuestas WHERE idEncuesta = ".$id;
        return $this->db->query($sql)->row();
    }
    public function preguntas($id, $a){
        $sql = "SELECT * FROM preguntas WHERE IdEncuesta = ".$id." AND PorDefecto = ". $a;
        return $this->db->query($sql)->result();
    }
    public function respuestas($idp){
        $sql = "SELECT * FROM respuestas WHERE idPregunta = ".$idp;
        return $this->db->query($sql)->result_array(); 
    }

    public function respuestas2 ($idp) {
        $sql = "SELECT * FROM respuestas WHERE idPregunta = ".$idp;
        return $this->db->query($sql)->result();
    }
    public function actualizar($array){
/*         $sql ="UPDATE respuestas SET Contador = Contador+1 WHERE IdPregunta in [?] AND IdRespuestas  in [?]";
        $this->db->query($sql, $array); */
    }
    public function ciudad(){
        $sql ="SELECT * FROM municipios";
        return $this->db->query($sql)->result();
    }
    public function usuario($id){
        $sql = "SELECT * FROM usuarios WHERE idUsuario = ".$id;
        return $this->db->query($sql)->row();
    }
    public function logo($id){
        $sql = "SELECT LogoEMpresa FROM empresas WHERE idEmpresa = ".$id;
        return $this->db->query($sql)->row()->LogoEMpresa;
    }
    public function ids($idEncuesta){
        $sql = "SELECT idPregunta FROM preguntas WHERE PorDefecto = 1 AND IdEncuesta = ".$idEncuesta;
        return $this->db->query($sql)->result();
    }
    public function IngrRes($respuesta,$idpregunta){
        $sql = "INSERT INTO respuestas (Respuestas,Contador,IdPregunta) VALUES ('$respuesta', 1, $idpregunta)";
        $this->db->query($sql);
    }
    public function actCont($contador, $idRespuesta){
        $sql = "UPDATE respuestas SET Contador = $contador WHERE IdRespuestas = $idRespuesta";
        $this->db->query($sql);
    }
    
}