<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

  public function __construct()
  {
      parent::__construct();
      $this->load->model('Model_Admin');
      $this->load->library('form_validation');
      if(!$this->session->username){
        redirect('Login');
      }
  }

  public function index()
  {
    $akun = $this->session->username;
    $data = array(
      'akun'     => $this->Model_Admin->getAkun($akun),
      'jUser'    => $this->Model_Admin->jumlahUser(),
      'jProduk'  => $this->Model_Admin->jumlahProduk(),
      'jBanner'  => $this->Model_Admin->jumlahBanner(),
      'jDiskon'  => $this->Model_Admin->jumlahDiskon(),
      'jKategori'=> $this->Model_Admin->jumlahKategori()
    );
    $this->load->view('admin/Dashboard',$data);
  }

  public function kategoriAdmin()
  {
    $akun = $this->session->username;
    $data = array(
      'akun' => $this->Model_Admin->getAkun($akun),
      'kategori' => $this->Model_Admin->getKategori()
    );
    $this->load->view('admin/Kategoriproduk',$data);
  }

  public function tambahKategoriProduk()
  {
    $this->form_validation->set_rules('judul','Judul Kategori','required|is_unique[kategoriproduk.judulkategori]',
    array(
      'required' => 'Judul kategori tidak boleh kosong',
      'is_unique' => 'Judul kategori sudah ada'
    ));
    $this->form_validation->set_rules('keterangan','Keterangan','required',
		array(
			'required' => 'Keterangan tidak boleh kosong',
		));
    if($this->form_validation->run() == FALSE){
      $this->kategoriAdmin();
    }else{
    $idKP = $this->Model_Admin->idKategoriProduk();
    $config['upload_path'] = "./uploads/fotokategori/";
    $config['allowed_types'] = "gif|jpg|png|jpeg";
    $config['max_size'] = 2000;
    $config['encrypt_name'] = TRUE;
    $this->load->library('upload',$config);
     if ($this->upload->do_upload('fotokategori')) {
      $foto = $this->upload->data();
      $data = array(
        'idkategoriproduk' => $idKP,
        'judulkategori' => $this->input->post('judul'),
        'keterangan' => $this->input->post('keterangan'),
        'fotokategori' => $foto['file_name'],
      );
  }else{
    $data = array(
      'idkategoriproduk' => $idKP,
      'judulkategori' => $this->input->post('judul'),
      'keterangan' => $this->input->post('keterangan'),
      'fotokategori' => ''
    );
  }
    $cek = $this->Model_Admin->create_kategoriproduk($data);
    if(!$cek) {
      echo"<script type='text/javascript'>
      alert('Input Data Berhasil');
      window.location='kategoriAdmin';
      </script>";
    }}
  }

  public function editKategoriProduk($id)
  {
    $config['upload_path'] = "./uploads/fotokategori/";
    $config['allowed_types'] = "gif|jpg|png|jpeg";
    $config['max_size'] = 2000;
    $config['encrypt_name'] = TRUE;
    $this->load->library('upload',$config);
     if ($this->upload->do_upload('fotokategori')) {
      $foto = $this->upload->data();
      $data = array(
        'judulkategori' => $this->input->post('judul'),
        'keterangan' => $this->input->post('keterangan'),
        'fotokategori' => $foto['file_name'],
      );
  }else{
    $data = array(
      'judulkategori' => $this->input->post('judul'),
      'keterangan' => $this->input->post('keterangan'),
    );
  }
    $cek = $this->Model_Admin->update_kproduk($id,$data);
    if($cek) {
      echo"<script type='text/javascript'>
      alert('Update Data Berhasil');
      window.location='../kategoriAdmin';
      </script>";
    }
  }

  public function hapusKategoriProduk($id)
  {
    $cek = $this->Model_Admin->delete_kategoriproduk($id);
    if($cek) {
      echo"<script type='text/javascript'>
      alert('Hapus Data Berhasil');
      window.location='../kategoriAdmin';
      </script>";
    }
  }

  public function Produk()
  {
    $akun = $this->session->username;
    $data = array(
      'akun' => $this->Model_Admin->getAkun($akun),
      'produk' => $this->Model_Admin->getProduk(),
      'kategori' => $this->Model_Admin->getKategori()
    );
    $this->load->view('admin/Produk',$data);
  }

  public function tambahProduk()
  {
    $this->form_validation->set_rules('kategori','Kategori','required',
		array(
			'required' => '%s tidak boleh kosong',
		));
    $this->form_validation->set_rules('keterangan','Keterangan','required',
    array(
      'required' => '%s tidak boleh kosong',
    ));
    $this->form_validation->set_rules('hargaproduk','Harga Produk','required',
    array(
      'required' => '%s tidak boleh kosong',
    ));
    if($this->form_validation->run() == FALSE){
      $this->Produk();
    }else{
    $config['upload_path'] = "./uploads/fotoproduk/";
  	$config['allowed_types'] = "gif|jpg|png|jpeg";
  	$config['max_size'] = 2000;
  	$config['encrypt_name'] = TRUE;
    $idP = $this->Model_Admin->idProduk();
    $this->load->library('upload',$config);
  	 if ($this->upload->do_upload('fotoproduk')) {
      $foto = $this->upload->data();
    $data = array(
      'idproduk' => $idP,
      'idkategoriproduk' => $this->input->post('kategori'),
      'judulproduk' => $this->input->post('namaproduk'),
      'keterangan' => $this->input->post('keterangan'),
      'fotoproduk' => $foto['file_name'],
      'hargaproduk'=> $this->input->post('hargaproduk')
    );
  }else{
    $data = array(
      'idproduk' => $idP,
      'idkategoriproduk' => $this->input->post('kategori'),
      'judulproduk' => $this->input->post('namaproduk'),
      'keterangan' => $this->input->post('keterangan'),
      'fotoproduk' => '',
      'hargaproduk'=> $this->input->post('hargaproduk')
    );
  }
    $cek = $this->Model_Admin->create_produk($data);
    if(!$cek) {
      echo"<script type='text/javascript'>
      alert('Input Data Berhasil');
      window.location='Produk';
      </script>";
    }
  }
  }

  public function editProduk($id)
  {
    $config['upload_path'] = "./uploads/fotoproduk/";
    $config['allowed_types'] = "gif|jpg|png|jpeg";
    $config['max_size'] = 2000;
    $config['encrypt_name'] = TRUE;

    $this->load->library('upload',$config);
       if ($this->upload->do_upload('fotoproduk')) {
        $foto = $this->upload->data();
      $data = array(
        'idkategoriproduk' => $this->input->post('kategori'),
        'judulproduk' => $this->input->post('namaproduk'),
        'keterangan' => $this->input->post('keterangan'),
        'fotoproduk' => $foto['file_name'],
        'hargaproduk'=> $this->input->post('hargaproduk')
      );
    }else{
      $data = array(
        'idkategoriproduk' => $this->input->post('kategori'),
        'judulproduk' => $this->input->post('namaproduk'),
        'keterangan' => $this->input->post('keterangan'),
        'hargaproduk'=> $this->input->post('hargaproduk')
      );
    }
      $cek = $this->Model_Admin->update_produk($id,$data);
      if($cek) {
        echo"<script type='text/javascript'>
        alert('Update Data Berhasil');
        window.location='../Produk';
        </script>";
      }
  }

  public function hapusProduk($id)
  {
    $cek = $this->Model_Admin->delete_produk($id);
    if($cek) {
      echo"<script type='text/javascript'>
      alert('Hapus Data Berhasil');
      window.location='../Produk';
      </script>";
    }
  }

  public function diskon()
  {
    $akun = $this->session->username;
    $data = array(
      'akun' => $this->Model_Admin->getAkun($akun),
      'diskon' => $this->Model_Admin->getDiskon()
    );
    $this->load->view('admin/Diskon',$data);
  }

  public function tambahDiskon()
  {
    $this->form_validation->set_rules('kodediskon','Kode Diskon','required|is_unique[diskon.kodediskon]',
    array(
      'required' => '%s tidak boleh kosong',
      'is_unique' => '%s sudah ada'
    ));
    $this->form_validation->set_rules('namadiskon','Nama Diskon','required',
		array(
			'required' => '%s tidak boleh kosong',
		));
    $this->form_validation->set_rules('tipe','Tipe Diskon','required',
    array(
      'required' => '%s tidak boleh kosong',
    ));
    $this->form_validation->set_rules('nomordiskon','Nomor Diskon','required',
    array(
      'required' => '%s tidak boleh kosong',
    ));
    if($this->form_validation->run() == FALSE){
      $this->diskon();
    }else{
    $id = $this->Model_Admin->idDiskon();
    if ($this->input->post('tipe') == 'nominal') {
      $data = array(
        'iddiskon' => $id,
        'namadiskon' => $this->input->post('namadiskon'),
        'kodediskon' => $this->input->post('kodediskon'),
        'nominal' => $this->input->post('nomordiskon'),
        'status' => 'aktif',
        'tipe' => 'nominal',
      );
    }else if($this->input->post('tipe') == 'persen'){
      $data = array(
        'iddiskon' => $id,
        'namadiskon' => $this->input->post('namadiskon'),
        'kodediskon' => $this->input->post('kodediskon'),
        'persen' => $this->input->post('nomordiskon'),
        'status' => 'aktif',
        'tipe' => 'persen',
      );
    }
    $cek = $this->Model_Admin->create_diskon($data);
    if(!$cek) {
      echo"<script type='text/javascript'>
      alert('Input Data Berhasil');
      window.location='diskon';
      </script>";
     }
    }
  }

  public function editDiskon($id)
  {
    $cektipe = $this->Model_Admin->getDiskonId($id);
    if ($cektipe->tipe == 'nominal') {
      $data = array(
        'namadiskon' => $this->input->post('namadiskon'),
        'kodediskon' => $this->input->post('kodediskon'),
        'nominal' => $this->input->post('nomordiskon'),
      );
    }else if($cektipe->tipe == 'persen'){
      $data = array(
        'namadiskon' => $this->input->post('namadiskon'),
        'kodediskon' => $this->input->post('kodediskon'),
        'persen' => $this->input->post('nomordiskon'),
      );
    }
    $cek = $this->Model_Admin->update_diskon($id,$data);
    if($cek) {
      echo"<script type='text/javascript'>
      alert('Update Data Berhasil');
      window.location='../diskon';
      </script>";
    }
  }

  public function hapusDiskon($id)
  {
    $cek = $this->Model_Admin->delete_diskon($id);
    if($cek) {
      echo"<script type='text/javascript'>
      alert('Hapus Data Berhasil');
      window.location='../diskon';
      </script>";
    }
  }

  public function discAktif($id)
  {
    $data = array(
      'status' => 'aktif',
    );
  $cek = $this->Model_Admin->update_diskon($id,$data);
  if($cek) {
    echo"<script type='text/javascript'>
    alert('Status Data Aktif');
    window.location='../diskon';
    </script>";
   }
  }

  public function discTdkAktif($id)
  {
    $data = array(
      'status' => 'nonaktif',
    );
  $cek = $this->Model_Admin->update_diskon($id,$data);
  if($cek) {
    echo"<script type='text/javascript'>
    alert('Status Data NonAktif');
    window.location='../diskon';
    </script>";
   }
  }

  public function banner()
  {
    $akun = $this->session->username;
    $data = array(
      'akun' => $this->Model_Admin->getAkun($akun),
      'banner' => $this->Model_Admin->getBanner()
    );
    $this->load->view('admin/Banner',$data);
  }

  public function tambahBanner()
  {
    $this->form_validation->set_rules('judulbanner','Judul Banner','required',
    array(
      'required' => '%s tidak boleh kosong',
    ));
    $this->form_validation->set_rules('keterangan','Keterangan','required',
    array(
      'required' => '%s tidak boleh kosong',
    ));
    if($this->form_validation->run() == FALSE){
      $this->banner();
    }else{
    $config['upload_path'] = "./uploads/fotobanner/";
    $config['allowed_types'] = "gif|jpg|png|jpeg";
    $config['max_size'] = 2000;
    $config['encrypt_name'] = TRUE;
    $id = $this->Model_Admin->idBanner();
    $this->load->library('upload',$config);
     if ($this->upload->do_upload('fotobanner')) {
      $foto = $this->upload->data();
    $data = array(
      'idbanner' => $id,
      'judulbanner' => $this->input->post('judulbanner'),
      'keterangan' => $this->input->post('keterangan'),
      'fotobanner' => $foto['file_name'],
    );
  }else{
    $data = array(
      'idbanner' => $idP,
      'judulbanner' => $this->input->post('judulbanner'),
      'keterangan' => $this->input->post('keterangan'),
      'fotobanner' => '',
    );
  }
    $cek = $this->Model_Admin->create_banner($data);
    if(!$cek) {
      echo"<script type='text/javascript'>
      alert('Input Data Berhasil');
      window.location='Banner';
      </script>";
    }
  }
  }

  public function editBanner($id)
  {
    $config['upload_path'] = "./uploads/fotobanner/";
    $config['allowed_types'] = "gif|jpg|png|jpeg";
    $config['max_size'] = 2000;
    $config['encrypt_name'] = TRUE;

    $this->load->library('upload',$config);
       if ($this->upload->do_upload('fotobanner')) {
        $foto = $this->upload->data();
        $data = array(
          'judulbanner' => $this->input->post('judulbanner'),
          'keterangan' => $this->input->post('keterangan'),
          'fotobanner' => $foto['file_name'],
        );
    }else{
        $data = array(
          'judulbanner' => $this->input->post('judulbanner'),
          'keterangan' => $this->input->post('keterangan'),
        );
    }
      $cek = $this->Model_Admin->update_banner($id,$data);
      if($cek) {
        echo"<script type='text/javascript'>
        alert('Update Data Berhasil');
        window.location='../Banner';
        </script>";
      }
  }

  public function hapusBanner($id)
  {
    $cek = $this->Model_Admin->delete_banner($id);
    if($cek) {
      echo"<script type='text/javascript'>
      alert('Hapus Data Berhasil');
      window.location='../Banner';
      </script>";
    }
  }


}

?>
