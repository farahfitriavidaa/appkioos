<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_Register');
        $this->load->library('form_validation');
        // if(!$this->model_Admin->getIdAdmin($this->session->email)){
        //   redirect('Login');
        // }
    }

  public function index()
  {
    $this->load->view('register');
  }

  public function registerakun()
  {
    $this->form_validation->set_rules('username','Username','required|is_unique[akun.username]',
    array(
      'required' => 'Username tidak boleh kosong',
      'is_unique' => 'Username sudah ada'
    ));
    $this->form_validation->set_rules('namalengkap','Nama Lengkap','required',
		array(
			'required' => 'Nama lengkap tidak boleh kosong',
		));
		$this->form_validation->set_rules('password','Password','required|min_length[8]',
		array(
			'required'      => '%s tidak boleh kosong',
			'min_length'    => 'Masukan password minimal 8 character',
		));
		$this->form_validation->set_rules('notelp','Nomor Telp','required|min_length[10]|numeric|greater_than[0]',
		array(
			'required'    => '%s tidak boleh kosong',
			'min_length'  => '%s diisi minimal 10angka',
			'numeric'     => '%s wajib menggunakan angka',
			'greater_than'=> '%s tidak boleh minus'
		));
		$this->form_validation->set_rules('email','Email','required|valid_email',
		array(
		'required'      => 'Email tidak boleh kosong',
		'valid_email'   => 'Harus berformat email yang valid (contoh : email@gmail.com)'
		));
		if($this->form_validation->run() == FALSE){
			$this->index();
		}else{
    $data = array(
      'idakun'  => $this->Model_Register->idUser(),
      'username' => $this->input->post('username'),
      'password' => md5($this->input->post('password')),
      'namalengkap' => $this->input->post('namalengkap'),
      'email'    => $this->input->post('email'),
      'notelp'   => $this->input->post('notelp'),
      'foto'     => 'user.png',
      'level'    => 'konsumen',
      'status'   => 'aktif'
    );
    if ($this->input->post('checkbox') == 'check') {
      $input = $this->Model_Register->create_akun($data);
      if (!$input) {
        echo"<script type='text/javascript'>
        alert('Registrasi Berhasil');
        window.location='login';
        </script>";
      }
    }else{
      echo"<script type='text/javascript'>
      alert('Checklist persyaratan & kondisi terlebih dahulu');
      window.location='index';
      </script>";
    }
  }
  }

  public function login()
  {
    redirect('Login');
  }


}
