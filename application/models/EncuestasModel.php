<?php
/* Modelo para la tabla encuestas */
class EncuestasModel extends CI_Model
{
    # Método para obtener la encuesta según el usuario que este logueado.
    public function obtener($inicio, $limit, $key, $id)
    {
        $sql = "SELECT   E.idEncuesta, E.NombreEncuesta, E.ObjetivoEncuesta, E.Estado, E.FechaCreacion, E.FechaFinalizacion, E.MensajeInicio, E.MensajeFinalizacion, E.Url,  U.Usuario
        FROM encuestas E
		INNER JOIN usuarios U WHERE E.idUsuario = U.idUsuario AND E.idUsuario = " . $id ;
		if($key != ''){
			$sql .= " AND NombreEncuesta LIKE '%{$key}%' ";
		}
		$sql .= " LIMIT $inicio, $limit";
        return $this->db->query($sql)->result();
    }
    # Método que elimina una encuesta seleccionada.
    public function  eliminar($id)
    {
        $this->db->query("DELETE FROM encuestas WHERE idEncuesta = $id");
    }
    # Método para crear un registro en la tabla encuestas.
    public function crear($datos)
    {
        $sql = "INSERT INTO encuestas(MensajeInicio, NombreEncuesta, ObjetivoEncuesta, FechaFinalizacion,idUsuario,Demograficos) VALUES (?,?,?,?,?,?)";
        $this->db->query($sql, $datos);
    }
    # Método para trear el id de la encuesta recien ingresada por usuario
    public function obid($datos)
    {
        $sql = "SELECT idEncuesta FROM encuestas WHERE NombreEncuesta = ? AND idUsuario = ?";
        return $this->db->query($sql,$datos)->row()->idEncuesta;
    }
    public function actualizar($a){
        $s = "UPDATE encuestas SET NombreEncuesta = ?, ObjetivoEncuesta = ?, Estado =?, MensajeInicio = ?, MensajeFinalizacion = ? WHERE idEncuesta = ? ";
         $this->db->query($s, $a);
    }

    public function buscarid($id)
    {
        $sql = "SELECT * FROM encuestas WHERE idEncuesta =".$id;
               return $this->db->query($sql)->row();
    }
    # Método que nos ingresa los ultimos datos necesarios para la tabla encuesta.
    public function fin($datos){
        $sql = "UPDATE encuestas SET Resultados = ?, MensajeFinalizacion = ? WHERE idEncuesta = ?";
        $this->db->query($sql,$datos);
    }
    # Método que ingresa el formato en la tabla encuesta
    public function formato($datos){
        $sql = "UPDATE encuestas SET IdFormato = ? WHERE idEncuesta = ? ";
        $this->db->query($sql, $datos);
    }       
       # Método que devuelve el total de registros que hay en esta tabla
       public function total($key)
       {
           $sql = "SELECT count(*) total FROM encuestas ";
           if($key != ''){
               $sql.= "WHERE NombreEncuesta LIKE '%{$key}%'"; # Cambia si entra algún parametro de busqueda. 
           }
           return $this->db->query($sql)->row()->total;
       }
   }

