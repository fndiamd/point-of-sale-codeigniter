<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MKategori extends CI_Model
{

  private $table = 'kategori';

  public function __construct()
  {
    parent::__construct();
  }

  public function getAll($column = 'id_kategori', $sort = 'desc')
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
      return $this->db->get('kategori')->result();
    }
  }

  public function getAllMaster($column = 'id_kategori', $sort = 'desc')
  {
    $this->db->where('user', 0);
    $this->db->order_by($column, $sort);
    return $this->db->get('kategori')->result();
  }

  public function kategoriUser($user)
  {
    $this->db->where("user='0' OR user='$user'");
    $this->db->order_by('id_kategori', 'desc');
    return $this->db->get('kategori')->result();
  }

  public function getById($id)
  {
    $this->db->where('id_kategori', $id);
    return $this->db->get('kategori')->row();
  }

  public function delete($idkategori)
  {
    $this->db->where('id_kategori', $idkategori);
    $this->db->delete($this->table);
  }
}

/* End of file MKategori_model.php */
/* Location: ./application/models/MKategori_model.php */
