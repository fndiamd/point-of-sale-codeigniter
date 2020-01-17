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
      'alamat' => $this->input->post('alamat'),
      'email' => $this->input->post('email'),
      'telpon' => $this->input->post('telpon'),
      'user' => $this->input->post('user'),
      'status' => $this->input->post('status'),
      'hutang' => $this->input->post('hutang'),
      'gbr' => $this->input->post('gbr'),
      'aktiv' => $this->input->post('aktiv'),
    ];


    $this->db->insert('pelanggan', $data);
    $this->session->set_flashdata('success', 'pelanggan berhasil ditambahkan');
    redirect(base_url('pelanggan'));
  }

  public function view($id)
  {
    $this->db->where('id_pelanggan', $id);
    $pelanggan = $this->db->get('pelanggan')->row();
    $data = [
      'title' => 'View',
      'page' => 'pelanggan/form_view',
      'data' => $pelanggan
    ];
    $this->load->view('index', $data);
  }

  public function create()
  {
    $data = [
      'title' => 'Pelanggan',
      'page' => 'pelanggan/form_tambah',
    ];
    $this->load->view('index', $data);
  }

  public function edit($id)
  {
    $this->db->where('id_pelanggan', $id);
    $pelanggan = $this->db->get('pelanggan')->row();
    $data = [
      'title' => 'Update',
      'page' => 'pelanggan/form_update',
      'data' => $pelanggan
    ];
    $this->load->view('index', $data);
  }

  function update($id)
  {
    $data = [
      'nama_pelanggan' => $this->input->post('nama_pelanggan'),
      'alamat' => $this->input->post('alamat'),
      'email' => $this->input->post('email'),
      'telpon' => $this->input->post('telpon'),
      'user' => $this->input->post('user'),
      'status' => $this->input->post('status'),
      'hutang' => $this->input->post('hutang'),
      'gbr' => $this->input->post('gbr'),
      'aktiv' => $this->input->post('aktiv'),
    ];

    $this->db->where('id_pelanggan', $id);
    $this->db->update('pelanggan', $data);
    $this->session->set_flashdata('success', 'barang berhasil update');
    redirect(base_url('pelanggan'));
  }

  public function delete($id)
  {
    if (!isset($id)) show_404();

    $this->db->where('id_pelanggan', $id);
    $this->db->delete('pelanggan');
    $this->session->set_flashdata('success', 'pelanggan berhasil dihapus');
    redirect(base_url('pelanggan'));
  }

}


/* End of file Kategori.php */
/* Location: ./application/controllers/Kategori.php */
