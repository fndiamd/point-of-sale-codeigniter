<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HutangPelanggan extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
    $this->load->model('MHutangPelanggan', 'hutangPelanggan');
  }

  public function index(){
    $data = [
      'page' => 'hutang-pelanggan/index',
      'title' => 'Pembayaran Hutang Pelanggan',
      'hutangPelanggan' => $this->hutangPelanggan->getAll(),
      'merchant' => $this->db->get('toko')->result()
    ];

    $this->load->view('index', $data);
  }

}


/* End of file HutangPelanggan.php */
/* Location: ./application/controllers/HutangPelanggan.php */