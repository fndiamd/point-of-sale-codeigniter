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
      'id_barang' => $this->input->post('id_barang'),
      'user' => '089612994819',
      'status' => 0
    ];

    $this->db->insert('kategori', $data);
    $this->session->set_flashdata('success', 'Kategori berhasil ditambahkan');
    redirect(base_url('kategori'));
  }

}


/* End of file Barang.php */
/* Location: ./application/controllers/Barang.php */