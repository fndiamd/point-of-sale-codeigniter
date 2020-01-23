<?php
defined('BASEPATH') or exit('No direct script access allowed');


class User extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();

    $configUpload = [
      'upload_path' => './assets/uploads/user/',
      'allowed_types' => 'gif|jpeg|jpg|png',
      'max_size' => 10000,
      'overwrite' => true
    ];
    $this->load->library('upload', $configUpload);
    $this->load->model('MUser', 'user');
  }

  public function index()
  {
    $user = $this->db->get('users');
    $data = [
      'title' => 'Manajemen User',
      'page' => 'user/index',
      'users' => $user,
      'user' => $this->user->getAll()
    ];

    $this->load->view('index', $data);
  }

  public function store(){
    if (!$this->upload->do_upload('gambar')) {
      $this->session->set_flashdata('error', $this->upload->display_errors());
      redirect(base_url('user/create'));
    } else {
      $gambar = $this->upload->data();
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
        'gbr' => $gambar['file_name'],
        'paket' => $this->input->post('paket'),
      ];
  }

    $this->db->insert('users', $data);
    $this->session->set_flashdata('success', 'User berhasil ditambahkan');
    redirect(base_url('user'));
  }

  public function create()
  {
    $data = [
      'title' => 'Tambah User',
      'page' => 'user/form_tambah',
    ];
    $this->load->view('index', $data);
  }

  public function view($id)
  {
    $this->db->where('no_telp', $id);
    $user = $this->db->get('users')->row();
    $data = [
      'title' => 'Lihat User',
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
      'title' => 'Update User',
      'page' => 'user/form_update',
      'data' => $user,
      'user' => $this->user->getAll()
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
        'paket' => $this->input->post('paket'),
      ];

      if (!empty($_FILES['gambar']['name'])) {
        if (!$this->upload->do_upload('gambar')) {
          $this->session->set_flashdata('error', $this->upload->display_errors());
          redirect(base_url('user/create'));
        } else {
          $gambar = $this->upload->data();
          $data['gbr'] = $gambar['file_name'];
        }
      }

    $this->db->where('no_telp', $id);
    $this->db->update('users', $data);
    $this->session->set_flashdata('success', 'supplier berhasil update');
    redirect(base_url('user'));
  }

  public function delete($id)
  {
    $user = $this->user->getById($id);
    unlink(FCPATH.'assets/uploads/user/'.$user->gbr);
    $this->user->delete($id);
  }
}


/* End of file Kategori.php */
/* Location: ./application/controllers/Kategori.php */
