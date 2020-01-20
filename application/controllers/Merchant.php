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
      'title' => 'Manajemen Toko',
      'page' => 'merchant/index',
      'merchants' => $merchant
    ];

    $this->load->view('index', $data);
  }

  public function create()
  {
    $data = [
      'title' => 'Tambah Toko Baru',
      'page' => 'merchant/form_tambah',
      'user' => $this->db->get('users')->result()
    ];

    $this->load->view('index', $data);
  }

  public function store(){
    $data = [
      'nama_toko' => $this->input->post('nama_toko'),
      'email' => $this->input->post('email'),
      'nohp' => $this->input->post('nohp'),
      'alamat' => $this->input->post('alamat'),
      'user' => $this->input->post('user')
    ];

    $this->db->insert('toko', $data);
    $this->session->set_flashdata('success', 'Merchant berhasil ditambahkan');
    redirect(base_url('merchant'));
  }

  public function view($id)
  {
    $this->db->where('id_toko', $id);
    $merchant = $this->db->get('toko')->row();
    $data = [
      'title' => 'Detail '.$merchant->nama_toko,
      'page' => 'merchant/form_view',
      'data' => $merchant
    ];
    $this->load->view('index', $data);
  }

  public function edit($id)
  {
    $this->db->where('id_toko', $id);
    $merchant = $this->db->get('toko')->row();
    $data = [
      'title' => 'Update '.$merchant->nama_toko,
      'page' => 'merchant/form_update',
      'data' => $merchant
    ];

    $this->load->view('index', $data);
  }

  function update($id)
  {
    $data = [
      'nama_toko' => $this->input->post('nama_toko'),
      'alamat' => $this->input->post('alamat'),
      'user' => $this->input->post('user'),
      'email' => $this->input->post('email'),
      'nohp' => $this->input->post('nohp'),
      
    ];

    $this->db->where('id_toko', $id);
    $this->db->update('toko', $data);
    $this->session->set_flashdata('success', 'toko berhasil update');
    redirect(base_url('merchant'));
  }

  public function delete($id)
  {
    if (!isset($id)) show_404();

    $this->db->where('id_toko', $id);
    $this->db->delete('toko');
    $this->session->set_flashdata('success', 'toko berhasil dihapus');
    redirect(base_url('merchant'));
  }

}


/* End of file Merchant.php */
/* Location: ./application/controllers/Merchant.php */
