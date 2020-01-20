<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MAdmin extends CI_Model {

  private $table = 'admin';

  public function __construct()
  {
    parent::__construct();
  }

  public function save($data){
    $this->db->insert($this->table, $data);
  }

  public function getByEmail($email){
    $this->db->where('email', $email);
    return $this->db->get($this->table);
  }

}

/* End of file MAdmin_model.php */
/* Location: ./application/models/MAdmin_model.php */