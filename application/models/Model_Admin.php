<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Admin extends CI_Model {

  public function getAkun($username)
  {
    return $this->db->query("SELECT * FROM akun WHERE username='$username'")->row();
  }

  public function getKategori()
  {
    return $this->db->query("SELECT * FROM kategoriproduk")->result();
  }

  public function idKategoriProduk()
	{
		$user = "KP";
		$nomer = "SELECT MAX(TRIM(REPLACE(idkategoriproduk,'KP',''))) as a FROM kategoriproduk WHERE idkategoriproduk
		LIKE '$user%'";
		$baris = $this->db->query($nomer);
		$akhir =  $baris->row()->a;
		$akhir++;
		$id =str_pad($akhir, 4, "0", STR_PAD_LEFT);
		$id = "KP".$id;
		return $id;
	}

  public function create_kategoriproduk($data)
  {
    $this->db->insert('kategoriproduk',$data);
  }

  public function update_kproduk($id,$data)
  {
  	$this->db->where('idkategoriproduk',$id);
  	$o = $this->db->update('kategoriproduk',$data);
  	return $o;
  }

  public function delete_kategoriproduk($id)
  {
    $this->db->where('idkategoriproduk',$id);
    return $this->db->delete('kategoriproduk');
  }

  public function getProduk()
  {
    return $this->db->query("SELECT judulkategori,judulproduk,produk.keterangan,hargaproduk,fotoproduk,idproduk,idkategoriproduk FROM produk JOIN kategoriproduk USING(idkategoriproduk)")->result();
  }

  public function idProduk()
  {
    $user = "PD";
    $nomer = "SELECT MAX(TRIM(REPLACE(idproduk,'PD',''))) as a FROM produk WHERE idproduk
    LIKE '$user%'";
    $baris = $this->db->query($nomer);
    $akhir =  $baris->row()->a;
    $akhir++;
    $id =str_pad($akhir, 4, "0", STR_PAD_LEFT);
    $id = "PD".$id;
    return $id;
  }

  public function create_produk($data)
  {
    $this->db->insert('produk',$data);
  }

  public function update_produk($id,$data)
  {
  	$this->db->where('idproduk',$id);
  	$o = $this->db->update('produk',$data);
  	return $o;
  }

  public function delete_produk($id)
  {
    $this->db->where('idproduk',$id);
    return $this->db->delete('produk');
  }

  public function idDiskon()
  {
    $user = "ID";
    $nomer = "SELECT MAX(TRIM(REPLACE(iddiskon,'ID',''))) as a FROM diskon WHERE iddiskon
    LIKE '$user%'";
    $baris = $this->db->query($nomer);
    $akhir =  $baris->row()->a;
    $akhir++;
    $id =str_pad($akhir, 4, "0", STR_PAD_LEFT);
    $id = "ID".$id;
    return $id;
  }

  public function getDiskon()
  {
    return $this->db->get('diskon')->result();
  }

  public function getDiskonId($id)
  {
    return $this->db->query("SELECT * FROM diskon WHERE iddiskon='$id'")->row();
  }

  public function create_diskon($data)
  {
    $this->db->insert('diskon',$data);
  }

  public function update_diskon($id,$data)
  {
  	$this->db->where('iddiskon',$id);
  	$o = $this->db->update('diskon',$data);
  	return $o;
  }

  public function delete_diskon($id)
  {
    $this->db->where('iddiskon',$id);
    return $this->db->delete('diskon');
  }

  public function idBanner()
  {
    $user = "BN";
    $nomer = "SELECT MAX(TRIM(REPLACE(idbanner,'BN',''))) as a FROM banner WHERE idbanner
    LIKE '$user%'";
    $baris = $this->db->query($nomer);
    $akhir =  $baris->row()->a;
    $akhir++;
    $id =str_pad($akhir, 4, "0", STR_PAD_LEFT);
    $id = "BN".$id;
    return $id;
  }

  public function getBanner()
  {
    return $this->db->get('banner')->result();
  }

  public function getBannerId($id)
  {
    return $this->db->query("SELECT * FROM banner WHERE idbanner='$id'")->row();
  }

  public function create_banner($data)
  {
    $this->db->insert('banner',$data);
  }

  public function update_banner($id,$data)
  {
    $this->db->where('idbanner',$id);
    $o = $this->db->update('banner',$data);
    return $o;
  }

  public function delete_banner($id)
  {
    $this->db->where('idbanner',$id);
    return $this->db->delete('banner');
  }

  public function jumlahUser()
  {
    return $this->db->query("SELECT COUNT(idakun) as hasil FROM akun")->row();
  }

  public function jumlahProduk()
  {
    return $this->db->query("SELECT COUNT(idproduk) as hasil FROM produk")->row();
  }

  public function jumlahBanner()
  {
    return $this->db->query("SELECT COUNT(idbanner) as hasil FROM banner")->row();
  }

  public function jumlahDiskon()
  {
    return $this->db->query("SELECT COUNT(iddiskon) as hasil FROM diskon")->row();
  }

  public function jumlahKategori()
  {
    return $this->db->query("SELECT COUNT(idkategoriproduk) as hasil FROM kategoriproduk")->row();
  }
}
