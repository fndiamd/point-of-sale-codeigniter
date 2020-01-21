<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MPiutangPelanggan extends CI_Model {

  private $table = 'historipiutangpelanggan';

  public function __construct()
  {
    parent::__construct();
  }

  public function getAll($column = 'tanggal', $sort = 'desc'){
    $this->db->select('pelanggan.nama_pelanggan, toko.nama_toko, historipiutangpelanggan.*');
    $this->db->from($this->table);
    $this->db->join('pelanggan', 'pelanggan.id_pelanggan='.$this->table.'.id_pelanggan', 'left');
    $this->db->join('toko', 'toko.user='.$this->table.'.user', 'left');
    $this->db->order_by($column, $sort);
    return $this->db->get()->result();
  }

  // ------------------------------------------------------------------------

}

/* End of file MPiutangPelanggan_model.php */
/* Location: ./application/models/MPiutangPelanggan_model.php */