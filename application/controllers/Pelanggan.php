<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Pelanggan extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();

    $configUpload = [
      'upload_path' => './assets/uploads/pelanggan/',
      'allowed_types' => 'gif|jpeg|jpg|png',
      'max_size' => 10000,
      'overwrite' => true
    ];
    $this->load->library('upload', $configUpload);
    $this->load->model('MPelanggan', 'pelanggan');
    $this->load->model('MKategori', 'kategori');
    $this->load->model('MUser', 'user');
  }

  public function index()
  {
    $pelanggan = $this->db->get('pelanggan');
    $data = [
      'title' => 'Manajemen Pelanggan',
      'page' => 'pelanggan/index'
    ];

    $this->load->view('index', $data);
  }

  public function load()
  {
    $data = [];
    $no = 1;

    foreach ($this->pelanggan->getAll() as $row) {
      $data[] = array(
        $no++,
        $row->nama_pelanggan,
        $row->email,
        $row->telpon,
        $row->status,
        '<a href="'.base_url('pelanggan/view/'.$row->id_pelanggan).'" class="btn btn-primary"><i class="fa fa-eye"></i></a>
        <a href="'.base_url('pelanggan/edit/'.$row->id_pelanggan).'" class="btn btn-warning"><i class="fa fa-edit"></i></a>
        <button class="delete-button btn btn-danger" row-data="pelanggan-'.$row->id_pelanggan.'" data-url="'.base_url('pelanggan/delete/' .$row->id_pelanggan).'">
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

  public function store(){
      $data = [
        'nama_pelanggan' => $this->input->post('nama_pelanggan'),
        'alamat' => $this->input->post('alamat'),
        'email' => $this->input->post('email'),
        'telpon' => $this->input->post('telpon'),
        'user' => $this->input->post('user'),
        'status' => $this->input->post('status'),
        'hutang' => $this->input->post('hutang'),
        'aktiv' => $this->input->post('aktiv'),
      ];

      if (!empty($_FILES['gambar']['name'])) {
        if (!$this->upload->do_upload('gambar')) {
          $this->session->set_flashdata('error', $this->upload->display_errors());
          redirect(base_url('pelanggan/create'));
        } else {
          $gambar = $this->upload->data();
          $data['gbr'] = $gambar['file_name'];
        }
      }


    $this->db->insert('pelanggan', $data);
    $this->session->set_flashdata('success', 'pelanggan berhasil ditambahkan');
    redirect(base_url('pelanggan'));
  }

  public function view($id)
  {
    $this->db->where('id_pelanggan', $id);
    $pelanggan = $this->db->get('pelanggan')->row();
    $data = [
      'title' => 'Lihat Pelanggan',
      'page' => 'pelanggan/form_view',
      'data' => $pelanggan,
      'kategori' => $this->kategori->getAll(),
      'user' => $this->user->getAll()
    ];
    $this->load->view('index', $data);
  }

  public function create()
  {
    $data = [
      'title' => 'Tambah Pelanggan',
      'page' => 'pelanggan/form_tambah',
      'kategori' => $this->kategori->getAll(),
      'user' => $this->user->getAll()
    ];
    $this->load->view('index', $data);
  }

  public function edit($id)
  {
    $this->db->where('id_pelanggan', $id);
    $pelanggan = $this->db->get('pelanggan')->row();
    $data = [
      'title' => 'Update Pelanggan',
      'page' => 'pelanggan/form_update',
      'data' => $pelanggan,
      'kategori' => $this->kategori->getAll(),
      'user' => $this->user->getAll()
    ];
    $this->load->view('index', $data);
  }

  function update($id)
  {
    
      $data = [
        'nama_pelanggan' => $this->input->post('nama_pelanggan'),
        'alamat' => $this->input->post('alamat'),
        'email' => $this->input->post('email'),
        'telpon' => $this->input->post('telpon'),
        'user' => $this->input->post('user'),
        'status' => $this->input->post('status'),
        'hutang' => $this->input->post('hutang'),
        'aktiv' => $this->input->post('aktiv'),
      ];
      
      if (!empty($_FILES['gambar']['name'])) {
        if (!$this->upload->do_upload('gambar')) {
          $this->session->set_flashdata('error', $this->upload->display_errors());
          redirect(base_url('pelanggan/create'));
        } else {
          $gambar = $this->upload->data();
          $data['gbr'] = $gambar['file_name'];
        }
      }

    $this->db->where('id_pelanggan', $id);
    $this->db->update('pelanggan', $data);
    $this->session->set_flashdata('success', 'barang berhasil update');
    redirect(base_url('pelanggan'));
  }

  public function delete($id)
  {
    $pelanggan = $this->pelanggan->getById($id);
    unlink(FCPATH.'assets/uploads/pelanggan/'.$pelanggan->gbr);
    $this->pelanggan->delete($id);
  }

}


/* End of file Kategori.php */
/* Location: ./application/controllers/Kategori.php */
