<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landingpage extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_Landingpage');
        $this->load->model('Model_Admin');
        $this->load->library('form_validation');
        // if(!$this->model_Admin->getIdAdmin($this->session->email)){
        //   redirect('Login');
        // }
    }

  public function index()
  {
    $data = array(
      'kategori'   => $this->Model_Landingpage->getKategori(),
      'satubanner' => $this->Model_Landingpage->getBannerOne(),
      'banner'     => $this->Model_Landingpage->getBanner(),
      'produk'     => $this->Model_Landingpage->getProduk(),
      'katacak'    => $this->Model_Landingpage-> getKategoriRand(),
      'keranjang'  => $this->Model_Landingpage->getKeranjang($this->session->username)
    );
    $this->load->view('Landingpage',$data);
  }

  public function tambahLangganan()
  {
    $id = $this->Model_Landingpage->idInputan();
    $data = array(
      'idlangganan' => $id,
      'inputan'     => $this->input->post('input')
    );
    $cek = $this->Model_Landingpage->create_langganan($data);
    if(!$cek) {
      echo"<script type='text/javascript'>
      alert('Input Data Berhasil');
      window.location='Landingpage';
      </script>";
    }
  }

  public function tambahKeranjang($produk)
  {
    $id = $this->Model_Landingpage->idKeranjang();
    $idd = $this->Model_Admin->getAkun($this->session->username);
    $data = array(
      'idkeranjang' => $id,
      'idakun'      => $idd->idakun,
      'idproduk'    => $produk,
      'jumlah_barang' => 1
    );
    $cek = $this->Model_Landingpage->create_keranjang($data);
    if(!$cek) {
      echo"<script type='text/javascript'>
      alert('Input Keranjang Berhasil');
      window.location='../';
      </script>";
    }
  }

  public function keranjang()
  {
    $total = $this->Model_Landingpage->total($this->session->username);
    $data = array(
      'kategori'   => $this->Model_Landingpage->getKategori(),
      'keranjang'  => $this->Model_Landingpage->getKeranjang($this->session->username),
      'transaksi'  => $this->Model_Landingpage->getTransaksi($this->session->username),
      'totalnya'  => $total->hasil+2000,
      'diskon'    => 0,
      'inputdisc' => NULL
    );
    $this->load->view('Keranjang',$data);
  }

  public function keranjangb()
  {
    echo"<script type='text/javascript'>
    alert('Login terlebih dahulu');
    window.location='../login';
    </script>";
  }

  public function login()
  {
    $this->load->view('Login');
  }

  public function hapusKeranjang($id)
  {
    $cek = $this->Model_Landingpage->delete_keranjang($id);
    if($cek) {
      echo"<script type='text/javascript'>
      alert('Hapus Produk Berhasil');
      window.location='../keranjang';
      </script>";
    }
  }

  public function updateKeranjang()
  {
    if ($this->input->post('jumlah_barang') == 0) {
      echo"<script type='text/javascript'>
      alert('Barang tidak boleh diinput kosong!');
      window.location='keranjang';
      </script>";
    }else{
    $id = $this->input->post('idkeranjang');
    $data = array(
      'jumlah_barang' => $this->input->post('jumlah_barang')
    );
    $cek = $this->Model_Landingpage->update_keranjang($id,$data);
    if($cek) {
      echo"<script type='text/javascript'>
      alert('Update Keranjang Berhasil');
      window.location='keranjang';
      </script>";
    }}
  }

  public function inputDiskon()
  {
    $diskon = $this->input->post('diskon');
    $cek = $this->Model_Landingpage->cekDiskon($diskon);
    if ($cek) {
      if ($cek->tipe == 'nominal') {
        $total =  $this->Model_Landingpage->total($this->session->username);
        $bayar = $total->hasil + 2000;
        $totalbayar = $bayar - $cek->nominal;
        $data = array(
          'kategori'   => $this->Model_Landingpage->getKategori(),
          'keranjang'  => $this->Model_Landingpage->getKeranjang($this->session->username),
          'transaksi'  => $this->Model_Landingpage->getTransaksi($this->session->username),
          'totalnya'  => $totalbayar,
          'diskon'    => $cek->nominal,
          'inputdisc' => $cek->kodediskon,
        );
        $this->load->view('Keranjang',$data);
      }else if($cek->tipe == 'persen'){
        $total =  $this->input->post('total');
        $hasil = $total * $cek->persen/100;
        $totalbayar = $total - $hasil + 2000;
        $data = array(
          'kategori'   => $this->Model_Landingpage->getKategori(),
          'keranjang'  => $this->Model_Landingpage->getKeranjang($this->session->username),
          'transaksi'  => $this->Model_Landingpage->getTransaksi($this->session->username),
          'totalnya'  => $totalbayar,
          'diskon'    => $cek->persen."%",
          'inputdisc' => $cek->kodediskon
        );
        $this->load->view('Keranjang',$data);
      }
    }else{
        echo"<script type='text/javascript'>
        alert('Kupon Tidak Ada');
        window.location='keranjang';
        </script>";
    }
  }

  public function kontakKami()
  {
    $data = array(
      'kategori'   => $this->Model_Landingpage->getKategori(),
      'keranjang'  => $this->Model_Landingpage->getKeranjang($this->session->username)
    );
    $this->load->view('Kontakkami',$data);
  }

  public function kirimpesan()
  {
    $data = array(
      'namalengkap' => $this->input->post('namalengkap'),
      'email'       => $this->input->post('email'),
      'pesan'       => $this->input->post('pesan')
    );
    $cek = $this->Model_Landingpage->create_kritik($data);
    if(!$cek) {
      echo"<script type='text/javascript'>
      alert('Kritik dan Saran Berhasil Dimasukan');
      window.location='kontakKami';
      </script>";
    }
  }

  public function checkout()
  {
    $id = $this->Model_Landingpage->idTransaksi();
    $akun = $this->Model_Landingpage->getAkun($this->session->username);
    $keranjang = $this->Model_Landingpage->getKeranjang($this->session->username);
    $data = array(
      'idtransaksi' => $id,
      'idakun'      => $akun->idakun,
      'jumlahproduk'=> $keranjang->hasil,
      'kodediskon'  => $this->input->post('kodediskon'),
      'totalharga'  => $this->input->post('total'),
      'tanggaltransaksi'  => '',
      'status'      => 'pending'
    );
    $masuk = $this->Model_Landingpage->create_transaksi($data);
    if (!$masuk) {
      $transaksi = $this->Model_Landingpage->getTransaksi($this->session->username);
        foreach ($transaksi as $t) {
          $datap = array(
            'iddetailtransaksi' => $this->Model_Landingpage->idDetailTransaksi(),
            'idtransaksi'       => $id,
            'idproduk'          => $t->idproduk,
            'jumlah_barang'     => $t->jumlah_barang,
            'total_harga'       => $t->hargaproduk * $t->jumlah_barang
          );
          $input = $this->Model_Landingpage->create_detailtransaksi($datap);
        }
        $url = "https://wa.me/6282130537608?text=Hallo%20KIOOS!!%0ASaya%20melakukan%20transaksi%20dengan%20ID%20.$id.%0ATolong%20segera%20di%20proses%20yaa%0ATerimakasih%5E%5E";
        redirect($url);
    }else{
      echo"<script type='text/javascript'>
      alert('Mohon maaf ulangi kembali');
      window.location='keranjang';
      </script>";
    }
  }

  public function produk()
  {
    $data = array(
      'kategori'   => $this->Model_Landingpage->getKategori(),
      'keranjang'  => $this->Model_Landingpage->getKeranjang($this->session->username),
      'produk'     => $this->Model_Landingpage->getProduk()
    );
    $this->load->view('Produk',$data);
  }

  public function detailProduk($id)
  {
    $prodak = $this->Model_Landingpage->getProdukId($id);
    $data = array(
      'keranjang'  => $this->Model_Landingpage->getKeranjang($this->session->username),
      'produk'     => $this->Model_Landingpage->getProdukId($id),
      'serupa'     => $this->Model_Landingpage->getProdukCategory($prodak->idkategoriproduk,$id)
    );
    $this->load->view('Detailproduk',$data);
  }
}
