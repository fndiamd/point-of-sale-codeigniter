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
    $this->db->from($this->table);
    $this->db->join('pelanggan', 'pelanggan.id_pelanggan=penjualan.id_pelanggan', 'left');
    $this->db->join('barang', 'barang.id_barang=penjualan.id_barang', 'left');
    $this->db->join('toko', 'toko.user=penjualan.user');
    $this->db->order_by($column, $sort);
    return $this->db->get()->result();
  }

  public function penjualanUser($user){
    $this->db->select('penjualan.*, pelanggan.nama_pelanggan, barang.nama_barang');
    $this->db->from($this->table);
    $this->db->join('pelanggan', 'pelanggan.id_pelanggan=penjualan.id_pelanggan');
    $this->db->join('barang', 'barang.id_barang=penjualan.id_barang');
    $this->db->where('penjualan.user', $user);
    return $this->db->get()->result();
  }

  public function report($id_toko, $awal, $akhir)
  {
    $this->db->select('penjualan.*, toko.*, pelanggan.nama_pelanggan, barang.nama_barang');
    $this->db->from($this->table);
    $this->db->join('pelanggan', 'pelanggan.id_pelanggan=penjualan.id_pelanggan', 'left');
    $this->db->join('barang', 'barang.id_barang=penjualan.id_barang', 'left');
    $this->db->join('toko', 'toko.user=penjualan.user');
    if ($id_toko != null) {
      $this->db->where('toko.id_toko', $id_toko);
    }
    $this->db->where('penjualan.tanggal BETWEEN "'.$awal.'" and "'.$akhir.'"');
    return $this->db->get()->result();
  }

}

/* End of file Penjualan_model.php */
/* Location: ./application/models/Penjualan_model.php */