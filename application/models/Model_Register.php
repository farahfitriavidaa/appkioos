<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Register extends CI_Model {

  public function idUser()
	{
		$user = "US";
		$nomer = "SELECT MAX(TRIM(REPLACE(idakun,'US',''))) as a FROM akun WHERE idakun
		LIKE '$user%'";
		$baris = $this->db->query($nomer);
		$akhir =  $baris->row()->a;
		$akhir++;
		$id =str_pad($akhir, 4, "0", STR_PAD_LEFT);
		$id = "US".$id;
		return $id;
	}

  public function create_akun($data)
  {
  	$this->db->insert('akun',$data);
  }

}

?>
