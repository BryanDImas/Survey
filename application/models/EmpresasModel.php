<?php

class EmpresasModel extends CI_Model
{
  # esta funcion nos lista todos los datos y busca si viene algun parametro.
  public function obtener($inicio = 0, $limit = 5, $key = '')
  {
    $sql = "SELECT E.idEmpresa, E.NombreComercial, E.RazonSocial, E.DireccionFisica, E.DescripcionEmpresa, E.SectorEconomico, E.FechaFundacion, E.Correo, E.Telefono, E.Iva, E.Nit, E.ContactoEmpresa, E.TelefonoContacto, E.CorreoContacto, E.CargoEmpresarial, E.PropietarioEmpresa,E.RepresentanteLegal, E.TipoCuenta, E.LogoEmpresa, U.Municipio AS Municipio
			FROM empresas E
      INNER JOIN municipios U WHERE E.IdMunicipio = U.IdMunicipio ";
    if ($key != '') {
      $sql .= "AND NombreComercial LIKE '%{$key}%'"; # Se agrega a la consulta si viene algún valor para buscar.
    }
    $sql .=  "LIMIT $inicio, $limit"; # Valores que nos ayudan a crear la lógica de la paginación.
    return $this->db->query($sql)->result();
  }

  # Método para registrar la empresa en la base de datos.
  public function registrarEmpresa($datos)
  {
    $sql = "INSERT INTO empresas (NombreComercial,RazonSocial,DireccionFisica,IdMunicipio,DescripcionEmpresa,SectorEconomico,FechaFundacion,Correo,Telefono,Iva,Nit,ContactoEmpresa,TelefonoContacto,CorreoContacto,CargoEmpresarial,PropietarioEmpresa,RepresentanteLegal,TipoCuenta,LogoEmpresa) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $this->db->query($sql, $datos);
  }

  public function obtenerId($id)
  {
    $sql = "SELECT * FROM  empresas WHERE idEmpresa = " . $id;
    return $this->db->query($sql)->row();
  }

  public function  eliminar($id)
  {
    $this->db->query("DELETE FROM empresas WHERE idEmpresa = $id");
  }
  public function obtempresa($empresa)
  {
    $query = "SELECT * FROM empresas WHERE NombreComercial LIKE '%$empresa%'";
    $result = $this->db->query($query);
    return $result->result();
  }

  public function buscarporId($id)
  {
    $s = "SELECT * FROM empresas WHERE idEmpresa =" . $id;
    return $this->db->query($s)->result()[0];
  }

  public function actualizarEmpresa($datos)
  {
    $sql = "UPDATE empresas SET NombreComercial = ?,RazonSocial = ?,DireccionFisica = ?,IdMunicipio = ?, DescripcionEmpresa = ?,SectorEconomico = ?,FechaFundacion = ?,Correo = ?,Telefono = ?,Iva = ?,Nit = ?,ContactoEmpresa = ?,TelefonoContacto = ?,CorreoContacto = ?,CargoEmpresarial = ?,PropietarioEmpresa = ?,RepresentanteLegal = ?,TipoCuenta = ?,LogoEmpresa = ? WHERE idEmpresa = ?";
    $this->db->query($sql, $datos);
  }

  public function actualizar($a)
  {
    $s = "UPDATE empresas SET NombreComercial=?, RazonSocial=?, DireccionFisica=?, IdMunicipio=?, DescripcionEmpresa=?, SectorEconomico=?, FechaFundacion=?, Correo=?,
		 Telefono=?, Iva=?, Nit=?, ContactoEmpresa=?, TelefonoContacto=?, CorreoContacto=?, CargoEmpresarial=?, PropietarioEmpresa=?, RepresentanteLegal=?, TipoCuenta=?, LogoEmpresa=?  WHERE idEmpresa= ?";
    return $this->db->query($s, $a);
  }
  # Método que devuelve el total de registros que hay en esta tabla
  public function total($key)
  {
    $sql = "SELECT count(*) total FROM empresas ";
    if ($key != '') {
      $sql .= "WHERE NombreComercial LIKE '%{$key}%'"; # Cambia si entra algún parametro de busqueda. 
    }
    return $this->db->query($sql)->row()->total;
  }
  # Método que lista todas la empresas para los usuarios.
  public function listar(){
    $sql= "SELECT * FROM empresas";
    return $this->db->query($sql)->result();
  }
}
