<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MHutangPelanggan extends CI_Model
{

  private $table = 'logpembayaranhutangpelanggan';

  public function __construct()
  {
    parent::__construct();
  }

  public function getAll($column = 'tanggal', $sort = 'desc')
  {
    $this->db->from($this->table);
    $this->db->join('pelanggan', 'pelanggan.id_pelanggan=' . $this->table . '.id_pelanggan', 'left');
    $this->db->join('toko', 'toko.user=' . $this->table . '.user', 'left');
    $this->db->order_by($column, $sort);
    return $this->db->get()->result();
  }

  public function report($id_toko, $awal, $akhir)
  {
    $this->db->from($this->table);
    $this->db->join('pelanggan', 'pelanggan.id_pelanggan=' . $this->table . '.id_pelanggan', 'left');
    $this->db->join('toko', 'toko.user=' . $this->table . '.user', 'left');
    if ($id_toko != null) {
      $this->db->where('toko.id_toko', $id_toko);
    }
    $this->db->where('logpembayaranhutangpelanggan.tanggal BETWEEN "' . $awal . '" and "' . $akhir . '"');
    return $this->db->get()->result();
  }
}

/* End of file HutangPelanggan_model.php */
/* Location: ./application/models/HutangPelanggan_model.php */
