<?php
class PaisesModel extends CI_Model
{
    public function obtener()
    {
        return $this->db->get('paises')->result();
    }
    public function obtdepa($id)
    {
        $sql = "SELECT * FROM departamentos WHERE idPais= " . $id;
        return $this->db->query($sql)->result();
    }
    public function obtmuni($id)
    {
        $sql = "SELECT * FROM municipios WHERE idDepartamento= " . $id;
        return $this->db->query($sql)->result();
    }
    public function obtenerId($id)
    {
        $sql = "SELECT * FROM  municipios WHERE IdMunicipio = " . $id;
        return $this->db->query($sql)->row();
    }
    public function buscarD($id)
    {
        $sql = "SELECT * FROM departamentos WHERE IdDepartamento = " . $id;
        return $this->db->query($sql)->row();
    }
    public function buscarP($id)
    {
        $sql = "SELECT * FROM paises WHERE idPais = " . $id;
        return $this->db->query($sql)->row();
    }
}
