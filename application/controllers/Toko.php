<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Toko extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('MToko', 'toko');
    $this->load->model('MUser', 'user');

    $configUpload = [
      'upload_path' => './assets/uploads/user/',
      'allowed_types' => 'gif|jpeg|jpg|png',
      'max_size' => 10000,
      'overwrite' => true
    ];
    $this->load->library('upload', $configUpload);
  }

  public function index()
  {
    $merchant = $this->toko->getAll();
    $data = [
      'title' => 'Manajemen Toko',
      'page' => 'toko/index',
      'merchants' => $merchant
    ];

    $this->load->view('index', $data);
  }

  public function create()
  {
    $data = [
      'title' => 'Tambah Toko Baru',
      'page' => 'toko/form_tambah',
      'user' => $this->user->getAll()
    ];

    $this->load->view('index', $data);
  }

  public function store()
  {
    $data = [
      'dataUser' => [
        'nama_lengkap' => $this->input->post('nama_lengkap'),
        'email' => $this->input->post('email'),
        'password' => md5($this->input->post('password')),
        'tanggal' => date('yy-m-d'),
        'kota' => $this->input->post('kota'),
        'alamat' => $this->input->post('alamat_user'),
        'no_telp' => $this->input->post('telp_user'),
        'level' => 'master',
        'blokir' => 'N',
        'paket' => 1,
        'master' => $this->input->post('telp_user')
      ],
      'dataToko' => [
        'nama_toko' => $this->input->post('nama_toko'),
        'nohp' => $this->input->post('telp_toko'),
        'alamat' => $this->input->post('alamat_toko'),
        'user' => $this->input->post('telp_user'),
        'email' => $this->input->post('email')
      ]
    ];

    if (!empty($_FILES['gambar']['name'])) {
      if (!$this->upload->do_upload('gambar')) {
        $this->session->set_flashdata('error', $this->upload->display_errors());
        redirect(base_url('toko/create'));
      } else {
        $gambar = $this->upload->data();
        $data['dataUser']['gbr'] = $gambar['file_name'];
      }
    }

    if(empty($data['dataToko']['nohp'])) $data['dataToko']['nohp'] = $this->input->post('telp_user');
    if(empty($data['dataToko']['alamat'])) $data['dataToko']['alamat'] = $this->input->post('alamat_user');
    
    $this->user->save($data['dataUser']);
    $this->toko->save($data['dataToko']);

    $this->session->set_flashdata('success', 'Toko berhasil ditambahkan');
    redirect(base_url('toko'));
  }

  public function view($id)
  {
    $merchant = $this->toko->getById($id);
    $data = [
      'title' => 'Detail ' . $merchant->nama_toko,
      'page' => 'toko/form_view',
      'data' => $merchant
    ];
    $this->load->view('index', $data);
  }

  public function edit($id)
  {
    $merchant = $this->toko->getById($id);
    $data = [
      'title' => 'Update ' . $merchant->nama_toko,
      'page' => 'toko/form_update',
      'data' => $merchant,
      'user' => $this->user->getAll()
    ];

    $this->load->view('index', $data);
  }

  function update($id)
  {
    $data = [
      'nama_toko' => $this->input->post('nama_toko'),
      'alamat' => $this->input->post('alamat'),
      'user' => $this->input->post('user'),
      'email' => $this->input->post('email'),
      'nohp' => $this->input->post('nohp'),

    ];

    $this->toko->update(['id_toko' => $id], $data);
    $this->session->set_flashdata('success', 'Toko berhasil update');
    redirect(base_url('toko'));
  }

  public function delete($id)
  {
    $this->toko->delete(['id_toko' => $id]);
  }
}


/* End of file Merchant.php */
/* Location: ./application/controllers/Merchant.php */
