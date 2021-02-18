<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

  public function __construct()
  {
      parent::__construct();
      $this->load->model('Model_Login');
      $this->load->model('Model_Admin');
      $this->load->model('Model_Landingpage');
      $this->load->library('form_validation');
      // if(!$this->model_Admin->getIdAdmin($this->session->email)){
      //   redirect('Login');
      // }
  }

  public function index()
  {
    $this->load->view('login');
  }

  public function loginakun()
  {
    $this->form_validation->set_rules('username','Username','required',
    array(
      'required' => 'Username tidak boleh kosong',
    ));
    $this->form_validation->set_rules('password','Password','required',
    array(
      'required' => 'Password tidak boleh kosong',
    ));
    if($this->form_validation->run() == FALSE){
      $this->index();
    }else{
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $cekAkun = $this->Model_Login->cekAkun($username,md5($password));
    if ($cekAkun) {
      if ($cekAkun->level == 'admin') {
        $this->session->id = $cekAkun->idakun;
        $this->session->username = $cekAkun->username;
        $data = array(
          'akun' => $cekAkun,
          'jUser'    => $this->Model_Admin->jumlahUser(),
          'jProduk'  => $this->Model_Admin->jumlahProduk(),
          'jBanner'  => $this->Model_Admin->jumlahBanner(),
          'jDiskon'  => $this->Model_Admin->jumlahDiskon(),
          'jKategori'=> $this->Model_Admin->jumlahKategori()
        );
        // echo $this->session->id;
        // echo $this->session->username;
        $this->load->view('admin/Dashboard',$data);
      }else if($cekAkun->level == 'konsumen'){
        $this->session->id = $cekAkun->idakun;
        $this->session->username = $cekAkun->username;
        $data = array(
          'akun' => $cekAkun,
          'kategori'   => $this->Model_Landingpage->getKategori(),
          'satubanner' => $this->Model_Landingpage->getBannerOne(),
          'banner'     => $this->Model_Landingpage->getBanner(),
          'produk'     => $this->Model_Landingpage->getProduk(),
          'katacak'    => $this->Model_Landingpage-> getKategoriRand(),
          'keranjang'  => $this->Model_Landingpage->getKeranjang($this->session->username),
        );
        $this->load->view('Landingpage',$data);
      }
    }else{
      echo"<script type='text/javascript'>
      alert('Username/Password salah, silahkan ulangi!');
      window.location='index';
      </script>";
    }
  }
  }

  public function landingpage()
  {
    $this->load->view('landingpage');
  }

  public function logout()
  {
		session_destroy();
		redirect('Login');
  }

}
