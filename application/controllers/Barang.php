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
    $this->db->select('*');
    $this->db->from('barang');
    $this->db->join('kategori', 'kategori.id_kategori=barang.id_kategori', 'inner');
    $barang = $this->db->get();
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

  public function search(){
    $id = $this->input->post('id_barang');
    $this->db->where('id_barang', $id);
    header('Content-Type: application/json');
    echo json_encode($this->db->get('barang')->row());
  }

}


/* End of file Barang.php */
/* Location: ./application/controllers/Barang.php */