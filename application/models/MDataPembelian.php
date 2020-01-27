<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MDataPembelian extends CI_Model {

  private $table = 'datapembelian';

  public function __construct(){
    parent::__construct();
  }

  public function getAll($column = 'tanggal', $sort = 'desc'){
    $this->db->from($this->table);
    $this->db->join('supplier', 'supplier.id_supplier='.$this->table.'.id_supplier', 'left');
    $this->db->join('toko', 'toko.user='.$this->table.'.user', 'left');
    $this->db->order_by($column, $sort);
    return $this->db->get()->result();
  }

  public function getById($id){
    $this->db->from($this->table);
    $this->db->join('supplier', 'supplier.id_supplier='.$this->table.'.id_supplier', 'left');
    $this->db->join('toko', 'toko.user='.$this->table.'.user', 'left');
    $this->db->where('id_datapembelian', $id);
    return $this->db->get()->row();
  }

  public function report($id_toko, $awal, $akhir)
  {
    $this->db->from($this->table);
    $this->db->join('supplier', 'supplier.id_supplier=' . $this->table . '.id_supplier', 'left');
    $this->db->join('toko', 'toko.user=' . $this->table . '.user', 'left');
    if ($id_toko != null) {
      $this->db->where('toko.id_toko', $id_toko);
    }
    $this->db->where('datapembelian.tanggal BETWEEN "'.$awal.'" and "'.$akhir.'"');
    return $this->db->get()->result();
  }

  public function reportCount($date)
  {
    $this->db->where('tanggal', $date);
    $this->db->from($this->table);
    return $this->db->count_all_results();
  }

}
