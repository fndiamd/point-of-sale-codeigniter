<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MPenjualan extends CI_Model {

  private $table = 'penjualan';

  public function __construct()
  {
    parent::__construct();
  }

  public function getAll($column = 'tanggal', $sort = 'sort'){
    $this->db->select('penjualan.*, toko.*, pelanggan.nama_pelanggan, barang.nama_barang');
    $this->db->from($this->penjualan);
    $this->db->join('pelanggan', 'pelanggan.id_pelanggan=penjualan.id_pelanggan', 'left');
    $this->db->join('barang', 'barang.id_barang=penjualan.id_barang', 'left');
    $this->db->join('toko', 'toko.user=penjualan.user');
    $this->db->order_by($column, $sort);
    return $this->db->get()->result();
  }

  public function penjualanUser($user){
    $this->db->select('penjualan.*, pelanggan.nama_pelanggan, barang.nama_barang');
    $this->db->from($this->penjualan);
    $this->db->join('pelanggan', 'pelanggan.id_pelanggan=penjualan.id_pelanggan');
    $this->db->join('barang', 'barang.id_barang=penjualan.id_barang');
    $this->db->where('penjualan.user', $user);
    return $this->db->get()->result();
  }

  public function save($data){
    $this->db->insert($this->table, $data);
  }

}

/* End of file Penjualan_model.php */
/* Location: ./application/models/Penjualan_model.php */