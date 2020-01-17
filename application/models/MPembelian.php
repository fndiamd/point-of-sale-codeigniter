<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MPembelian extends CI_Model {

  private $table = 'pembelian';

  public function __construct()
  {
    parent::__construct();
  }

  public function getAll($column = 'tanggal', $sort = 'desc'){
    $this->db->from($this->table);
    $this->db->join('supplier', 'supplier.id_supplier=pembelian.id_supplier', 'left');
    $this->db->join('barang', 'barang.id_barang=pembelian.id_barang', 'left');
    $this->db->join('toko', 'toko.user=pembelian.user', 'left');
    $this->db->order_by($column, $sort);
    return $this->db->get()->result();
  }

}

/* End of file MPembelian_model.php */
/* Location: ./application/models/MPembelian_model.php */