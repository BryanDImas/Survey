<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model{

  public function validar($a){
    $sql = "SELECT  * FROM correos WHERE Correo = '$a'";
    return $this->db->query($sql)->row();

  }    
  public function verificar($datos){
    $sql = "SELECT * FROM usuarios WHERE Clave = ? AND idUsuario = ? ";
    return $this->db->query($sql, $datos)->row();
  }
}
