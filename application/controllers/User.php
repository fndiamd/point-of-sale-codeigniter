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
      'nama_lengkap' => $this->input->post('nama_lengkap'),
      'password' => $this->input->post('password'),
      'tanggal' => $this->input->post('tanggal'),
      'alamat' => $this->input->post('alamat'),
      'email' => $this->input->post('email'),
      'no_telp' => $this->input->post('no_telp'),
      'kota' => $this->input->post('kota'),
      'level' => $this->input->post('level'),
      'blokir' => $this->input->post('blokir'),
      'id_session' => $this->input->post('id_session'),
      'gbr' => $this->input->post('gbr'),
      'paket' => $this->input->post('paket'),
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
    $this->db->where('no_telp', $id);
    $user = $this->db->get('users')->row();
    $data = [
      'title' => 'View',
      'page' => 'user/form_view',
      'data' => $user
    ];
    $this->load->view('index', $data);
  }

  public function edit($id)
  {
    $this->db->where('no_telp', $id);
    $user = $this->db->get('users')->row();
    $data = [
      'title' => 'Update',
      'page' => 'user/form_update',
      'data' => $user
    ];
    $this->load->view('index', $data);
  }

  function update($id)
  {
    $data = [
        'nama_lengkap' => $this->input->post('nama_lengkap'),
        'password' => $this->input->post('password'),
        'tanggal' => $this->input->post('tanggal'),
        'alamat' => $this->input->post('alamat'),
        'email' => $this->input->post('email'),
        'no_telp' => $this->input->post('no_telp'),
        'kota' => $this->input->post('kota'),
        'level' => $this->input->post('level'),
        'blokir' => $this->input->post('blokir'),
        'id_session' => $this->input->post('id_session'),
        'gbr' => $this->input->post('gbr'),
        'paket' => $this->input->post('paket'),
      ];

    $this->db->where('no_telp', $id);
    $this->db->update('users', $data);
    $this->session->set_flashdata('success', 'supplier berhasil update');
    redirect(base_url('user'));
  }

  public function delete($id)
  {
    if (!isset($id)) show_404();

    $this->db->where('no_telp', $id);
    $this->db->delete('users');
    $this->session->set_flashdata('success', 'User berhasil dihapus');
    redirect(base_url('user'));
  }
}


/* End of file Kategori.php */
/* Location: ./application/controllers/Kategori.php */
