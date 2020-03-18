<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('MAdmin', 'admin');
  }

  public function index()
  {
    $admin = $this->db->get('admin');
    $data = [
      'title' => 'Manajemen Admin',
      'page' => 'admin/index',
      'admins' => $admin
    ];

    $this->load->view('index', $data);
  }

  public function load()
  {
    $data = [];
    $no = 1;
    $role = ["Guest", "Admin"];
    ($this->session->userdata('role_admin') == 0) ? $display = 'hidden-guest' : $display = '';

    foreach ($this->admin->getAll() as $row) {
      $data[] = array(
        $no++,
        $row->nama,
        $row->email,
        $role[$row->role],
        $row->app_id,
        '<a href="' . base_url('admin/edit/' . $row->id_admin) . '" class="btn btn-warning ' . $display . '"><i class="fa fa-edit"></i></a>
        <button class="delete-button btn btn-danger ' . $display . '" row-data="user-' . $row->id_admin . '" data-url="' . base_url('admin/delete/' . $row->id_admin) . '">
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

  public function edit($id)
  {
    if ($this->session->userdata('role_admin') == 0) {
      $this->session->set_flashdata('error', 'Access denied for guest!');
      redirect(base_url('admin'));
    }

    $this->db->where('id_admin', $id);
    $admin = $this->db->get('admin')->row();
    $data = [
      'title' => 'Update Admin',
      'page' => 'admin/form_update',
      'data' => $admin
    ];
    $this->load->view('index', $data);
  }

  function update($id)
  {
    if ($this->session->userdata('role_admin') == 0) {
      $this->session->set_flashdata('error', 'Access denied for guest!');
      redirect(base_url('admin'));
    }

    $data = [
      'nama' => $this->input->post('nama'),
      'role' => $this->input->post('role'),
      'email' => $this->input->post('email'),
      'app_id' => $this->input->post('app_id')
    ];

    if (!empty($this->input->post('password'))) {
      $data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
    }

    $this->db->where('id_admin', $id);
    $this->db->update('admin', $data);
    $this->session->set_flashdata('success', 'Admin berhasil update');
    redirect(base_url('admin'));
  }

  public function create()
  {
    if ($this->session->userdata('role_admin') == 0) {
      $this->session->set_flashdata('error', 'Access denied for guest!');
      redirect(base_url('admin'));
    }

    $data = [
      'title' => 'Tambah Admin',
      'page' => 'admin/form_tambah',
    ];
    $this->load->view('index', $data);
  }

  public function store()
  {
    if ($this->session->userdata('role_admin') == 0) {
      $this->session->set_flashdata('error', 'Access denied for guest!');
      redirect(base_url('admin'));
    }

    $data = [
      'nama' => $this->input->post('nama'),
      'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
      'role' => $this->input->post('role'),
      'email' => $this->input->post('email'),
      'app_id' => $this->input->post('app_id')
    ];
    $this->db->insert('admin', $data);
    $this->session->set_flashdata('success', 'Admin berhasil ditambahkan');
    redirect(base_url('admin'));
  }

  public function delete($id)
  {
    if ($this->session->userdata('role_admin') == 0) {
      $this->session->set_flashdata('error', 'Access denied for guest!');
      redirect(base_url('admin'));
    }

    $admin = $this->admin->getById($id);
    $this->admin->delete($id);

    header('Content-Type: application/json');
    echo json_encode(['section' => 'Admin', 'data' => $admin->nama]);
  }

  public function setting()
  {
    $this->db->where('id_admin', $this->session->userdata('id_admin'));
    $admin = $this->db->get('admin')->row();
    $data = [
      'title' => 'Setting',
      'page' => 'admin/form_setting',
      'data' => $admin
    ];
    $this->load->view('index', $data);
  }

  public function settingProcess()
  {
    $data = [
      'nama' => $this->input->post('nama'),
      'email' => $this->input->post('email')
    ];

    if (!empty($this->input->post('password'))) {
      $data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
    }

    $sessionData = [
      'nama_admin' => $data['nama'],
      'role_admin' => $data['role']
    ];
    $this->session->set_userdata($sessionData);

    $this->db->where('id_admin', $this->session->userdata('id_admin'));
    $this->db->update('admin', $data);
    $this->session->set_flashdata('success', 'Data anda berhasil diperbarui');
    redirect(base_url('admin'));
  }
}


/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */
