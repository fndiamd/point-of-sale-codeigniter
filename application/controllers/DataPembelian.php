<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataPembelian extends CI_Controller{
    
  public function __construct()
  {
    parent::__construct();
    $this->load->model('MDataPembelian', 'dataPembelian');
  }

  public function index(){
    $data = [
      'title' => 'Data Pembelian',
      'page' => 'data-pembelian/index',
      'dataPembelian' => $this->dataPembelian->getAll(),
      'merchant' => $this->db->get('toko')->result()
    ];
    
    $this->load->view('index', $data);
  }

}


/* End of file DataPembelian.php */
/* Location: ./application/controllers/DataPembelian.php */