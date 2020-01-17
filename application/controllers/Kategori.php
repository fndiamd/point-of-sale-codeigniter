<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Kategori extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $this->db->where('status !=', '1');
    $kategori = $this->db->get('kategori');
    $data = [
      'title' => 'Kategori',
      'page' => 'kategori/index',
      'kategories' => $kategori
    ];

    $this->load->view('index', $data);
  }

  public function store(){
    $data = [
      'nama_kategori' => $this->input->post('nama_kategori'),
      'jenis_kategori' => $this->input->post('jenis_kategori'),
      'user' => '089612994819',
      'status' => 0
    ];


    $this->db->insert('kategori', $data);
    $this->session->set_flashdata('success', 'Kategori berhasil ditambahkan');
    redirect(base_url('kategori'));
  }

  public function update(){
    $id = $this->uri->segment(3);
    $data = [
      'nama_kategori' => $this->input->post('nama_kategori'),
      'jenis_kategori' => $this->input->post('jenis_kategori'),
      'user' => '089612994819',
      'status' => 0
    ];

    $this->db->where('id_kategori', $id);
    $this->db->update('kategori', $data);
    $this->session->set_flashdata('success', 'Kategori berhasil diubah');
    redirect(base_url('kategori'));
  }

  public function delete(){
    $id = $this->uri->segment(3);
    $this->db->where('id_kategori', $id);
    $this->db->delete('kategori');
    $this->session->set_flashdata('success', 'Kategori berhasil dihapus');
    redirect(base_url('kategori'));
  }
}


/* End of file Kategori.php */
/* Location: ./application/controllers/Kategori.php */
