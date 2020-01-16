<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Pelanggan extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $pelanggan = $this->db->get('pelanggan');
    $data = [
      'title' => 'Pelanggan',
      'page' => 'pelanggan/index',
      'pelanggans' => $pelanggan
    ];

    $this->load->view('index', $data);
  }

  public function store(){
    $data = [
      'nama_pelanggan' => $this->input->post('nama_pelanggan'),
      'jenis_kategori' => $this->input->post('jenis_kategori'),
      'user' => '089612994819',
      'status' => 0
    ];


    $this->db->insert('pelanggan', $data);
    $this->session->set_flashdata('success', 'Kategori berhasil ditambahkan');
    redirect(base_url('pelanggan'));
  }
}


/* End of file Kategori.php */
/* Location: ./application/controllers/Kategori.php */
