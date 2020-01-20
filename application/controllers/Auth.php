<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
    $this->load->model('MAdmin', 'admin');
  }

  public function index()
  {
    $this->load->view('auth');
  }

  public function doLogin(){
    $data = [
      'email' => $this->input->post('email'),
      'password' => $this->input->post('password')
    ];

    $dataAdmin = $this->admin->getByEmail($data['email']);
    if($dataAdmin->num_rows() == 1){
      $admin = $dataAdmin->row();
      if(password_verify($data['password'], $admin->password)){
        $sessionData = [
          'id_admin' => $admin->id_admin,
          'nama_admin' => $admin->nama
        ];
        $this->session->set_userdata($sessionData);
        redirect(base_url('dashboard'));
      }else{
        $this->session->set_flashdata('error', 'Password yang anda masukkan salah!');
        redirect(base_url());
      }
    }else{
      $this->session->set_flashdata('error', 'E-mail tidak terdaftar');
      redirect(base_url());
    }
  }

  public function logout(){
    $this->session->sess_destroy();
    redirect(base_url());
  }

}


/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */