<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class MPiutangSupplier extends CI_Model {

  private $table = 'historipiutangsupplier';

  public function __construct()
  {
    parent::__construct();
  }

  public function getAll($column = 'tanggal', $sort = 'desc'){
    $this->db->from($this->table);
    $this->db->join('supplier', 'supplier.id_supplier='.$this->table.'.id_supplier', 'left');
    $this->db->join('toko', 'toko.user='.$this->table.'.user', 'left');
    if($this->session->userdata('app_id') == 'wismilak'){
      $this->db->join('users', 'users.master='.$this->table.'.user');
      $this->db->where('users.app_id', 'wismilak');
    }
    $this->db->order_by($this->table.'.'.$column, $sort);
    return $this->db->get()->result();
  }

  public function report($id_toko, $awal, $akhir)
  {
    $this->db->from($this->table);
    $this->db->join('supplier', 'supplier.id_supplier='.$this->table.'.id_supplier', 'left');
    $this->db->join('toko', 'toko.user='.$this->table.'.user', 'left');
    if ($id_toko != null) {
      $this->db->where('toko.id_toko', $id_toko);
    }
    if($this->session->userdata('app_id') == 'wismilak'){
      $this->db->join('users', 'users.master='.$this->table.'.user');
      $this->db->where('users.app_id', 'wismilak');
    }
    $this->db->where('historipiutangsupplier.tanggal BETWEEN "'.$awal.'" and "'.$akhir.'"');
    $this->db->order_by('historipiutangsupplier.tanggal', 'desc');
    return $this->db->get()->result();
  }

}

/* End of file MPiutangSupplier_model.php */
/* Location: ./application/models/MPiutangSupplier_model.php */