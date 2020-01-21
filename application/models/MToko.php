<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MToko extends CI_Model {

  private $table = 'toko';
  private $primaryKey = 'id_toko';

  public function __construct()
  {
    parent::__construct();
  }

  public function getAll(){
    return $this->db->get($this->table)->result();
  }

  public function getById($id_toko){
    $this->db->where($this->primaryKey, $id_toko);
    return $this->db->get($this->table)->row();
  }

  public function getWhere($clause){
    $this->db->where($clause);
    return $this->db->get($this->table)->row();
  }

  public function save($data){
    $this->db->insert($this->table, $data);
  }

  public function update($clause, $data){
    $this->db->where($clause);
    $this->db->update($this->table, $data);
  }

  public function delete($clause){
    $this->db->where($clause);
    $this->db->delete($this->table);
  }

}

/* End of file MToko_model.php */
/* Location: ./application/models/MToko_model.php */