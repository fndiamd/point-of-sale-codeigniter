<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PiutangSupplier extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('MPiutangSupplier', 'piutangSupplier');
  }

  public function index()
  {
    $data = [
      'page' => 'piutang-supplier/index',
      'title' => 'History Piutang Supplier',
      'piutangPelanggan' => $this->piutangSupplier->getAll(),
      'merchant' => $this->db->get('toko')->result()
    ];

    $this->load->view('index', $data);
  }

}


/* End of file PiutangSupplier.php */
/* Location: ./application/controllers/PiutangSupplier.php */
