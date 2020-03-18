<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MBarang extends CI_Model {

  private $table = 'barang';

  public function __construct()
  {
    parent::__construct();
  }

  public function getAll($column = 'id_barang', $sort = 'desc'){
    $this->db->from($this->table);
    $this->db->join('kategori', 'kategori.id_kategori='.$this->table.'.id_kategori', 'left');
    if($this->session->userdata('app_id') == 'wismilak'){
      $this->db->join('users', 'users.master=barang.user');
      $this->db->where('users.app_id', 'wismilak');
    }
    $this->db->where('barang.user !=', 0);
    $this->db->order_by($column, $sort);
    return $this->db->get()->result();
  }

  public function getAllMaster($column = 'id_barang', $sort = 'desc'){
    $this->db->from($this->table);
    $this->db->join('kategori', 'kategori.id_kategori='.$this->table.'.id_kategori', 'left');
    $this->db->where('barang.user', 0);
    $this->db->order_by($column, $sort);
    return $this->db->get()->result();
  }

  public function getById($value){
    $this->db->select('*, barang.*');
    $this->db->from($this->table);
    $this->db->join('kategori', 'kategori.id_kategori='.$this->table.'.id_kategori', 'left');
    $this->db->where('barang.id_barang', $value);
    
    return $this->db->get()->row();
  }

  public function barangUser($user){
    $this->db->from($this->table);
    $this->db->join('kategori', 'kategori.id_kategori=barang.id_kategori');
    $this->db->where("barang.user='$user' or barang.user='0'");
    return $this->db->get()->result();
  }

  public function save($data){
    $this->db->insert($this->table, $data);
  }

  public function update($clause, $data){ 
    $this->db->where($clause);
    $this->db->update($this->table, $data);
  }

  public function delete($idbarang){
    $this->db->where('id_barang', $idbarang);
    $this->db->delete($this->table);
  }
}

/* End of file MBarang_model.php */
/* Location: ./application/models/MBarang_model.php */