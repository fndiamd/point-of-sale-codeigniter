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
      'page' => 'supplier/index',
      'suppliers' => $supplier
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
    $data = [
      'title' => 'Tambah Supplier',
      'page' => 'supplier/form_tambah',
      'kategori' => $this->kategori->getAll(),
      'user' => $this->user->getAll()
    ];
    $this->load->view('index', $data);
  }

  public function view($id)
  {
    $this->db->where('id_supplier', $id);
    $supplier = $this->db->get('supplier')->row();
    $data = [
      'title' => 'Lihat Supplier',
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
      'title' => 'Update Supplier',
      'page' => 'supplier/form_update',
      'kategori' => $this->kategori->getAll(),
      'user' => $this->user->getAll(),
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
    $supplier = $this->supplier->getById($id);
    unlink(FCPATH.'assets/uploads/supplier/'.$supplier->gbr);
    $this->supplier->delete($id);
  }
}


/* End of file Kategori.php */
/* Location: ./application/controllers/Kategori.php */
