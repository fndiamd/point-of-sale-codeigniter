<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Kategori extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $this->db->where('nama_kategori !=', '');
    $kategori = $this->db->get('kategori');
    $data = [
      'title' => 'Kategori',
      'page' => 'kategori/index',
      'kategories' => $kategori
    ];
    
    $this->load->view('index', $data);
  }

}


/* End of file Kategori.php */
/* Location: ./application/controllers/Kategori.php */