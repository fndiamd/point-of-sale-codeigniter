<?php
defined('BASEPATH') or exit('No direct script access allowed');


class User extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $user = $this->db->get('users');
    $data = [
      'title' => 'User',
      'page' => 'user/index',
      'users' => $user
    ];

    $this->load->view('index', $data);
  }

  public function store(){
    $data = [
      'nama_supplier' => $this->input->post('nama_supplier'),
      'alamat' => $this->input->post('alamat'),
      'email' => $this->input->post('email'),
      'telpon' => $this->input->post('telpon'),
      'user' => $this->input->post('user'),
      'profinsi' => $this->input->post('profinsi'),
      'kota' => $this->input->post('kota'),
      'hutang' => $this->input->post('hutang'),
      'gbr' => $this->input->post('gbr'),
      'aktiv' => $this->input->post('aktiv'),
    ];


    $this->db->insert('users', $data);
    $this->session->set_flashdata('success', 'User berhasil ditambahkan');
    redirect(base_url('user'));
  }

  public function create()
  {
    $data = [
      'title' => 'User',
      'page' => 'user/form_tambah',
    ];
    $this->load->view('index', $data);
  }

  public function view($id)
  {
    $this->db->where('id_supplier', $id);
    $supplier = $this->db->get('supplier')->row();
    $data = [
      'title' => 'View',
      'page' => 'supplier/form_view',
      'data' => $supplier
    ];
    $this->load->view('index', $data);
  }

  public function edit($id)
  {
    $this->db->where('id_supplier', $id);
    $supplier = $this->db->get('supplier')->row();
    $data = [
      'title' => 'Update',
      'page' => 'supplier/form_update',
      'data' => $supplier
    ];
    $this->load->view('index', $data);
  }

  function update($id)
  {
    $data = [
      'nama_supplier' => $this->input->post('nama_supplier'),
      'alamat' => $this->input->post('alamat'),
      'email' => $this->input->post('email'),
      'telpon' => $this->input->post('telpon'),
      'user' => $this->input->post('user'),
      'profinsi' => $this->input->post('profinsi'),
      'kota' => $this->input->post('kota'),
      'hutang' => $this->input->post('hutang'),
      'gbr' => $this->input->post('gbr'),
      'aktiv' => $this->input->post('aktiv'),
    ];

    $this->db->where('id_supplier', $id);
    $this->db->update('supplier', $data);
    $this->session->set_flashdata('success', 'supplier berhasil update');
    redirect(base_url('supplier'));
  }

  public function delete($id)
  {
    if (!isset($id)) show_404();

    $this->db->where('id_supplier', $id);
    $this->db->delete('supplier');
    $this->session->set_flashdata('success', 'supplier berhasil dihapus');
    redirect(base_url('supplier'));
  }
}


/* End of file Kategori.php */
/* Location: ./application/controllers/Kategori.php */
