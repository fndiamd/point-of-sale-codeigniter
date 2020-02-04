<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Supplier extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();

    $configUpload = [
      'upload_path' => './assets/uploads/supplier/',
      'allowed_types' => 'gif|jpeg|jpg|png',
      'max_size' => 10000,
      'overwrite' => true
    ];
    $this->load->library('upload', $configUpload);
    $this->load->model('MSupplier', 'supplier');
    $this->load->model('MKategori', 'kategori');
    $this->load->model('MUser', 'user');
  }

  public function index()
  {
    $supplier = $this->db->get('supplier');
    $data = [
      'title' => 'Manajemen Supplier',
      'page' => 'supplier/index'
    ];

    $this->load->view('index', $data);
  }

  public function load()
  {
    $data = [];
    $no = 1;

    ($this->session->userdata('role_admin') == 0) ? $display = 'hidden-guest' : $display = '';

    foreach ($this->supplier->getAll() as $row) {
      $data[] = array(
        $no++,
        $row->nama_supplier,
        $row->email,
        $row->telpon,
        $row->profinsi,
        $row->kota,
        '<button type="button" class="btn btn-primary detail-button" data-toggle="modal" data-target="#modal-detail" data-id="' . $row->id_supplier . '">
          <i class="fa fa-eye"></i>
        </button>
        <a href="' . base_url('supplier/edit/' . $row->id_supplier) . '" class="btn btn-warning ' . $display . '"><i class="fa fa-edit"></i></a>
        <button class="delete-button btn btn-danger ' . $display . '" row-data="supplier-' . $row->id_supplier . '" data-url="' . base_url('supplier/delete/' . $row->id_supplier) . '">
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

  public function store()
  {
    if ($this->session->userdata('role_admin') == 0) {
      $this->session->set_flashdata('error', 'Access denied for guest!');
      redirect(base_url('supplier'));
    }

    $data = [
      'nama_supplier' => $this->input->post('nama_supplier'),
      'alamat' => $this->input->post('alamat'),
      'email' => $this->input->post('email'),
      'telpon' => $this->input->post('telpon'),
      'user' => $this->input->post('user'),
      'profinsi' => $this->input->post('profinsi'),
      'kota' => $this->input->post('kota'),
      'hutang' => $this->input->post('hutang'),
      'aktiv' => $this->input->post('aktiv')
    ];

    if (!empty($_FILES['gambar']['name'])) {
      if (!$this->upload->do_upload('gambar')) {
        $this->session->set_flashdata('error', $this->upload->display_errors());
        redirect(base_url('supplier/create'));
      } else {
        $gambar = $this->upload->data();
        $data['gbr'] = $gambar['file_name'];
      }
    }

    $this->db->insert('supplier', $data);
    $this->session->set_flashdata('success', 'Supplier berhasil ditambahkan');
    redirect(base_url('supplier'));
  }

  public function create()
  {
    if ($this->session->userdata('role_admin') == 0) {
      $this->session->set_flashdata('error', 'Access denied for guest!');
      redirect(base_url('supplier'));
    }

    $data = [
      'title' => 'Tambah Supplier',
      'page' => 'supplier/form_tambah',
      'kategori' => $this->kategori->getAll(),
      'user' => $this->user->getAll()
    ];
    $this->load->view('index', $data);
  }

  public function detail()
  {
    $id = $this->input->post('id');
    header('Content-Type: application/json');
    echo json_encode($this->supplier->getById($id));
  }

  public function edit($id)
  {
    if ($this->session->userdata('role_admin') == 0) {
      $this->session->set_flashdata('error', 'Access denied for guest!');
      redirect(base_url('supplier'));
    }

    $supplier = $this->supplier->getById($id);

    $data = [
      'title' => 'Update Supplier - '.$supplier->nama_supplier,
      'page' => 'supplier/form_update',
      'data' => $supplier
    ];
    $this->load->view('index', $data);
  }

  function update($id)
  {
    if ($this->session->userdata('role_admin') == 0) {
      $this->session->set_flashdata('error', 'Access denied for guest!');
      redirect(base_url('supplier'));
    }

    $data = [
      'nama_supplier' => $this->input->post('nama_supplier'),
      'alamat' => $this->input->post('alamat'),
      'email' => $this->input->post('email'),
      'telpon' => $this->input->post('telpon'),
      'user' => $this->input->post('user'),
      'profinsi' => $this->input->post('profinsi'),
      'kota' => $this->input->post('kota'),
      'hutang' => $this->input->post('hutang'),
      'aktiv' => $this->input->post('aktiv'),
    ];

    if (!empty($_FILES['gambar']['name'])) {
      if (!$this->upload->do_upload('gambar')) {
        $this->session->set_flashdata('error', $this->upload->display_errors());
        redirect(base_url('supplier/create'));
      } else {
        $gambar = $this->upload->data();
        $data['gbr'] = $gambar['file_name'];
      }
    }

    $this->db->where('id_supplier', $id);
    $this->db->update('supplier', $data);
    $this->session->set_flashdata('success', 'supplier berhasil update');
    redirect(base_url('supplier'));
  }

  public function delete($id)
  {
    if ($this->session->userdata('role_admin') == 0) {
      $this->session->set_flashdata('error', 'Access denied for guest!');
      redirect(base_url('supplier'));
    }

    $supplier = $this->supplier->getById($id);
    $this->supplier->delete($id);
    if ($supplier->gbr != '' && file_exists('assets/uploads/supplier/' . $supplier->gbr)) {
      unlink(FCPATH . 'assets/uploads/supplier/' . $supplier->gbr);
    }
    header('Content-Type: application/json');
    echo json_encode(['section' => 'Supplier', 'data' => $supplier->nama_supplier]);
  }
}


/* End of file Kategori.php */
/* Location: ./application/controllers/Kategori.php */
