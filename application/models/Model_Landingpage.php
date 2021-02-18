<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Landingpage extends CI_Model {

  public function getKategori()
  {
    return $this->db->query("SELECT * FROM kategoriproduk limit 11")->result();
  }

  public function getBannerOne()
  {
    return $this->db->query("SELECT * FROM banner WHERE idbanner='BN0001'")->row();
  }

  public function getBanner()
  {
    return $this->db->query("SELECT * FROM banner WHERE idbanner!='BN0001' limit 2")->result();
  }

  public function getProduk()
  {
    return $this->db->query("SELECT * FROM produk JOIN kategoriproduk USING(idkategoriproduk)")->result();
  }

  public function getProdukId($id)
  {
    return $this->db->query("SELECT idproduk,idkategoriproduk,judulkategori,judulproduk,produk.keterangan,hargaproduk,fotoproduk,judulkategori FROM produk JOIN kategoriproduk USING(idkategoriproduk) WHERE idproduk='$id'")->row();
  }

  public function getProdukCategory($id,$ini)
  {
    return $this->db->query("SELECT * FROM produk JOIN kategoriproduk USING(idkategoriproduk) WHERE idkategoriproduk = '$id' AND idproduk!='$ini'")->result();
  }

  public function getKategoriRand()
  {
    return $this->db->query("SELECT * FROM kategoriproduk limit 8")->result();
  }

  public function idInputan()
  {
    $user = "LG";
    $nomer = "SELECT MAX(TRIM(REPLACE(idlangganan,'LG',''))) as a FROM langganan WHERE idlangganan
    LIKE '$user%'";
    $baris = $this->db->query($nomer);
    $akhir =  $baris->row()->a;
    $akhir++;
    $id =str_pad($akhir, 4, "0", STR_PAD_LEFT);
    $id = "LG".$id;
    return $id;
  }

  public function create_langganan($data)
  {
    $this->db->insert('langganan',$data);
  }

  public function idKeranjang()
  {
    $user = "K";
    $nomer = "SELECT MAX(TRIM(REPLACE(idkeranjang,'K',''))) as a FROM keranjang WHERE idkeranjang
    LIKE '$user%'";
    $baris = $this->db->query($nomer);
    $akhir =  $baris->row()->a;
    $akhir++;
    $id =str_pad($akhir, 4, "0", STR_PAD_LEFT);
    $id = "K".$id;
    return $id;
  }

  public function create_keranjang($data)
  {
    $this->db->insert('keranjang',$data);
  }

  public function create_transaksi($data)
  {
    $this->db->insert('transaksi',$data);
  }

  public function getKeranjang($id)
  {
    return $this->db->query("SELECT COUNT(idproduk) as hasil FROM keranjang JOIN akun USING(idakun) WHERE username='$id'")->row();
  }

  public function getTransaksi($id)
  {
    return $this->db->query("SELECT * FROM keranjang JOIN akun USING(idakun) JOIN produk USING(idproduk) WHERE username='$id'")->result();
  }

  public function total($id)
  {
    return $this->db->query("SELECT (SUM(jumlah_barang*hargaproduk)) as hasil FROM keranjang JOIN produk USING(idproduk) JOIN akun USING(idakun) WHERE username='$id'")->row();
  }

  public function delete_keranjang($id)
  {
    $this->db->where('idkeranjang',$id);
    return $this->db->delete('keranjang');
  }

  public function update_keranjang($id,$data)
  {
    $this->db->where('idkeranjang',$id);
    $o = $this->db->update('keranjang',$data);
    return $o;
  }

  public function cekDiskon($diskon)
  {
    return $this->db->query("SELECT * FROM diskon WHERE kodediskon='$diskon'")->row();
  }

  public function create_kritik($data)
  {
    $this->db->insert('kritik',$data);
  }

  public function idTransaksi()
  {
    $user = "TR";
    $nomer = "SELECT MAX(TRIM(REPLACE(idtransaksi,'TR',''))) as a FROM transaksi WHERE idtransaksi
    LIKE '$user%'";
    $baris = $this->db->query($nomer);
    $akhir =  $baris->row()->a;
    $akhir++;
    $id =str_pad($akhir, 4, "0", STR_PAD_LEFT);
    $id = "TR".$id;
    return $id;
  }

  public function idDetailTransaksi()
  {
    $user = "DT";
    $nomer = "SELECT MAX(TRIM(REPLACE(iddetailtransaksi,'DT',''))) as a FROM detailtransaksi WHERE iddetailtransaksi
    LIKE '$user%'";
    $baris = $this->db->query($nomer);
    $akhir =  $baris->row()->a;
    $akhir++;
    $id =str_pad($akhir, 4, "0", STR_PAD_LEFT);
    $id = "DT".$id;
    return $id;
  }

  public function getAkun($id)
  {
    return $this->db->query("SELECT * FROM akun WHERE username='$id'")->row();
  }

  public function create_detailtransaksi($data)
  {
    $this->db->insert('detailtransaksi',$data);
  }


}
