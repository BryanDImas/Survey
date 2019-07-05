<?php
# Autor: Bryan Dimas.
# Clase modelo para la pantalla inicial y su mantenimiento.
class InicioModel extends CI_Model
{
    # Método que obtiene los valores a mostrar en la vista principal del mantenimiento.
    public function obtener()
    {
        $sql = "SELECT P.*, U.Usuario FROM publicidad AS P INNER JOIN usuarios AS U ON P.idUsuario = U.idUsuario";
        return $this->db->query($sql)->result();
    }
    # Método que guarda la dirección de las imagen a la base de datos.
    public function Guardar($datos)
    {
        $sql = "INSERT INTO publicidad (Imagen, IdUsuario) VALUES (?,?)";
        $this->db->query($sql, $datos);
    }
    # Método para eliminar registro de la tabla publicidad
    public function eliminacion($id)
    {
        $sql = "DELETE FROM publicidad WHERE IdPub = " . $id;
        $this->db->query($sql);
    }
    # Método que edita las imagenes de publicidad de los registros de la base de datos.
    public function Actualizar($datos){
        $sql = "UPDATE publicidad SET Imagen = ? , IdUsuario = ? WHERE IdPub = ? ";
        $this->db->query($sql, $datos);
    }
    public function imagen()
    {
        $sql = "SELECT * FROM publicidad";
        return $this->db->query($sql)->result();
    }
}
