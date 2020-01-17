<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HutangSupplier extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('MHutangSupplier', 'hutangSupplier');
  }

  public function index()
  {
    $data = [
      'page' => 'hutang-supplier/index',
      'title' => 'Pembayaran Hutang Supplier',
      'hutangSupplier' => $this->hutangSupplier->getAll(),
      'merchant' => $this->db->get('toko')->result()
    ];

    $this->load->view('index', $data);
  }
}


/* End of file HutangSupplier.php */
/* Location: ./application/controllers/HutangSupplier.php */
