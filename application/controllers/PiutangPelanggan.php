<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PiutangPelanggan extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
    $this->load->model('MPiutangPelanggan', 'piutangPelanggan');
  }

  public function index(){
    $data = [
      'page' => 'piutang-pelanggan/index',
      'title' => 'History Piutang Pelanggan',
      'piutangPelanggan' => $this->piutangPelanggan->getAll(),
      'merchant' => $this->db->get('toko')->result()
    ];
    
    $this->load->view('index', $data);
  }

}


/* End of file PiutangPelanggan.php */
/* Location: ./application/controllers/PiutangPelanggan.php */