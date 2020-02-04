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
    $data = [
      'title' => 'Manajemen Toko',
      'page' => 'toko/index',
    ];

    $this->load->view('index', $data);
  }

  public function getAll(){
    header('Content-Type: application/json');
    echo json_encode($this->toko->getAll());
  }

  public function load()
  {
    $data = [];
    $no = 1;

    ($this->session->userdata('role_admin') == 0) ? $display = 'hidden-guest' : $display = ''; 

    foreach ($this->toko->getAll() as $row) {
      $data[] = array(
        $no++,
        $row->user,
        $row->nama_toko,
        $row->email,
        '<button type="button" class="btn btn-primary detail-button" data-toggle="modal" data-target="#modal-detail" data-id="'.$row->id_toko.'">
          <i class="fa fa-eye"></i>
        </button>
        <a href="'.base_url('toko/edit/'.$row->id_toko).'" class="btn btn-warning '.$display.'"><i class="fa fa-edit"></i></a>
        <button class="delete-button btn btn-danger '.$display.'" row-data="toko-'.$row->id_toko.'" data-url="'.base_url('toko/delete/'.$row->id_toko).'">
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

  public function create()
  {
    if($this->session->userdata('role_admin') == 0){
      $this->session->set_flashdata('error', 'Access denied for guest!');
      redirect(base_url('toko'));
    }

    $data = [
      'title' => 'Tambah Toko Baru',
      'page' => 'toko/form_tambah'
    ];

    $this->load->view('index', $data);
  }

  public function store()
  {
    if($this->session->userdata('role_admin') == 0){
      $this->session->set_flashdata('error', 'Access denied for guest!');
      redirect(base_url('toko'));
    }

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

    if (empty($data['dataToko']['nohp'])) $data['dataToko']['nohp'] = $this->input->post('telp_user');
    if (empty($data['dataToko']['alamat'])) $data['dataToko']['alamat'] = $this->input->post('alamat_user');

    $this->user->save($data['dataUser']);
    $this->toko->save($data['dataToko']);

    $this->session->set_flashdata('success', 'Toko berhasil ditambahkan');
    redirect(base_url('toko'));
  }

  public function detail()
  {
    $id = $this->input->post('id');
    header('Content-Type: application/json');
    echo json_encode($this->toko->getById($id));
  }

  public function edit($id)
  {
    if($this->session->userdata('role_admin') == 0){
      $this->session->set_flashdata('error', 'Access denied for guest!');
      redirect(base_url('toko'));
    }

    $merchant = $this->toko->getById($id);
    $data = [
      'title' => 'Update Toko - ' . $merchant->nama_toko,
      'page' => 'toko/form_update',
      'data' => $merchant,
      'user' => $this->user->getAll()
    ];

    $this->load->view('index', $data);
  }

  public function update($id)
  {
    if($this->session->userdata('role_admin') == 0){
      $this->session->set_flashdata('error', 'Access denied for guest!');
      redirect(base_url('toko'));
    }

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
    if($this->session->userdata('role_admin') == 0){
      $this->session->set_flashdata('error', 'Access denied for guest!');
      redirect(base_url('toko'));
    }
    
    $toko = $this->toko->getById($id);
    $this->toko->delete(['id_toko' => $id]);
    header('Content-Type: application/json');
    echo json_encode(['section' => 'Toko', 'data' => $toko->nama_toko]);
  }
}


/* End of file Merchant.php */
/* Location: ./application/controllers/Merchant.php */
