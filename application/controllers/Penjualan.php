<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan extends CI_Controller
{
    
  public function __construct(){
    parent::__construct();
    $this->load->model('MPenjualan', 'penjualan');
    $this->load->model('MPelanggan', 'pelanggan');
    $this->load->model('MBarang', 'barang');
  }

  public function index(){
    $data = [
      'title' => 'Detail Penjualan',
      'page' => 'penjualan/index',
      'penjualan' => $this->penjualan->getAll(),
      'merchant' => $this->db->get('toko')->result() 
    ];

    $this->load->view('index', $data);
  }

}


/* End of file Penjualan.php */
/* Location: ./application/controllers/Penjualan.php */