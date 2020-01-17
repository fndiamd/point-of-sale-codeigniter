<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MHutangPelanggan extends CI_Model {

  private $table = 'logpembayaranhutangpelanggan';

  public function __construct()
  {
    parent::__construct();
  }

  public function getAll(){
    $this->db->from($this->table);
    $this->db->join('pelanggan', 'pelanggan.id_pelanggan='.$this->table.'.id_pelanggan', 'left');
    $this->db->join('toko', 'toko.user='.$this->table.'.user', 'left');
    return $this->db->get()->result();
  }
  
}

/* End of file HutangPelanggan_model.php */
/* Location: ./application/models/HutangPelanggan_model.php */