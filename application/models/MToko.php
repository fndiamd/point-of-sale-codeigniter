<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MToko extends CI_Model
{

  private $table = 'toko';
  private $primaryKey = 'id_toko';

  public function __construct()
  {
    parent::__construct();
  }

  public function getAll($column = 'id_toko', $sort = 'desc')
  {
    if ($this->session->userdata('app_id') == 'wismilak') {
      $this->db->select($this->table.'.*');
      $this->db->from($this->table);
      $this->db->join('users', 'users.master='.$this->table.'.user');
      $this->db->where('users.app_id', 'wismilak');
      $this->db->order_by($column, $sort);
      return $this->db->get()->result();
    } else {
      $this->db->order_by($column, $sort);
      return $this->db->get($this->table)->result();
    }
  }

  public function getById($id_toko)
  {
    $this->db->where($this->primaryKey, $id_toko);
    return $this->db->get($this->table)->row();
  }

  public function getWhere($clause)
  {
    $this->db->where($clause);
    return $this->db->get($this->table)->row();
  }

  public function save($data)
  {
    $this->db->insert($this->table, $data);
  }

  public function update($clause, $data)
  {
    $this->db->where($clause);
    $this->db->update($this->table, $data);
  }

  public function delete($clause)
  {
    $this->db->where($clause);
    $this->db->delete($this->table);
  }
}

/* End of file MToko_model.php */
/* Location: ./application/models/MToko_model.php */
