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

  public function getAll($column = 'id_admin', $sort = 'desc'){
    $this->db->where('id_admin !=', $this->session->userdata('id_admin'));
    $this->db->order_by($column, $sort);
    return $this->db->get('admin')->result();
  }

  public function getById($id){
    $this->db->where('id_admin', $id);
    return $this->db->get('admin')->row();
  }

  public function delete($id){
    $this->db->where('id_admin', $id);
    $this->db->delete('admin');
  }
}

/* End of file MAdmin_model.php */
/* Location: ./application/models/MAdmin_model.php */