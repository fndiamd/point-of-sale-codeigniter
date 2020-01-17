<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MBarang extends CI_Model {

  private $table = 'barang';

  public function __construct()
  {
    parent::__construct();
  }

  public function getAll(){
    $this->db->from($this->table);
    $this->db->join('kategori', 'kategori.id_kategori=barang.id_kategori', 'left');
    return $this->db->get()->result();
  }

  public function barangUser($user){
    $this->db->from($this->table);
    $this->db->join('kategori', 'kategori.id_kategori=barang.id_kategori', 'left');
    $this->db->where("barang.user='$user' or barang.user='0'");
    return $this->db->get()->result();
  }

  public function save($data){
    $this->db->insert($this->table, $data);
  }

  public function update($data, $clause){ 
    $this->db->where($clause);
    $this->db->update($this->table, $data);
  }
}

/* End of file MBarang_model.php */
/* Location: ./application/models/MBarang_model.php */