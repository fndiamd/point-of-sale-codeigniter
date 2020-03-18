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
    if($this->session->userdata('app_id') == 'wismilak'){
      $this->db->join('users', 'users.master='.$this->table.'.user');
      $this->db->where('users.app_id', 'wismilak');
    }
    $this->db->order_by($column, $sort);
    return $this->db->get()->result();
  }

  public function report($id_toko, $awal, $akhir)
  {
    $this->db->select('pelanggan.nama_pelanggan, toko.nama_toko, historipiutangpelanggan.*');
    $this->db->from($this->table);
    $this->db->join('pelanggan', 'pelanggan.id_pelanggan='.$this->table.'.id_pelanggan', 'left');
    $this->db->join('toko', 'toko.user='.$this->table.'.user', 'left');
    if ($id_toko != null) {
      $this->db->where('toko.id_toko', $id_toko);
    }
    if($this->session->userdata('app_id') == 'wismilak'){
      $this->db->join('users', 'users.master='.$this->table.'.user');
      $this->db->where('users.app_id', 'wismilak');
    }
    $this->db->where('historipiutangpelanggan.tanggal BETWEEN "'.$awal.'" and "'.$akhir.'"');
    $this->db->order_by('historipiutangpelanggan.tanggal', 'desc');
    return $this->db->get()->result();
  }

}

/* End of file MPiutangPelanggan_model.php */
/* Location: ./application/models/MPiutangPelanggan_model.php */