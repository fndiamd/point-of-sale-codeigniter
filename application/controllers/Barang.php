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
  public function create(){
    $data = [
      'title' => 'Barang',
      'page' => 'barang/form_tambah',
    ];
    $this->load->view('index', $data);
  }

  public function update(){
    $data = [
      'title' => 'Update',
      'page' => 'barang/form_update',
    ];
    $this->load->view('index', $data);
  }

  public function store(){
    $data = [
      'nama_barang' => $this->input->post('nama_barang'),
      'kodebarang' => $this->input->post('kodebarang'),
      'user' => '089612994819',
      'id_kategori' => 1,
      'hargabeli' => $this->input->post('hargabeli'),
      'hargajual' => $this->input->post('hargajual'),
      'stok' => $this->input->post('stok'),
      'minimalstok' => $this->input->post('minimalstok'),
      'diskon' => $this->input->post('diskon'),
      'deskripsi' => $this->input->post('deskripsi'),
      'gbr' => 'abc',
      'tampilkan' => 0
    ];

    $this->db->insert('barang', $data);
    $this->session->set_flashdata('success', 'barang berhasil ditambahkan');
    redirect(base_url('barang'));
  }

  public function delete($id)
    {
        if (!isset($id)) show_404();
        
        $this->db->where('id_barang',$id);
        $this->db->delete('barang');
        $this->session->set_flashdata('success', 'barang berhasil dihapus');
        redirect(base_url('barang'));   
    }

}


/* End of file Barang.php */
/* Location: ./application/controllers/Barang.php */