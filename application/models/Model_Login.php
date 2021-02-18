<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Login extends CI_Model {

  public function cekAkun($user,$pass)
  {
    return $this->db->query("SELECT * FROM akun WHERE username='$user' AND password='$pass'")->row();
  }

}
