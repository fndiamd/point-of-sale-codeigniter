<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MKategori extends CI_Model {

  private $table = 'kategori';

  public function __construct(){
    parent::__construct();
  }

  public function getAll($column = 'id_kategori', $sort = 'desc'){
    $this->db->order_by($column, $sort);
    return $this->db->get('kategori')->result();
  }

  public function getById($id){
    $this->db->where('id_kategori', $id);
    return $this->db->get('kategori')->row();
  }

  public function delete($idkategori){
    $this->db->where('id_kategori', $idkategori);
    $this->db->delete($this->table);
  }

}

/* End of file MKategori_model.php */
/* Location: ./application/models/MKategori_model.php */