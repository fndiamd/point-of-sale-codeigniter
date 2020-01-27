<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Kategori extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();

    $this->load->model('MKategori', 'kategori');
  }

  public function index()
  {
    $data = [
      'title' => 'Manajemen Kategori',
      'page' => 'kategori/index'
    ];

    $this->load->view('index', $data);
  }

  public function load()
  {
    $data = [];
    $no = 1;

    foreach ($this->kategori->getAll() as $row) {
      $data[] = array(
        $no++,
        $row->nama_kategori,
        $row->jenis_kategori,
        $row->status,
        '<button type="button" class="btn btn-warning detail-button" data-toggle="modal" data-target="#modal-edit" data-id="'.$row->id_kategori.'">
          <i class="fa fa-edit"></i>
        </button>
        <button class="delete-button btn btn-danger" row-data="kategori_delete-' . $row->id_kategori . '" data-url="' . base_url('kategori/delete/' . $row->id_kategori) . '">
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

  public function detail(){
    $id = $this->input->post('id');
    header('Content-Type: application/json');
    echo json_encode($this->kategori->getById($id));
  }

  public function store()
  {
    $data = [
      'nama_kategori' => $this->input->post('nama_kategori'),
      'jenis_kategori' => $this->input->post('jenis_kategori'),
      'user' => '089612994819',
      'status' => 0
    ];


    $this->db->insert('kategori', $data);
    $this->session->set_flashdata('success', 'Kategori berhasil ditambahkan');
    redirect(base_url('kategori'));
  }

  public function update()
  {
    $id = $this->uri->segment(3);
    $data = [
      'nama_kategori' => $this->input->post('nama_kategori'),
      'jenis_kategori' => $this->input->post('jenis_kategori'),
      'user' => '089612994819',
      'status' => 0
    ];

    $this->db->where('id_kategori', $id);
    $this->db->update('kategori', $data);
    $this->session->set_flashdata('success', 'Kategori berhasil diubah');
    redirect(base_url('kategori'));
  }

  public function delete($id)
  {
    $this->kategori->delete($id);
  }
}


/* End of file Kategori.php */
/* Location: ./application/controllers/Kategori.php */
