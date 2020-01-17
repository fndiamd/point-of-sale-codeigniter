<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MDataPenjualan extends CI_Model {

  private $table = 'datapenjualan';
  private $primaryKey = 'id_datapenjualan';

  public function __construct(){
    parent::__construct();
  }

  public function getAll($column = 'tanggal', $sort = 'desc'){
    $this->db->from($this->table);
    $this->db->join('pelanggan', 'pelanggan.id_pelanggan='.$this->table.'.id_pelanggan', 'left');
    $this->db->join('toko', 'toko.user='.$this->table.'.user', 'left');
    $this->db->order_by($column, $sort);
    return $this->db->get()->result();
  }

  public function getById($id_datapenjualan){
    $this->db->from($this->table);
    $this->db->join('pelanggan', 'pelanggan.id_pelanggan='.$this->table.'.id_pelanggan', 'left');
    $this->db->join('toko', 'toko.user='.$this->table.'.user', 'left');
    $this->db->where($this->table.'.'.$this->primaryKey, $id_datapenjualan);
    return $this->db->get()->row();
  }

  public function getByInvoice($no_invoice){
    $this->db->from($this->table);
    $this->db->join('pelanggan', 'pelanggan.id_pelanggan='.$this->table.'.id_pelanggan', 'left');
    $this->db->join('toko', 'toko.user='.$this->table.'.user', 'left');
    $this->db->where($this->table.'.no_invoice', $no_invoice);
    return $this->db->get()->row();
  }

}

/* End of file MDataPenjualan_model.php */
/* Location: ./application/models/MDataPenjualan_model.php */