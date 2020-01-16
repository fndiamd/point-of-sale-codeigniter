<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $this->db->select('*');
    $this->db->from('barang');
    $this->db->join('kategori', 'kategori.id_kategori=barang.id_kategori', 'inner');
    $barang = $this->db->get();
    $data = [
      'title' => 'Barang',
      'page' => 'barang/index',
      'barangs' => $barang
    ];
    $this->load->view('index', $data);
  }

}


/* End of file Barang.php */
/* Location: ./application/controllers/Barang.php */