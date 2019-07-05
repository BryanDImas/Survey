<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model{

  public function validar($a){

		$sql = "SELECT * FROM usuarios WHERE Usuario = ? AND Clave = ? ";

    return $this->db->query($sql,$a)->row();

  }
}
