<?php
/* Modelo para la tabla de usuarios de la base de datos */
/* Autor : Bryan Dimas */

class UsuarioModel extends CI_Model
{
    # Método para ingresar un nuevo usuario a la base de datos por medio de un procedimiento almacenado.
    public function Ingresar($datos)
    {
        $sql = "CALL sp_ingr_us(?, ?, ?, ?, ?, ?, ?)";
        $this->db->query($sql, $datos);
    }
    # Método que nos devuelve información de un usuario para insertar en la sesion.
    public function buscarId($id)
    {
        $sql = "SELECT * FROM usuarios WHERE idUsuario = " . $id;
        return $this->db->query($sql)->row();
    }
    # Método que nos ayuda a traer la información del usuario desde la base de datos.
    public function ListarU($inicio, $limit, $key)
    {
        #Consulta normal sin valores entrantes.
        $sql = "SELECT U.*, C.Correo, T.Numero, E.NombreComercial FROM usuarios U  JOIN correos C,telefonos T,empresas E WHERE C.idUsuario = U.idUsuario AND U.idEmpresa = E.idEmpresa AND T.idUsuario = U.idUsuario ";
        if ($key != '') {
            $sql .= "AND Usuario LIKE '%{$key}%'"; # Se agrega a la consulta si viene algún valor para buscar.
        }
        $sql .=  " LIMIT $inicio, $limit"; # Valores que nos ayudan a crear la lógica de la paginación.
        return $this->db->query($sql)->result();
    }
    # Método que nos ayuda a eliminar la información de un usuario de la base de datos.
    public function Eliminar($iduser)
    {
        $sql = "DELETE FROM usuarios WHERE idUsuario = " . $iduser;
        $this->db->query($sql);
    }
    # Método que devuelve toda la información de un usuario desde la base de datos.
    public function Buscar($id)
    {
        $sql = "SELECT U.*, C.Correo, T.Numero, E.NombreComercial FROM usuarios U  JOIN correos C,telefonos T,empresas E WHERE C.idUsuario = " . $id . " AND U.idEmpresa = E.idEmpresa AND T.idUsuario = " . $id . " AND U.idUsuario = " . $id;
        return $this->db->query($sql)->row();
    }
    # Método para modificar un usuario a la base de datos por medio de un procedimiento almacenado.
    public function Editar($datos)
    {
        $sql = "CALL sp_edit_us(?, ?, ?, ?, ?, ?, ?,?)";
        $this->db->query($sql, $datos);
    }
    # Método que devuelve el total de registros que hay en esta tabla
    public function total($key)
    {
        $sql = "SELECT count(*) total FROM usuarios ";
        if($key != ''){
            $sql.= "WHERE Usuario LIKE '%{$key}%'"; # Cambia si entra algún parametro de busqueda. 
        }
        return $this->db->query($sql)->row()->total;
    }

    public function exportar(){
        $sql = "SELECT U.Usuario, C.Correo, T.Numero,U.Cargo,U.Departamento,U.Rol,U.Estado, E.NombreComercial FROM usuarios U  JOIN correos C,telefonos T,empresas E WHERE C.idUsuario = U.idUsuario AND U.idEmpresa = E.idEmpresa AND T.idUsuario = U.idUsuario ";
        return $this->db->query($sql)->result_array();
	}
	# Método que nos devuelve la ruta de la foto de perfil.
	public function BuscaRuta($id){
		$sql = "SELECT Foto FROM usuarios WHERE idUsuario = ".$id;
		return $this->db->query($sql)->row()->Foto;
	}
	# Método que nos cambia la foto del perfil del usuario en la tabla usuarios.
	public function Cambiar($ruta){
		$sql ="UPDATE usuarios SET Foto = ? WHERE idUsuario= ? ";
		$this->db->query($sql, $ruta);
	}
}
