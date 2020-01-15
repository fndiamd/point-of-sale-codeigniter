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

  public function store(){
    $data = [
      'nama_toko' => $this->input->post('nama_toko'),
      'email' => $this->input->post('email'),
      'nohp' => $this->input->post('nohp'),
      'alamat' => $this->input->post('alamat'),
      'user' => '089612994819',
    ];

    $this->db->insert('toko', $data);
    $this->session->set_flashdata('success', 'Merchant berhasil ditambahkan');
    redirect(base_url('merchant'));
  }
}


/* End of file Merchant.php */
/* Location: ./application/controllers/Merchant.php */
