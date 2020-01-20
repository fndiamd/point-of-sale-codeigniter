<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
    $this->load->model('MAdmin', 'admin');
  }

  public function index()
  {
    // 
  }

  public function store(){
    $data = [
      'email' => 'admin-pos@bm.co.id',
      'nama' => 'Admin Ganteng',
      'password' => password_hash('password', PASSWORD_DEFAULT)
    ];

    $this->admin->save($data);
  }

}


/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */