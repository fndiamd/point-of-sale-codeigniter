<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataPenjualan extends CI_Controller{
    
  public function __construct(){
    parent::__construct();
    $this->load->model('MDataPenjualan', 'dataPenjualan');
  }

  public function index(){
    $data = [
      'title' => 'Data Penjualan',
      'page' => 'data-penjualan/index',
      'dataPenjualan' => $this->dataPenjualan->getAll(),
      'merchant' => $this->db->get('toko')->result()
    ];

    $this->load->view('index', $data);
  }

}


/* End of file DataPenjualan.php */
/* Location: ./application/controllers/DataPenjualan.php */