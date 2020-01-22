<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MKategori extends CI_Model {

  private $table = 'kategori';

  public function __construct(){
    parent::__construct();
  }

  public function getAll(){
    return $this->db->get('kategori')->result();
  }

  public function delete($idkategori){
    $this->db->where('id_kategori', $idkategori);
    $this->db->delete($this->table);
  }

}

/* End of file MKategori_model.php */
/* Location: ./application/models/MKategori_model.php */