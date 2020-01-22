<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Toko extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('MToko', 'toko');
    $this->load->model('MUser', 'user');
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

  public function store(){
    $data = [
      'nama_toko' => $this->input->post('nama_toko'),
      'email' => $this->input->post('email'),
      'nohp' => $this->input->post('nohp'),
      'alamat' => $this->input->post('alamat'),
      'user' => $this->input->post('user')
    ];

    $this->toko->save($data);
    $this->session->set_flashdata('success', 'Toko berhasil ditambahkan');
    redirect(base_url('toko'));
  }

  public function view($id)
  {
    $merchant = $this->toko->getById($id);
    $data = [
      'title' => 'Detail '.$merchant->nama_toko,
      'page' => 'toko/form_view',
      'data' => $merchant
    ];
    $this->load->view('index', $data);
  }

  public function edit($id)
  {
    $merchant = $this->toko->getById($id);
    $data = [
      'title' => 'Update '.$merchant->nama_toko,
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
