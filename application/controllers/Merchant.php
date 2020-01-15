<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Merchant extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $merchant = $this->db->get('toko');
    $data = [
      'title' => 'Merchant',
      'page' => 'merchant/index',
      'merchants' => $merchant
    ];

    $this->load->view('index', $data);
  }
}


/* End of file Merchant.php */
/* Location: ./application/controllers/Merchant.php */
