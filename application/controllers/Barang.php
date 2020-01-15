<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $barang = $this->db->get('barang');
    $data = [
      'title' => 'Barang',
      'page' => 'barang/index',
      'barangs' => $barang
    ];
    $this->load->view('index', $data);
  }

  public function store(){
    $data = [
      'nama_barang' => $this->input->post('nama_barang'),
      'kodebarang' => $this->input->post('kodebarang'),
      'user' => '089612994819',
    ];

    $this->db->insert('barang', $data);
    $this->session->set_flashdata('success', 'barang berhasil ditambahkan');
    redirect(base_url('barang'));
  }

}


/* End of file Barang.php */
/* Location: ./application/controllers/Barang.php */