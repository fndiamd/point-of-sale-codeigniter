<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MPelanggan extends CI_Model
{

  private $table = 'pelanggan';

  public function __construct()
  {
    parent::__construct();
  }

  public function getAll($column = 'id_pelanggan', $sort = 'desc')
  {
    if ($this->session->userdata('app_id') == 'wismilak') {
      $this->db->select($this->table . '.*');
      $this->db->from($this->table);
      $this->db->join('users', 'users.master=' . $this->table . '.user');
      $this->db->where('users.app_id', 'wismilak');
      $this->db->order_by($column, $sort);
      return $this->db->get()->result();
    } else {
      $this->db->order_by($column, $sort);
      return $this->db->get($this->table)->result();
    }
  }

  public function pelangganUser($user)
  {
    $this->db->where('user', $user);
    return $this->db->get('pelanggan')->result();
  }

  public function getById($value)
  {
    $this->db->select('pelanggan.*, toko.nama_toko');
    $this->db->from('pelanggan');
    $this->db->join('toko', 'toko.user=pelanggan.user', 'left');
    $this->db->where('pelanggan.id_pelanggan', $value);
    return $this->db->get()->row();
  }

  public function delete($idpelanggan)
  {
    $this->db->where('id_pelanggan', $idpelanggan);
    $this->db->delete($this->table);
  }
}

/* End of file MPelanggan_model.php */
/* Location: ./application/models/MPelanggan_model.php */
