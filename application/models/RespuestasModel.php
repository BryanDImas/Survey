<?php

class RespuestasModel extends CI_Model
{
    # Método que trae informacion desde la base de datos de la tabla respuestas.
    public function obrespuestas($id)
    {
        $sql = "SELECT * FROM respuestas WHERE IdPregunta = ". $id;
        return $this->db->query($sql)->result();
	}
	
	//accion que guarda las nuevas respuesta en la base de datos
    public function guardar($datos)
    {
        $sql = "INSERT INTO respuestas (Numero, Respuestas,IdPregunta) VALUES (?, ?, ?)";
        $this->db->query($sql, $datos);
	}

	//Función que trae las respuestas para luego poderlas editar
	public function buscarid($id)
    {
        $s = "SELECT * FROM respuestas WHERE IdRespuestas =".$id;
               return $this->db->query($s)->row();
    }
	
	//función que nos permite editar las respuestas y las actualiza en la base de datos.
	public function actualizar($a)
    {
        $s="UPDATE respuestas SET Numero = ?, Respuestas = ?  WHERE IdRespuestas = ?";
        return $this->db->query($s, $a);
	}
	
	// función que elimina los datos de las respuestas de la base de datos 
	public function  eliminar($id)
    {
        $this->db->query("DELETE FROM respuestas WHERE IdRespuestas = $id");
	}

}
