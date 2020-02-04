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
      'users' => $user
    ];

    $this->load->view('index', $data);
  }

  public function load()
  {
    $data = [];
    $no = 1;

    ($this->session->userdata('role_admin') == 0) ? $display = 'hidden-guest' : $display = '';

    foreach ($this->user->getAll() as $row) {
      $data[] = array(
        $no++,
        $row->nama_lengkap,
        $row->email,
        $row->kota,
        $row->level,
        '<button type="button" class="btn btn-primary detail-button" data-toggle="modal" data-target="#modal-detail" data-id="' . $row->no_telp . '">
          <i class="fa fa-eye"></i>
        </button>
        <a href="' . base_url('user/edit/' . $row->no_telp) . '" class="btn btn-warning ' . $display . '"><i class="fa fa-edit"></i></a>
        <button class="delete-button btn btn-danger ' . $display . '" row-data="user-' . $row->no_telp . '" data-url="' . base_url('user/delete/' . $row->no_telp) . '">
            <i class="fa fa-trash"></i>
        </button>'
      );
    }

    $result = array(
      "data" => $data
    );

    echo json_encode($result);
    exit();
  }

  public function detail()
  {
    $id = $this->input->post('id');
    header('Content-Type: application/json');
    echo json_encode($this->user->getById($id));
  }

  public function edit($id)
  {
    if ($this->session->userdata('role_admin') == 0) {
      $this->session->set_flashdata('error', 'Access denied for guest!');
      redirect(base_url('user'));
    }

    $user = $this->user->getById($id);
    $data = [
      'title' => 'Update User - '.$user->nama_lengkap,
      'page' => 'user/form_update',
      'data' => $user
    ];
    $this->load->view('index', $data);
  }

  function update($id)
  {
    if ($this->session->userdata('role_admin') == 0) {
      $this->session->set_flashdata('error', 'Access denied for guest!');
      redirect(base_url('user'));
    }

    $data = [
      'nama_lengkap' => $this->input->post('nama_lengkap'),
      'alamat' => $this->input->post('alamat'),
      'email' => $this->input->post('email'),
      'no_telp' => $this->input->post('no_telp'),
      'kota' => $this->input->post('kota'),
      'level' => $this->input->post('level'),
      'blokir' => $this->input->post('blokir'),
      'id_session' => $this->input->post('id_session'),
      'paket' => $this->input->post('paket'),
    ];

    if(!empty($this->input->post('password'))){
      $data['password'] = md5($this->input->post('password'));
    }

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
    $this->session->set_flashdata('success', 'User berhasil update');
    redirect(base_url('user'));
  }

  public function delete($id)
  {
    if ($this->session->userdata('role_admin') == 0) {
      $this->session->set_flashdata('error', 'Access denied for guest!');
      redirect(base_url('user'));
    }

    $user = $this->user->getById($id);
    $this->user->delete($id);
    if ($user->gbr != '' && file_exists('assets/uploads/user/' . $user->gbr)) {
      unlink(FCPATH . 'assets/uploads/user/' . $user->gbr);
    }
    header('Content-Type: application/json');
    echo json_encode(['section' => 'User', 'data' => $user->nama_lengkap]);
  }
}


/* End of file Kategori.php */
/* Location: ./application/controllers/Kategori.php */
