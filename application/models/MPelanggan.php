<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MPelanggan extends CI_Model {

  public function __construct(){
    parent::__construct();
  }

  public function getAll(){
    return $this->db->get('pelanggan')->result();
  }

  public function getById(){
    
  }

  public function pelangganUser($user){
    $this->db->where('user', $user);
    return $this->db->get('pelanggan')->result();
  }
}

/* End of file MPelanggan_model.php */
/* Location: ./application/models/MPelanggan_model.php */