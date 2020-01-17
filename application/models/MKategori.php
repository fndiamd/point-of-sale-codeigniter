<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MKategori extends CI_Model {

  public function __construct(){
    parent::__construct();
  }

  public function getAll(){
    return $this->db->get('kategori')->result();
  }

}

/* End of file MKategori_model.php */
/* Location: ./application/models/MKategori_model.php */