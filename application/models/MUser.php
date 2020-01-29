<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MUser extends CI_Model {

  private $table = 'users';

  public function __construct(){
    parent::__construct();
  }
  
  public function getById($value){
    $this->db->where('no_telp', $value);
    return $this->db->get('users')->row();
  }

  public function getAll($column = 'tanggal', $sort = 'desc'){
    $this->db->order_by($column, $sort);
    return $this->db->get('users')->result();
  }

  public function delete($iduser){
    $this->db->where('no_telp', $iduser);
    $this->db->delete($this->table);
  }

  public function save($data){
    $this->db->insert($this->table, $data);
  }

}

/* End of file MUser_model.php */
/* Location: ./application/models/MUser_model.php */