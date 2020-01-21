<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();

    $configUpload = [
      'upload_path' => './assets/uploads/barang/',
      'allowed_types' => 'gif|jpeg|jpg|png',
      'max_size' => 10000,
      'overwrite' => true
    ];
    $this->load->library('upload', $configUpload);
    $this->load->model('MBarang', 'barang');
    $this->load->model('MKategori', 'kategori');
    $this->load->model('MUser', 'user');
  }

  public function index()
  {
    $data = [
      'title' => 'Barang',
      'page' => 'barang/index',
      'barangs' => $this->barang->getAll()
    ];

    $this->load->view('index', $data);
  }
  
  public function create()
  {
    $data = [
      'title' => 'Tambah Barang',
      'page' => 'barang/form_tambah',
      'kategori' => $this->kategori->getAll(),
      'user' => $this->user->getAll()
    ];

    $this->load->view('index', $data);
  }

  public function store()
  {

    if (!$this->upload->do_upload('gambar')) {

      $this->session->set_flashdata('error', $this->upload->display_errors());
      redirect(base_url('barang/create'));
    } else {

      $gambar = $this->upload->data();
      $data = [
        'nama_barang' => $this->input->post('nama_barang'),
        'kodebarang' => $this->input->post('kodebarang'),
        'user' => $this->input->post('user'),
        'id_kategori' => $this->input->post('kategori'),
        'hargabeli' => $this->input->post('hargabeli'),
        'hargajual' => $this->input->post('hargajual'),
        'stok' => $this->input->post('stok'),
        'minimalstok' => $this->input->post('minimalstok'),
        'diskon' => $this->input->post('diskon'),
        'deskripsi' => $this->input->post('deskripsi'),
        'gbr' => $gambar['file_name'],
        'tampilkan' => 0
      ];

      $this->db->insert('barang', $data);
      $this->session->set_flashdata('success', 'Barang berhasil ditambahkan');
      redirect(base_url('barang'));
    }
  }

  public function edit($idbarang)
  {
    $data = [
      'title' => 'Update Barang',
      'page' => 'barang/form_update',
      'barang' => $this->barang->getById($idbarang),
      'kategori' => $this->kategori->getAll(),
      'user' => $this->user->getAll()
    ];

    $this->load->view('index', $data);
  }

  public function update($idbarang)
  {
    $data = [
      'nama_barang' => $this->input->post('nama_barang'),
      'kodebarang' => $this->input->post('kodebarang'),
      'user' => $this->input->post('user'),
      'id_kategori' => $this->input->post('kategori'),
      'hargabeli' => $this->input->post('hargabeli'),
      'hargajual' => $this->input->post('hargajual'),
      'stok' => $this->input->post('stok'),
      'minimalstok' => $this->input->post('minimalstok'),
      'diskon' => $this->input->post('diskon'),
      'deskripsi' => $this->input->post('deskripsi'),
      'tampilkan' => 0
    ];

    if (!empty($_FILES['gambar']['name'])) {
      if (!$this->upload->do_upload('gambar')) {
        $this->session->set_flashdata('error', $this->upload->display_errors());
        redirect(base_url('barang/create'));
      } else {
        $gambar = $this->upload->data();
        $data['gbr'] = $gambar['file_name'];
      }
    }

    $this->db->where('id_barang', $idbarang);
    $this->db->update('barang', $data);
    $this->session->set_flashdata('success', 'Barang berhasil diubah');
    redirect(base_url('barang'));
  }

  public function view($id)
  {
    $this->db->where('id_barang', $id);
    $barang = $this->db->get('barang')->row();
    $data = [
      'title' => 'View',
      'page' => 'barang/form_view',
      'data' => $barang
    ];
    $this->load->view('index', $data);
  }

  public function search()
  {
    $id = $this->input->post('id_barang');
    $this->db->where('id_barang', $id);
    header('Content-Type: application/json');
    echo json_encode($this->db->get('barang')->row());
  }

  public function delete($id)
  {
    $barang = $this->barang->getById($id);
    unlink(FCPATH.'assets/uploads/barang/'.$barang->gbr);
    $this->barang->delete($id);
    $this->session->set_flashdata('success', 'Barang berhasil dihapus');
    redirect(base_url('barang'));
  }
}


/* End of file Barang.php */
/* Location: ./application/controllers/Barang.php */
