<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MUser extends CI_Model {

  public function __construct(){
    parent::__construct();
  }
  
  public function getById($value){
    $this->db->where('no_telp', $value);
    return $this->db->get('users')->row();
  }

  public function getAll(){
    return $this->db->get('users')->result();
  }

}

/* End of file MUser_model.php */
/* Location: ./application/models/MUser_model.php */