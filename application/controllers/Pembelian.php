<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembelian extends CI_Controller
{
    
  public function __construct(){
    parent::__construct();
    $this->load->model('MPembelian', 'pembelian');
  }

  public function index(){
    $data = [
      'title' => 'Detail Pembelian',
      'page' => 'pembelian/index',
      'pembelian' => $this->pembelian->getAll(),
      'merchant' => $this->db->get('toko')->result()
    ];

    $this->load->view('index', $data);
  }

}


/* End of file Pembelian.php */
/* Location: ./application/controllers/Pembelian.php */